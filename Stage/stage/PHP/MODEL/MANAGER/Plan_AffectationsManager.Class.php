<?php

class Plan_AffectationsManager 
{

	public static function add(Plan_Affectations $obj)
	{
 		return DAO::add($obj);
	}

	public static function update(Plan_Affectations $obj)
	{
 		return DAO::update($obj);
	}

	public static function delete(Plan_Affectations $obj)
	{
 		return DAO::delete($obj);
	}

	public static function findById($id)
	{
 		return DAO::select(Plan_Affectations::getAttributes(),"Plan_Affectations",["idAffectation" => $id])[0];
	}

	public static function getList(array $nomColonnes=null,  array $conditions = null, string $orderBy = null, string $limit = null, bool $api = false, bool $debug = false)
	{
 		$nomColonnes = ($nomColonnes==null)?Plan_Affectations::getAttributes():$nomColonnes;
		return DAO::select($nomColonnes,"Plan_Affectations",   $conditions ,  $orderBy,  $limit ,  $api,  $debug );	}
}