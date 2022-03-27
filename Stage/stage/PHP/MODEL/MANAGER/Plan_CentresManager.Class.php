<?php

class Plan_CentresManager 
{

	public static function add(Plan_Centres $obj)
	{
 		return DAO::add($obj);
	}

	public static function update(Plan_Centres $obj)
	{
 		return DAO::update($obj);
	}

	public static function delete(Plan_Centres $obj)
	{
 		return DAO::delete($obj);
	}

	public static function findById($id)
	{
 		return DAO::select(Plan_Centres::getAttributes(),"Plan_Centres",["idCentre" => $id])[0];
	}

	public static function getList(array $nomColonnes=null,  array $conditions = null, string $orderBy = null, string $limit = null, bool $api = false, bool $debug = false)
	{
 		$nomColonnes = ($nomColonnes==null)?Plan_Centres::getAttributes():$nomColonnes;
		return DAO::select($nomColonnes,"Plan_Centres",   $conditions ,  $orderBy,  $limit ,  $api,  $debug );	}
}