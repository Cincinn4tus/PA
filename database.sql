-- creer database crowdhub mysql 

CREATE DATABASE crowdhub;

-- créer la table pa_user (nom, prénom, id : clé primaire auto incrémentée, adresse, code postale, email, role, mot de passe, date de création, date de modification)

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
    updated_at DATETIME NOT NULL
);