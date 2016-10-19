<?php

/**
 * Struttura dati per popolare la vista generica master.php
 *
 * @author Stefano Carta
 */
class ViewDescriptor {
    
    /**
     * GET http
     */
    const get = 'get';
    
    /**
     * Post HTTP
     */
    const post = 'post';

    /**
     * Titolo della finestra del browser
     * @var string
     */
    private $titolo;

    /**
     * File che include la definizione HTML del logo (parte dello header)
     * @var string 
     */
    private $headerImage;

    /**
     * Messaggio di errore da mostrare dopo un input (nascosto se nullo)
     * @var string 
     */
    private $messaggioErrore;

    /**
     * Messaggio di conferma da mostrare dopo un input (nascosto se nullo)
     * @var string 
     */
    private $messaggioConferma;
    
    /**
     * Pagina della vista corrente 
     * (le funzionalita' sono divise in tre categorie: 
     * amministratore, studente e docente, corrispondenti alle sottocartelle 
     * di view nel progetto)
     * @var string 
     */
    private $pagina;
    /**
     * Sottopagina della vista corrente (una per funzionalita' da supportare)
     * (le funzionalita' sono divise in tre categorie: 
     * amministratore, studente e docente, corrispondenti alle sottocartelle 
     * di view nel progetto)
     * @var string 
     */
    private $sottoPagina;
    /**
     * Variabile utilizzata in modalita' amministratore per impersonare 
     * degli utenti (vedere metodo setImpToken)
     * @var string 
     */
    private $impToken;

    /**
     * lista di script javascript da aggiungere alla pagina
     * @var array
     */
    //private $js;
    
    /**
     * flag per dati json (non scrive html)
     * @var boolean
     */
    private $json;
    
    /**
     * contenuto centrale della pagina
     * @var string
     */
    private $content;
    
    /**
     * menu di navigazione
     * @var string
     */
    public $navigationBar;
     
    /**
     * parte di fondo della pagina
     * @var string
     */
    private $footer;
    
    /**
     * parte dove si caricano le informazioni sulle camere
     * @var string
     */
    private $servizi;
    
    /**
     * parte dove si caricano le informazioni sullo staff
     * @var string
     */
    private $staff;
    
    /**
     * parte dove si caricano le informazioni sul progetto
     * @var string 
     */
    private $about;
    
    /**
     * parte dove si caricano le informazioni sul form di prenotazione
     * @var 
     */
    private $booking;
    
    /**
     * parte dove vengono caricate e visualizzate le info sulle prenotazioni dell'utente
     * @var array
     */
    private $viewBooking;
    
    /**
     * parte dove vengono caricate e visualizzate le info sulle prenotazioni di tutti gli utenti
     * @var array
     */
    private $viewBookingAdmin;
    
    /**
     * Costruttore
     */
    public function __construct() {
        $this->js = array();
        $this->json = false;
    }
    
    /**
     * Imposta il contenuto della pagina servizi
     * @param string $servizi informazioni
     */
    public function setServizi($servizi){
        $this->servizi = $servizi;
    }
    
    /**
     * Restituisce il contenuto delle pagina servizi
     * @param strig $servizi
     * @return string 
     */
    public function getServizi($servizi){
        return $this->servizi;
    }
    
    /**
     * Imposta il contenuto della pagina staff
     * @param string $staff
     */
    public function setStaff($staff){
        $this->staff = $staff;
    }
    
    /**
     * Restituisce il contenuto delle pagina staff
     * @param strig $staff
     * @return string 
     */
    public function getStaff($staff){
        return $this->staff;
    }
    
    /**
     * Imposta il contenuto della pagina about
     * @param type $about
     */
    public function setAbout($about){
        $this->about = $about;
    }
    
    /**
     * Restituisce il contenuto delle pagina about
     * @param strig $about
     * @return about 
     */
    public function getAbout($about){
        return $this->about;
    }
    
    /**
     * Iposta il contenuto della pagina booking
     * @param type $booking
     */
    public function setBooking($booking){
        $this->booking = $booking;
    }
    
    /**
     * Restituisce il contenuto della pagina booking
     * @param type $booking
     * @return $booking
     */
    public function getBooking($booking){
        return $this->booking;
    }
    
    /**
     * Iposta il contenuto della pagina viewBooking
     * @param type $viewBooking
     */
    public function setViewBooking($viewBooking){
        $this->viewBooking = $viewBooking;
    }
    
    /**
     * Restituisco il contenuto della pagina viewBooking
     * @param type $viewBooking
     * @return $viewBooking
     */
    public function getViewBooking($viewBooking){
        return $this->viewBooking;
    }
    
    /**
     * Iposta il contenuto della pagina viewBookingAdmin
     * @param type $viewBookingAdmin
     */
    public function setViewBookingAdmin($viewBookingAdmin){
        $this->viewBookingAdmin = $viewBookingAdmin;
    }
    
    /**
     * Restituisce il contenuto della pagina $viewBookingAdmin
     * @param type $viewBookingAdmin
     * @return $viewBookingAdmin
     */
    public function getViewBookingAdmin($viewBookingAdmin){
        return $this->viewBookingAdmin;
    }
    
    /**
     * Iposta il contenuto della pagina content
     * @param type $content
     */
    public function setContent($content){
        $this->content = $content;
    }
    
    /**
     * Restituisce il contenuto della pagina content
     * @param type $content
     * @return $content
     */
    public function getContent($content){
        return $this->content;
    }

    /**
     * Iposta il contenuto della pagina navigationBar
     * @param type $navigationBar
     */
    public function setNavigationBar($navigationBar){
        $this->navigationBar = $navigationBar;
    }
    
    /**
     * Restituisce il contenuto della pagina navigationBar
     * @param type $navigationBar
     * @return $navigationBar
     */
    public function getNavigationBar($navigationBar){
        return $this->navigationBar;
    }
    
    /**
     * Iposta il contenuto della pagina footer
     * @param $footer
     */
    public function setFooter($footer){
        $this->footer = $footer;
    }
    
    /**
     * Restituisce il contenuto della pagina footer
     * @param type $footer
     * @return $footer
     */
    public function getFooter($footer){
        return $this->footer;
    }
    
    /**
     * Restituisce il titolo della scheda del browser
     * @return string
     */
    public function getTitolo() {
        return $this->titolo;
    }

    /**
     * Imposta il titolo della scheda del browser
     * @param string $titolo il titolo della scheda del browser
     */
    public function setTitolo($titolo) {
        $this->titolo = $titolo;
    }

    /**
     * Imposta il file che include la definizione HTML del logo (parte dello header)
     * @param $logoFile il path al file contentente il logo
     */
    public function setHeaderImage($headerImage) {
        $this->headerImage = $headerImage;
    }

    /**
     * Restituisce il path al file include la definizione HTML del logo (parte dello header)
     * @return string
     */
    public function getHeaderImage() {
        return $this->headerImage;
    }
    
    /**
     * Restituisce il testo del messaggio di errore
     * @return string
     */
    public function getMessaggioErrore() {
        return $this->messaggioErrore;
    }

      /**
     * Imposta un messaggio di errore
     * @return string
     */
    public function setMessaggioErrore($msg) {
        $this->messaggioErrore = $msg;
    }

    /**
     * Restituisce il nome della sotto-pagina corrente
     * @return string
     */
    public function getSottoPagina() {
        return $this->sottoPagina;
    }

    /**
     * Imposta il nome della sotto-pagina corrente
     * @param string $pag
     */
    public function setSottoPagina($pag) {
        $this->sottoPagina = $pag;
    }

    /**
     * Restituisce il contenuto del messaggio di conferma
     * @return string
     */
    public function getMessaggioConferma() {
        return $this->messaggioConferma;
    }

    /**
     * Imposta il contenuto del messaggio di conferma
     * @param string $msg
     */
    public function setMessaggioConferma($msg) {
        $this->messaggioConferma = $msg;
    }

    /**
     * Restituisce il nome della pagina corrente
     * @return string
     */
    public function getPagina() {
        return $this->pagina;
    }

    /**
     * Imposta il nome della pagina corrente
     * @param string $pagina
     */
    public function setPagina($pagina) {
        $this->pagina = $pagina;
    }
    
    /**
     * Aggiunge uno script alla pagina
     * @param String $nome
     */
    public function addScript($nome){
        $this->js[] = $nome;
    }
    
    /**
     * Restituisce la lista di script
     * @return array
     */
    public function &getScripts(){
        return $this->js;
    }
    
    /**
     * True se si devono scrivere dati json, false altrimenti
     * @return Boolean
     */
    public function isJson(){
        return $this->json;
    }
    
    /**
     * Da chiamare se la risposta contiene dati json
     */
    public function toggleJson(){
        $this->json = true;
    }
    

    
    /**
     * Restituisce il valore corrente del token per fare in modo che
     * un amministratore possa impersonare uno studente o un docente
     * @param string $token
     */
    public function setImpToken($token) {
        $this->impToken = $token;
    }

    /**
     * Scrive un token per gestire quale sia l'utente che l'amministratore
     * sta impersonando per svolgere delle operazioni in sua vece. 
     * 
     * Questo metodo concentra in un solo punto il mantenimento di questa
     * informazione, che deve essere appesa per ogni get e per ogni post
     * quando si accede all'interfaccia dello studente o del docente 
     * in modalita' amministratore, in modo che possano essere impersonati 
     * piu' utenti tramite diversi schede dello stesso browser
     * 
     * Se avessimo inserito questa informazione in sessione, sarebbe stato 
     * possibile gestirne solo uno. Inoltre, in caso di piu' schede aperte con 
     * lo stesso browser, i dati sarebbero stati mescolati.
     * 
     * Questo e' un esempio di gestione di variabili a livello pagina. 
     * 
     * @param string $pre il prefisso per attaccare il parametro del token nella 
     * query string. Si usi '?' se il token e' il primo parametro e '&' altrimenti
     * @param int $method metodo HTTP (get o set)
     * @return string il valore da scrivere nella URL in caso di get o come
     * hidden input in caso di form
     */
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