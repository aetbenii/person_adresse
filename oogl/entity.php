<?php

/**
 * Basisklasse für alle DB Klassen, die per Active Record definiert werden
**/
trait Entity {
   
    
   /** 
    *  Generischer Konstruktor
    * @param type $daten
    * 
    * 
    */ 
   public function __construct($daten = array()) {
        // wenn $daten nicht leer ist, rufe die passenden Setter auf
        if ($daten) {
            foreach ($daten as $k => $v) {
                $setterName = 'set' . ucfirst($k); // z.B.: setVorname
                // wenn ein ungültiges Attribut übergeben wurde
                // (ohne Setter), ignoriere es
                if (method_exists($this, $setterName)) {
                    $this->$setterName($v);
                }
            }
        }
    } 
    
  
    
 
    
    /**
     * Wandelt alle Eigenschaften der Klasse in ein assoziatives Array um
     * 
     * @param type $mitId
     * @return type
     * 
     * 
     */
    public function toArray($mitId = true) {
        $attribute = get_object_vars($this);
        if ($mitId === false) {
            // wenn $mitId false ist, entferne den Schlüssel id aus dem Ergebnis
            unset($attribute['id']);
        }
        return $attribute;
    }
    
   
    public function speichere() {
        if ($this->getId() > 0) {
            // wenn die ID eine Datenbank-ID ist, also größer 0, führe ein UPDATE durch
            $this->_update();
        } else {
            // ansonsten einen INSERT
            $this->_insert();
        }
    }
    
    
    
    
}
