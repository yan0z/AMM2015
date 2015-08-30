<?php
    /**
     *  @Author Stefano Carta 
     *  Controllo accesso
     */
    include_once basename(__DIR__) . '/../view/ViewDescriptor.php';
    include_once basename(__DIR__) . '/../model/User.php';
    include_once basename(__DIR__) . '/../model/UserFactory.php';
    
    class BaseController{
        const user = 'user';
        const role = 'role';
        const impersonato = 'imp';
        
        //Costruttore
        public function _construct() {
        }
        
        //Gestione input utente
        public function  handleInput(&$request){
            //Descrittore per la visualizzazione
            $vd = new ViewDescriptor();
            
            //Imposto pagina
            $vd -> setPagina($request['page']);
            //Imposto token per impersonare un utente nel caso io lo sia
            $vd -> setImpToken($vd,$request);
            
            //Richiesta di autenticazione
            if(isset($request["cmd"])){
                switch ($request["cmd"]){
                    case 'login':
                        $username = isset($request['user']) ? $request['user'] : '';
                        $password = isset($request['password']) ? $request['password'] : '';
                        $this -> login($vd,$username,$password);
                        if($this -> loggedIn()){
                            $user = UserFactory::instance()->cercaUtentePerId($_SESSION[self::user],$_SESSION[self::role]);
                        }
                        break;
                    default :
                        $this -> showLoginPage();
                        break;
                }
            }
            else{
                //Utente autenticato
                if($this -> loggedIn()){
                    $user = UserFactory::instance()->cercaUtentePerId($_SESSION[self::user],$_SESSION[self::role]);
                    $this -> showHomepageUser($vd);
                }
                else{
                    $this -> showLoginPage($vd);
                }
            }
            require basename(__DIR__) . '/../view/master.php';
        }
        
        protected function loggedIn(){
            return isset($_SESSION) && array_key_exists(self::user, $_SESSION);
        }

        //Imposta la vista di master per il login
        protected function showLoginPage($vd){
            $vd -> setTitolo("FP AMM");
            $vd -> setMenu(basename (__DIR__) . '/../view/login/menu.php');
            $vd -> selSideBarSX(basename (__DIR__) . '/../view/login/sideSX.php');  //Side bar di pesentazione
            $vd -> setSideBarDX(basename (__DIR__) . '/../view/login/sideDX.php');
            $vd -> setContent(basename (__DIR__) . '/../view/login/content.php');
        }
        
        //Imposto la vista di master per i vari utenti riconosciuti (Utente,Gestore,Admin)
        protected function showHomeAdmin($param) {
            $vd -> setTitolo("FP AMM - ADMIN");
            $vd -> setMenu(basename(__DIR__) .'/../view/admin/menu.php');
            $vd -> selSideBarSX(basename (__DIR__) . '/../view/admin/sideSX.php');  //Ricerca
            $vd -> setSideBarDX(basename (__DIR__) . '/../view/admin/sideDX.php');  //Logout e contratto sito
            $vd -> setContent(basename (__DIR__) . '/../view/admin/content.php');   //Vista b&b e prenotazione camere
        }
        
        protected function showHomeGestore($param) {
            $vd -> setTitolo("FP AMM - GestioneB&B");
            $vd -> setMenu(basename(__DIR__) .'/../view/gestore/menu.php');
            $vd -> selSideBarSX(basename (__DIR__) . '/../view/gestore/sideSX.php');    //Ricerca     
            $vd -> setSideBarDX(basename (__DIR__) . '/../view/gestore/sideDX.php');    //Logout e cassa
            $vd -> setContent(basename (__DIR__) . '/../view/gestore/content.php');     //Vista b&b e prenotazione camere
        }
        
        protected function showHomeUtente($param) {
        $vd -> setTitolo("FP AMM - Benvenuto");
        $vd -> setMenu(basename(__DIR__) .'/../view/utente/menu.php');
        $vd -> selSideBarSX(basename (__DIR__) . '/../view/utente/sideSX.php');    //Ricerca     
        $vd -> setSideBarDX(basename (__DIR__) . '/../view/utente/sideDX.php');    //Logout
        $vd -> setContent(basename (__DIR__) . '/../view/utente/content.php');     //Vista b&b e prenotazione camere
        }
        
        //Scelta sulla pagina da visualizzare
        protected function selectHome($vd) {
            $user = UserFactory::instance() -> cercaUtentePerId($_SESSION[self::user],$_SESSION[self::role]);
            switch ($user -> getRole()){
                case User::Admin:
                    $this ->showHomeAdmin($vd);
                    break;
                case User::Gestore:
                    $this ->showHomeGestore($vd);
                    break;
                case User::Utente:
                    $this -> showHomeUtente($vd);
                    break;
            }
        }
        
        protected function setImpToken(ViewDescriptor $vd, &$request) {
            if (array_key_exists('_imp', $request)) {
                $vd->setImpToken($request['_imp']);
            }
        }
        
        //Aggiornamento credenziali (email,password)
        protected function aggiornaEmail($user, &$request, &$msg) {
            if (isset($request['email'])) {
                if (!$user -> setEmail($request['email'])) {
                    $msg[] = '<li>L\'indirizzo email inserito non &egrave; corretto</li>';
                }
            }
            //Salvataggio dati
            if (count($msg) == 0) {
                if (UserFactory::instance()->salva($user) != 1) {
                    $msg[] = '<li>Salvataggio non riuscito</li>';
                }
            }
        }
        
        protected function aggiornaPassword($user, &$request, &$msg) {
            if (isset($request['pass1']) && isset($request['pass2'])) {
                if ($request['pass1'] == $request['pass2']) {
                    if (!$user -> setPassword($request['pass1'])) {
                        $msg[] = '<li>Password non corretta, introdurre nuovamente.</li>';
                    }
                } else {
                    $msg[] = '<li>Errore, le password sono diverse.</li>';
                }
            }
            //Salvataggio datti
            if (count($msg) == 0) {
                if (UserFactory::instance()->salva($user) != 1) {
                    $msg[] = '<li>Salvataggio non riuscito</li>';
                }
            }
        }
        
        //Autenticazione
        protected function login($vd,$username,$password) {
            $user = UserFactory::instance() -> caricaUtente($username,$password);
            
            //Verificata l'esistenza dell'utente
            if(isset($user) && $user -> exist()){
                $_SESSION[self::user] = $user -> getId();
                $_SESSION[self::role] = $user -> getRuolo();
                $this ->selectHome($vd);
            }
            else{
                $vd -> setMessageError("Utente Non Trovato o Password Errata");
                $this ->showLoginPage($vd);
            }
        }
        
        //LogOut
        protected function logout($vd) {
            //Resetto l'array SESSION inizializzandolo con un array vuoto
            $_SESSION = array();
            
            //Termino la validità dei cookie
            if(session_id() != '' || isset($cookie[session_name()])){
                setcookie(session_name(), '', time() - 259200, '/');
            }
            
            //Distruggo il file di sessione
            session_destroy();
            $this ->showLoginPage($vd);
        }
        
        //Crea un feedBack per l'utente BOOO
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
?>