<?php
    /**
     *  @Author Stefano Carta 
     *  Controllo accesso
     */

include_once 'controller/BaseController.php';
include_once 'controller/UtenteController.php';
include_once 'controller/GestoreController.php';
date_default_timezone_set("Europe/Rome");
// punto unico di accesso all'applicazione
FrontController::dispatch($_REQUEST);

class FrontController{
    public static function dispatch(&$request){
        session_start();
        if(isset($request["page"])){
            switch ($request["page"]){
                //Pagina login accessibile a qualsiasi utente
                case "login": 
                    $controller = new BaseController();
                    $controller -> handleInput($request);
                    break;
                //Pagina accessibile solo a Utenti e admin
                case "Utente":
                    $controller = new UtenteController();
                    if(isset($_SESSION[BaseController::role]) && ($_SESSION[BaseController::role] != User::Utente)){
                        self::write403();
                    }
                    $controller -> handleInput($request);
                    break;
                //Pagina accessibile solo a Gestori B&B e admin
                case "Gestore":
                    $controller = new GestoreController();
                    if(isset($_SESSION[BaseController::role]) && ($_SESSION[BaseController::role] != User::Gestore)){
                        self::write403();
                    }
                    $controller -> handleInput($request);
                    break;
                default:
                    self::write404();
            }
        }
        else{
            self::write404();
        }
    }
    
    //Creo le pagine di visualizzazione errori
    public static function write403(){
        //Per chi non ha i privilegi per visualizzare
        header('HTTP/1.0 403 Forbidden');
        $titolo = "Accesso negato";
        $msg = "Spiacente, non hai i privilegi per accedere alla risorsa richiesta";
        $login = true;
        include_once 'error.php';
        exit();
    }   
    
    public static function write404(){
        //Quando una risorsa non esiste
        header('HTTP/1.0 404 Not Found');
        $titolo = "Risorsa non trovata";
        $msg = "Spiacente, la risorsa che hai richiesto non e' stata trovata";
        include_once 'error.php';
        exit();
    }
}

?>