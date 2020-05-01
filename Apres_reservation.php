<?php
require_once("config.php");
require_once("footer.php");
// les dates sont ici utilisées au format MySQL (YYYY-mm-jj) 
function TestDate($date1, $date2) { 
$tabloTest = explode('-', $date1); 
$dateTest = mktime(0, 0, 0, $tabloTest[1], $tabloTest[2], $tabloTest[0]); 
$tablolimit = explode('-', $date2); 
$dateLimit = mktime(0, 0, 0, $tablolimit[1], $tablolimit[2], $tablolimit[0]); 
return ($dateTest <= $dateLimit ) ? 'trop tard' : 'ok'; 
} 

session_start();
 if (session_start() == false) {  header("Location: connexion.php"); } 
 else {
$host_name = 'localhost';
$database = 'id7297248_basesite';
$user_name = 'id7297248_basesite';
$password = 'anis1996';


$dbh = null;
try {
  $bdd = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);

if(isset($_POST['reserver'])) {
   $date_debut =$_POST['date_debut'];
     $date_fin =$_POST['date_fin'];
  
      $date_debut_dispo= $mysqli->query("SELECT date_debut FROM annonce WHERE id_annonce=$ida");
      $date_fin_dispo=$mysqli->query("SELECT date_fin FROM annonce WHERE id_annonce=$ida");
      $comp_date_debut=TestDate($date_debut_dispo,$date_debut);
      $comp_date_fin=TestDate($date_fin, $date_fin_dispo$date_debut_dispo);
 if ($comp_date_debut='ok' AND $comp_date_fin='ok') {
  echo'
  <!DOCTYPE html>
<html lang="fr">  
   <head>
   <title>Réservation de véhicule </title>
   <link rel="stylesheet" href="style.css"/>
   <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
   <meta name"viewport" content="width=device-width,initial-scal=3">
   
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
   </head> 
   <body  style="background-image:url(img/fond.jpg);background-attachment: fixed; background-repeat: no-repeat; font-family:arial; max-width: 100%;
                    height: auto; background-size: cover;  ">';

      $obj=new Config();
         $obj->choisir_head();
         if(!isset($_SESSION['id'])&&!isset($_SESSION['id_employer'])&&!isset($_SESSION['id_admin'])) 
{
    echo '<center><font color="red" size="8"><b>ERREUR ! Vous devez vous connecter pour acceder à cette page. </center></font><br />';
    
 
          header("Location: connexion.php");

     exit();
} 
else 
{
  echo"<section style="maring-top :5%;">

  <article style="color: white;background-color: rgba(0,0,0,0.5);margin-right:34%;margin-left:34%;%;margin-top :-8%; border-radius:10px 10px;" id="volet">
             <h1 style="font-family:arial; background-color: rgba(199,21,133, 0.8);padding-top:2%;padding-bottom:2%;padding-left:36%;border-radius:10px 10px 0px 0px;">réservation</h1>";

         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         
        echo " </article>
         
   
   </section>";
      
 }ese{

    echo '<p style='text-align:center'>votre reservation n\'est pas confirmé, Ce véhicule est disponible entre'.$date_debut_dispo.' et '.$date_fin_dispo.'</p>';
    echo '<p style='text-align:center'><a href='./reservation.php'></a></p>';

 }
 }
      foot();
 }
  echo " </div>
     
   </body>
</html>";

}
 } catch (PDOException $e) {
  echo "Erreur!: " . $e->getMessage() . "<br/>";
  die();
}
?>