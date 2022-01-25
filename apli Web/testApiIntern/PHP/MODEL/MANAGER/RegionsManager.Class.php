<?php

class RegionsManager 
{

	public static function add(Regions $obj)
	{
 		return DAO::add($obj);
	}

	public static function update(Regions $obj)
	{
 		return DAO::update($obj);
	}

	public static function delete(Regions $obj)
	{
 		return DAO::delete($obj);
	}

	public static function findById($id)
	{
 		return DAO::select(Regions::getAttributes(),"Regions",["region_id" => $id])[0];
	}

	public static function getList(array $nomColonnes=null,  array $conditions = null, string $orderBy = null, string $limit = null, bool $api = false, bool $debug = false)
	{
 		$nomColonnes = ($nomColonnes==null)?Regions::getAttributes():$nomColonnes;
		return DAO::select($nomColonnes,"Regions",   $conditions ,  $orderBy,  $limit ,  $api,  $debug );	}
}