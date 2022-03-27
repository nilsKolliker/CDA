<?php

class Plan_SallesManager 
{

	public static function add(Plan_Salles $obj)
	{
 		return DAO::add($obj);
	}

	public static function update(Plan_Salles $obj)
	{
 		return DAO::update($obj);
	}

	public static function delete(Plan_Salles $obj)
	{
 		return DAO::delete($obj);
	}

	public static function findById($id)
	{
 		return DAO::select(Plan_Salles::getAttributes(),"Plan_Salles",["idSalle" => $id])[0];
	}

	public static function getList(array $nomColonnes=null,  array $conditions = null, string $orderBy = null, string $limit = null, bool $api = false, bool $debug = false)
	{
 		$nomColonnes = ($nomColonnes==null)?Plan_Salles::getAttributes():$nomColonnes;
		return DAO::select($nomColonnes,"Plan_Salles",   $conditions ,  $orderBy,  $limit ,  $api,  $debug );	}
}