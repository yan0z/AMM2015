<?php

include_once basename(__DIR__) . '/../view/viewDescriptor.php';
include_once basename(__DIR__) . '/../model/User.php';
include_once basename(__DIR__) . '/../model/UserFactory.php';

/**
 * Controller che gestisce gli utenti non autenticati, 
 * fornendo le funzionalita' comuni anche agli altri controller
 *
 * @author Stefano Carta
 */
class BaseController {
    
    const user = 'user';
    const role = 'role';
    const impersonato = '_imp';

    /**
     * Costruttore
     */
    public function __construct() {
        
    }

    /**
     * Metodo per gestire l'input dell'utente. Le sottoclassi lo sovrascrivono
     * @param type $request la richiesta da gestire
     */
    public function handleInput(&$request) {
        // creo il descrittore della vista
        $vd = new ViewDescriptor();

        // imposto la pagina
        $vd->setPagina($request['page']);
        // imposto il token per impersonare un utente
        $this->setImpToken($vd, $request);

        // gestion dei comandi
        // tutte le variabili che vengono create senza essere utilizzate 
        // direttamente in questo switch, sono quelle che vengono poi lette
        // dalla vista, ed utilizzano le classi del modello
        if (isset($request["cmd"])) {
            // abbiamo ricevuto un comando
            switch ($request["cmd"]) {
                //login
                case 'login':
                    $this->showLoginPage($vd);
                    $username = isset($request['username']) ? $request['username'] : '';
                    $password = isset($request['password']) ? $request['password'] : '';
                    $this->login($vd, $username, $password);
                    // questa variabile viene poi utilizzata dalla vista
                    if ($this->loggedIn())
                        $user = UserFactory::instance()->cercaUtentePerId($_SESSION[self::user], $_SESSION[self::role]);
                    break;
                default : $this->showLoginPage();
            }
        } else {
            if ($this->loggedIn()) {
                //session_destroy();
                //utente autenticato
                // questa variabile viene poi utilizzata dalla vista
                $user = UserFactory::instance()->cercaUtentePerId($_SESSION[self::user], $_SESSION[self::role]);
                $this->showHomeUtente($vd);
            } else {
                // utente non autenticato
                $this->showLoginPage($vd);
            }
        }

        // richiamo la vista
        require basename(__DIR__) . '/../view/master.php';
    }

    /**
     * Verifica se l'utente sia correttamente autenticato
     * @return boolean true se l'utente era gia' autenticato, false altrimenti
     */
    protected function loggedIn() {
        return isset($_SESSION) && array_key_exists(self::user, $_SESSION);
    }

    /**
     * Imposta la vista master.php per visualizzare la pagina di login
     * @param ViewDescriptor $vd il descrittore della vista
     */
    protected function showLoginPage($vd) {
        // mostro la pagina di login
        $vd->setHeaderImage(basename(__DIR__) . '/../view/header.php');
        $vd->setNavigationBar(basename(__DIR__) . '/../view/navHome.php');
        $vd->setContent(basename(__DIR__) . '/../view/loginContent.php');
        $vd->setFooter(basename(__DIR__) . '/../view/footer.php');
    }

    /**
     * Imposta la vista master.php per visualizzare la home page
     * dell'utente loggato
     * @param ViewDescriptor $vd il descrittore della vista
     */
    protected function showHomeUser($vd) {
        // mostro la home degli Utenti
        $vd->setHeaderImage(basename(__DIR__) . '/../view/header.php');
        $vd->setContent(basename(__DIR__) . '/../view/user/contentx.php');
        $vd->setServizi(basename(__DIR__) . '/../view/user/servizi.php');
        $vd->setStaff(basename(__DIR__) . '/../view/user/staff.php');
        $vd->setAbout(basename(__DIR__) . '/../view/user/about.php');
        $vd->setNavigationBar(basename(__DIR__) . '/../view/user/top_menu.php');
        $vd->setFooter(basename(__DIR__) . '/../view/footer.php');
        $vd->setBooking(basename(__DIR__) . '/../functionUser/prenota.php');
        $vd->setViewBooking(basename(__DIR__) . '/../functionUser/visualizzaPrenotazione.php');
        $vd->setFooter(basename(__DIR__) . '/../view/footer.php');
    }

    /**
     * Imposta la vista master.php per visualizzare la pagina 
     * dell'administrator
     * @param ViewDescriptor $vd il descrittore della vista
     */
    protected function showHomeAdmin($vd) {
        // mostro la home dell' admin
        $vd->setHeaderImage(basename(__DIR__) . '/../view/header.php');
        $vd->setNavigationBar(basename(__DIR__) . '/../view/admin/top_menuAdmin.php');
        $vd->setContent(basename(__DIR__) . '/../view/admin/contentxAdmin.php');
        $vd->setViewBookingAdmin(basename(__DIR__) . '/../functionAdmin/visualizzaPrenotazioneAdmin.php');
        $vd->setAbout(basename(__DIR__) . '/../view/user/about.php');
        $vd->setFooter(basename(__DIR__) . '/../view/footer.php');
    }

    /**
     * Seleziona quale pagina mostrare in base al ruolo dell'utente corrente
     * @param ViewDescriptor $vd il descrittore della vista
     */
    protected function showHomeUtente($vd) {
        $user = UserFactory::instance()->cercaUtentePerId($_SESSION[self::user], $_SESSION[self::role]);
        switch ($user->getRuolo()) {
            case User::Utente:
                $this->showHomeUser($vd);
                break;

            case User::Amministratore:
                $this->showHomeAdmin($vd);
                break;
        }
    }

    /**
     * Imposta la variabile del descrittore della vista legato 
     * all'utente da impersonare nel caso sia stato specificato nella richiesta
     * @param ViewDescriptor $vd il descrittore della vista
     * @param array $request la richiesta
     */
    protected function setImpToken(ViewDescriptor $vd, &$request) {

        if (array_key_exists('_imp', $request)) {
            $vd->setImpToken($request['_imp']);
        }
    }

    /**
     * Procedura di autenticazione 
     * @param ViewDescriptor $vd descrittore della vista
     * @param string $username lo username specificato
     * @param string $password la password specificata
     */
    protected function login($vd, $username, $password) {
        // carichiamo i dati dell'utente
        $user = UserFactory::instance()->caricaUser($username, $password);
        
        if (isset($user) && $user->esiste()) {
            // utente autenticato
            $_SESSION[self::user] = $user->getId();
            $_SESSION[self::role] = $user->getRuolo();
            $this->showHomeUtente($vd);
        }else{
            if(trim($username)=='' || trim($password)==''){
            $vd->setMessaggioErrore("Attenzione compilare tutti i campi");
            $this->showLoginPage($vd);
            }else{
            $vd->setMessaggioErrore("Utente sconosciuto o password errata");
            $this->showLoginPage($vd);
            }
        }
    }

    /**
     * Procedura di logout dal sistema 
     * @param type $vd il descrittore della pagina
     */
    protected function logout($vd) {
        // reset array $_SESSION
        $_SESSION = array();
        // termino la validita' del cookie di sessione
        if (session_id() != '' || isset($_COOKIE[session_name()])) {
            // imposto il termine di validita' al mese scorso
            setcookie(session_name(), '', time() - 2592000, '/');
        }
        // distruggo il file di sessione
        session_destroy();
        $this->showLoginPage($vd);
    }

    /**
     * Crea un messaggio di feedback per l'utente 
     * @param array $msg lista di messaggi di errore
     * @param ViewDescriptor $vd il descrittore della pagina
     * @param string $okMsg il messaggio da mostrare nel caso non ci siano errori
     */
    protected function creaFeedbackUtente(&$msg, $vd, $okMsg) {
        if (count($msg) > 0) {
            // ci sono messaggi di errore nell'array,
            // qualcosa e' andato storto...
            $error = "Si sono verificati i seguenti errori \n<ul>\n";
            foreach ($msg as $m) {
                $error = $error . $m . "\n";
            }
            // imposto il messaggio di errore
            $vd->setMessaggioErrore($error);
        } else {
            // non ci sono messaggi di errore, la procedura e' andata
            // quindi a buon fine, mostro un messaggio di conferma
            $vd->setMessaggioConferma($okMsg);
        }
    }
}