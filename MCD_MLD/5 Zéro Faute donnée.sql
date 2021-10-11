INSERT INTO Categories(nom,description) VALUES 
("lame","regroupe les fautes qui concerne la lame du couteau économe"),
("manche",NULL);

INSERT INTO SousCategories(nom,description,IdCategorie) VALUES 
("fissure",NULL,1),
("emoussé","regroupe les probleme de tranchant",1),
("couleur","regroupe les problèmes de couleur de manche",2);

INSERT INTO Modeles(codeModele,nom,dateDeMiseSurLeMarche) VALUES 
("000000AA","epluchepatateloriginal","1900-12-25"),
("123456AZ","epluchepatate2000","1999-12-25"),
("654321XY","epluchepatate3000","2000-12-25");

INSERT INTO Produits(numeroSerie,numeroProduit,anneeProduction,IdModele) VALUES 
(123456,1234,1999,2),
(654321,1234,2000,3),
(654321,4321,2000,3),
(654321,1337,2004,3);

INSERT INTO Fautes(codeFaute,titre,dateDetection,commentaire,dateReparation,idProduit) VALUES 
(42,"fil trop large","2000-12-24","le fil fait 1mm",NULL,1),
(38,"lame ébréché sur le fil","2000-12-26",NULL,"2000-12-27",2),
(74," fissure sur le dos de lame","2000-12-26",NULL,NULL,2);

INSERT INTO Classifications(IdSousCategorie,idFaute) VALUES 
(1,2),
(1,3),
(2,1),
(2,2);