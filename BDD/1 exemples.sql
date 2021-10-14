--1. Afficher toutes les informations concernant les employés. 

Select * from employe

--2. Afficher toutes les informations concernant les départements. 

Select * from dept

--3. Afficher le nom, la date d'embauche, le numéro du supérieur, le numéro de département et le salaire de tous les employés.  

Select nom, dateemb, nosup, nodep, salaire from employe

--4. Afficher le titre de tous les employés.

Select titre,nom from employe

--5. Afficher les différentes valeurs des titres des employés.

Select distinct titre from employe

--6. Afficher le nom, le numéro d'employé et le numéro du  département des employés dont le titre est « Secrétaire ».

Select nom, noemp, nodep from employe where titre="Secrétaire"

--7. Afficher le nom et le numéro de département dont le numéro de département est supérieur à 40.

Select nom, nodep from employe where nodep>40

--8. Afficher le nom et le prénom des employés dont le nom est alphabétiquement antérieur au prénom.

Select nom, prenom from employe where nom<prenom

--9. Afficher le nom, le salaire et le numéro du département des employés dont le titre est « Représentant », le numéro de département est 35 et le salaire est supérieur à 20000.

Select nom, salaire, nodep from employe where titre="Représentant" and nodep=35 and salaire>20000

--10. Afficher le nom, le titre et le salaire des employés dont le titre est « Représentant » ou dont le titre est « Président ».

Select nom, titre, salaire from employe where titre="Représentant" OR titre="Président"

--11. Afficher le nom, le titre, le numéro de département, le salaire des employés du département 34, dont le titre est « Représentant » ou « Secrétaire ».

Select nom, titre, nodep, salaire from employe where nodep=34 and titre in("Représentant","Secrétaire")

--12. Afficher le nom, le titre, le numéro de département, le salaire des employés dont le titre est Représentant, ou dont le titre est Secrétaire dans le département numéro 34.

Select nom, titre, nodep, salaire from employe where titre="Représentant" or (titre="Secrétaire" and nodep=34)

--13. Afficher le nom, et le salaire des employés dont le salaire est compris entre 20000 et 30000.

Select nom, salaire from employe where salaire between 20000 and 30000

--15. Afficher le nom des employés commençant par la lettre « H ».

Select nom from employe where nom like('H%')

--16. Afficher le nom des employés se terminant par la lettre « n ».

Select nom from employe where nom like('%n')

--17. Afficher le nom des employés contenant la lettre « u » en 3ème position.

Select nom from employe where substring(nom,3,1)="u"

--18. Afficher le salaire et le nom des employés du service 41 classés par salaire croissant.

Select salaire, nom from employe where nodep=41 ORDER BY salaire

--19. Afficher le salaire et le nom des employés du service 41 classés par salaire décroissant.

Select salaire, nom from employe where nodep=41 ORDER BY salaire DESC

--20. Afficher le titre, le salaire et le nom des employés classés par titre croissant et par salaire décroissant.

Select titre, salaire, nom from employe ORDER BY titre ASC, salaire DESC

--21. Afficher le taux de commission, le salaire et le nom des employés classés par taux de commission croissante.

Select tauxcom, salaire, nom from employe ORDER BY tauxcom

--22. Afficher le nom, le salaire, le taux de commission et le titre des employés dont le taux de commission n'est pas renseigné. 

Select nom, salaire, tauxcom, titre from employe where tauxcom is null

--23. Afficher le nom, le salaire, le taux de commission et le titre des employés dont le taux de commission est renseigné. 

Select nom, salaire, tauxcom, titre from employe where tauxcom is not null

--24. Afficher le nom, le salaire, le taux de commission, le titre des employés dont le taux de commission est inférieur à 15.

Select nom, salaire, tauxcom, titre from employe where tauxcom <15 or tauxcom is null

--25. Afficher le nom, le salaire, le taux de commission, le titre des employés dont le taux de commission est supérieur à 15.

Select nom, salaire, tauxcom, titre from employe where tauxcom >15 

--26. Afficher le nom, le salaire, le taux de commission et la commission des employés dont le taux de commission n'est pas nul. (la commission est calculée en multipliant le salaire par le taux de commission)

Select nom, salaire, tauxcom, salaire*tauxcom as commission from employe where tauxcom is not null

--27. Afficher le nom, le salaire, le taux de commission, la commission des employés dont le taux de commission n'est pas nul, classé par taux de commission croissant.

Select nom, salaire, tauxcom, salaire*tauxcom as commission from employe where tauxcom is not null ORDER BY tauxcom

--28. Afficher le nom et le prénom (concaténés) des employés. Renommer les colonnes 

Select concat(nom," ", prenom) as "nom prenom" from employe

--29. Afficher les 5 premières lettres du nom des employés

Select substring(nom,1,5)as "nom." from employe

--30. Afficher le nom et le rang de la lettre « r  » dans le nom des employés. 

Select nom, locate("r",nom) as "rang r" from employe

--31. Afficher le nom, le nom en majuscule et le nom en minuscule de l'employé dont le nom est Vrante.

Select nom as "Nom", UPPER(nom) as "NOM", LOWER(nom) as "nom" from employe where nom="Vrante"

--32. Afficher le nom et le nombre de caractères du nom des employés. 

Select nom, length(nom) as "nbr lettre" from employe



--Rechercher le prénom des employés et le numéro de la région de leur département.

Select employe.prenom, dept.noregion
from employe inner join dept on employe.nodep=dept.nodept

--Rechercher le numéro du département, le nom du département, le nom des employés classés par numéro de département (renommer les tables utilisées).

Select dept.nodept as "Numéro de dp", dept.nom as "Nom de dp", employe.nom as "Nom employe"
from employe inner join dept on employe.nodep=dept.nodept
ORDER BY dept.nodept

--Rechercher le nom des employés du département Distribution.

Select employe.nom
from employe inner join dept on employe.nodep=dept.nodept
where dept.nom="Distribution"

--Rechercher le nom et le salaire des employés qui gagnent plus que leur patron, et le nom et le salaire de leur patron. 

Select employe.nom, employe.salaire, boss.nom, boss.salaire
from employe inner join employe as boss on employe.nosup = boss.noemp
where employe.salaire>boss.salaire

--Rechercher le nom et le titre des employés qui ont le même titre que Amartakaldire. 

Select nom, titre
from employe
where titre= (Select titre
              from employe
              where nom="Amartakaldire")

--Rechercher le nom, le salaire et le numéro de département des employés qui gagnent plus qu'un seul employé du département 31, classés par numéro de département et salaire. 

Select nom, salaire, nodep
from employe
where salaire>any(Select salaire
                  from employe
                  where nodep=31)
ORDER BY nodep, salaire

--Rechercher le nom, le salaire et le numéro de département des employés qui gagnent plus que tous les employés du département 31, classés par numéro de département et salaire. 

Select nom, salaire, nodep
from employe
where salaire>all(Select salaire
                  from employe
                  where nodep=31)
ORDER BY nodep, salaire

--Rechercher le nom et le titre des employés du service 31 qui ont un titre que l'on trouve dans le département 32.

Select nom, titre
from employe
where nodep=31 and titre in(Select titre
                            from employe
                            where nodep=32)

--Rechercher le nom et le titre des employés du service 31 qui ont un titre l'on ne trouve pas dans le département 32.

Select nom, titre
from employe
where nodep=31 and titre not in(Select titre
                                from employe
                                where nodep=32)

--Rechercher le nom, le titre et le salaire des employés qui ont le même titre et le même salaire que Fairant. 

Select nom, titre, salaire
from employe
where (titre,salaire)=(Select titre, salaire
                       from employe
                       where nom="Fairent")

--Rechercher le numéro de département, le nom du département, le nom des employés, en affichant aussi les départements dans lesquels il n'y a personne, classés par numéro de département.

Select dept.nodept, dept.nom, employe.nom 
from dept LEFT join employe on dept.nodept= employe.nodep
ORDER BY dept.nodept

--1. Calculer le nombre d'employés de chaque titre.

Select titre, count