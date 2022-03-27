<?php

class Plan_PresencesManager 
{

	public static function add(Plan_Presences $obj)
	{
 		return DAO::add($obj);
	}

	public static function update(Plan_Presences $obj)
	{
 		return DAO::update($obj);
	}

	public static function delete(Plan_Presences $obj)
	{
 		return DAO::delete($obj);
	}

	public static function findById($id)
	{
 		return DAO::select(Plan_Presences::getAttributes(),"Plan_Presences",["idPresence" => $id])[0];
	}

	public static function getList(array $nomColonnes=null,  array $conditions = null, string $orderBy = null, string $limit = null, bool $api = false, bool $debug = false)
	{
 		$nomColonnes = ($nomColonnes==null)?Plan_Presences::getAttributes():$nomColonnes;
		return DAO::select($nomColonnes,"Plan_Presences",   $conditions ,  $orderBy,  $limit ,  $api,  $debug );	}
}