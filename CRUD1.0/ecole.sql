CREATE DATABASE  la_reuissite;
USE la_reuissite;
CREATE TABLE employes(
    id_employes INT(3) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    prenom VARCHAR(20) NOT NULL,
    nom VARCHAR(20) NOT NULL,
    email VARCHAR(50) NOT NULL,
    mdp VARCHAR(32) NOT NULL,
    sexe ENUM('m','f') NOT NULL,
    profession ENUM('prof','insti','survei') NOT NULL,
    ville VARCHAR(20) NOT NULL,
    cp INT(5) NOT NULL,
    adresse VARCHAR(10) NOT NULL,
    statut INT(1) NOT NULL DEFAULT 0,
    UNIQUE (email)
)ENGINE = InnoDB;

CREATE TABLE eleves(
    id_eleve INT(3) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    prenom_eleves VARCHAR(20) NOT NULL,
    nom_eleves VARCHAR(20) NOT NULL,
    sexe ENUM('m','f') NOT NULL,
    classe ENUM('6eme','5eme','4eme','3eme') NOT NULL,
    prenom_tuteur VARCHAR(20) NOT NULL,
    nom_tuteur VARCHAR(20) NOT NULL,
    email_tuteur VARCHAR(50) NOT NULL,
    num_tel INT(9) NOT NULL,
    profession VARCHAR NOT NULL,
    ville VARCHAR(20) NOT NULL,
    cp INT(5) NOT NULL,
    adresse VARCHAR(10) NOT NULL
)ENGINE = InnoDB;