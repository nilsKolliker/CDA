<?php

class Plan_AbsencesManager 
{

	public static function add(Plan_Absences $obj)
	{
 		return DAO::add($obj);
	}

	public static function update(Plan_Absences $obj)
	{
 		return DAO::update($obj);
	}

	public static function delete(Plan_Absences $obj)
	{
 		return DAO::delete($obj);
	}

	public static function findById($id)
	{
 		return DAO::select(Plan_Absences::getAttributes(),"Plan_Absences",["idAbsence" => $id])[0];
	}

	public static function getList(array $nomColonnes=null,  array $conditions = null, string $orderBy = null, string $limit = null, bool $api = false, bool $debug = false)
	{
 		$nomColonnes = ($nomColonnes==null)?Plan_Absences::getAttributes():$nomColonnes;
		return DAO::select($nomColonnes,"Plan_Absences",   $conditions ,  $orderBy,  $limit ,  $api,  $debug );	}
}