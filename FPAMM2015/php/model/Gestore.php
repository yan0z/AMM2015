<?php

    /**
    *  @Author Stefano Carta 
    *  Classe che definisce il Gestore del B&B
    */

   include_once 'User.php';
   
   class Gestore extends User{
       
       private $contatto;
       
       public function __construct() {
           parent::__construct();
           $this->setRuolo(User::Gestore);
       }
       
       public function setContatto($contatto){
           $this->contatto = $contatto;
           return true;
       }
       
       public function getContatto(){
           return $this->contatto;
       }
       
   }
?>
