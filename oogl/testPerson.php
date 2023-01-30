<?php
require_once 'person.php';
require_once 'DB.php';
require_once 'Adresse.php';


$person = Person::findePerson(1);
echo $person."<br />";

var_dump($person->getAdresse());

//var_dump($person->getAdresse());