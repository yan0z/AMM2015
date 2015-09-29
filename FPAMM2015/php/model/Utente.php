<?php

    /**
    *  @Author Stefano Carta 
    *  Classe che definisce l'utente iscritto
    */

   include_once 'User.php';
   
   class Utente extends User{
       
       private $codice_cliente;
       
       public function __construct() {
           parent::__construct();
           $this->setRuolo(User::Utente);
       }
       
       public function setCodiceCliente($codice_cliente) {
           $intVal = filter_var($codice_cliente,FILTER_VALIDATE_INT,FILTER_NULL_ON_FAILURE);
           if(isset($intVal)){
               $this->codice_cliente = $codice_cliente;
               return true;
           }
           return false;
       }
   }
?>