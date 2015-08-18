<?php
    /**
     *  @Author Stefano Carta
     *  Gestione connessione al DB
     */
class settings {
    //Variabili database
    public static $db_host = 'localhost';
    public static $db_user = '';
    public static $db_password = '';
    public static $db_name = 'database';
    
    private static $Path;
    
    /*
     * Restituisco il percorso nel server corrente
     */
    public static function getPath(){
        if(!isset(self::$Path)){
            //Restituisce il server corrente
            switch($_SERVER['HTTP_HOST']){
                case 'localhost':
                    self::$Path = 'http://' . $_SERVER['HTTP_HOST'] . '/FPAMM2015/';
                    break;
                case 'spano.sc.unica.it':
                    self::$Path = 'http://' . $_SERVER['HTTP_HOST'] . '/amm2014/cartaStefano/FPAMM2015/';
                    break;
                default:
                    self::$Path = '';
            }
        }
        return self::$Path;
    }
}