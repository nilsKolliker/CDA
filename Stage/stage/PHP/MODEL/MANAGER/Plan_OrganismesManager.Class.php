<?php

class Plan_OrganismesManager 
{

	public static function add(Plan_Organismes $obj)
	{
 		return DAO::add($obj);
	}

	public static function update(Plan_Organismes $obj)
	{
 		return DAO::update($obj);
	}

	public static function delete(Plan_Organismes $obj)
	{
 		return DAO::delete($obj);
	}

	public static function findById($id)
	{
 		return DAO::select(Plan_Organismes::getAttributes(),"Plan_Organismes",["idOrganisme" => $id])[0];
	}

	public static function getList(array $nomColonnes=null,  array $conditions = null, string $orderBy = null, string $limit = null, bool $api = false, bool $debug = false)
	{
 		$nomColonnes = ($nomColonnes==null)?Plan_Organismes::getAttributes():$nomColonnes;
		return DAO::select($nomColonnes,"Plan_Organismes",   $conditions ,  $orderBy,  $limit ,  $api,  $debug );	}
}