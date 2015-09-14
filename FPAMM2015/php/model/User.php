<?php

    /**
     *  @author Stefano Carta
     *  Classe per rappresentare un utente qualsiasi
     */

     class User{
         
         /*
          * Costanti per definire il ruolo dell'utente generico
          * Con Gestore indichiamo il gestore del B&B mentre con Utente un utente generico iscritto al sito          
          */
         const Gestore = 1;
         const Utente = 2;
         
         private $id;
         private $username;
         private $password;
         private $nome;
         private $cognome;
         private $email;
         private $ruolo;
         
         
         public function __construct() {
         }
         
         //Funzione per controllare l'esistenza di un utente che esso sia gestore o utente visitatore
         public function exist() {
             return isset($this->ruolo);
         }
         
         //Funzioni che restituiscono dati e credenziali
         public function getNome($nome) {
             return $this->nome;
         }
         public function getCognome($cognome) {
             return $this->cognome;
         }
         public function getUsername($username) {
             return $this->username;
         }
         public function getPassword($password) {
             return $this->password;
         }
         public function getEmail($email) {
             return $this->email;
         }
         public function getRuolo($ruolo) {
             return $this->ruolo;
         }
         public function getId($id) {
             return $this->id;
         }
         
         //Funzioni per impostare dati e credenziali
         public function setId($id) {
             $intVal = filter_var($id,FILTER_VALIDATE_INT,FILTER_NULL_ON_FAILURE);
             if(!isset($intVal)){
                 return false;
             }
             $this->id = $id;
             return true;
         }
         public function setNome($nome) {
             $this->nome = $nome;
         }
         public function setCognome($cognome) {
             $this->cognome = $cognome;
         }
         public function setUsername($username){
             $this->username = $username;
         }
         public function setPassword($password) {
             $this->password = $password;
         }
         public function setEmail($email) {
             if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                 return false;
             }
             $this->email = $email;
             return true;
         }
         public function setRuolo($ruolo){
             switch ($ruolo){
                 case self::Gestore:
                 case self::Utente:
                     $this->ruolo = $ruolo;
                     return true;
                 default: return false;
             }
         }
         
         //Funzione per controllare l'uguaglianza
         public function equals(User $user) {
             return $this->id = $user->id;
                    $this->nome = $user->nome;
                    $this->cognome = $user->cognome;
                    $this->ruolo = $user->ruolo;
         }
     }
?>
