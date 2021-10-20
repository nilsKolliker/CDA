Drop DATABASE IF EXISTS EMPLOYES ;
Create DATABASE EMPLOYES ;
USE EMPLOYES ;

Drop TABLE IF EXISTS DEPARTEMENT;
CREATE TABLE DEPARTEMENT(
    idDepartement INT AUTO_INCREMENT PRIMARY KEY,
    nodep INT,
    nomdep VARCHAR(25),
    ville VARCHAR(10)
)ENGINE=InnoDB;

Drop TABLE IF EXISTS EMPLOYE;
CREATE TABLE EMPLOYE(
    noemp INT AUTO_INCREMENT PRIMARY KEY,
    nomemp VARCHAR (15),
    fonction VARCHAR (25),
    noresp INT,
    datemp DATE,
    sala FLOAT,
    comm FLOAT,
    nodep INT
)ENGINE=InnoDB;

Drop TABLE IF EXISTS GRADE;
CREATE TABLE GRADE(
    nograde INT AUTO_INCREMENT PRIMARY KEY,
    salmin FLOAT,
    salmax FLOAT
)ENGINE=InnoDB;

Drop TABLE IF EXISTS HISTOFONCTION;
CREATE TABLE HISTOFONCTION(
    idHisto INT AUTO_INCREMENT PRIMARY KEY,
    noemp INT,
    date_nom DATE,
    Fonction VARCHAR(25)
)ENGINE=InnoDB;

INSERT INTO DEPARTEMENT VALUES
(NULL,10,"Formation","Aix"),
(NULL,20,"Ingénierie","Paris"),
(NULL,30,"Industrie","Bordeaux"),
(NULL,40,"Direction générale","Paris");

INSERT INTO EMPLOYE VALUES
(NULL,"Costanza","psychologue",8,"1994-10-19",1715.00,200.00,30),
(NULL,"Mioche","Directeur",6,"1990-03-15",2200.00,1000.00,20),
(NULL,"Durand","Responsable",2,"1996-04-18",3250.00,0.00,10),
(NULL,"Xiong","vendeur",5,"1994-12-15",1150.00,200.00,30),
(NULL,"Manoukian","vendeur",11,"1993-08-15",2530.00,500.00,30),
(NULL,"Bourdais","directeur",15,"2002-07-12",3550.00,850.00,40),
(NULL,"Moreno","ouvrier",3,"1999-05-05",1075.00,50.00,10),
(NULL,"Perou","directeur",2,"1995-07-05",2450.00,800.00,10),
(NULL,"Bibaut","chef de service",8,"1993-06-07",2200.00,NULL,20),
(NULL,"Manian","assistant",9,"1996-10-18",1000.00,250.00,10),
(NULL,"Colin","analyste",2,"1992-07-05",2702.50,625.00,30),
(NULL,"Coulon","ouvrier",8,"2002-09-18",858.00,125.00,20),
(NULL,"Roméo","assistant",8,"2001-08-16",1025.00,1150.00,10),
(NULL,"Solal","secrétaire",3,"1992-02-15",1225.00,NULL,20),
(NULL,"Bailly","Président",NULL,"1985-01-05",4275.00,2000.00,40),
(NULL,"Jazarin","Ouvrier",2,"2001-07-05",875.00,NULL,10),
(NULL,"Font","Ouvrier",2,"1990-08-04",1200.00,250.00,10),
(NULL,"Servel","ouvrier",3,"1998-12-02",1025.00,55.00,30);

INSERT INTO GRADE VALUES
(NULL,0.00,1000.00),
(NULL,1000.01,2000.00),
(NULL,2000.01,3000.00),
(NULL,3000.01,4000.00),
(NULL,4000.01,5000.00),
(NULL,5000.01,6000.00);

INSERT INTO HISTOFONCTION VALUES
(NULL,1,"1994-10-19","vendeur"),
(NULL,1,"1996-12-18","psychologue"),
(NULL,2,"1990-03-15","responsable"),
(NULL,2,"1994-10-18","directeur"),
(NULL,3,"1996-04-18","vendeur"),
(NULL,3,"1998-06-18","responsable"),
(NULL,4,"1994-12-15","vendeur"),
(NULL,5,"1993-08-15","vendeur"),
(NULL,6,"2002-07-12","directeur"),
(NULL,7,"1999-05-05","ouvrier"),
(NULL,8,"1995-07-05","vendeur"),
(NULL,8,"1997-04-15","responsable"),
(NULL,8,"1999-10-18","directeur"),
(NULL,10,"1996-10-18","assistant"),
(NULL,11,"1992-07-05","vendeur"),
(NULL,11,"1995-07-15","responsable"),
(NULL,11,"1999-05-19","analyste"),
(NULL,12,"2002-09-18","ouvrier"),
(NULL,13,"2001-08-16","ouvrier"),
(NULL,13,"2003-07-17","assistant"),
(NULL,14,"1992-01-02","secrétaire"),
(NULL,15,"1985-01-05","directeur"),
(NULL,15,"1995-10-05","président"),
(NULL,16,"2001-07-05","ouvrier"),
(NULL,17,"1990-08-04","ouvrier"),
(NULL,18,"1998-12-02","ouvrier");

--
--A.Requêtes simples
--

--1.Afficher les noms de département

select nomdep
from DEPARTEMENT

--2.Afficher les numéros et noms de département

select nodep,nomdep
from DEPARTEMENT

--3.Afficher toutes les propriétés des employés

select *
from EMPLOYE

--4.Afficher les fonctions des employés

select fonction
from EMPLOYE

--5.Afficher les fonctions des employés sans double

select distinct fonction
from EMPLOYE

--6.Afficher les noms des employés avec leur date d'embauche, ainsi que la date d'embauche augmentée d'une journée

select nomemp, datemp, DATE_ADD(datemp, INTERVAL 1 DAY)
from EMPLOYE

--7.Afficher les noms des employés suivis d'un espace, suivi de leur fonction
select CONCAT(CONCAT(nomemp,' '),fonction)
from EMPLOYE

--
--B.Requêtes avec clause “where”
--

--1.Donner la liste des numéros et noms des employés du département 30

select noemp, nomemp
from EMPLOYE
where nodep=30

--2.Donner la liste des numéros et noms des ouvriers ainsi que leur numéro de département

select noemp, nomemp, nodep
from EMPLOYE
where fonction="ouvrier"

--3.Donner les noms et numéros des départements dont le numéro est supérieur ou égal à 30

select nodep, nomdep
from DEPARTEMENT
where nodep>=30

--4.Donner les noms, salaires et commissions des employés dont la commission excède le salaire

select nomemp, sala, comm
from EMPLOYE
where comm>sala

--5.Donner les noms et salaires des vendeurs du département 30 dont le salaire est supérieur à 1500 €

select nomemp, sala
from EMPLOYE
where nodep=30 AND fonction="vendeur" AND sala>1500

--6.Donner la liste des noms, fonctions et salaires des directeurs et des présidents

select nomemp, fonction, sala
from EMPLOYE
where fonction IN ("président","directeur")

--7.Donner la liste des noms, fonctions et salaires des directeurs et des employés qui ont un salaire > 2500 €

select nomemp, fonction, sala
from EMPLOYE
where fonction="directeur" OR sala>2500

--8.Donner la liste des noms, numéros de département des directeurs et des ouvriers du département 10



--9.Donner la liste des noms, fonctions et numéros de département des employés du département 10 qui ne sont ni ouvrier ni directeur
--10.Donner la liste des noms, fonctions et numéros de département des directeurs qui ne sont pas directeur dans le département 30
--11.Donner la liste des noms, fonctions et salaires des employés qui gagnent entre 1200 € et 1300 €
--12.Donner la liste des noms, numéros de département et fonctions des employés« ouvrier », « analyste » ou « vendeur »
--13.Donner les employés qui ne sont pas "vendeur"
--14.Donner la liste des employés dont la première lettre du nom est un "C"
--15.Donner la liste des employés qui n'ont pas de commission
--16.Donner la liste des employés qui ont une commission et qui sont dans le département 30 ou 20

--
--C.Requêtes avec clause « order by »
--

--1.Donner la liste des salaires, fonctions et noms des employés du département 30, selon l'ordre croissant des salaires
--2.Donner la liste des salaires, fonctions et noms des employés du département 30, selon l'ordre décroissant des salaires
--3.Donner la liste des employés triée selon l'ordre croissant des fonctions et l'ordre décroissant des salaires
--4.Donner la liste des commissions, salaires et noms triée selon l'ordre croissant des commissions
--5	Donner la liste des commissions, salaires et noms triée selon l'ordre décroissant des commissions

--
--D.Requêtes multi-tables
--

--1.Donner la ville dans laquelle travaille Costanza
--2.Donner les noms, fonctions, et noms des départements des employés des départements 30 et 40
--3.Donner le grade, la fonction, le nom et le salaire de chaque employé
--4.Donner la liste des noms et salaires des employés qui gagnent plus que leur responsable
--5.Donner la liste des noms, salaires, fonctions des employés qui gagnent plus que Perou

--
--E.Requêtes avec fonctions et expressions numériques
--

--1.Donner les noms, salaires, commissions et revenus des vendeurs
--2.Donner les noms, salaires et les commissions des employés dont la commission est supérieure à 25% de leur salaire
--3.Donner la liste des vendeurs dans l'ordre décroissant de leur commission divisée par leur salaire
--4.Donner le revenu annuel de chaque vendeur
--5.Donner le salaire quotidien des vendeurs
--6.Donner la moyenne des salaires des ouvriers
--7.Donner le total des salaires et des commissions des vendeurs
--8.Donner le revenu annuel moyen de tous les vendeurs
--9.Donner le plus haut salaire, le plus bas et l'écart entre les deux
--10.Donner le nombre d'employés du département 30

--
--F.Requêtes avec clause « group by »
--

--1.Donner la moyenne des salaires pour chaque département
--2.Donner pour chaque département, le salaire annuel moyen des employés qui ne sont ni directeur ni président
--3.Donner pour chaque fonction de chaque département le nombre d'employés et le salaire annuel moyen
--4.Donner la liste des salaires annuels moyens pour les fonctions comportant plus de deux employés
--5.Donner la liste des départements avec au moins deux ouvriers
--6.Donner les salaires moyens des présidents, directeurs et responsables

--
--G.Requêtes imbriquées
--

--1.Donner les noms et fonctions des employés qui gagnent plus que "Bibaut";
--2.Donner les fonctions dont la moyenne des salaires est supérieure à la moyenne des "vendeurs";
--3.Donner les noms des départements des employés qui gagnent plus de 2 700 € ;
--4.Déterminer le salarié le plus ancien
--5.Déterminer le dernier salarié embauché
--6.Afficher la liste des employés responsables d'autres employés.
--7.Donner les employés qui ont occupé les fonctions de vendeur et de directeur
--8.Donner les noms des employés (avec leur numéro de département et leur salaire) qui gagnent plus que la moyenne des employés de leur département
