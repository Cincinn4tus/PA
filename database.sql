
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


-- rajoute dans la table pa_user status 1 par défaut

ALTER TABLE crowdhub.pa_user ADD user_status INT NOT NULL DEFAULT 1;

-- met 1 pour le status de tous les utilisateurs

UPDATE crowdhub.pa_user SET user_status = 1;

-- crée la table pa_newsletter avec les colonnes id, genre, nom,  prénom, email et subscribed. 

CREATE TABLE crowdhub.pa_newsletter (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    genre VARCHAR(255) NOT NULL,
    firstname VARCHAR(255) NOT NULL,
    lastname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    subscribed INT NOT NULL DEFAULT 1
);

-- ajoute dans la table pa_newsletter les données suivantes :
-- genre : M, nom : Goumane, prénom : Ali, email : a.goumane@yahoo.com
-- genre : M, nom : Goumane, prénom : Ali, email : aligoumane9@gmail.com

INSERT INTO crowdhub.pa_newsletter (genre, firstname, lastname, email) VALUES ('M', 'Goumane', 'Ali', 'a.goumane@yahoo.com');
INSERT INTO crowdhub.pa_newsletter (genre, firstname, lastname, email) VALUES ('M', 'Goumane', 'Ali', 'aligoumane9@gmail.com');



    CREATE TABLE crowdhub.pa_newsletter (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title varchar(255) NOT NULL,
        content text NOT NULL,
        recipient int(11) NOT NULL,
        send_date date NOT NULL
    );


    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'] . '<br><br> <hr>' . $lastname . '<br>' . $email . '<br>' . $phone;


    -- creer la table pa_message avec les colonnes id, lastname, email, phone, message, created_at, status default 0

    CREATE TABLE crowdhub.pa_message (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        lastname VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        phone VARCHAR(255) NOT NULL,
        message TEXT NOT NULL,
        created_at DATETIME NOT NULL,
        status INT NOT NULL DEFAULT 0
    );

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
    siret INT(14) NULL,
    projetsInvestis text,
    projetFait text,
    Phone_numberE char(10),
    Siret INT(14),
    nameEntreprise VARCHAR(255),
    EntrepreneurCheck varchar(10),
    InvestisseurCheck varchar(10)
    );



    /*


        $queryPrepared = $connection->prepare("INSERT INTO ".DB_PREFIX."user
    (firstname, lastname, email, gender, birthdate, scope, created_at, updated_at)
    VALUES 
    (:firstname, :lastname, :email, :gender, :birthdate, :scope, :created_at, :updated_at)");
    $queryPrepared->execute([
        "firstname" => $firstname,
        "lastname" => $lastname,
        "email" => $email,
        "gender" => $gender,
        "birthdate" => $birthdate,
        "scope" => 1,
        "created_at" => date('Y-m-d H:i:s'),
        "updated_at" => date('Y-m-d H:i:s')
    ]);

    */
CREATE TABLE crowdhub.pa_user (
    id INT PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR(255) NOT NULL,
    lastname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    gender VARCHAR(10) NOT NULL,
    birthdate DATE NOT NULL,
    scope INT NOT NULL,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL,
    postal_code VARCHAR(20),
    address VARCHAR(255),
    city VARCHAR(255),
    phone_number VARCHAR(20)
);

