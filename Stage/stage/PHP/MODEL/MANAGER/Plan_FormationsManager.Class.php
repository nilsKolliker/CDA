<?php

class Plan_FormationsManager 
{

	public static function add(Plan_Formations $obj)
	{
 		return DAO::add($obj);
	}

	public static function update(Plan_Formations $obj)
	{
 		return DAO::update($obj);
	}

	public static function delete(Plan_Formations $obj)
	{
 		return DAO::delete($obj);
	}

	public static function findById($id)
	{
 		return DAO::select(Plan_Formations::getAttributes(),"Plan_Formations",["idFormation" => $id])[0];
	}

	public static function getList(array $nomColonnes=null,  array $conditions = null, string $orderBy = null, string $limit = null, bool $api = false, bool $debug = false)
	{
 		$nomColonnes = ($nomColonnes==null)?Plan_Formations::getAttributes():$nomColonnes;
		return DAO::select($nomColonnes,"Plan_Formations",   $conditions ,  $orderBy,  $limit ,  $api,  $debug );	}
}