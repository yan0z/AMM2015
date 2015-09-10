<?php

    /**
    *  @Author Stefano Carta 
    *  Classe per la gestione delle camere
    */

    include_once 'Utente.php';
    
    class Camere{
        private $nome;
        
        private $id;
        
        private $prezzo;
        
        private $prenotazioni;
        
        //Costruttore
        public function __construct() {
            $this -> prenotazioni = array();
        }
        
        //Funzione che restituisce il nome della camera
        public function getNome() {
            return $this->nome;
        }
        
        //Funzione che imposta il nome ad una camera
        public function setNome($nome) {
            $this->nome = $nome;
            return true;
        }
        
        //Funzione che restituisce l'id di una camera
        public function getId(){
            return $this->id;
        }
        
        //Funzione che modifica l'id della camera
        public function setId($id) {
            $intVal = filter_var($id, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
            if (!isset($intVal)) {
                return false;
            }
            $this->id = $intVal;
            return true;
        }
        
        //Funzione che restituisce il prezzo della camera
        public function getPrezzo(){
           return $this->prezzo;
        }
        
        //Funzione per la modifica del prezzo di una camera
        public function setPrezzo($prezzo) {
            $this->prezzo = $prezzo;
            return true;
        }
        
        //Prenotazione camera
        public function prenota(Utente $utente) {
            $this->prenotazioni[] = $utente;
            return true;
        }
        
        //Rimozione della prenotazione
        public function cancella(Utente $utente) {
            $delete = $this->delete($utente);
            if ($delete > -1) {
                array_splice($this->prenotazioni, $delete, 1);
                return true;
            }
            return false;
        }
        
        //Funzione che restituisce la lista delle prenotazioni per camera
        public function &getPrenotazioni($prenotazioni) {
            return $this->prenotazioni;
        }

    }
?>