<?php
include_once basename(__DIR__) . '/../model/User.php';
include_once basename(__DIR__) . '/../model/Admin.php';
include_once basename(__DIR__) . '/../model/DataBase.php';
/**
 * Classe per la creazione di funzionalità dell'admin del sistema
 *
 * @author Stefano Carta
 */
class AdminFactory {
    private static $singleton;
    private function __constructor() {}
    
    /**
     * Restiuisce un singleton per creare admin
     * @return AdminFactory
     */
    public static function instance() {
        if (!isset(self::$singleton)) {
            self::$singleton = new AdminFactory();
        }
        return self::$singleton;
    }
    
    /**
     * Preleva dal db il totale delle prenotazioni
     * @return array $Prenotazione
     */
    public function visualizzaPrenotazioniAdmin() {
        $prenotazione = array();
        $query="SELECT * FROM Prenotazioni";
        //print_r($query);
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
        } else {
            
            while($row = $risultati->fetch_object()){
                $prenotazione[] = array($row->id,$row->Nome,$row->Cognome,$row->email,$row->dataArrivo,$row->dataPartenza,$row->singola,$row->doppia,$row->tripla,$row->idUser);
            }
        }
        $mysqli->close();
        
        return $prenotazione;
    }
    
    /**
     * Permette di cancellare dal db le prenotazione selezionata
     * @param type $idPRen idPrenotazione della prenotazione selezionata per la cancellazione
     **/
    public function cancellaPrenotazioneAdmin($idPren){
        
        $mysqli = DataBase::getInstance()->connectDb();
        if (!isset($mysqli)) {
            error_log("[cancellaPrenotazione] impossibile inizializzare il database");
            $mysqli->close();
            return null;
        }
        
        $query = " delete from Prenotazioni 
                    where id = $idPren";
        
        $mysqli->query($query);
        
        if($mysqli->errno > 0) {
            error_log("[cancellaPrenotazioneAdmin] Errore nella esecuzione della query $mysqli->errno : $mysqli->error",0);
            $mysqli->close();
            return null;
        }
        
        $mysqli->close();    
    }

    /**
     * Permette di cancellare dal db tutte le prenotazioni presenti
     **/
    public function cancellaTuttoAdmin(){
        
        $mysqli = DataBase::getInstance()->connectDb();
        if (!isset($mysqli)) {
            error_log("[cancellaPrenotazione] impossibile inizializzare il database");
            $mysqli->close();
            return null;
        }
        
        $query = " delete from Prenotazioni ";
        
        $mysqli->query($query);
        
        if($mysqli->errno > 0) {
            error_log("[cancellaPrenotazioneAdmin] Errore nella esecuzione della query $mysqli->errno : $mysqli->error",0);
            $mysqli->close();
            return null;
        }
        
        $mysqli->close();    
    }
}