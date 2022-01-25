<?php

class VillesFranceManager 
{

	public static function add(VillesFrance $obj)
	{
 		return DAO::add($obj);
	}

	public static function update(VillesFrance $obj)
	{
 		return DAO::update($obj);
	}

	public static function delete(VillesFrance $obj)
	{
 		return DAO::delete($obj);
	}

	public static function findById($id)
	{
 		return DAO::select(VillesFrance::getAttributes(),"VillesFrance",["ville_id" => $id])[0];
	}

	public static function getList(array $nomColonnes=null,  array $conditions = null, string $orderBy = null, string $limit = null, bool $api = false, bool $debug = false)
	{
 		$nomColonnes = ($nomColonnes==null)?VillesFrance::getAttributes():$nomColonnes;
		return DAO::select($nomColonnes,"VillesFrance",   $conditions ,  $orderBy,  $limit ,  $api,  $debug );	}
}