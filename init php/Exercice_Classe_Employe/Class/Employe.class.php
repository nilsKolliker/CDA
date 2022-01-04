<?php
class Employe{

    /*******************************************************************Attributs**************************************************************************** */
    private $_nom;
    private $_prenom;
    private $_dateDEmbauche;
    private $_poste;
    private $_salaire;
    private $_service;
    private $_agence;

    /*******************************************************************Accesseurs*************************************************************************** */

    public function getNom(){
        return $this->_nom;
    }

    public function setNom($nom){
        $this->_nom = $nom;
    }

    public function getPrenom(){
        return $this->_prenom;
    }

    public function setPrenom($prenom){
        $this->_prenom = $prenom;
    }

    public function getDateDEmbauche(){
        return $this->_dateDEmbauche->format("d/m/Y");
    }

    public function setDateDEmbauche($dateDEmbauche){
        $this->_dateDEmbauche = DateTime::createFromFormat("j/n/Y",$dateDEmbauche);
    }

    public function getPoste(){
        return $this->_poste;
    }

    public function setPoste($poste){
        $this->_poste = $poste;
    }

    public function getSalaire(){
        return $this->_salaire;
    }

    public function setSalaire($salaire){
        $this->_salaire = $salaire;
    }

    public function getService(){
        return $this->_service;
    }

    public function setService($service){
        $this->_service = $service;
    }

    public function getAgence(){
        return $this->_agence;
    }

    public function setAgence($agence){
        $this->_agence = $agence;
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
        return "nom: ".$this->getNom()."\nprenom: ".$this->getPrenom()."\ndateDEmbauche: ".$this->getDateDEmbauche()."\nposte: ".$this->getPoste()."\nsalaire: ".$this->getSalaire()."\nservice: ".$this->getService()."\nAgence: ".$this->getAgence()->toString();
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
    public static function compareToByPrenom($obj1, $obj2){
        if ($obj1->getPrenom()>$obj2->getPrenom()) {
            return 1;
        }else if ($obj1->getPrenom()<$obj2->getPrenom()) {
            return -1;
        }else{
            return 0;
        }
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
    public static function compareToByNomPrenom($obj1, $obj2){
        if ($obj1->getNom()>$obj2->getNom()) {
            return 1;
        }else if ($obj1->getNom()<$obj2->getNom()) {
            return -1;
        }else{
            return self::compareToByPrenom($obj1, $obj2);
        }
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
    public static function compareToByServiceNomPrenom($obj1, $obj2){
        if ($obj1->getService()>$obj2->getService()) {
            return 1;
        }else if ($obj1->getService()<$obj2->getService()) {
            return -1;
        }else{
            return self::compareToByNomPrenom($obj1, $obj2);
        }
    }
    

    private function anciennete(){
        return date_diff($this->_dateDEmbauche,new DateTime())->format("%y");
    }

    private function calculPrime(){
        return $this->_salaire*(0.05+(0.02*$this->anciennete()));
    }

    public function donneLaPrime(){
        $now=new DateTime();
        if ($now->format("d/m")=="04/01") {
            echo "on verse la prime : ".$this->calculPrime()."\n";
        }else{
            echo "pas le bon jour\n";
        }
    }
    public function coutAnnuel(){
        return $this->_salaire+$this->calculPrime();
    }

}