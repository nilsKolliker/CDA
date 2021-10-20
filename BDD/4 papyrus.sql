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
where DATE_FORMAT(datcom, "%d/%m/%Y")=DATE_FORMAT(NOW(),"%d/%m/%Y") and obscom is not null and obscom<>""

--8. Lister le total de chaque commande par total décroissant (Affichage numéro de commande et total)

select numcom, sum(priuni*qtecde) as total
from ligcom
group by numcom
order by total DESC

--9. Lister les commandes dont le total est supérieur à 10 000€ ; on exclura dans le calcul du total les articles commandés en quantité supérieure ou égale à 1000. (Affichage numéro de commande et total) 

select numcom, sum(priuni*qtecde) as total
from ligcom
WHERE qtecde<1000
group by numcom
HAVING total>10000

--10. Lister les commandes par nom fournisseur (Afficher le nom du fournisseur, le numéro de commande et la date) 

select fournis.nomfou, entcom.numcom, entcom.datcom
from fournis inner join entcom on fournis.numfou=entcom.numfou

--11. Sortir les produits des commandes ayant le mot "urgent' en observation? (Afficher le numéro de commande, le nom du fournisseur, le libellé du produit et le sous total = quantité commandée * Prix unitaire)

select entcom.numcom, fournis.nomfou, produit.libart, ligcom.priuni*ligcom.qtecde
from fournis inner join entcom on fournis.numfou=entcom.numfou
             inner join ligcom on ligcom.numcom = entcom.numcom
             inner join produit on produit.codart = ligcom.codart
where entcom.obscom = "Commande urgente"

--12. Coder de 2 manières différentes la requête suivante :  Lister le nom des fournisseurs susceptibles de livrer au moins un article

select distinct fournis.nomfou
from fournis inner join vente on fournis.numfou=vente.numfou
             inner join produit on produit.codart=vente.codart
where qte1+qte2+qte3>0

--13. Coder de 2 manières différentes la requête suivante Lister les commandes (Numéro et date) dont le fournisseur est celui de la commande 70210 :

select numcom, datcom
from entcom
where numfou = (select numfou
                from entcom
                where numcom = 70210)
and numcom <> 70210;

--14. Dans les articles susceptibles d’être vendus, lister les articles moins chers (basés sur Prix1) que le moins cher des rubans (article dont le premier caractère commence par R). On affichera le libellé de l’article et prix1 

select libart, prix1
from vente inner join produit on vente.codart=produit.codart
where prix1< (select min(prix1)
              from vente inner join produit on vente.codart=produit.codart
              where libart Like "r%")

--15. Editer la liste des fournisseurs susceptibles de livrer les produits dont le stock est inférieur ou égal à 150 % du stock d'alerte. La liste est triée par produit puis fournisseur

select libart, nomfou
from fournis
     inner join entcom on fournis.numfou=entcom.numfou
     inner join ligcom on entcom.numcom=ligcom.numcom
     inner join produit on produit.codart=ligcom.codart
where stkphy<1.5*stkale
order by libart,nomfou

--16. Éditer la liste des fournisseurs susceptibles de livrer les produit dont le stock est inférieur ou égal à 150 % du stock d'alerte et un délai de livraison d'au plus 30 jours. La liste est triée par fournisseur puis produit

select libart, nomfou
from fournis
     inner join vente on fournis.numfou=vente.numfou
     inner join produit on vente.codart=produit.codart
where stkphy<1.5*stkale and delliv<=30
order by nomfou,libart

--17. Avec le même type de sélection que ci-dessus, sortir un total des stocks par fournisseur trié par total décroissant

select nomfou, sum(stkphy) as stockTotal
from fournis
     inner join vente on fournis.numfou=vente.numfou
     inner join produit on vente.codart=produit.codart
group by fournis.numfou
order by stockTotal DESC

--18. En fin d'année, sortir la liste des produits dont la quantité réellement commandée dépasse 90% de la quantité annuelle prévue.

select libart
from(select libart, sum(qtecde) as totalCommande, qteann
     from ligcom inner join produit on produit.codart=ligcom.codart
     group by libart) as toto
where totalCommande>0.9*qteann

--19. Calculer le chiffre d'affaire par fournisseur pour l'année 18 sachant que les prix indiqués sont hors taxes et que le taux de TVA est 20%.

select sum(qtecde*priuni*1.20)
from ligcom inner join entcom on ligcom.numcom=entcom.numcom
where YEAR(entcom.datcom)=2018
group by numfou

--20. Existe-t-il des lignes de commande non cohérentes avec les produits vendus par les fournisseurs ?

--OUI !

select codart,numfou
from ligcom inner join entcom on ligcom.numcom=entcom.numcom
order by codart,numfou;

select codart,numfou
from vente
order by codart,numfou

--maj
--1. Application d'une augmentation de tarif de 4% pour le prix 1, 2% pour le prix2 pour le fournisseur 9180 

update vente
set prix1=prix1*1.04,prix2=prix2*1.02
where numfou=9180

--2. Dans la table vente, mettre à jour le prix2 des articles dont le prix2 est null, en affectant a valeur de prix1.

update vente
set prix2=prix1
where prix2=0

--3. Mettre à jour le champ obscom en positionnant  '*****' pour toutes les commandes dont le fournisseur a un indice de satisfaction <5

update entcom
set obscom = '*****'
where numfou in(select numfou
                from fournis
                where satisf<5)

--4. Suppression du produit I110

DELETE FROM vente
WHERE codart="I110";
DELETE FROM ligcom
WHERE codart="I110";
DELETE FROM produit
WHERE codart="I110"

--5. Suppression des entête de commande qui n'ont aucune ligne 

DELETE FROM entcom
WHERE numcom not in (SELECT numcom 
                     FROM ligcom)