<?php
require_once 'person.php';
require_once 'DB.php';
require_once 'Adresse.php';
require_once 'Auto.php';



$person = Person::findePerson(2);
echo $person."<br />";


//$person->addAuto($auto);
//var_dump($person->getAdresse());

//$auto = Auto::findeAutoNachKennzeichen("BD187");

//echo $auto->getKennzeichen();

var_dump($person->findeAuto());

$auto = Auto::findeAutoNachKennzeichen("BZ 94949");
echo "</br>";


echo $auto->getId();

echo "</br>";
$person->loescheAuto($auto);
var_dump($person->findeAuto());

//var_dump($auto->findeFahrer());



//var_dump($person->getAdresse());