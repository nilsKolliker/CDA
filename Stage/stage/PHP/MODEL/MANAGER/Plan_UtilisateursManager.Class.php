<?php

class Plan_UtilisateursManager 
{

	public static function add(Plan_Utilisateurs $obj)
	{
 		return DAO::add($obj);
	}

	public static function update(Plan_Utilisateurs $obj)
	{
 		return DAO::update($obj);
	}

	public static function delete(Plan_Utilisateurs $obj)
	{
 		return DAO::delete($obj);
	}

	public static function findById($id)
	{
 		return DAO::select(Plan_Utilisateurs::getAttributes(),"Plan_Utilisateurs",["idUtilisateur" => $id])[0];
	}

	public static function getList(array $nomColonnes=null,  array $conditions = null, string $orderBy = null, string $limit = null, bool $api = false, bool $debug = false)
	{
 		$nomColonnes = ($nomColonnes==null)?Plan_Utilisateurs::getAttributes():$nomColonnes;
		return DAO::select($nomColonnes,"Plan_Utilisateurs",   $conditions ,  $orderBy,  $limit ,  $api,  $debug );	}
}