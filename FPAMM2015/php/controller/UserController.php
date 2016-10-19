<?php
include_once 'BaseController.php';
/**
 * Controller che gestisce gli utenti autenticati
 *
 * @author Stefano Carta
 */
class UserController extends BaseController {
    public function __construct() {
        parent::__construct();
    }
    public function handleInput(&$request) {
        // creo il descrittore della vista
        $vd = new ViewDescriptor();
        
        // gestion dei comandi
        // tutte le variabili che vengono create senza essere utilizzate
        // direttamente in questo switch, sono quelle che vengono poi lette
        // dalla vista, ed utilizzano le classi del modello
        if (!$this->loggedIn()) {
            // utente non autenticato, rimando alla login page
            $this->showLoginPage($vd);
        }
        else
        {
            // utente autenticato
            $user = UserFactory::instance()->cercaUtentePerId($_SESSION[BaseController::user], $_SESSION[BaseController::role]);
            
            // gestione dei comandi inviati dall'utente
            if (isset($request["cmd"])) {
                // abbiamo ricevuto un comando
                switch ($request["cmd"]) {
                    //logout
                    case 'logout':
                       $this->logout($vd);
                       break;
                    //prenota
                    case 'prenota':
                        $msg = array();
                        if(trim($request['nome']=='' || $request['cognome']=='' || $request['email']=='' || $request['dataArrivo']=='' || $request['dataPartenza']=='' || $request['singola']=='' || $request['doppia']=='' || $request['tripla']=='')){
                            $vd->setMessaggioErrore("Attenzione: Campi obbligatori");
                        }
                        else
                        {
                            UserFactory::instance()->prenota($request, $user->getId());
                            $vd->setMessaggioConferma("Complimenti! Prenotazione avvenuta con successo");
                        }
                        $this->showHomeUser($vd);
                        break;
                    //cancella prenotazione effettuata per ogni utente
                    case 'cancellaPrenotazione' :
                        UserFactory::instance()->cancellaPrenotazione($request['id'],$user->getId());
                        $vd->setSottoPagina('visualizzaPrenotazione');
                        $this->showHomeUser($vd);
                        break;
                    //cancella prenotazione da parte dell'admin
                    case 'cancellaPrenotazioneAdmin' :
                        // in questo array inserisco i messaggi di 
                        // cio' che non viene validato
                        $msg = array();
                        AdminFactory::instance()->cancellaPrenotazioneAdmin($request['id']);
                        $this->showHomeAdmin($vd);
                        break;
                    //cancella tutte le prenotazioni effettuate da parte degli utenti
                    case 'cancellaTuttoAdmin' :
                        AdminFactory::instance()->cancellaTuttoAdmin();
                        $this->showHomeAdmin($vd);
                        break;
                    //se il cmd non è compreso tra i precedenti
                    default :
                        $this->showHomeUtente($vd);    
                }
            }
            else
            {
               // nessun comando
               $this->showHomeUtente($vd);
            }
            // verifico quale sia la sottopagina della categoria
            // User da servire ed imposto il descrittore
            // della vista per caricare i "pezzi" delle pagine corretti
            // tutte le variabili che vengono create senza essere utilizzate
            // direttamente in questo switch, sono quelle che vengono poi lette
            // dalla vista, ed utilizzano le classi del modello
            if (isset($request["subpage"])) {
                switch ($request["subpage"]) {
                    //sezione servizi dove vengono mostrati i prezzi delle camere e i servizi offerti
                    case 'servizi':
                        $vd->setSottoPagina('servizi');
                        break;
                    //sezione staff dove viene presentato lo staff che lavora nel B&B
                    case 'staff' :
                        $vd->setSottoPagina('staff');
                        break;
                    //sezione about dove vengono mostrate le informazioni sul progetto
                    case 'about' :
                        $vd->setSottoPagina('about');
                        break;
                    //sezione prenota visibile dall'utente nella quale viene mostrato 
                    //un form per procedere alla prenotazione
                    case 'prenota' :
                        $vd->setSottoPagina('prenota');
                        break;
                    //sezione visualizzaPrenotazione visibile dall'utente nel quale
                    //viene mostrata la lista delle prenotazioni effettuate da quell'utente
                    case 'visualizzaPrenotazione' :
                        //richiamo la funzione per estrarre le informazioni sulle prenotazioni
                        //dal database
                        $prenotazioni = UserFactory::instance()->visualizzaPrenotazioni($user->getId());
                        $vd->setSottoPagina('visualizzaPrenotazione');
                        break;
                    //sezione visualizzaPrenotazioneAdmin visibile dall'admin nel quale
                    //viene mostrata la lista delle prenotazioni effettuate da tutti gli utenti
                    case 'visualizzaPrenotazioneAdmin' :
                        $prenotazioni = AdminFactory::instance()->visualizzaPrenotazioniAdmin();
                        $vd->setSottoPagina('visualizzaPrenotazioneAdmin');
                        break;
                    //se la scelta non è compresa tra queste
                    default:
                        $vd->setSottoPagina('home');
                        break;
                }
            }
        }
        // includo la vista
        require basename(__DIR__) . '/../view/master.php';
    }
    
    /**
     * Procedura di logout dal sistema
     * @param type $vd il descrittore della pagina
     **/
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
    
    
}