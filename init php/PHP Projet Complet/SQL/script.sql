DROP DATABASE IF EXISTS baseproduits;

CREATE DATABASE IF NOT EXISTS baseproduits DEFAULT CHARACTER
SET latin1 COLLATE latin1_swedish_ci;

USE baseproduits;

DROP TABLE IF EXISTS categories;

CREATE TABLE IF NOT EXISTS categories (
  idCategorie int (11) NOT NULL AUTO_INCREMENT,
  LibelleCategorie varchar (50) NOT NULL,
  PRIMARY KEY (idCategorie)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

DROP TABLE IF EXISTS produits;

CREATE TABLE IF NOT EXISTS produits (
  idProduit int (11) NOT NULL AUTO_INCREMENT,
  libelleProduit varchar (50) NOT NULL,
  prix int (11) NOT NULL,
  dateDePeremption date NOT NULL,
  idCategorie int (11) NOT NULL,
  PRIMARY KEY (idProduit),
  KEY FK_Produit_Categorie (idCategorie)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

DROP TABLE IF EXISTS utilisateurs;

CREATE TABLE IF NOT EXISTS utilisateurs (
  idUtilisateur int(11) NOT NULL AUTO_INCREMENT,
  nom varchar(50) NOT NULL,
  prenom varchar(50) NOT NULL,
  motDePasse varchar(50) NOT NULL,
  adresseMail varchar(50) NOT NULL,
  role int(11) NOT NULL COMMENT '2 Admin 1 User',
  pseudo varchar(50) NOT NULL,
  PRIMARY KEY (idUtilisateur)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

DROP TABLE IF EXISTS `texte`;

CREATE TABLE IF NOT EXISTS `texte` (
  `idTexte` int(11) NOT NULL AUTO_INCREMENT,
  `codeTexte` varchar(20) NOT NULL,
  `EN` varchar(200) NOT NULL,
  `FR` varchar(200) NOT NULL,
  PRIMARY KEY (`idTexte`),
  KEY `Code Texte` (`codeTexte`)
) ENGINE = InnoDB AUTO_INCREMENT = 36 DEFAULT CHARSET = utf8;

-- DROP TABLE IF EXISTS erreurs;

-- CREATE TABLE IF NOT EXISTS erreurs (
--   idErreur int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
--   codeErreur varchar(50) NOT NULL,
--   texteErreur varchar(200) NOT NULL
-- ) ENGINE = InnoDB DEFAULT CHARSET = utf8;

ALTER TABLE
  produits
ADD
  CONSTRAINT FK_Produit_Categorie FOREIGN KEY (idCategorie) REFERENCES categories (idCategorie);

-- INSERT INTO
--   erreurs (idErreur, codeErreur, texteErreur)
-- VALUES
--   (1, 'Inconnue', '418: je suis une théière !'),
--   (2, 'Ajouter', 'L\'ajout a échoué'),
--   (3, 'Modifier', 'La modification a échoué'),
--   (4, 'Supprimer', 'La suppression a échoué'),
--   (5, 'Confirm', 'La confirmation ne correspond pas au mot de passe'),
--   (6, 'DoublePsedo', 'Le pseudo existe deja'),
--   (7, 'MdpIncorrect', 'Le mot de passe est incorrect'),
--   (8, 'PsedoUnkn', 'Le pseudo n\'existe pas');

INSERT INTO
  categories (idCategorie, LibelleCategorie)
VALUES
  (1, 'périssable'),
(2, 'éternel');

INSERT INTO
  produits (
    idProduit,
    libelleProduit,
    prix,
    dateDePeremption,
    idCategorie
  )
VALUES
  (1, 'gomme', 2, '2020-11-30', 1);

INSERT INTO
  produits (
    idProduit,
    libelleProduit,
    prix,
    dateDePeremption,
    idCategorie
  )
VALUES
(2, 'crayon', 1, '2020-11-30', 2);

INSERT INTO
  `utilisateurs` (
    `idUtilisateur`,
    `nom`,
    `prenom`,
    `motDePasse`,
    `adresseMail`,
    `role`,
    `pseudo`
  )
VALUES
  (
    7,
    'ad',
    'ad',
    '11d437a3e6695447bd1bf2331651049e',
    'ad',
    2,
    'ad'
  ),
  (
    8,
    'u',
    'u',
    '1d0a5a28d53430e7f2293a1f36682f23',
    'u',
    1,
    'u'
  );

INSERT INTO
  `texte` (`idTexte`, `codeTexte`, `EN`, `FR`)
VALUES
  (1, 'Accueil', 'Home', 'Accueil'),
  (2, 'titrePage', 'Article Management', 'Gestion des articles'),
  (3, 'Afficher', 'Display', 'Afficher'),
  (4, 'Modifier', 'Update', 'Modifier'),
  (5, 'Supprimer', 'Remove', 'Supprimer'),
  (6, 'art1', 'this is an article', 'c\'est un article '),
  (7, 'Inconnue','418 I\'m a teapot', '418: je suis une théière !'),
  (8, 'erreurAjouter','Add failed', 'L\'ajout a échoué'),
  (9, 'erreurModifier','Update failed', 'La modification a échoué'),
  (10, 'erreurSupprimer','Delete failed', 'La suppression a échoué'),
  (11, 'Confirm','Confirmation not match', 'La confirmation ne correspond pas au mot de passe'),
  (12, 'DoublePsedo','Nickname already exists ', 'Le pseudo existe deja'),
  (13, 'MdpIncorrect','incorrect password', 'Le mot de passe est incorrect'),
  (14, 'PsedoUnkn','nickname unknown', 'Le pseudo n\'existe pas');