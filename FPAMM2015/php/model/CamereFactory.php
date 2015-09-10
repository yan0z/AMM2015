<?php

    /**
     *  @author Stefano Carta
     *  Creazione DB per le camere 
     */

    include_once 'Camere.php';
    include_once 'User.php';
    include_once 'UserFactory.php';
    include_once 'Utente.php';
    include_once 'Gestore.php';
    
    class CamereFactory{
        
        //Costruttore
        private function __construct() {
        }
        
        //Funzione di ricerca camere per id
        public function getCamerePerId($CamereId){
            $camere = array();
            $query = "Select
                      camere.id camera_id,
                      camere.nome camera_nome,
                      camere.prezzo camera_prezzo
                      
                      from camere
                      where camere.id = ?";
            
            $mysqli = Db::getInstance()->connectDb();
            if (!isset($mysqli)) {
                error_log("[cercaCamerePerId] impossibile inizializzare il database");
                $mysqli->close();
                return $camere;
            }

            $stmt = $mysqli->stmt_init();
            $stmt->prepare($query);
            if (!$stmt) {
                error_log("[cercaCamerePerId] impossibile inizializzare il prepared statement");
                $mysqli->close();
                return $camere;
            }
            if (!$stmt->bind_param('i', $camereid)) {
                error_log("[cercaCamerePerId] impossibile effettuare il binding in input");
                $mysqli->close();
                return $camere;
            }
            $camere =  self::caricaCamereDaStmt($stmt);
            foreach($camere as $camera){
                self::caricaPrenotazioni($camera);
            }
            if(count($camere > 0)){
                $mysqli->close();
                return $camere[0];
            }
            else{
                $mysqli->close();
                return null;
            }
        }
        
        private function &caricaCamereDaStmt(mysqli_stmt $stmt){
            $camere = array();
             if (!$stmt->execute()) {
                error_log("[caricaCamereDaStmt] impossibile eseguire lo statement");
                return null;
            }
            $row = array();
            $bind = $stmt->bind_result(
                    $row['camera_id'],
                    $row['camera_nome'],
                    $row['camera_prezzo']);
            if (!$bind) {
                error_log("[caricaCamereDaStmt] impossibile effettuare il binding in output");
                return null;
            }
            while ($stmt->fetch()) {
                $camere[] = self::creaDaArray($row);
            }
            $stmt->close();

            return $camere;
        }
        
        public function creaDaArray($row){
            $camere = new Camere();
            $camere->setId($row['camera_id']);
            $camere->setNome($row['camera_nome']);
            $camere->setPrezzo($row['camera_prezzo']);
            return $camere;
        }
    
        public function caricaPrenotazioni(Camere $prenotazioni){

            $query = "Select 
                      utente.id utente_id,
                      utente.nome utente_nome,
                      utente.cognome utente_cognome,
                      utente.email utente_email,
                      utente.username utente_username,
                      utente.password utente_password

                      from camere
                      where camere.camera_id = ?";
            $mysqli = Db::getInstance()->connectDb();
            if (!isset($mysqli)) {
                error_log("[cercaUtentePerId] impossibile inizializzare il database");
                $mysqli->close();
                return null;
            }
            $stmt = $mysqli->stmt_init();
            $stmt->prepare($query);
            if (!$stmt) {
                error_log("[caricaPrenotazioni] impossibile inizializzare il prepared statement");
                $mysqli->close();
                return null;
            }
            if (!$stmt->bind_param('i', $camere->getId())) {
                error_log("[caricaPrenotazioni] impossibile effettuare il binding in input");
                $mysqli->close();
                return null;
            }

            if (!$stmt->execute()) {
                error_log("[caricaPrenotazioni] impossibile eseguire lo statement");
                $mysqli->close();
                return null;
            }
            $row = array();
            $bind = $stmt->bind_result(
                    $row['utente_id'], 
                    $row['utente_nome'], 
                    $row['utente_cognome'],  
                    $row['utente_email'],  
                    $row['utente_username'], 
                    $row['utente_password']);
            if (!$bind) {
                error_log("[caricaPrenotazioni] impossibile effettuare il binding in output");
                $mysqli->close();
                return null;
            }
            while ($stmt->fetch()) {
                $camere->iscrivi(UserFactory::instance()->creaUtenteDaArray($row));
            }
            $mysqli->close();
            $stmt->close();
        }
    
        public function aggiungiPrenotazione(Utente $x, Camere $y){
            $query = "insert into camere (utente_id, camera_id) values (?, ?)";
            return $this->queryPrenotazione($x, $y, $query);
        }
    
        public function cancellaPrenotazione(Utente $x, Camere $y){
            $query = "delete from camere where utente_id = ? and camere_id = ?";
            return $this->queryPrenotazione($x, $y, $query);
        }
    
        private function queryPrenotazione(Utente $x, Camere $y, $query){
            $mysqli = Db::getInstance()->connectDb();
            if (!isset($mysqli)) {
                error_log("[aggiungiPrenotazione] impossibile inizializzare il database");
                $mysqli->close();
                return 0;
            }
            $stmt = $mysqli->stmt_init();
            $stmt->prepare($query);
            if (!$stmt) {
                error_log("[aggiungiPrenotazioni] impossibile inizializzare il prepared statement");
                $mysqli->close();
                return 0;
            }
            if (!$stmt->bind_param("ii", $x->getId(), $y->getId())) {
                error_log("[aggiungiPrenotazioni] impossibile effettuare il binding in input");
                $mysqli->close();
                return 0;
            }
            if (!$stmt->execute()) {
                error_log("[aggiungiPrenotazioni] impossibile eseguire lo statement");
                $mysqli->close();
                return 0;
            }
            $mysqli->close();
            return $stmt->affected_rows;
        }
    
        public function salva(Camere $camera){
             $query = "update camere set 
                       nome = ?,
                       prezzo = ?,
                       where camere.id = ?";
            return $this->modificaDB($camere, $query); 
        }
    
        public function nuovo(Camere $camere){
            $query = "insert into camere (nome, prezzo)
                      values (?, ?)";
            return $this->modificaDB($camere, $query);
        }
    
        public function cancella(Camere $camere){
            $query = "delete from camere where id = ?";
            return $this->modificaDB($camere, $query);
        }
    
        private function modificaDB(Camere $camere, $query){
            $mysqli = Db::getInstance()->connectDb();
            if (!isset($mysqli)) {
                error_log("[salva] impossibile inizializzare il database");
                return 0;
            }
            $stmt = $mysqli->stmt_init();

            $stmt->prepare($query);
            if (!$stmt) {
                error_log("[modificaDB] impossibile inizializzare il prepared statement");
                $mysqli->close();
                return 0;
            }
            if (!$stmt->bind_param('siii', 
                    $camere->getNome(),
                    $camere->getPrezzo(),
                    $camere->getId())) {
                error_log("[modificaDB] impossibile effettuare il binding in input");
                $mysqli->close();
                return 0;
            }
            if (!$stmt->execute()) {
                error_log("[modificaDB] impossibile eseguire lo statement");
                $mysqli->close();
                return 0;
            }
            $mysqli->close();
            return $stmt->affected_rows;
        }
    }
?>

