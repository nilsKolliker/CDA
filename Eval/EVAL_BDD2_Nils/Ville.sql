--
--1.	Obtenir la liste des villes qui ont un nom d''au moins 40 lettres
--
--Bon, ok, on compte les espaces et autres signes de ponctuation comme des lettres, mais quelque chose me dit qu'enchainer les "REPLACE" imbriqués, n'est pas ce qui est actuellement demandé
--

SELECT *
FROM villes_france
WHERE LENGTH(ville_nom)>=40;

--
--2.	Obtenir la liste des départements d’outre-mer, c’est-à-dire ceux dont le numéro de département commence par “97”
--

SELECT *
FROM departements
WHERE departement_code LIKE("97%");

--
--3.	Obtenir la liste des départements des Hauts-de-France trier par ordre alphabétique des noms de département (sans jointure)
--

SELECT *
FROM departements
WHERE departement_regionId = (SELECT region_id
                              FROM regions
                              WHERE region_nom="Hauts-de-France")
ORDER BY departement_nom;

--
--4.	Obtenir le nom de toutes les villes, ainsi que le nom du département associé. Les plus peuplées en 2012 apparaitront en premier
--
-- Les villes et les départements sont lié par le code du département et non par l'id ? Ok, bon à savoir pour la suite.
--(Ohh.. comme aucun nom de colonne n'est redondant, inutile de préciser le nom de la table quand on les utilises.. Cool !)
--
--LEFT JOIN !

SELECT ville_nom, departement_nom
FROM villes_france INNER JOIN departements ON ville_departement=departement_code
ORDER BY ville_population_2012 DESC;

--
--5.	Obtenir la liste du nom de chaque département, associé à son code et du nombre de commune au sein de ces départements, en triant afin d’obtenir en priorité les départements qui possèdent le plus de communes
--

SELECT departement_nom, departement_code, count(ville_id) as nbr_communes
FROM villes_france INNER JOIN departements ON ville_departement=departement_code
GROUP BY departement_code
ORDER BY nbr_communes DESC;

--
--6.	Obtenir la liste des départements, classés en fonction de leur superficie (plus grand en premier)
--
--On va supposer que chaque m² d'un département est revendiqué par une commune et qu'elles ne se battent pas trop pour revendiquer le même lopin de terre (ça peut vite faire du doublon sinon)
--

SELECT departement_nom
FROM villes_france INNER JOIN departements ON ville_departement=departement_code
GROUP BY departement_code
ORDER BY SUM(ville_surface) DESC;

--
--7.	Compter le nombre de villes dont le nom commence par “Saint”
--
-- Oo il y en a un paquet.. Plus de 4000!
--

SELECT count(*)
FROM villes_france
WHERE ville_nom LIKE("Saint%");

--
--8.	Obtenir la liste des villes qui ont un nom existants plusieurs fois, et trier afin d’obtenir en premier celles dont le nom est le plus souvent utilisé par plusieurs communes
--

SELECT ville_nom
FROM villes_france
GROUP BY ville_nom
HAVING count(*)>1
ORDER BY count(*) DESC;

--
--9.	Obtenir en une seule requête SQL la liste des villes dont la superficie est supérieure à la superficie moyenne
--
--J'espere qu'une requête imbriquer compte que pour un ^^'
--

SELECT ville_nom
FROM villes_france
WHERE ville_surface>(SELECT AVG(ville_surface)
                     FROM villes_france);

--
--10.	Obtenir la liste des départements qui possèdent plus de 1.5 millions d’habitants en 2012
--
--Et encore, on ne compte pas les ermites sans boite postale !
--

SELECT departement_nom
FROM villes_france INNER JOIN departements ON ville_departement=departement_code
GROUP BY departement_code
HAVING SUM(ville_population_2012)>1500000;

--
--11.	Remplacez les tirets par un espace vide, pour toutes les villes commençant par “SAINT-” (dans la colonne qui contient les noms en majuscule)
--

UPDATE villes_france
SET ville_nom=REPLACE(ville_nom,"-"," ")
WHERE ville_nom LIKE("SAINT-%");

--
--12.	Supplémentaire. Obtenir la liste des 50 villes ayant la plus faible superficie
--
-- Pourquoi "Supplémentaire" ?
--

SELECT ville_nom
FROM villes_france
ORDER BY ville_surface
LIMIT 50;

--
--13.	Ajouter une colonne region_nbDepartement dans la table regions (mettre le code dans le script de réponse)
--

ALTER TABLE regions
ADD region_nbDepartement INT NOT NULL;

--
--14.	Ecrire une procédure stockée (nommée MajRegion), qui vient mettre à jour cette colonne
--
-- Procédure indispensable au vu de la volonté de certains départements à changer continuellement de région
--

CREATE PROCEDURE MajRegion()
    UPDATE regions
    SET region_nbDepartement=(SELECT count(*)
                              FROM departements
                              WHERE departement_regionId = region_id);

--
--15.	Créer une vue qui regroupe les 3 tables
--
-- Vu le nombre de colonne, j'ai hésité à mettre une "*" mais les doublons, ça fait pas propre
--

CREATE VIEW villes_departements_regions AS
SELECT ville_id, ville_slug, ville_nom, ville_nom_simple, ville_nom_reel, ville_nom_soundex, ville_nom_metaphone, ville_code_postal, ville_commune, ville_code_commune, ville_arrondissement, ville_canton, ville_amdi, ville_population_2010, ville_population_1999, ville_population_2012, ville_densite_2010, ville_surface, ville_longitude_deg, ville_latitude_deg, ville_longitude_grd, ville_latitude_grd, ville_longitude_dms, ville_latitude_dms, departement_id, departement_code, departement_nom, departement_nom_uppercase, departement_slug, departement_nom_soundex, region_id, region_nom, region_nbDepartement
FROM villes_france INNER JOIN departements ON ville_departement=departement_code
                   INNER JOIN regions ON departement_regionId=region_id;