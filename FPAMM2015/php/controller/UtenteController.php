<?php

    /**
    *  @Author Stefano Carta 
    *  Funzione utente B&B
    */
    include_once 'BaseController.php';
    include_once basename(__DIR__) . '/../model/CamereFactory.php';
    
    class UtenteController extends BaseController{
        const camere = 'camere';
        
        public function __construct() {
            parent::_construct();
        }
        
        //Input utente
        public function handleInput(&$request){
            $vd = new ViewDescriptor;
            $vd -> setPagina($request['page']);
            $this ->setImpToken($vd, $request);
            if(!$this ->loggedIn()){
                $this ->showLoginPage($vd);
            }
            else{
                $user = UserFactory::instance()->carcaUtentePerId($_SESSION[BaseController::user],$_SESSION[BaseController::role]);
                
                if(isset($request["subPage"])){
                    switch ($request["subPage"]) {
                        case 'credenziali':
                            $vd ->setSubPage('credenziali');
                            break;
                        case 'camerePrenotazioni':
                            $camere = CamereFactory::instance()->getCamerePerUtente($user);
                            $vd -> setSubPage('camerePrenotazioni');
                            break;
                        default:
                            $vd -> setSubPage('home');
                            break;
                    }
                }
                
                if(isset($request["cmd"])){
                    switch ($request["cmd"]){
                        //Logout
                        case 'logout':
                            $this ->logout($vd);
                            break;
                        case 'email':
                            $msg = array();
                            $this ->aggiornaEmail($user, $request, $msg);
                            $this ->creaFeedbackUtente($msg, $vd, "Email aggiornata con successo");
                            $this ->showHomeUser($vd);
                            break;
                        case 'password':
                            $msg = array();
                            $this->aggiornaPassword($user, $request, $msg);
                            $this->creaFeedbackUtente($msg, $vd, "Password aggiornata con successo");
                            $this->showHomeUtente($vd);
                            break;
                        case 'prenota':
                            $msg = array();
                            $index = $this->getCameraPerIndex($camere,$request,$msg);
                            if(isset($index)){
                                $isOk = $index->prenota($user);
                                $count = CamereFactory::instance()->addPrenotazione($user,$index);
                                if($count != 1 || !$isOk){
                                    $msg[] = "<li>Impossibile cancellare prenotazione</li>";
                                }
                            }
                            else{
                                $msg[] = "<li>Impossibile prenotare la camera desiderata, verifica disponibilita'</li>";
                            }
                            $this ->creaFeedbackUtente($msg, $vd, "Prenotazione effettuata");
                            $this ->showHomeUtente($param);
                            break;
                        case 'cancella':
                            $msg = array();
                            $index = $this->getCameraPerIndex($camere,$request,$msg);
                            if(isset($index)){
                                $isOk = $index->cancella($user);
                                $count = CamereFactory::instance()->deletePrenotazione($user,$index);
                                if($count != 1 || !$isOk){
                                    $msg[] = "<li>Impossibile cancellare prenotazione</li>";
                                }
                            }
                            else{
                                $msg[] = "<li>Impossibile cancellare prenotazione</li>";
                            }
                            $this ->creaFeedbackUtente($msg, $vd, "Hai cancellato la tua prenotazione");
                            $this ->showHomeUser($param);
                            break;
                        default :
                            $this ->showLoginPage($vd);
                    }
                }
                else{
                    $user = UserFactory::instance()->cercaUtentePerId($_SESSION[BaseController::user],$_SESSION[BaseController::role]);
                    $this -> showHomepageUser($vd);
                }
            }
            
            require basename (__DIR__) . '/../view/master.php';
        }
        
        private function getCameraPerIndex(&$camere,&$request,&$msg) {
            if(isset($request['camere'])){
                $intVal = filter_var($request['camere'],FILTER_VALIDATE_INT,FILTER_NULL_ON_FAILURE);
                if(isset($intVal) && $intVal > -1 && $intVal < $count($camere)){
                    return $camere[$intVal];
                }
                else{
                    return null;
                }
            }
            else{
                return null;
            }
        }
    }
?>