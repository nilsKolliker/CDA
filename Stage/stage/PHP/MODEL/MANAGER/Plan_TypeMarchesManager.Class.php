<?php

class Plan_TypeMarchesManager 
{

	public static function add(Plan_TypeMarches $obj)
	{
 		return DAO::add($obj);
	}

	public static function update(Plan_TypeMarches $obj)
	{
 		return DAO::update($obj);
	}

	public static function delete(Plan_TypeMarches $obj)
	{
 		return DAO::delete($obj);
	}

	public static function findById($id)
	{
 		return DAO::select(Plan_TypeMarches::getAttributes(),"Plan_TypeMarches",["idCentre" => $id])[0];
	}

	public static function getList(array $nomColonnes=null,  array $conditions = null, string $orderBy = null, string $limit = null, bool $api = false, bool $debug = false)
	{
 		$nomColonnes = ($nomColonnes==null)?Plan_TypeMarches::getAttributes():$nomColonnes;
		return DAO::select($nomColonnes,"Plan_TypeMarches",   $conditions ,  $orderBy,  $limit ,  $api,  $debug );	}
}