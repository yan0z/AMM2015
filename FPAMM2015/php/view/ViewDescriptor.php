<?php
    /**
     * @author amm
     *
     * File per popolare la vista di master.php 
     **/

    class ViewDescriptor {
        
        const get = 'get';
        const post = 'post';
        
        //Titolo barra del browser
        private $titolo;
        
        //Definisce parte dell'header dove si trova lo sfondo
        private $file_header;
        
        //Definisce la sideBar sinistra
        private $file_sideBarSX;
        
        //Definisce la sideBar destra
        private $file_sideBarDX;
        
        //Definisce il contenuto principale
        private $content_file;
        
        //Definisce il messaggio d'errore
        private $messaggioErrore;
        
        //Definisce il messaggio di conferma
        private $messaggioConferma;

        //Definisce la vista della pagina corrente in base all'utente che vi accede
        private $currentPage;
        
        //Definisce la vista della sottopagina corrente in base all'utente che vi accede
        private $subPage;
        
        //Variabile per gestire i diversi utenti
        private $impToken;
        
        //Definisce la lista degli script javascript da includere
        private $js;

        //Definisce un flaf json
        private $json;

        public function __construct() {
            $this->js = array();
            $this->json = false;
        }
        
        //Definizione e restituzione titolo
        public function setTitolo($titolo){
            $this->titolo = $titolo;
        }
        public function getTitolo() {
            return $this->titolo;
        }
        
        /**
         * Restituisce il path al file che include la definizione HTML dei tab (parte dello header)
         * @return string
         */
        public function getFileHeader() {
            return $this->file_header;
        }
        /**
         * Imposta il path al file che include la definizione HTML dei tab (parte dello header)
         * @param string $menuFile il path al file contenente il menu
         */
        public function setFileHeader($file_header) {
            $this->file_header = $file_header;
        }
        
        //Definizione e restituzione sideBar sinistra
        public function getSideBarSX() {
            return $this->file_sideBarSX;
        }
        public function setSideBarSX($sideBarSX) {
            $this->file_sideBarSX = $sideBarSX;
        }
        
        //Definizione e restituzione sideBar destra
        public function getSideBarDX() {
            return $this->file_sideBarDX;
        }
        public function setSideBarDX($sideBarDX) {
            $this->file_sideBarDX = $sideBarDX;
        }
        
        //Definizione e restituzione della parte content
        public function setContentFile($content) {
            $this->content_file = $content;
        }
        public function getContentFile() {
            return $this->content_file;
        }

        //Definizione messaggio di errore
        public function getMessaggioErrore() {
            return $this->messaggioErrore;
        }
        public function setMessaggioErrore($msg) {
            $this->messaggioErrore = $msg;
        }
        
        //Definizione e restituzione del nome della sottopagina corrente
        public function getSubPage() {
            return $this->subPage;
        }
        public function setSubPage($sub) {
            $this->subPage = $sub;
        }
        
        //Definizione messaggio di conferma
        public function getMessaggioConferma() {
            return $this->messaggioConferma;
        }
        public function setMessaggioConferma($msg) {
            $this->messaggioConferma = $msg;
        }
        
        //Definisce e restituisce il nome della pagina corrente
        public function getCurrentPage() {
            return $this->currentPage;
        }
        public function setCurrentPage($pagina) {
            $this->currentPage = $pagina;
        }

        //Aggiunge uno script alla pagina
        public function addScript($nome){
            $this->js[] = $nome;
        }

        //Restituisco ua lista di script
        public function &getScripts(){
            return $this->js;
        }

        public function isJson(){
            return $this->json;
        }

        //Questa funzione viene chiamata solo se la richiesta contiene dati json
        public function toggleJson(){
            $this->json = true;
        }

        //Gestisce il token per i vari utenti
        public function setImpToken($token) {
            $this->impToken = $token;
        }
        public function scriviToken($pre = '', $method = self::get) {
            $imp = BaseController::impersonato;
            switch ($method) {
                case self::get:
                    if (isset($this->impToken)) {
                        // nel caso della 
                        return $pre . "$imp=$this->impToken";
                    }
                    break;
                case self::post:
                    if (isset($this->impToken)) {
                        return "<input type=\"hidden\" name=\"$imp\" value=\"$this->impToken\"/>";
                    }
                    break;
            }
            return '';
        }
    }
?>

