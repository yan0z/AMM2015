<?php
    /**
     * Classe che contiene una lista di variabili di configurazione
     *
     * @author Stefano Carta
     */
    class Settings {
        //variabili di accesso per il database
        public static $db_host = 'localhost';
        public static $db_user = 'cartaStefano';
        public static $db_password = 'cinghiale249';
        public static $db_name='amm14_cartaStefano';

        private static $appPath;
        
        /**
         * Restituisce il path relativo nel server corrente dell'applicazione
         * Lo uso perche' la mia configurazione locale e' ovviamente diversa da quella 
         * pubblica. Gestisco il problema una volta per tutte in questo script
         */
        public static function getApplicationPath() {
            if (!isset(self::$appPath)) {
                // restituisce il server corrente
                switch ($_SERVER['HTTP_HOST']) {
                    case 'localhost:8888':
                        // configurazione locale
                        self::$appPath = 'http://' . $_SERVER['HTTP_HOST'] . '/AMM2015/FPAMM2015/';
                        break;
                    case 'spano.sc.unica.it':
                        // configurazione pubblica
                        self::$appPath = 'http://' . $_SERVER['HTTP_HOST'] . '/amm2014/cartaStefano/FPAMM2015/';
                        break;
                    default:
                        self::$appPath = '';
                        break;
                }
            }
            return self::$appPath;
        }
    }
?>
