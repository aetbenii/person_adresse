<?php
require_once("entity.php");
class Adresse{
    
    use Entity;

    private int $id = 0;
    private String $strasse;
    private int $hausnr;
    private String $ort;
    private String $plz;
    private int $person_id;
    
    
    public static function findeAlle(){
        $sql = 'SELECT * FROM adresse';
        $abfrage = DB::getDB()->query($sql);
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Adresse');
        return $abfrage->fetchAll();
    }

    public static function findeNachID(int $id){
        $sql = "SELECT * FROM Adresse WHERE id=".$id;
        $abfrage = DB::getDB()->query($sql);
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Adresse');
        return $abfrage->fetch();
    }

    public static function findeNachPerson(int $person_id){
        $sql = "SELECT * from adresse where person_id=".$person_id;
        $abfrage = DB::getDB()->query($sql);
        //$abfrage->execute(array('person_id' => $person_id));
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Adresse');
        return $abfrage->fetchAll();
    }

    public function getPerson_id(){
        return $this->person_id;
    }

    public function setPerson_id($person_id){
        $this->person_id = $person_id;
    }

    public function getPlz()
    {
        return $this->plz;
    }
 
    public function setPlz($plz)
    {
        $this->plz = $plz;

        return $this;
    }

    public function getOrt()
    {
        return $this->ort;
    }

    public function setOrt($ort)
    {
        $this->ort = $ort;

        return $this;
    }

 
    public function getId()
    {
        return $this->id;
    }
 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
 
    public function getStrasse()
    {
        return $this->strasse;
    }

    public function setStrasse($strasse)
    {
        $this->strasse = $strasse;

        return $this;
    }

    public function getHausnr()
    {
        return $this->hausnr;
    }

    public function setHausnr($hausnr)
    {
        $this->hausnr = $hausnr;

        return $this;
    }



    public function __toString(){ return "ID: ".$this->getId().",\n Straße: ".$this->getStrasse().",\n Hausnummer:".$this->getHausnr().",\n Ort: ".$this->getOrt().",\n PLZ: ".$this->getPlz().",\n Person_id: ".$this->getPerson_id(); }
}