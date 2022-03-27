<?php

class Plan_SoustraitancesManager 
{

	public static function add(Plan_Soustraitances $obj)
	{
 		return DAO::add($obj);
	}

	public static function update(Plan_Soustraitances $obj)
	{
 		return DAO::update($obj);
	}

	public static function delete(Plan_Soustraitances $obj)
	{
 		return DAO::delete($obj);
	}

	public static function findById($id)
	{
 		return DAO::select(Plan_Soustraitances::getAttributes(),"Plan_Soustraitances",["idSousTraitance" => $id])[0];
	}

	public static function getList(array $nomColonnes=null,  array $conditions = null, string $orderBy = null, string $limit = null, bool $api = false, bool $debug = false)
	{
 		$nomColonnes = ($nomColonnes==null)?Plan_Soustraitances::getAttributes():$nomColonnes;
		return DAO::select($nomColonnes,"Plan_Soustraitances",   $conditions ,  $orderBy,  $limit ,  $api,  $debug );	}
}