<?php

class Plan_PAEManager 
{

	public static function add(Plan_PAE $obj)
	{
 		return DAO::add($obj);
	}

	public static function update(Plan_PAE $obj)
	{
 		return DAO::update($obj);
	}

	public static function delete(Plan_PAE $obj)
	{
 		return DAO::delete($obj);
	}

	public static function findById($id)
	{
 		return DAO::select(Plan_PAE::getAttributes(),"Plan_PAE",["idPAE" => $id])[0];
	}

	public static function getList(array $nomColonnes=null,  array $conditions = null, string $orderBy = null, string $limit = null, bool $api = false, bool $debug = false)
	{
 		$nomColonnes = ($nomColonnes==null)?Plan_PAE::getAttributes():$nomColonnes;
		return DAO::select($nomColonnes,"Plan_PAE",   $conditions ,  $orderBy,  $limit ,  $api,  $debug );	}
}