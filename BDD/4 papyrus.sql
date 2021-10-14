--1. Quelles sont les commandes du fournisseur 09120 ? 

select * from entcom where numfou=09120

--2. Afficher le code des fournisseurs pour lesquels des commandes ont été passées.

select distinct numfou from entcom order by numfou

--3. Afficher le nombre de commandes fournisseurs passées, et le nombre de fournisseur concernés.

select count(numcom), count(distinct numfou)
from entcom

--4. Editer les produits ayant un stock inférieur ou égal au stock d'alerte et dont la quantité annuelle est inférieur est inférieure à 1000 (informations à fournir : n° produit, libellé produit, stock, stock actuel d'alerte, quantité annuelle

select codart, libart, stkphy, stkale, qteann
from produit
where stkphy<=stkale and qteann<1000

--5. Quels sont les fournisseurs situés dans les départements  75 78 92 77 ? L’affichage (département, nom fournisseur) sera effectué par département décroissant, puis par ordre alphabétique 

select nomfou,FLOOR(posfou/1000)
from fournis
where FLOOR(posfou/1000) in (75,78,92,77)
order by FLOOR(posfou/1000) DESC, nomfou ASC

--6. Quelles sont les commandes passées au mois de mars et avril ?

select *
from entcom
where DATE_FORMAT(datcom,'%m') in (3,4)

--7. Quelles sont les commandes du jour qui ont des observations particulières ? (Affichage numéro de commande, date de commande)

select numcom, datcom
from entcom
where DATE_FORMAT(datcom, "%d/%m/%Y")=DATE_FORMAT(NOW(),"%d/%m/%Y") and obscom is not null