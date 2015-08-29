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
            $vd -> selSideBarSX(basename (__DIR__) . '/../view/login/sideSX.php');
            $vd -> setSideBarDX(basename (__DIR__) . '/../view/login/sideDX.php');
            $vd -> setContent(basename (__DIR__) . '/../view/login/content.php');
        }
        
        //Imposto la vista di master per i vari utenti riconosciuti (Utente,Gestore,Admin)
        
    }
?>