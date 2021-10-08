Drop DATABASE IF EXISTS ZeroFaute;
Create DATABASE ZeroFaute;
USE ZeroFaute;

CREATE TABLE Categories(
   IdCategorie INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
   nom VARCHAR(50)  NOT NULL,
   description VARCHAR(511)
)ENGINE=InnoDB;

CREATE TABLE SousCategories(
   IdSousCategorie INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
   nom VARCHAR(50)  NOT NULL,
   description VARCHAR(511) ,
   IdCategorie INT NOT NULL
)ENGINE=InnoDB;

CREATE TABLE Modeles(
   IdModele INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
   codeModele VARCHAR(8),
   nom VARCHAR(50)  NOT NULL,
   dateDeMiseSurLeMarche DATE NOT NULL
)ENGINE=InnoDB;

CREATE TABLE Produits(
   idProduit INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
   numeroSerie INT NOT NULL,
   numeroProduit INT NOT NULL,
   anneeProduction SMALLINT NOT NULL,
   IdModele INT NOT NULL
)ENGINE=InnoDB;

CREATE TABLE Fautes(
   idFaute INT NOT NULL PRIMARY KEY,
   codeFaute INT NOT NULL,
   titre VARCHAR(50)  NOT NULL,
   dateDetection DATE NOT NULL,
   commentaire VARCHAR(511) ,
   dateReparation VARCHAR(50) ,
   idProduit INT NOT NULL
)ENGINE=InnoDB;

CREATE TABLE Classifications(
   idClassification INT NOT NULL PRIMARY KEY,
   IdSousCategorie INT NOT NULL,
   idFaute INT NOT NULL
)ENGINE=InnoDB;

ALTER TABLE SousCategories
    ADD CONSTRAINT fk_souscategorie_categorie FOREIGN KEY(IdCategorie) REFERENCES Categories(IdCategorie);

ALTER TABLE Produits
    ADD CONSTRAINT fk_produit_modele FOREIGN KEY(IdModele) REFERENCES Modeles(IdModele);

ALTER TABLE Fautes
    ADD CONSTRAINT fk_faute_produit FOREIGN KEY(idProduit) REFERENCES Produits(idProduit);

ALTER TABLE Classifications
    ADD CONSTRAINT fk_classification_souscategorie FOREIGN KEY(IdSousCategorie) REFERENCES SousCategories(IdSousCategorie),
    ADD CONSTRAINT fk_classification_faute FOREIGN KEY(idFaute) REFERENCES Fautes(idFaute);