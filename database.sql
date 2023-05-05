
CREATE DATABASE crowdhub;



CREATE TABLE crowdhub.pa_user (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(255) NOT NULL,
    lastname VARCHAR(255) NOT NULL,
    phone_number char(10) NOT NULL,
    address VARCHAR(255) NOT NULL,
    postal_code VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    scope VARCHAR(255) NOT NULL,
    pwd VARCHAR(255) NOT NULL,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL,
    siret VARCHAR(255) NULL
);
ALTER TABLE crowdhub.pa_user MODIFY scope INT NOT NULL DEFAULT 1;


-- créer la table pa_user :
-- id : clé primaire, auto-incrémentée
-- firstname : varchar(255), non nul
-- lastname : varchar(255), non nul
-- phone_number : char(10), non nul
-- address : varchar(255), nul par défaut
-- postal_code : varchar(255), nul par défaut
-- email : varchar(255), non nul
-- scope : int, non nul, par défaut 1
-- pwd : varchar(255), non nul
-- created_at : datetime, non nul
-- updated_at : datetime, non nul
-- siret : INT(14), nul par défaut

CREATE TABLE crowdhub.pa_user (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(255) NOT NULL,
    lastname VARCHAR(255) NOT NULL,
    phone_number char(10) NOT NULL,
    address VARCHAR(255) NULL,
    postal_code VARCHAR(255) NULL,
    email VARCHAR(255) NOT NULL,
    scope INT NOT NULL DEFAULT 1,
    pwd VARCHAR(255) NOT NULL,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL,
    siret INT(14) NULL
);



CREATE TABLE crowdhub.pa_logs (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    visit_date VARCHAR(255) NOT NULL,
    visit_hour VARCHAR(255) NOT NULL,
    ip VARCHAR(255) NOT NULL,
    page_visited VARCHAR(255) NOT NULL,
    user VARCHAR(255) NULL
);

-- changer le role de l'utilisateur dont l'email est a.goumane@yahoo.com pour 0

UPDATE crowdhub.pa_user SET scope = 0 WHERE email = 'a.goumane@yahoo.com';


-- créer l'utilisateur 'root'@'localhost' sans mot de passe et lui donner tous les droits

CREATE USER 'root'@'localhost' IDENTIFIED BY '';
GRANT ALL PRIVILEGES ON *.* TO 'root'@'localhost';
FLUSH PRIVILEGES;

-- supprimer l'utilisateur 'root'@'localhost'

DROP USER 'root'@'localhost';

-- donner à l'utilisateur dont l'email est aligoumane9@gmail.com le role 1

UPDATE crowdhub.pa_user SET scope = 0 WHERE email = 'a.goumane@yahoo.com';

-- affiche le nom des colonnes de la table pa_user

SHOW COLUMNS FROM crowdhub.pa_user;


-- supprime tous les utilisateurs de la table pa_user

DELETE FROM crowdhub.pa_user;
