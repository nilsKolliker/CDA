<?php

class Plan_RattachementsManager 
{

	public static function add(Plan_Rattachements $obj)
	{
 		return DAO::add($obj);
	}

	public static function update(Plan_Rattachements $obj)
	{
 		return DAO::update($obj);
	}

	public static function delete(Plan_Rattachements $obj)
	{
 		return DAO::delete($obj);
	}

	public static function findById($id)
	{
 		return DAO::select(Plan_Rattachements::getAttributes(),"Plan_Rattachements",["idRattachement" => $id])[0];
	}

	public static function getList(array $nomColonnes=null,  array $conditions = null, string $orderBy = null, string $limit = null, bool $api = false, bool $debug = false)
	{
 		$nomColonnes = ($nomColonnes==null)?Plan_Rattachements::getAttributes():$nomColonnes;
		return DAO::select($nomColonnes,"Plan_Rattachements",   $conditions ,  $orderBy,  $limit ,  $api,  $debug );	}
}