<?php
function connectbase(){

$host_name = 'localhost';
$database = 'id7297248_basesite';
$user_name = 'id7297248_basesite';
$password = 'anis1996';


$dbh = null;
try {

  $bdd = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
  return $bdd;
  } catch (PDOException $e) {
  echo "Erreur!: " . $e->getMessage() . "<br/>";
  die();
}}
?>
