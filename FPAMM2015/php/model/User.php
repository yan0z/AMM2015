<?php
/**
 * Classe che rappresenta un generico utente del sistema.
 * @author Stefano Carta
 */
class User {
    /**
     * Costante che definisce il ruolo amministratore
     */
    const Amministratore = 1;
    /**
     * Costante che definisce il ruolo user generico
     */
    const Utente = 2;
    /**
     * Username per l'autenticazione
     * @var string
     */
    private $username;
    /**
     * Password per l'autenticazione
     * @var string
     */
    private $password;
    /**
     * Il ruolo dell'utente nell'applicazione.
     * Lo utilizzo per implementare il controllo degli accessi
     * @var int
     */
    private $ruolo;
    /**
     * Id dell'utente (unico per ogni utente)
     * @var int
     */
    private $id;
    /**
     * L'id per ogni prenotazione fatta da un utente
     * @var int
     */
    private $idPrenotazione;
    /**
     * Costruttore
     */
    public function __construct() {}
    
    /**
     * Verifica se l'utente esista per il sistema
     * @return boolean true se l'utente esiste, false altrimenti
     */
    public function esiste() {
        return isset($this->ruolo);
    }
    
    /**
     * Restituisce lo username dell'utente
     * @return string
     */
    
    public function getUsername() {
        return $this->username;
    }
    
    /**
     * Imposta lo username per l'autenticazione dell'utente.
     * @param string $username
     */
    public function setUsername($username) {
        $this->username = $username;
    }
    
    /**
     * Restituisce la password per l'utente corrente
     * @return string
     */
    public function getPassword() {
        return $this->password;
    }
    
    /**
     * Imposta la password per l'utente corrente
     * @param string $password
     */
    public function setPassword($password) {
        $this->password = $password;
    }
    
    /**
     * Restituisce un intero
     * @return int
     */
    public function getRuolo() {
        return $this->ruolo;
    }
    
    /**
     * Imposta un ruolo per un dato utente
     * @param int $ruolo
     * @return boolean true se il valore e' ammissibile ed e' stato impostato,
     * false altrimenti
     */
    public function setRuolo($ruolo) {
        switch ($ruolo) {
            case self::Utente:
            case self::Amministratore:
                $this->ruolo = $ruolo;
                return true;
            default:
                return false;
        }
    }
    
    /**
     * Restituisce un identificatore unico per l'utente
     * @return int
     */
    public function getId(){
        return $this->id;
    }
    
    /**
     * Imposta un identificatore unico per l'utente
     * @param int $id
     * @return boolean true se il valore e' stato aggiornato correttamente,
     * false altrimenti
     */
    public function setId($id){
        $intVal = filter_var($id, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
        if(!isset($intVal)){
            return false;
        }
        $this->id = $intVal;
    }
    
    /**
     * Restituisce un identificatore unico per la prenotazione
     * @return int
     */
    public function getIdPrenotazione() {
        return $this->idPrenotazione;
    }
    
    /**
     * Imposta un identificatore unico per la prenotazione
     * @param type $idPrenotazione
     * @return boolean true se il valore e' stato aggiornato correttamente,
     * false altrimenti
     */
    public function setIdPrenotazione($idPrenotazione){
        $intVal = filter_var($idPrenotazione, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
        if(!isset($intVal)){
            return false;
        }
        $this->idPrenotazione = $intVal;
    }
    
    /**
     * Compara due utenti, verificandone l'uguaglianza logica
     * @param User $user l'utente con cui comparare $this
     * @return boolean true se i due oggetti sono logicamente uguali,
     * false altrimenti
     */
    public function equals(User $user) {
        return  $this->id == $user->id &&
                $this->ruolo == $user->ruolo;
    }
}