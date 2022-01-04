<?php
class Enfant{

    /*******************************************************************Attributs**************************************************************************** */
    private $_dateDeNaissance;

    /*******************************************************************Accesseurs*************************************************************************** */

    public function getDateDeNaissance(){
        return $this->_dateDeNaissance->format("d/m/Y");
    }

    public function setDateDeNaissance($dateDeNaissance){
        $this->_dateDeNaissance = DateTime::createFromFormat("j/n/Y",$dateDeNaissance);
    }

    /*******************************************************************Constructeur************************************************************************* */

    public function __construct(array $options = []){
        if (!empty($options)){ // empty : renvoi vrai si le tableau est vide
            $this->hydrate($options);
        }
    }
    public function hydrate($data){
        foreach ($data as $key => $value){
            $methode = "set" . ucfirst($key); //ucfirst met la 1ere lettre en majuscule
            if (is_callable([$this, $methode])){ // is_callable verifie que la methode existe
                $this->$methode($value);
            }
        }
    }

    /*******************************************************************Autres Méthodes********************************************************************** */
    
    /**
     * Transforme l'objet en chaine de caractères
     *
     * @return String
     */
    public function toString(){
        return "";
    }

    /**
     * Renvoi vrai si l'objet en paramètre est égal à l'objet appelant
     *
     * @param [type] $obj
     * @return bool
     */
    public function equalsTo($obj){
        return true;
    }
    /**
     * Compare 2 objets
     * Renvoi 1 si le 1er est >
     *        0 si ils sont égaux
     *        -1 si le 1er est <
     *
     * @param [type] $obj1
     * @param [type] $obj2
     * @return void
     */
    public static function compareTo($obj1, $obj2){
        return 0;
    }

    public function ageDuGosse(){
        return date_diff($this->_dateDeNaissance,new DateTime())->format("%y");
    }

    public function valeurDuCheque(){
        $age=$this->ageDuGosse();
        if ($age<11) {
            return 20;
        }else if($age<16){
            return 30;
        }else if($age<19){
            return 50;
        }else{
            return 0;
        }
    }
}