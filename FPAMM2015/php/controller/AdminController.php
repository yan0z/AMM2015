<?php
include_once 'UserController.php';
/**
 * Estende tutte le funzionalità di UserController
 * 
 * @author Stefano Carta
 */
class AdminController extends UserController {
    
    public function __construct() {
        parent::__construct();
    }
    
}
