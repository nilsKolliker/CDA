<?php

class Plan_ActionsManager 
{

	public static function add(Plan_Actions $obj)
	{
 		return DAO::add($obj);
	}

	public static function update(Plan_Actions $obj)
	{
 		return DAO::update($obj);
	}

	public static function delete(Plan_Actions $obj)
	{
 		return DAO::delete($obj);
	}

	public static function findById($id)
	{
 		return DAO::select(Plan_Actions::getAttributes(),"Plan_Actions",["idAction" => $id])[0];
	}

	public static function getList(array $nomColonnes=null,  array $conditions = null, string $orderBy = null, string $limit = null, bool $api = false, bool $debug = false)
	{
 		$nomColonnes = ($nomColonnes==null)?Plan_Actions::getAttributes():$nomColonnes;
		return DAO::select($nomColonnes,"Plan_Actions",   $conditions ,  $orderBy,  $limit ,  $api,  $debug );	}
}