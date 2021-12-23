Drop DATABASE IF EXISTS Noel;
Create DATABASE Noel;
USE Noel;

--
-- Structure de la table `Sexes`
--
Drop TABLE IF EXISTS Sexes;
CREATE TABLE Sexes(
   IdSexe INT AUTO_INCREMENT PRIMARY KEY,
   libelleSexe VARCHAR(10)  NOT NULL
)ENGINE=InnoDB;

--
-- Structure de la table `Lutins`
--
Drop TABLE IF EXISTS Lutins;
CREATE TABLE Lutins(
   IdLutin INT PRIMARY KEY,
   nomLutin VARCHAR(50)  NOT NULL,
   prenomLutin VARCHAR(50)  NOT NULL
)ENGINE=InnoDB;

--
-- Structure de la table `Traineaux`
--
Drop TABLE IF EXISTS Traineaux;
CREATE TABLE Traineaux(
   IdTraineaux INT PRIMARY KEY,
   tailletraineau TINYINT NOT NULL,
   dateMiseEnService DATE NOT NULL,
   DateRevision DATE NOT NULL
)ENGINE=InnoDB;

--
-- Structure de la table `Tournees`
--
Drop TABLE IF EXISTS Tournees;
CREATE TABLE Tournees(
   IdTournee INT AUTO_INCREMENT PRIMARY KEY,
   heureDepart TIME NOT NULL,
   IdLutin INT NOT NULL,
   IdTraineaux INT NOT NULL   
)ENGINE=InnoDB;

--
-- Structure de la table `Rennes`
--
Drop TABLE IF EXISTS Rennes;
CREATE TABLE Rennes(
   nomRenne VARCHAR(50) PRIMARY KEY,
   dateNaissance DATE NOT NULL,
   IdSexe INT NOT NULL
)ENGINE=InnoDB;

--
-- Structure de la table `Enfants`
--
Drop TABLE IF EXISTS Enfants;
CREATE TABLE Enfants(
   IdEnfant INT PRIMARY KEY,
   nomEnfant VARCHAR(50)  NOT NULL,
   prenomEnfant VARCHAR(50)  NOT NULL,
   adresseEnfant VARCHAR(250) , -- Pas de maison, pas de livraison !
   voeuEnfant VARCHAR(450)  NOT NULL,
   pourcentageSagesseEnfant DECIMAL(5,2)   NOT NULL,
   IdSexe INT NOT NULL
)ENGINE=InnoDB;

--
-- Structure de la table `Cadeaux`
--
Drop TABLE IF EXISTS Cadeaux;
CREATE TABLE Cadeaux(
   IdCadeau INT AUTO_INCREMENT PRIMARY KEY,
   designation VARCHAR(50)  NOT NULL,
   IdTournee INT NOT NULL,
   IdEnfant INT NOT NULL UNIQUE
)ENGINE=InnoDB;

--
-- Structure de la table `Responsabilitees`
--
Drop TABLE IF EXISTS Responsabilitees;
CREATE TABLE Responsabilitees(
   IdResponsabilitee INT AUTO_INCREMENT PRIMARY KEY,
   IdLutin INT NOT NULL,
   IdTraineaux INT NOT NULL,
   DatePriseDeResposabilitee DATE NOT NULL
)ENGINE=InnoDB;

--
-- Structure de la table `Equipages`
--
Drop TABLE IF EXISTS Equipages;
CREATE TABLE Equipages(
   IdEquipage INT AUTO_INCREMENT PRIMARY KEY,
   IdTournee INT NOT NULL,
   nomRenne VARCHAR(50) NOT NULL
)ENGINE=InnoDB;

--
-- Contraintes de cle étrangère
--
ALTER TABLE Tournees
    ADD CONSTRAINT fk_Tournees_Lutins FOREIGN KEY(IdLutin) REFERENCES Lutins(IdLutin),
    ADD CONSTRAINT fk_Tournees_Traineaux FOREIGN KEY(IdTraineaux) REFERENCES Traineaux(IdTraineaux);

ALTER TABLE Rennes
    ADD CONSTRAINT fk_Rennes_Sexes FOREIGN KEY(IdSexe) REFERENCES Sexes(IdSexe);

ALTER TABLE Enfants
    ADD CONSTRAINT fk_Enfants_Sexes FOREIGN KEY(IdSexe) REFERENCES Sexes(IdSexe);

ALTER TABLE Cadeaux
    ADD CONSTRAINT fk_Cadeaux_Tournees FOREIGN KEY(IdTournee) REFERENCES Tournees(IdTournee),
    ADD CONSTRAINT fk_Cadeaux_Enfants FOREIGN KEY(IdEnfant) REFERENCES Enfants(IdEnfant);

ALTER TABLE Responsabilitees
    ADD CONSTRAINT fk_Responsabilitees_Lutins FOREIGN KEY(IdLutin) REFERENCES Lutins(IdLutin),
    ADD CONSTRAINT fk_Responsabilitees_Traineaux FOREIGN KEY(IdTraineaux) REFERENCES Traineaux(IdTraineaux);

ALTER TABLE Equipages
    ADD CONSTRAINT fk_Equipages_Tournees FOREIGN KEY(IdTournee) REFERENCES Tournees(IdTournee),
    ADD CONSTRAINT fk_Equipages_Rennes FOREIGN KEY(nomRenne) REFERENCES Rennes(nomRenne);