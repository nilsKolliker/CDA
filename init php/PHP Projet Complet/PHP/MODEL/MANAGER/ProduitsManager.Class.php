<?php
class ProduitsManager
{
    public static function add(Produits $obj)
    {
        $db = DbConnect::getDb();
        $q = $db->prepare("INSERT INTO Produits (libelleProduit,prix,dateDePeremption,idCategorie) VALUES (:libelleProduit,:prix,:dateDePeremption,:idCategorie)");
        $q->bindValue(":libelleProduit", $obj->getLibelleProduit());
        $q->bindValue(":prix", $obj->getPrix());
        $q->bindValue(":dateDePeremption", $obj->getDateDePeremption());
        $q->bindValue(":idCategorie", $obj->getIdCategorie());
        $q->execute();
    }

    public static function update(Produits $obj)
    {
        $db = DbConnect::getDb();
        $q = $db->prepare("UPDATE Produits SET libelleProduit=:libelleProduit, prix=:prix, dateDePeremption=:dateDePeremption, idCategorie=:idCategorie WHERE idProduit=:idProduit");
        $q->bindValue(":libelleProduit", $obj->getLibelleProduit());
        $q->bindValue(":prix", $obj->getPrix());
        $q->bindValue(":dateDePeremption", $obj->getDateDePeremption());
        $q->bindValue(":idCategorie", $obj->getIdCategorie());
        $q->bindValue(":idProduit", $obj->getIdProduit());
        $q->execute();
    }

    public static function delete(Produits $obj)
    {
        $db = DbConnect::getDb();
        $q=$db->prepare("DELETE FROM Produits WHERE idProduit=:idProduit");
        $q->bindValue(":idProduit", $obj->getIdProduit(),PDO::PARAM_INT);
		$q->execute();
    }

    public static function findById($id)
    {
        $db = DbConnect::getDb();
        // $id = (int) $id;  // on verifie que id est numerique, evite l'injection SQL
        $q = $db->prepare("SELECT * FROM Produits WHERE idProduit=:idProduit");
        $q->bindValue(":idProduit", $id,PDO::PARAM_INT);
		$q->execute();
        $results = $q->fetch(PDO::FETCH_ASSOC);
        if ($results != false)
        {
            return new Produits($results);
        }
        else
        {
            return false;
        }
    }

    public static function getList()
    {
        $db = DbConnect::getDb();
        $liste = [];
        $q = $db->query("SELECT * FROM Produits");
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            if ($donnees != false)
            {
                $liste[] = new Produits($donnees);
            }
        }
        return $liste;  // tableau contenant les objets Produits
    }

    public static function getListByCategorie($idCategorie)
    {
        // $idCategorie=(int) $idCategorie;
        $db = DbConnect::getDb();
        $liste = [];
        $q = $db->prepare("SELECT * FROM Produits where idCategorie=:idCategorie");
        $q->bindValue(":idCategorie", $idCategorie,PDO::PARAM_INT);
		$q->execute();
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            if ($donnees != false)
            {
                $liste[] = new Produits($donnees);
            }
        }
        return $liste;  // tableau contenant les objets Produits
    }
}
