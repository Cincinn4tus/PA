-- creer database crowdhub mysql 

CREATE DATABASE crowdhub;

/*
Création de la table pa_user. 
- id : clé primaire auto incrémentée
- firstname : varchar(255) not null
- lastname : varchar(255) not null
- address : varchar(255) not null
- postal_code : varchar(255) not null
- email : varchar(255) not null
- role : varchar(255) not null
- password : varchar(255) not null
- created_at : datetime not null
- updated_at : datetime not null
- si le rôle est 2 (entreprise) : siret : varchar(255) not null. Sinon, null
*/

CREATE TABLE crowdhub.pa_user (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(255) NOT NULL,
    lastname VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    postal_code VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    role VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL,
    siret VARCHAR(255) NULL
);


/*
Création de la table pa_logs
- date : format jj/mm/aaaa
- heure : format hh:mm
- ip : varchar(255) not null
- page_visited : varchar(255) not null
- user : varchar(255) null
*/

CREATE TABLE crowdhub.pa_logs (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    visit_date VARCHAR(255) NOT NULL,
    visit_hour VARCHAR(255) NOT NULL,
    ip VARCHAR(255) NOT NULL,
    page_visited VARCHAR(255) NOT NULL,
    user VARCHAR(255) NULL
);



