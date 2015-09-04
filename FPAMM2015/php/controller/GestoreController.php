<?php

     /**
     *  @Author Stefano Carta 
     *  Controllo accesso
     */
    
    include_once 'BaseController.php';
    include_once basename(__DIR__) . '/../model/ElencoCamere.php';
    include_once basename(__DIR__) . '/../model/UserFactory.php';
    //include_once basename(__DIR__) . '/../view/ViewDescriptor.php';
    
    class GestoreController extends BaseController{
        const elenco = 'elenco';
        
        public function _construct() {
            parent::_construct();
        }
        
        //Metodo per gestire l'input
        public function handleInput(&$request) {
            //Creo nuovo descriptor
            $vd = new ViewDescriptor();
            $vd -> setPagina($request['page']);
            $this ->setImpToken($vd, $request);
            if(!$this->loggedIn()){
                //Utente non autenticato
                $this ->showLoginPage($vd);
            }else{
                $user = UserFactory::instance()->cercaUtentePerId($_SESSION[BaseController::user],$_SESSION[BaseController::role]);
                if(isset($request["subPage"])){
                    switch ($request["subPage"]) {
                        case 'leNostreCamere':
                            $camere = CamereFactory::instance() -> getCamerePerId();
                            $vd -> setSubPage('leNostreCamere');
                            break;
                        //Modifica camere
                        case 'mod_camere':
                            $msg[] = array();
                            $camere = CamereFactory::instance() -> getCamerePerId();
                            $mod_camere = $this -> getCamerePerId($request,$msg);
                            if(!isset($mod_camere)){
                                $vd -> setSubPage('leNostreCamere');
                            }else{
                                $vd -> setSubPage('mod_camere'); 
                            }
                            break;
                        //Visualizza prenotazioni
                        case 'Prenotazioni':
                            $msg[] = array();
                            $camere = CamereFactory::instance() -> getCamerePerId();
                            $mod_camere = $this -> getCamere($request,$msg); //Getcamere invece di getCamerePerId
                            if(!isset($mod_camere)){
                                $vd -> setSubPage('leNostreCamere');
                            }else{
                                $vd -> setSubPage('elencoPrenotazioni');
                            }
                            break;
                    }
                }
                
                //Gestione comandi utente
                if(isset($request["cmd"])){
                    switch ($request["cmd"]){    
                        case 'logout':
                            $this ->logout($vd);
                            break;
                        case 'contatti':
                            $msg[] = array();
                            $this -> aggiornaNumero($user, $request, $msg);
                            $this -> creaFeedbackUtente($msg, $vd, "Contatti aggiornati");
                            $this -> showHomepageUser($vd);
                            break;
                        case 'mod_camere2':
                            $camere = CamereFactory::instance() -> getCamerePerId();
                            if(isset($request['camere'])){
                                $intVal = filter_var($request['camere'],FILTER_VALIDATE_INT,FILTER_NULL_ON_FAILURE);
                                if(isset($intVal)){
                                    $mod_camere = $this -> cercaCamerePerId($intVal,$camere);
                                }
                            }
                            $this -> showHomepageUser($vd);
                            break;
                        case 'save_mod_camere2':
                            $msg[] = array();
                            if(isset($request['camere'])){
                                $intVal = filter_var($request['camere'],FILTER_VALIDATE_INT,FILTER_NULL_ON_FAILURE);
                                if(isset($intVal)){
                                    $mod_camere = $this -> cercaCamerePerId($intVal,$camere);
                                    $this -> updateCamere($mod_camere,$request,$msg);
                                    if(count($msg) == 0 && CamereFactory::instance()->salva($mod_camere) != 1){
                                        $msg[] = "<li>Impossibile modificare prezzo</li>";
                                    }
                                    $this ->creaFeedbackUtente($msg, $vd, "Prezzo aggiornato");
                                    if(count($msg) == 0){
                                        $vd -> setSubPage('elencoPrenotazioni');
                                    }
                                }
                            }else{
                                $msg[] = "Camera non trovata e/o non specificata";
                            }
                            $this -> showHomepageUser($vd);
                            break;
                        case 'annulla_mod_camere2':
                            $vd -> setSubPage('elencoPrenotazioni');
                            $this -> showHomepageUser($vd);
                            break;
                        case 'prenot':
                            $camere = CamereFactory::instance()->getCamerePerId();
                            if(isset($request['camere'])){
                                $intVal = filter_var($request['camere'],FILTER_VALIDATE_INT,FILTER_NULL_ON_FAILURE);
                                if(isset($intVal)){
                                    $mod_camere = $this -> cercaCamerePerId($intVal,$camere);
                                }
                            }
                            $this -> showHomepageUser($vd);
                            break;
                    }
                }else{
                    //Nessun comando selezionato, visualizziamo e basta
                    $user = UserFactory::instance()->cercaUtentePerId($_SESSION[BaseController::user],$_SESSION[BaseController::role]);
                    $this -> showHomepageUser($vd);
                }
            }
            
            //Richiamo la vista
            require basename(__DIR__) . '/../view/master.php';
            
            //Aggiorno i dati di una camera
            public function updateCamere($mod_camere,&$request,&$msg){
                if(isset($request['prezzo'])){
                    if(!mod_camere -> setPrezzo($request['prezzo'])){
                        $msg[] = "Prezzo non valido";
                    }
                }
            }
            
            //Ricerco Camera
            private function carcaCamerePerId($id,&$camere){
                foreach ($camere as $camera){
                    if($camera -> getId() == $id){
                        return $camera;
                    }
                }
                return null;
            }
            
            //Restituisce la camera specificata
            private function getCamere(&$request,&$msg){
                if(isset($request['camere'])){
                    $camere_id = filter_var($request['camere'],FILTER_VALIDATE_INT,FILTER_NULL_ON_FAILURE);
                    $camere = CameraFactory::instance()->cercaCamerePerId($camere_id);
                    if($camere == NULL){
                        msg[] = "Camera non trovata";
                    }
                    else{
                        return null
                    }
                }
            }
        }
    }
?>
