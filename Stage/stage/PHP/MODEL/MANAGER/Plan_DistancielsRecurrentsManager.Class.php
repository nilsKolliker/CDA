<?php

class Plan_DistancielsRecurrentsManager 
{

	public static function add(Plan_DistancielsRecurrents $obj)
	{
 		return DAO::add($obj);
	}

	public static function update(Plan_DistancielsRecurrents $obj)
	{
 		return DAO::update($obj);
	}

	public static function delete(Plan_DistancielsRecurrents $obj)
	{
 		return DAO::delete($obj);
	}

	public static function findById($id)
	{
 		return DAO::select(Plan_DistancielsRecurrents::getAttributes(),"Plan_DistancielsRecurrents",["idDistancielRecurrent" => $id])[0];
	}

	public static function getList(array $nomColonnes=null,  array $conditions = null, string $orderBy = null, string $limit = null, bool $api = false, bool $debug = false)
	{
 		$nomColonnes = ($nomColonnes==null)?Plan_DistancielsRecurrents::getAttributes():$nomColonnes;
		return DAO::select($nomColonnes,"Plan_DistancielsRecurrents",   $conditions ,  $orderBy,  $limit ,  $api,  $debug );	}
}