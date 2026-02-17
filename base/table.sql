DROP DATABASE IF EXISTS BNGRC;
CREATE DATABASE IF NOT EXISTS BNGRC;
USE BNGRC;

CREATE TABLE BNGRC_user(
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE
);

CREATE TABLE BNGRC_ville(
    id_ville INT AUTO_INCREMENT PRIMARY KEY,
    nom_ville VARCHAR(255) NOT NULL UNIQUE
);

CREATE TABLE BNGRC_type_article(
    id_type_article INT AUTO_INCREMENT PRIMARY KEY,
    libelle_type_article VARCHAR(255) NOT NULL UNIQUE
);

CREATE TABLE BNGRC_article(
    id_article INT AUTO_INCREMENT PRIMARY KEY,
    nom_article VARCHAR(255) NOT NULL,
    prix_unitaire DOUBLE NOT NULL,
    id_type_article INT,
    FOREIGN KEY (id_type_article) REFERENCES BNGRC_type_article(id_type_article)
);

CREATE TABLE BNGRC_requete(
    id_requete INT AUTO_INCREMENT PRIMARY KEY,
    id_ville INT,
    id_article INT,
    quantite INT NOT NULL,
    montant_total DOUBLE NOT NULL,
    date_requete DATE NOT NULL,
    etat VARCHAR(10) NOT NULL, /* BESOIN OU DON */
    statut VARCHAR(10) NOT NULL,
    FOREIGN KEY (id_ville) REFERENCES BNGRC_ville(id_ville),
    FOREIGN KEY (id_article) REFERENCES BNGRC_article(id_article)
);
