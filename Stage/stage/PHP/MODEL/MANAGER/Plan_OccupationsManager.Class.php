<?php

class Plan_OccupationsManager 
{

	public static function add(Plan_Occupations $obj)
	{
 		return DAO::add($obj);
	}

	public static function update(Plan_Occupations $obj)
	{
 		return DAO::update($obj);
	}

	public static function delete(Plan_Occupations $obj)
	{
 		return DAO::delete($obj);
	}

	public static function findById($id)
	{
 		return DAO::select(Plan_Occupations::getAttributes(),"Plan_Occupations",["idOccupation" => $id])[0];
	}

	public static function getList(array $nomColonnes=null,  array $conditions = null, string $orderBy = null, string $limit = null, bool $api = false, bool $debug = false)
	{
 		$nomColonnes = ($nomColonnes==null)?Plan_Occupations::getAttributes():$nomColonnes;
		return DAO::select($nomColonnes,"Plan_Occupations",   $conditions ,  $orderBy,  $limit ,  $api,  $debug );	}
}