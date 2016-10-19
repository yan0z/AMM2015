<?php
include_once 'User.php';
include_once 'Admin.php';
include_once 'DataBase.php';
include_once 'AdminFactory.php';
include_once basename(__DIR__) . '/../view/ViewDescriptor.php';
/**
 * Classe per la creazione di funzionalità degli utenti del sistema
 *
 * @author Stefano Carta
 */

class UserFactory {
    private static $singleton;
    private function __constructor() {}
    /**
     * Restiuisce un singleton per creare utenti
     * @return UserFactory
     */
    public static function instance() {
        if (!isset(self::$singleton)) {
            self::$singleton = new UserFactory();
        }
        return self::$singleton;
    }
    /**
     * Carica un utente tramite username e password
     * @param string $username
     * @param string $password
     * @return \User|\Admin
     */
    public function caricaUser($username, $password) {
        $mysqli = DataBase::getInstance()->connectDb();
        if (!isset($mysqli)) {
            error_log("[loadUser] impossibile inizializzare il database");
            $mysqli->close();
            return null;
        }
        // cerco prima nella tabella admin, se non ci sono corrispondenze è un utente normale
        $query = "select 
            admin.id admin_id,
            user.username admin_username,
            user.password admin_password
            from admin
            join user on admin.user_id = user.id
            where user.username = ? and user.password = ?";
        $stmt = $mysqli->stmt_init();
        $stmt->prepare($query);
        if (!$stmt) {
            error_log("[loadUser] impossibile" .
                    " inizializzare il prepared statement");
            $mysqli->close();
            return null;
        }
        if (!$stmt->bind_param('ss', $username, $password)) {
            error_log("[loadUser] impossibile" .
                    " effettuare il binding in input");
            $mysqli->close();
            return null;
        }
        $admin = self::caricaAdminDaStmt($stmt);
        if (isset($admin)) {
            // ho trovato un utente admin
            $mysqli->close();
            return $admin;
        }
        // cerco nella tabella user
        $query = "select id user_id,
            username user_username,
            password user_password
            from user
            where username = ? and password = ?";
        $stmt = $mysqli->stmt_init();
        $stmt->prepare($query);
        if (!$stmt) {
            error_log("[loadUser] impossibile" .
                    " inizializzare il prepared statement");
            $mysqli->close();
            return null;
        }
        if (!$stmt->bind_param('ss', $username, $password)) {
            error_log("[loadUser] impossibile" .
                    " effettuare il binding in input");
            $mysqli->close();
            return null;
        }
        $user = self::caricaUserDaStmt($stmt);
        if (isset($user)) {
            // ho trovato un utente
            $mysqli->close();
            return $user;
        }
    }
    
    /**
     * Cerca un utente per id
     * @param int $id
     * @return un oggetto User o Admin nel caso sia stato trovato,
     * NULL altrimenti
     */
    public function cercaUtentePerId($id, $role) {
        $intval = filter_var($id, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
        if (!isset($intval)) {
            return null;
        }
        $mysqli = DataBase::getInstance()->connectDb();
        if (!isset($mysqli)) {
            error_log("[cercaUtentePerId] impossibile inizializzare il database");
            $mysqli->close();
            return null;
        }
        //controllo il ruolo
        switch ($role) {
            case User::Utente:
                $query = "select 
                id user_id,
                username user_username,
                password user_password
                from user
                where id = ?";
                $stmt = $mysqli->stmt_init();
                $stmt->prepare($query);
                if (!$stmt) {
                    error_log("[cercaUtentePerId] impossibile" .
                            " inizializzare il prepared statement");
                    $mysqli->close();
                    return null;
                }
                if (!$stmt->bind_param('i', $intval)) {
                    error_log("[cercaUtentePerId] impossibile" .
                            " effettuare il binding in input");
                    $mysqli->close();
                    return null;
                }
                $toRet =  self::caricaUserDaStmt($stmt);
                $mysqli->close();
                return $toRet;
                break;
            case User::Amministratore:
                $query = "select 
                admin.id admin_id,
                user.username admin_username,
                user.password admin_password
                from admin
                join user on admin.user_id = user.id
                where admin.id = ?"
                ;
                $stmt = $mysqli->stmt_init();
                $stmt->prepare($query);
                if (!$stmt) {
                    error_log("[cercaUtentePerId] impossibile" .
                            " inizializzare il prepared statement");
                    $mysqli->close();
                    return null;
                }
                if (!$stmt->bind_param('i', $intval)) {
                    error_log("[loadUser] impossibile" .
                            " effettuare il binding in input");
                    $mysqli->close();
                    return null;
                }
                $toRet =  self::caricaAdminDaStmt($stmt);
                $mysqli->close();
                return $toRet;
                break;
            default: return null;
        }
    }
    
    /**
     * Crea un utente 'user' da una riga del database
     * @param type $row
     * @return \User
     */
    public function creaUserDaArray($row) {
        $user = new User();
        $user->setId($row['user_id']);
        $user->setUsername($row['user_username']);
        $user->setPassword($row['user_password']);
        $user->setRuolo(User::Utente);
        return $user;
    }
    
    /**
     * Crea un utente 'admin' da una riga del database
     * @param type $row
     * @return \Admin
     */
    public function creaAdminDaArray($row) {
        $admin = new Admin();
        $admin->setId($row['admin_id']);
        $admin->setUsername($row['admin_username']);
        $admin->setPassword($row['admin_password']);
        $admin->setRuolo(User::Amministratore);
        
        //$dbData = AdminFactory::instance()->caricaElencoTotalePrenotazioni();
        //$admin->setDbData($dbData);
        return $admin;
    }
    
    /**
     * Carica un utente eseguendo un prepared statement
     * @param mysqli_stmt $stmt
     * @return null
     */
    private function caricaUserDaStmt(mysqli_stmt $stmt) {
        if (!$stmt->execute()) {
            error_log("[caricaUserDaStmt] impossibile" .
                    " eseguire lo statement");
            return null;
        }
        $row = array();
        $bind = $stmt->bind_result(
                $row['user_id'],
                $row['user_username'],
                $row['user_password']);
        if (!$bind) {
            error_log("[caricaUserDaStmt] impossibile" .
                    " effettuare il binding in output");
            return null;
        }
        if (!$stmt->fetch()) {
            return null;
        }
        $stmt->close();
        return self::creaUserDaArray($row);
    }
    
    /**
     * Carica un admin eseguendo un prepared statement
     * @param mysqli_stmt $stmt
     * @return null
     */
    private function caricaAdminDaStmt(mysqli_stmt $stmt) {
        if (!$stmt->execute()) {
            echo boo;
            error_log("[caricaAdminDaStmt] impossibile" .
                    " eseguire lo statement");
            return null;
        }
        $row = array();
        $bind = $stmt->bind_result(
                $row['admin_id'],
                $row['admin_username'], $row['admin_password'] );
        if (!$bind) {
            error_log("[caricaAdminDaStmt] impossibile" .
                    " effettuare il binding in output");
            return null;
        }
        if (!$stmt->fetch()) {
            return null;
        }
        $stmt->close();
        return self::creaAdminDaArray($row);
    }
    
    /**
     * Aggiunge la prenotazione nel db.
     * @param $request che comprende tutti i dati inseriti nel form di prenotazione
     * @param int $idUser dell'utente 
     * @return null
     */
    public function prenota($request, $idUser) {
    
        $mysqli = DataBase::getInstance()->connectDb();
       
        if (!isset($mysqli)) {
            error_log("[prenota] impossibile inizializzare il database");
            $mysqli->close();
            return null;
        }
        $stmt = $mysqli->stmt_init();
        $stmt->prepare("insert into Prenotazioni(id, Nome, Cognome, email, dataArrivo, dataPartenza, singola, doppia, tripla, idUser)
                       values
                       (default, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        if (!$stmt) {
            $mysqli->close();
            return null;
        }  
        if(!$stmt->bind_param('sssssiiii',$request['nome'],$request['cognome'],$request['email'],$request['dataArrivo'],$request['dataPartenza'],$request['singola'],$request['doppia'],$request['tripla'],$idUser)){
            error_log("[prenota] impossibile effettuare il binding in input");
            $mysqli->close();
            return null;
        }
        if (!$stmt->execute()) {
            error_log("[prenota] impossibile eseguire lo statement");
            $mysqli->close();
            return null;
        }
        $stmt->close();
        $mysqli->close();
    }
    
    
    /**
     * Rimuove la prenotazione dal db.
     * @param int $idPrenotazione 
     * @param int $id dell'utente
     * @return null
     */
    public function cancellaPrenotazione($idPrenotazione,$id) {
        
        $mysqli = DataBase::getInstance()->connectDb();
        if (!isset($mysqli)) {
            error_log("[cancellaPrenotazione] impossibile inizializzare il database");
            $mysqli->close();
            return null;
        }
        
        $query = " delete from Prenotazioni 
                   where idUser = $id 
                   and id = $idPrenotazione";
        
        $mysqli->query($query);
        
        if($mysqli->errno > 0) {
            error_log("[cancellaPrenotazione] Errore nella esecuzione della query $mysqli->errno : $mysqli->error",0);
            $mysqli->close();
            return null;
        }
        $mysqli->close();
    }
    
    
    /**
     * Restituisce tutti i dati di prenotazione dell'utente.
     * @param int $id dell'utente
     * @return array $prenotazione
     * NULL altrimenti
     */
    public function visualizzaPrenotazioni($id) {
        $prenotazione = array();
        $query="SELECT * FROM Prenotazioni where idUser = $id";
        $mysqli = DataBase::getInstance()->connectDb();
        if (!isset($mysqli)) {
            error_log("[caricaPrenotazioni] impossibile inizializzare il database");
            $mysqli->close();
            return null;
        }
        
        $risultati = $mysqli->query($query);
        
        if($mysqli->errno > 0) {
            error_log("[caricaPrenotazioni] Errore nella esecuzione della query $mysqli->errno : $mysqli->error",0);
            $mysqli->close();
            return null;
        } 
        else 
        {
            while($row = $risultati->fetch_object()){
                $prenotazione[] = array($row->id,$row->Nome,$row->Cognome,$row->email,$row->dataArrivo,$row->dataPartenza,$row->singola,$row->doppia,$row->tripla);
            }
        }
        $mysqli->close();
        
        return $prenotazione;
    }
    
}