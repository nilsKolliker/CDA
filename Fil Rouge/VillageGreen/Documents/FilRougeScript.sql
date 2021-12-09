DROP DATABASE IF EXISTS FilRougeBdd;

CREATE DATABASE IF NOT EXISTS FilRougeBdd DEFAULT CHARACTER SET utf8 ;

USE FilRougeBdd;


--
-- Table structure for table `Rubriques`
--
CREATE TABLE Rubriques(
   IdRubrique INT AUTO_INCREMENT PRIMARY KEY,
   libelleRubrique VARCHAR(150)  NOT NULL,
   IdRubriqueMere INT
)ENGINE=InnoDB;


--
-- Table structure for table `Fournisseurs`
--
CREATE TABLE Fournisseurs(
   IdFournisseur INT AUTO_INCREMENT PRIMARY KEY,
   nomFournisseur VARCHAR(150)  NOT NULL
)ENGINE=InnoDB;


--
-- Table structure for table `CategoriesClient`
--
CREATE TABLE CategoriesClient(
   IdCategorieClient INT AUTO_INCREMENT PRIMARY KEY,
   libelleCategClient VARCHAR(150)  NOT NULL,
   infoReglement VARCHAR(50)  NOT NULL,
   coefCategClient INT NOT NULL
)ENGINE=InnoDB;


--
-- Table structure for table `Reglements`
--
CREATE TABLE Reglements(
   IdReglement INT AUTO_INCREMENT PRIMARY KEY,
   typePaiement VARCHAR(50)  NOT NULL
)ENGINE=InnoDB;


--
-- Table structure for table `TVA`
--
CREATE TABLE TVA(
   IdTVA INT AUTO_INCREMENT PRIMARY KEY,
   tauxTVA INT
)ENGINE=InnoDB;


--
-- Table structure for table `Roles`
--
CREATE TABLE Roles(
   IdRole INT AUTO_INCREMENT PRIMARY KEY,
   libelleRole VARCHAR(50)
)ENGINE=InnoDB;


--
-- Table structure for table `Pays`
--
CREATE TABLE Pays(
   IdPays INT AUTO_INCREMENT PRIMARY KEY,
   nomPays VARCHAR(50)  NOT NULL UNIQUE
)ENGINE=InnoDB;


--
-- Table structure for table `EtatsCommande`
--
CREATE TABLE EtatsCommande(
   IdEtatCommande INT AUTO_INCREMENT PRIMARY KEY,
   libelleEtatCommande VARCHAR(50)  NOT NULL
)ENGINE=InnoDB;

--
-- Table structure for table `Produits`
--
CREATE TABLE Produits(
   IdProduit INT AUTO_INCREMENT PRIMARY KEY ,
   libelleProduit VARCHAR(150)  NOT NULL,
   description TEXT NOT NULL,
   refProduit VARCHAR(5)  NOT NULL UNIQUE,
   prixHorsTaxe DECIMAL(19,4) NOT NULL,
   photo VARCHAR(150) ,
   stock INT NOT NULL,
   IdRubrique INT NOT NULL
)ENGINE=InnoDB;


--
-- Table structure for table `Clients`
--
CREATE TABLE Clients(
   IdUser INT PRIMARY KEY,
   refClient VARCHAR(5)  NOT NULL UNIQUE,
   coefClient INT NOT NULL,
   IdCategorieClient INT NOT NULL
)ENGINE=InnoDB;

--
-- Table structure for table `Utilisateurs`
--
CREATE TABLE Users(
   IdUser INT AUTO_INCREMENT PRIMARY KEY,
   nomUser VARCHAR(150)  NOT NULL,
   prenomUser VARCHAR(150)  NOT NULL,
   EmailUser VARCHAR(150)  NOT NULL UNIQUE,
   mdpUser VARCHAR(50)  NOT NULL,
   IdRole INT NOT NULL
)ENGINE=InnoDB;

--
-- Table structure for table `Villes`
--
CREATE TABLE Villes(
   IdVille INT AUTO_INCREMENT PRIMARY KEY,
   libelleVIlle VARCHAR(150)  NOT NULL,
   codePostal VARCHAR(6)  NOT NULL,
   IdPays INT NOT NULL
)ENGINE=InnoDB;

--
-- Table structure for table `Adresses`
--
CREATE TABLE Adresses(
   IdAdresse INT AUTO_INCREMENT PRIMARY KEY,
   emailAdresse VARCHAR(150)  NOT NULL,
   telMobile VARCHAR(12)  NOT NULL,
   telFixe VARCHAR(12) ,
   adressePostale VARCHAR(50)  NOT NULL,
   province VARCHAR(50) ,
   complementAdresse VARCHAR(50) ,
   IdVille INT NOT NULL
)ENGINE=InnoDB;


--
-- Table structure for table `Commandes`
--
CREATE TABLE Commandes(
   IdCommande INT AUTO_INCREMENT PRIMARY KEY,
   NumeroCommande VARCHAR(10) UNIQUE,
   dateCommande DATE,
   IdUser INT NOT NULL,
   IdAdresse INT NOT NULL
)ENGINE=InnoDB;


--
-- Table structure for table `LignesCommande`
--
CREATE TABLE LignesCommande(
    IdLigneCommande INT AUTO_INCREMENT PRIMARY KEY,
   IdProduit INT,
   IdCommande INT,
   quantiteProduit INT
)ENGINE=InnoDB;


--
-- Table structure for table `Livraisons`
--
CREATE TABLE Livraisons(
    IdLivraison INT AUTO_INCREMENT PRIMARY KEY,
   IdCommande INT,
   IdAdresse INT,
   dateLivraison DATE,
   quantiteLivraison INT
)ENGINE=InnoDB;

--
-- Table structure for table `Approvisionnements`
--
CREATE TABLE Approvisionnements(
    IdApprovisionnement INT AUTO_INCREMENT PRIMARY KEY,
   IdProduit INT,
   IdFournisseur INT,
   refFournisseur VARCHAR(5)  NOT NULL
)ENGINE=InnoDB;

--
-- Table structure for table `Factures`
--
CREATE TABLE Factures(
    IdFacture INT AUTO_INCREMENT PRIMARY KEY,
   IdReglement INT,
   IdCommande INT,
   datePaiement DATE NOT NULL,
   montantPaiement DECIMAL(19,4) NOT NULL
)ENGINE=InnoDB;

--
-- Table structure for table `HistoriqueTVA`
--
CREATE TABLE HistoriqueTVA(
    IdHistoriqueTVA INT AUTO_INCREMENT PRIMARY KEY,
   IdProduit INT,
   IdTVA INT,
   dateTVA DATE NOT NULL
)ENGINE=InnoDB;

--
-- Table structure for table `ProgressionsCommande`
--
CREATE TABLE ProgressionsCommande(
    IdProgressionsCommande INT AUTO_INCREMENT PRIMARY KEY,
   IdCommande INT,
   IdEtatCommande INT,
   dateEtatCommande DATE NOT NULL
)ENGINE=InnoDB;


/* les Contraintes de clef etrangere <3 pour vous les Disciples de Martine */

ALTER TABLE Villes 
ADD CONSTRAINT FK_Villes_Pays FOREIGN KEY(IdPays) REFERENCES Pays(IdPays);

ALTER TABLE Rubriques
  ADD CONSTRAINT FK_Rubriques_RubriqueMere FOREIGN KEY(IdRubriqueMere) REFERENCES Rubriques(IdRubrique);

ALTER TABLE Produits
 ADD CONSTRAINT FK_Produits_Rubriques FOREIGN KEY(IdRubrique) REFERENCES Rubriques(IdRubrique);

ALTER TABLE Clients
 ADD CONSTRAINT FK_Clients_CategoriesClient  FOREIGN KEY(IdCategorieClient) REFERENCES CategoriesClient(IdCategorieClient);

ALTER TABLE Users
 ADD CONSTRAINT FK_Users_Roles FOREIGN KEY(IdRole) REFERENCES Roles(IdRole);

ALTER TABLE ProgressionsCommande
 ADD CONSTRAINT FK_ProgressionsCommande_commandes FOREIGN KEY(IdCommande) REFERENCES Commandes(IdCommande),
 ADD CONSTRAINT FK_ProgressionsCommande_EtatsCommande FOREIGN KEY(IdEtatCommande) REFERENCES EtatsCommande(IdEtatCommande);

ALTER TABLE Adresses
 ADD CONSTRAINT FK_Adresses_Villes FOREIGN KEY(IdVille) REFERENCES Villes(IdVille);

ALTER TABLE Commandes
 ADD CONSTRAINT FK_Commandes_Clients FOREIGN KEY(IdUser) REFERENCES Clients(IdUser),
 ADD CONSTRAINT FK_Commandes_Adresses FOREIGN KEY(IdAdresse) REFERENCES Adresses(IdAdresse);

ALTER TABLE LignesCommande
 ADD CONSTRAINT FK_LigneCommande_Produits  FOREIGN KEY(IdProduit) REFERENCES Produits(IdProduit),
 ADD CONSTRAINT FK_LignesCommande_Commandes  FOREIGN KEY(IdCommande) REFERENCES Commandes(IdCommande);

ALTER TABLE Livraisons
 ADD CONSTRAINT FK_Livraisons_Commandes FOREIGN KEY(IdCommande) REFERENCES Commandes(IdCommande),
 ADD CONSTRAINT FK_Livraisons_Adresses FOREIGN KEY(IdAdresse) REFERENCES Adresses(IdAdresse);

ALTER TABLE Approvisionnements
 ADD CONSTRAINT FK_Approvisionnements_Produits FOREIGN KEY(IdProduit) REFERENCES Produits(IdProduit),
 ADD CONSTRAINT FK_Approvisionnements_Fournisseurs FOREIGN KEY(IdFournisseur) REFERENCES Fournisseurs(IdFournisseur);

ALTER TABLE Factures
 ADD CONSTRAINT FK_Factures_Reglements FOREIGN KEY(IdReglement) REFERENCES Reglements(IdReglement),
 ADD CONSTRAINT FK_Factures_Commandes FOREIGN KEY(IdCommande) REFERENCES Commandes(IdCommande);

ALTER TABLE HistoriqueTVA
 ADD CONSTRAINT FK_HistoriqueTVA_Produits FOREIGN KEY(IdProduit) REFERENCES Produits(IdProduit),
 ADD CONSTRAINT FK_HistoriqueTVA_TVA FOREIGN KEY(IdTVA) REFERENCES TVA(IdTVA);

