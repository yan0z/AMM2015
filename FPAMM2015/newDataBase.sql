CREATE TABLE IF NOT EXISTS 'clienti' (
    'id' int(10) unsigned NOT NULL AUTO_INCREMENT,
    'nome' varchar(20) DEFAULT NULL,
    'cognome' varchar(20) DEFAULT NULL,
    'user' varchar(20) DEFAULT NULL,
    'password' varchar(20) DEFAULT NULL,
    'email' varchar(30) DEFAULT NULL,
    'stanze_id' int(10) unsigned NOT NULL AUTO_INCREMENT,
    
    UNIQUE KEY 'id' ('id'),
    KEY 'stanze_fk' (stanze_id)
)

CREATE TABLE IF NOT EXISTS 'stanze' (
    'id' int(10) unsigned NOT NULL AUTO_INCREMENT,
    'postiLetto' int(3) unsigned DEFAULT NULL,
    'costoPerNotte' int(100) unsigned DEFAULT NULL,
    'cliente_id' int(10) unsigned NOT NULL AUTO_INCREMENT,
    
    UNIQUE KEY 'id' ('id'),
    KEY 'clienti_fk' (clienti_id)
)

------------POPOLO STANZE------------
INSERT INTO 'stanze' ('id','postiLetto','costoPerNotte','clienti_id') VALUES
    (1,1,10,1),
    (2,1,15,2);

------------POPOLO CLIENTI------------
INSERT INTO 'clienti' ('id','nome','cognome','user','password','email','stanze_id') VALUES
    (1,

