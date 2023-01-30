<?php
require_once("Person.php");
require_once("DB.php");

$person = new Person($_POST);
$person->speichere();
header('Location: ../template/main.php');