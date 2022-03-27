<?php

class Plan_DistancielsPresentielsExceptionnelsManager 
{

	public static function add(Plan_DistancielsPresentielsExceptionnels $obj)
	{
 		return DAO::add($obj);
	}

	public static function update(Plan_DistancielsPresentielsExceptionnels $obj)
	{
 		return DAO::update($obj);
	}

	public static function delete(Plan_DistancielsPresentielsExceptionnels $obj)
	{
 		return DAO::delete($obj);
	}

	public static function findById($id)
	{
 		return DAO::select(Plan_DistancielsPresentielsExceptionnels::getAttributes(),"Plan_DistancielsPresentielsExceptionnels",["idDistancielPresentielsExceptionnel" => $id])[0];
	}

	public static function getList(array $nomColonnes=null,  array $conditions = null, string $orderBy = null, string $limit = null, bool $api = false, bool $debug = false)
	{
 		$nomColonnes = ($nomColonnes==null)?Plan_DistancielsPresentielsExceptionnels::getAttributes():$nomColonnes;
		return DAO::select($nomColonnes,"Plan_DistancielsPresentielsExceptionnels",   $conditions ,  $orderBy,  $limit ,  $api,  $debug );	}
}