DROP DATABASE IF EXISTS Poste;
CREATE DATABASE Poste DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE Poste;

CREATE TABLE Bureaux(
   idBureau INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
   codePostal VARCHAR(6)
)ENGINE=InnoDB;

CREATE TABLE Types(
   idType INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
   libelleType VARCHAR(50)
)ENGINE=InnoDB;

CREATE TABLE Courriers(
   idCourrier INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
   rueDestinataire VARCHAR(150)  NOT NULL,
   numDestintaire VARCHAR(5)  NOT NULL,
   rueEmetteur VARCHAR(150) ,
   numEmetteur VARCHAR(50) ,
   idType INT NOT NULL
)ENGINE=InnoDB;

CREATE TABLE Transports(
   idTransport INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
   libelleTransport VARCHAR(50) ,
   taxeCarbonne INT
)ENGINE=InnoDB;

CREATE TABLE Centres_de_tri(
   idCentresDeTri INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
   nomCentreDeTri VARCHAR(50)
)ENGINE=InnoDB;

CREATE TABLE Acheminements(
   idAcheminement INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
   idBureau INT,
   idTransport INT,
   idCentresDeTri INT
)ENGINE=InnoDB;

CREATE TABLE DetailsCourrier(
   idDetailCourrier INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
   idBureau INT,
   idCourrier INT,
   dateEnvoi DATE,
   dateReception DATE
)ENGINE=InnoDB;

ALTER TABLE Courriers
    ADD CONSTRAINT fk_courrier_type FOREIGN KEY(idType) REFERENCES Types(idType);

ALTER TABLE Acheminements
    ADD CONSTRAINT fk_acheminement_bureau FOREIGN KEY(idBureau) REFERENCES Bureaux(idBureau),
    ADD CONSTRAINT fk_acheminement_transports FOREIGN KEY(idTransport) REFERENCES Transports(idTransport),
    ADD CONSTRAINT fk_acheminement_centres_de_tri FOREIGN KEY(idCentresDeTri) REFERENCES Centres_de_tri(idCentresDeTri);
    
ALTER TABLE DetailsCourrier
    ADD CONSTRAINT fk_detailcourrier_bureau FOREIGN KEY(idBureau) REFERENCES Bureaux(idBureau),
    ADD CONSTRAINT fk_detailcourrier_courrier FOREIGN KEY(idCourrier) REFERENCES Courriers(idCourrier);