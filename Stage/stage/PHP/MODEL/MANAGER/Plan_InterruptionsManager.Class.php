<?php

class Plan_InterruptionsManager 
{

	public static function add(Plan_Interruptions $obj)
	{
 		return DAO::add($obj);
	}

	public static function update(Plan_Interruptions $obj)
	{
 		return DAO::update($obj);
	}

	public static function delete(Plan_Interruptions $obj)
	{
 		return DAO::delete($obj);
	}

	public static function findById($id)
	{
 		return DAO::select(Plan_Interruptions::getAttributes(),"Plan_Interruptions",["idInterruption" => $id])[0];
	}

	public static function getList(array $nomColonnes=null,  array $conditions = null, string $orderBy = null, string $limit = null, bool $api = false, bool $debug = false)
	{
 		$nomColonnes = ($nomColonnes==null)?Plan_Interruptions::getAttributes():$nomColonnes;
		return DAO::select($nomColonnes,"Plan_Interruptions",   $conditions ,  $orderBy,  $limit ,  $api,  $debug );	}
}