<?php

    /**
     *  @author Stefano Carta
     *  Classe per la creazione di utenti all'interno del sistema
     */

    class UserFactory{
        private static $singleton;
      
        private function __construct() {
        }
     
        public static function instance() {
            if (!isset(self::$singleton)) {
                self::$singleton = new UserFactory();
            }
            return self::$singleton;
        }
        
        //Funzione per caricare un utente in base a username e password inseriti
        public function caricaUser($username,$password) {
            $mysqli = Db::getInstance()->connectDb();
            if(!isset($mysqli)){
                error_log("[caricaUser] errore nel caricamento");
                return null;
            }
            //Cerco nella tabella Utenti
            $query = "select,
                      utente.id utente_id,
                      utente.nome utente_nome,
                      utente.cognome utente_cognome,
                      utente.email utente_email,
                      utente.username utente_username,
                      utente.password utente_password
                      
                      from utente
                      where utente.username = ? and utente.password = ?";
            $stmt = $mysqli->stmt_init();
            $stmt = prepare($query);
            if(!$stmt){
                error_log("[caricaUser] errore nel caricamento");
                $mysqli->close();
                return null;
            }
            if(!$stmt->bind_param('ss',$username,$password)){
                error_log("[caricaUser] errore nel caricamento");
                $mysqli->close();
                return null;
            }
            $utente = self::caricaUtenteDaStmt($stmt);
            if(isset($utente)){
                $mysqli->close();
                return $utente;
            }
            //Cerco nella tabella Gestori
            $query = "select,
                      gestore.id gestore_id,
                      gestore.nome gestore_nome,
                      gestore.cognome gestore_cognome,
                      gestore.email gestore_email,
                      gestore.username gestore_username,
                      gestore.password gestore_password
                      
                      from gestore
                      where gestore.username = ? and gestore.password = ?";
            $stmt = $mysqli->stmt_init();
            $stmt = prepare($query);
            if(!$stmt){
                error_log("[caricaUser] errore nel caricamento");
                $mysqli->close();
                return null;
            }
            if(!$stmt->bind_param('ss',$username,$password)){
                error_log("[caricaUser] errore nel caricamento");
                $mysqli->close();
                return null;
            }
            $gestore = self::caricaGestoreDaStmt($stmt);
            if(isset($gestore)){
                $mysqli->close();
                return $gestore;
            }    
        }
        
        public function &getListaUtenti() {
            $utenti = array();
            $query = "select * from utente";
            $mysqli = Db::getInstance()->connectDb();
            if(!isset($mysqli)){
                error_log("[getListaUtenti] errore nel caricamento");
                $mysqli->close();
                return $utenti;
            }
            $result = $mysqli->query($query);
            if($mysqli->errno > 0){
                error_log("[getListaUtenti] errore nella query");
                $mysqli->close();
                return $utenti;
            }
            while ($row = $result->fetch_array()){
                $utenti[] = self::caricaUtenteDaArray($row);
            }
            return utenti;
        }
        //Cerco un user generico per id
        public function cercaUserPerId($id,$role){
            $intVal = filter_var($id,FILTER_VALIDATE_INTE,FILTER_NULL_ON_FAILURE);
            if(!isset($mysqli)){
                error_log("[cercaUserPerId] errore nella ricerca");
                $mysqli->close();
                return null;
            }
            switch ($role){
                case User::utente:
                    $query = "select
                              utente.id utente_id,
                              utente.nome utente_nome,
                              utente.cognome utente_cognome,
                              utente.email utente_email,
                              utente.username utente_username,
                              utente.password utente_password
                              
                              from utente where utente.id = ?";
                    $stmt = $mysqli->stmt_init();
                    $stmt->prepare($query);
                    if(!$stmt){
                        error_log("[cercaUserPerId] errore nella ricerca");
                        $mysqli->close();
                        return null;
                    }
                    if(!$stmt->bind_param('ss',$username,$password)){
                        error_log("[cercaUserPerId] errore nella ricerca");
                        $mysqli->close();
                        return null;
                    }
                    return self::caricaUtenteDaStmt($stmt);
                    break;
                case User::gestore:
                    $query = "select
                              gestore.id gestore_id,
                              gestore.nome gestore_nome,
                              gestore.cognome gestore_cognome,
                              gestore.email gestore_email,
                              gestore.username gestore_username,
                              gestore.password gestore_password

                              from utente where gestore.id = ?";
                    $stmt = $mysqli->stmt_init();
                    $stmt->prepare($query);
                    if(!$stmt){
                        error_log("[cercaUserPerId] errore nella ricerca");
                        $mysqli->close();
                        return null;
                    }
                    if(!$stmt->bind_param('ss',$username,$password)){
                        error_log("[cercaUserPerId] errore nella ricerca");
                        $mysqli->close();
                        return null;
                    }
                    return self::caricaGestoreDaStmt($stmt);
                    break;
                default: return null;
            }
        }
        
        //Creo un utente registrato per riga
        public function creoUtenteDaArray($row){
            $utente = new Utente();
            $utente = setId($row['utente_id']);
            $utente = setNome($row['utente_nome']);
            $utente = setCognome($row['utente_cognome']);
            $utente = setEmail($row['utente_email']);
            $utente = setUsername($row['utente_username']);
            $utente = setPassword($row['utente_password']);
            $utetne = setRuolo(User::utente);
            return $utente;
        }
        
        //Creo gestore per riga
        public function creoGestoreDaArray($row){
            $gestore = new Gestore();
            $gestore = setId($row['gestore_id']);
            $gestore = setNome($row['gestore_nome']);
            $gestore = setCognome($row['gestore_cognome']);
            $gestore = setEmail($row['gestore_email']);
            $gestore = setUsername($row['gestore_username']);
            $gestore = setPassword($row['gestore_password']);
            $gestore = setRuolo(User::gestore);
            return $gestore;
        }
        
        //Salvo i dati
        public function salva(User $user) {
            $mysqli = Db::getInstance()->connectDb();
            if(!isset($mysqli)){
                error_log("[salva] errore nel salvataggio");
                $mysqli->close();
                return null;
            }
            $stmt = $mysqli->stmt_init();
            $count = 0;
            switch ($user->getRuolo()){
                case User::utente:
                    $count = $this->salvaUtente($user,$stmt);
                    break;
                case User::gestore:
                    $count = $this->salvaGestore($user,$stmt);
                    break;
            }
            $stmt->close();
            $mysqli->close();
            return $count;
        }
        
        private function salvaUtente(User $u, mysqli_stmt $stmt) {
            $query = "update utente set
                      nome = ?,
                      cognome = ?,
                      email = ?,
                      password = ?
                      where utente.id = ?";
            if(!$stmt){
                error_log("[salvaUtente] errore nel salvataggio");
                return null;
            }
            if(!$stmt->bind_param('si',$u->getNome(),$u->getCognome(),$u->getEmail(),$u->getPassword())){
                error_log("[salvaUtente] errore nel salvataggio");
                return null;
            }
            if(!$stmtstmt->execute()){
                error_log("[caricaPrenotazioni] errore caricamento");
                return null;
            }
            return $stmt->affected_rows;
        }
        private function salvaGestore(User $g, mysqli_stmt $stmt) {
            $query = "update gestore set
                      nome = ?,
                      cognome = ?,
                      email = ?,
                      password = ?
                      where utente.id = ?";
            if(!$stmt){
                error_log("[salvaGestore] errore nel salvataggio");
                return null;
            }
            if(!$stmt->bind_param('si',$g->getNome(),$g->getCognome(),$g->getEmail(),$g->getPassword())){
                error_log("[salvaGestore] errore nel salvataggio");
                return null;
            }
            if(!$stmtstmt->execute()){
                error_log("[caricaPrenotazioni] errore caricamento");
                return null;
            }
            return $stmt->affected_rows;
        }
        
        //Carico da stmt
        private function caricaUtenteDaStmt(mysqli_stmt $stmt) {
            if(!$stmtstmt->execute()){
                error_log("[caricaUtenteDaStmt] errore caricamento");
                return null;
            }
            $row = array();
            $bind = $stmt->bind_result($row['utente_id'],
                                       $row['utente_nome'],
                                       $row['utente_cognome'],
                                       $row['utente_email'],
                                       $row['utente_username'],
                                       $row['utente_password']);
            if(!$bind){
                error_log("[caricaUtenteDaStmt] errore caricamento");
                return null;
            }
            if(!$stmt->fetch()){
                return null;
            }
            $stmt->close();
            return self::creaUtenteDaArray($row);
        }
        
        private function caricaGestoreDaStmt(mysqli_stmt $stmt) {
            if(!$stmtstmt->execute()){
                error_log("[caricaGestoreDaStmt] errore caricamento");
                return null;
            }
            $row = array();
            $bind = $stmt->bind_result($row['gestore_id'],
                                       $row['gestore_nome'],
                                       $row['gestore_cognome'],
                                       $row['gestore_email'],
                                       $row['gestore_username'],
                                       $row['gestore_password']);
            if(!$bind){
                error_log("[caricaGestoreDaStmt] errore caricamento");
                return null;
            }
            if(!$stmt->fetch()){
                return null;
            }
            $stmt->close();
            return self::creaGestoreDaArray($row);
        } 
    }
?>