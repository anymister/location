<?php
//require_once("config.php");
	//	$bdd=connexionBase();
class Generation{
  public static function generer()
      {
          $id=rand(1,100000); 
          return ($id);
      }
}
?>