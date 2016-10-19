<?php
include_once 'User.php';
/**
 * Classe che rappresenta un amministratore del sistema,
 * eredita tutte le funzionalità di un utente generico.
 * 
 * @author Stefano Carta
 */
class Admin extends User {
    
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Informazioni del database
     * @var array
     */
    private $dbData = array();
    
    /**
     * Restituisce i dati del db
     * @return array
     */
    public function getDbData() {
        return $this->dbData;
    }
    
    /**
     * Imposta i dati del db 
     * @param array $dbData
     */
    public function setDbData($dbData) {
        $this->dbData = $dbData;
    }
    
}