<?php
require_once("entity.php");
class Auto{
    use Entity;

    private int $id = 0;
    private string $marke;
    private string $kennzeichen;
    private string $modell;

    private function _insert(){
        $sql = 'INSERT INTO auto(marke, kennzeichen, modell) VALUES (:marke, :kennzeichen, :modell)';
        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute($this->toArray(false));
        $this->id = DB::getDB()->lastInsertId();
    }

    private function _update(){
        $sql = "UPDATE auto SET marke=:marke, kennzeichen=:kennzeichen, modell=:modell WHERE id=:id";
        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute($this->toArray());
    }

    //Bei der löschen methode wird die id von der klasse hergenommen (idperson hier drinne)

    public function loesche(){
        $sql = "DELETE FROM auto WHERE id=?";
        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute(array($this->getId()));
        $this->id=0;

    } 

    public static function findeAlle(){
        $sql = 'SELECT * FROM auto';
        $abfrage = DB::getDB()->query($sql);
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Auto');
        return $abfrage->fetchAll();
    }

    public static function findeAutoNachKennzeichen(string $kennzeichen){
        $sql = "SELECT * FROM auto WHERE kennzeichen=?";
        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute(array($kennzeichen));
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Auto');
        return $abfrage->fetch();
    }

    public static function findeNachPerson(int $personid){
        $sql = "SELECT * FROM auto 
                JOIN person_auto on auto.id = person_auto.auto_id where person_id = ?";
        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute(array($personid));
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Auto');
        return $abfrage->fetchAll();
    }

    public function findeFahrer(){
        Person::findenachAuto($this->getId());
    }


    
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of marke
     */ 
    public function getMarke()
    {
        return $this->marke;
    }

    /**
     * Set the value of marke
     *
     * @return  self
     */ 
    public function setMarke($marke)
    {
        $this->marke = $marke;

        return $this;
    }

    /**
     * Get the value of kennzeichen
     */ 
    public function getKennzeichen()
    {
        return $this->kennzeichen;
    }

    /**
     * Set the value of kennzeichen
     *
     * @return  self
     */ 
    public function setKennzeichen($kennzeichen)
    {
        $this->kennzeichen = $kennzeichen;

        return $this;
    }

    /**
     * Get the value of modell
     */ 
    public function getModell()
    {
        return $this->modell;
    }

    /**
     * Set the value of modell
     *
     * @return  self
     */ 
    public function setModell($modell)
    {
        $this->modell = $modell;

        return $this;
    }
}