<?php
session_start();

$host_name = 'localhost';
$database = 'id7297248_basesite';
$user_name = 'id7297248_basesite';
$password = 'anis1996';


$dbh = null;
try {
  $bdd = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
  $mysqli = new mysqli("localhost", "id7297248_basesite", "anis1996", "id7297248_basesite");
  if ($mysqli->connect_errno) {
    echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

  $id=$_GET['id'];
  $_SESSION['id_annonce']=$_GET['id'];
   $ida=$_GET['id'];
   echo $_SESSION['id_annonce'];


$res = $mysqli->query("SELECT * FROM annonce WHERE id_annonce=$ida");
$data = mysqli_fetch_array($res);
 
   
 } catch (PDOException $e) {
  echo "Erreur!: " . $e->getMessage() . "<br/>";
  die();
}
?>
<html lang="fr">	
	<head>
	<title><?php echo $data['titre'] ?></title>
	<link rel="stylesheet" href="style.css"/>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<script type="text/javascript">
    
    function changeImage()
{
  var v = document.body.background;
  if(v.indexOf("location-voiture1") != -1)
    v = "./img/location-voiture2.png";
  else
    v = "./img/location-voiture1.jpg";

  var z = new Image();
  z.src = v;
  document.body.background = z.src;  
}

window.onload=setImage;
var z = new Image(); 
z.src = "road.jpg"; 
document.body.background=z.src; 
  </script>
  <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
	</head>
	
	<body  style="background-image:url(img/fond.jpg);background-attachment: fixed;	background-repeat: no-repeat; font-family:arial; max-width: 100%;
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
		
		 
<section style="">
       <article style="color: white;background-color: rgba(0,0,0,0.5);margin-right:18%;margin-left:18%;margin-top: -8%; border-radius:10px 10px;padding-bottom:5%;" id="volet">
            <h1 style="font-family:arial; background-color: rgba(199,21,133, 0.8);padding-top:1%;padding-bottom:1%;text-align:center;border-radius:10px 10px 0px 0px;"><?php echo $data['titre'] ?></h1>
  <?php
 

// on va scanner tous les tuples un par un

echo'<div style="margin-left:52%;padding:5%;">';
	// on affiche les résultats

	echo '<b style="font-size:30px; text-align:center;">Description </b>';
		echo '<br /><br />';
	echo $data['description'];
		echo '<br />';
	echo ' <p style="color:red;font-size:30px;margin-left:30%;"> Prix : <b>'.$data['prix'].'€</b></p>';
	echo '<br />';

echo'</div>';
echo '<div style="margin-top:-38%;margin-left:12%;">
  
 
 <p style="margin-top:10;"> <img src="'.$data['image'].'" style="border-radius: 8px; width: 300px;height: 200px; "/></p></div>';
 echo '
   <a href="reservation.php?id='.$_GET["id"].'"style="background-color: rgba(199,21,133, 0.8);width: 50%; height: 35px;border-radius:10px 10px;border:transparent;color:white;font-family:arial;padding-left:2%;padding-right:2%;padding-top:1%;padding-bottom:1%;margin-left:80%;font-weight:bold;text-decoration:none;">Résérver</a>
  
     
    ';
    

// on libère l'espace mémoire alloué pour cette interrogation de la base
mysqli_free_result ($req);
mysqli_close ();
    ?>
   </article>
    	</section>
	
 <?php
	require_once("footer.php");
		foot();

		?>
	</div>
    <script type="text/javascript">
                      alert("vous avez fait un trés bon choix !");        
                 </script>
   </body>
</html>