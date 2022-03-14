DROP DATABASE IF EXISTS Stage;
CREATE DATABASE Stage DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

USE Stage;

DROP TABLE IF EXISTS Plan_Centres;
CREATE TABLE Plan_Centres(
   idCentre INT AUTO_INCREMENT PRIMARY KEY,
   libelle VARCHAR(50)  NOT NULL UNIQUE
)ENGINE=InnoDB;

DROP TABLE IF EXISTS Plan_Organismes;
CREATE TABLE Plan_Organismes(
   idOrganisme INT AUTO_INCREMENT PRIMARY KEY,
   libelle VARCHAR(150)  NOT NULL UNIQUE
)ENGINE=InnoDB;

DROP TABLE IF EXISTS Plan_Utilisateurs;
CREATE TABLE Plan_Utilisateurs(
   idUtilisateur INT AUTO_INCREMENT PRIMARY KEY,
   matricule VARCHAR(50) NOT NULL UNIQUE,
   nom VARCHAR(50)  NOT NULL,
   prenom VARCHAR(50)  NOT NULL,
   email VARCHAR(50)  NOT NULL UNIQUE,
   mdp VARCHAR(50)  NOT NULL,
   role TINYINT NOT NULL COMMENT '0 = inactif; 1 = employée; 2 = formateur; 3 = direction',
   idCentre INT NOT NULL
)ENGINE=InnoDB;

DROP TABLE IF EXISTS Plan_Formations;
CREATE TABLE Plan_Formations(
   idFormation INT AUTO_INCREMENT PRIMARY KEY,
   libelleCourt VARCHAR(10)  NOT NULL UNIQUE,
   libelleLong VARCHAR(250)  NOT NULL UNIQUE,
   GRN INT NOT NULL,
   idUtilisateur INT NOT NULL
)ENGINE=InnoDB;

DROP TABLE IF EXISTS Plan_Salles;
CREATE TABLE Plan_Salles(
   idSalle INT AUTO_INCREMENT PRIMARY KEY,
   libelle VARCHAR(50)  NOT NULL,
   nbrPlace INT NOT NULL,
   idCentre INT NOT NULL
)ENGINE=InnoDB;

DROP TABLE IF EXISTS Plan_Absences;
CREATE TABLE Plan_Absences(
   idAbsence INT AUTO_INCREMENT PRIMARY KEY,
   typeDAbsence VARCHAR(50) NOT NULL COMMENT '0 = congé',
   dateDebut DATE NOT NULL,
   dateFin DATE,
   idUtilisateur INT
)ENGINE=InnoDB;

DROP TABLE IF EXISTS Plan_Actions;
CREATE TABLE Plan_Actions(
   idAction INT AUTO_INCREMENT PRIMARY KEY,
   numOffre INT NOT NULL UNIQUE,
   dateDebut DATE NOT NULL,
   nbrDHeure INT NOT NULL,
   nbrStagiaire INT NOT NULL,
   typeMarche TINYINT NOT NULL,
   tauxHoraire DOUBLE NOT NULL,
   dateDebutCertif DATE,
   dateFinCertif DATE,
   active BOOLEAN NOT NULL COMMENT 'vrai si active, faux si non',
   idCentre INT NOT NULL,
   idFormation INT NOT NULL
)ENGINE=InnoDB;

DROP TABLE IF EXISTS Plan_PAE;
CREATE TABLE Plan_PAE(
   idPAE INT AUTO_INCREMENT PRIMARY KEY,
   dateDebut DATE NOT NULL,
   nbrDHeure INT NOT NULL,
   idAction INT NOT NULL
)ENGINE=InnoDB;

DROP TABLE IF EXISTS Plan_Interruptions;
CREATE TABLE Plan_Interruptions(
   idInterruption INT AUTO_INCREMENT PRIMARY KEY,
   dateDebut DATE NOT NULL,
   dateFin DATE NOT NULL,
   idAction INT
)ENGINE=InnoDB;

DROP TABLE IF EXISTS Plan_DistancielsPresentielsExceptionnels;
CREATE TABLE Plan_DistancielsPresentielsExceptionnels(
   idDistancielPresentielsExceptionnel INT AUTO_INCREMENT PRIMARY KEY,
   type BOOLEAN NOT NULL,
   dateDebut DATE NOT NULL,
   dateFin DATE NOT NULL,
   idAction INT NOT NULL
)ENGINE=InnoDB;

DROP TABLE IF EXISTS Plan_DistancielsRecurrents;
CREATE TABLE Plan_DistancielsRecurrents(
   idDistancielRecurrent INT AUTO_INCREMENT PRIMARY KEY,
   idJour TINYINT NOT NULL COMMENT '0 = lundi ; 1 = mardi ; ect',
   idAction INT NOT NULL
)ENGINE=InnoDB;

DROP TABLE IF EXISTS Plan_Presences;
CREATE TABLE Plan_Presences(
   idPresence INT AUTO_INCREMENT PRIMARY KEY,
   dateJour DATE NOT NULL,
   nbrStagiaireMatin INT,
   nbrStagiaireApresMidi INT,
   idAction INT NOT NULL
)ENGINE=InnoDB;

DROP TABLE IF EXISTS Plan_Plannings;
CREATE TABLE Plan_Plannings(
   idPlanning INT AUTO_INCREMENT PRIMARY KEY,
   idJour TINYINT NOT NULL COMMENT '0 = lundi ; 1 = mardi ; ect',
   nbrDHeureMatin INT,
   nbrDHeureApresMidi INT,
   idAction INT NOT NULL
)ENGINE=InnoDB;

DROP TABLE IF EXISTS Plan_Occupations;
CREATE TABLE Plan_Occupations(
   idOccupation INT AUTO_INCREMENT PRIMARY KEY,
   idAction INT,
   idSalle INT,
   dateDebut DATE NOT NULL,
   dateFin DATE NOT NULL
)ENGINE=InnoDB;

DROP TABLE IF EXISTS Plan_Affectations;
CREATE TABLE Plan_Affectations(
   idAffectation INT AUTO_INCREMENT PRIMARY KEY,
   idUtilisateur INT,
   idAction INT,
   dateDebut DATE NOT NULL,
   dateFin DATE NOT NULL
)ENGINE=InnoDB;

DROP TABLE IF EXISTS Plan_SousTraitances;
CREATE TABLE Plan_SousTraitances(
   idSousTraitance INT AUTO_INCREMENT PRIMARY KEY,
   idUtilisateur INT,
   idOrganisme INT,
   dateDebut DATE NOT NULL,
   dateFin VARCHAR(50)
)ENGINE=InnoDB;

DROP TABLE IF EXISTS Plan_Rattachements;
CREATE TABLE Plan_Rattachements(
   idRattachement INT AUTO_INCREMENT PRIMARY KEY,
   idUtilisateur INT,
   idCentre INT
)ENGINE=InnoDB;

DROP TABLE IF EXISTS Plan_Preferences;
CREATE TABLE Plan_Preferences(
   idPreference INT AUTO_INCREMENT PRIMARY KEY,
   idUtilisateur INT,
   idPlanning INT
)ENGINE=InnoDB;

ALTER TABLE Plan_Utilisateurs
    ADD CONSTRAINT fk_Plan_Utilisateurs_Plan_Centres FOREIGN KEY(idCentre) REFERENCES Plan_Centres(idCentre);

ALTER TABLE Plan_Formations
    ADD CONSTRAINT fk_Plan_Formations_Plan_Utilisateurs FOREIGN KEY(idUtilisateur) REFERENCES Plan_Utilisateurs(idUtilisateur);

ALTER TABLE Plan_Salles
    ADD CONSTRAINT fk_Plan_Salles_Plan_Centres FOREIGN KEY(idCentre) REFERENCES Plan_Centres(idCentre);

ALTER TABLE Plan_Absences
    ADD CONSTRAINT fk_Plan_Absences_Plan_Utilisateurs FOREIGN KEY(idUtilisateur) REFERENCES Plan_Utilisateurs(idUtilisateur);

ALTER TABLE Plan_Actions
    ADD CONSTRAINT fk_Plan_Actions_Plan_Centres FOREIGN KEY(idCentre) REFERENCES Plan_Centres(idCentre),
    ADD CONSTRAINT fk_Plan_Actions_Plan_Formations FOREIGN KEY(idFormation) REFERENCES Plan_Formations(idFormation);

ALTER TABLE Plan_PAE
    ADD CONSTRAINT fk_Plan_PAE_Plan_Actions FOREIGN KEY(idAction) REFERENCES Plan_Actions(idAction);

ALTER TABLE Plan_Interruptions
    ADD CONSTRAINT fk_Plan_Interruptions_Plan_Actions FOREIGN KEY(idAction) REFERENCES Plan_Actions(idAction);

ALTER TABLE Plan_DistancielsPresentielsExceptionnels
    ADD CONSTRAINT fk_Plan_DistancielsPresentielsExceptionnels_Plan_Actions FOREIGN KEY(idAction) REFERENCES Plan_Actions(idAction);

ALTER TABLE Plan_DistancielsRecurrents
    ADD CONSTRAINT fk_Plan_DistancielsRecurrents_Plan_Actions FOREIGN KEY(idAction) REFERENCES Plan_Actions(idAction);

ALTER TABLE Plan_Presences
    ADD CONSTRAINT fk_Plan_Presences_Plan_Actions FOREIGN KEY(idAction) REFERENCES Plan_Actions(idAction);

ALTER TABLE Plan_Plannings
    ADD CONSTRAINT fk_Plan_Plannings_Plan_Actions FOREIGN KEY(idAction) REFERENCES Plan_Actions(idAction);

ALTER TABLE Plan_Occupations
    ADD CONSTRAINT fk_Plan_Occupations_Plan_Actions FOREIGN KEY(idAction) REFERENCES Plan_Actions(idAction),
    ADD CONSTRAINT fk_Plan_Occupations_Plan_Salles FOREIGN KEY(idSalle) REFERENCES Plan_Salles(idSalle);

ALTER TABLE Plan_Affectations
    ADD CONSTRAINT fk_Plan_Affectations_Plan_Actions FOREIGN KEY(idAction) REFERENCES Plan_Actions(idAction),
    ADD CONSTRAINT fk_Plan_Affectations_Plan_Utilisateurs FOREIGN KEY(idUtilisateur) REFERENCES Plan_Utilisateurs(idUtilisateur);

ALTER TABLE Plan_SousTraitances
    ADD CONSTRAINT fk_Plan_SousTraitances_Plan_Organismes FOREIGN KEY(idOrganisme) REFERENCES Plan_Organismes(idOrganisme),
    ADD CONSTRAINT fk_Plan_SousTraitances_Plan_Utilisateurs FOREIGN KEY(idUtilisateur) REFERENCES Plan_Utilisateurs(idUtilisateur);

ALTER TABLE Plan_Rattachements
    ADD CONSTRAINT fk_Plan_Rattachements_Plan_Centres FOREIGN KEY(idCentre) REFERENCES Plan_Centres(idCentre),
    ADD CONSTRAINT fk_Plan_Rattachements_Plan_Utilisateurs FOREIGN KEY(idUtilisateur) REFERENCES Plan_Utilisateurs(idUtilisateur);

ALTER TABLE Plan_Preferences
    ADD CONSTRAINT fk_Plan_Preferences_Plan_Plannings FOREIGN KEY(idPlanning) REFERENCES Plan_Plannings(idPlanning),
    ADD CONSTRAINT fk_Plan_Preferences_Plan_Utilisateurs FOREIGN KEY(idUtilisateur) REFERENCES Plan_Utilisateurs(idUtilisateur);