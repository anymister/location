<?php
session_start();
if(!isset($_SESSION['id'])) 
{
    
    
 
          header("Location: clientOuEmployer.php");
          exit();

     
} 
else 
{
$host_name = 'localhost';
$database = 'id7297248_basesite';
$user_name = 'id7297248_basesite';
$password = 'anis1996';


$mysqli = new mysqli("localhost", "id7297248_basesite", "anis1996", "id7297248_basesite");
if ($mysqli->connect_errno) {
    echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$id=$_SESSION['id'];
}
?>
<!DOCTYPE html>
<html lang="fr">  
   <head>
   <title>Historique</title>
   <link rel="stylesheet" href="style.css"/>
   <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
  
   </head>
   
   <body  style="background-image:url(img/fond.jpg);background-attachment: fixed; background-repeat: no-repeat; font-family:arial; max-width: 100%;
                    height: auto; background-size: cover; ">
        <style>
  	        ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
  color:white;
  opacity: 4; /* Firefox */
}
  	    </style>
  <?php
    	require_once("config.php");
    	$obj=new Config();
         $obj->choisir_head();
		?>
      
<section style="maring-top :5%;">

	<article style=" color: white;background-color: rgba(0,0,0,0.5);margin-right:12%;margin-left:12%;margin-top:8%; border-radius:10px 10px;" id="volet">
          <h1 style="font-family:arial; text-align: center; background-color: rgba(199,21,133, 0.8);padding-top:2%;padding-bottom:2%;border-radius:10px 10px 0px 0px;max-height:30%;">historiques</h1>
          <p style="margin-left:10%;color:white;"><a href="./louer.php" style="color:white;">précédent</a></p>
                    <p style="text-align: center; color: white;">toutes les voitures que vous avez mis !</p>

            <table border="2" style="text-align: center;margin-left: 20%;">
 <?php  
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "id7297248_basesite", "anis1996", "id7297248_basesite");;
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT * FROM contrat_location_pro WHERE id=$id";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo '<table border="1">';
            echo '<tr style="color :white; background-color: rgba(0, 0, 255, 0.1);width: 100%; height: 40px;border-radius:10px 10px; margin-bottom:2%;max-height: 10%;margin-left: 100%;">';
                echo '<td style="border : 1px solid black;width:40%;">Date de début</td>';
                echo '<td style="border : 1px solid black;width:40%;">Date de fin</td>';
                echo '<td style="border : 1px solid black;width:40%;">Matricule</td>';
				echo '<td style="border : 1px solid black;width:40%;">prix</td>';
            echo "</tr>";
            $total=0;
        while($row = mysqli_fetch_array($result)){
            echo '<tr style="color :white; background-color: rgba(0, 0, 255, 0.1);width: 100%; height: 40px;border-radius:10px 10px; margin-bottom:2%;max-height: 10%;margin-left: 30%;">';
                echo '<td style="border : 1px solid black;width:40%;">' . $row['date_debut'] . '</td>';
                echo '<td style="border : 1px solid black;width:40%;">'. $row['date_fin'] . '</td>';
                echo '<td style="border : 1px solid black;width:40%;">' . $row['matricule'] .'</td>';
                echo '<td style="border : 1px solid black;width:40%">' . $row['prix'] . ' €</td>';
                $total=$total+$row['prix'];
            echo '</tr>';
            
        }
        echo "</table>";
        // Close result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);


       echo '<p style="margin-left:80%;color:red;">vous avez gagné : '.$total.' €</p>';
          
    ?>     
        </article>
   
   </section>
<div>
 <?php
   require_once("footer.php");
      foot();
      ?>
   </div>
     
   </body>
</html>