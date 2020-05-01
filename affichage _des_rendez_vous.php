<?php
session_start();
if(!isset($_SESSION['id_employer'])) 
{
    echo '<center><font color="red" size="8"><b>ERREUR 404 ! Vous devez vous connecter pour acceder à cette page. </center></font><br />';
    
 
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
?>

<html lang="fr">	
	<head>
	<title>Rendez-vous</title>
	<link rel="stylesheet" href="style.css"/>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
	</head>
    
<?php
    	require_once("config.php");
    	$obj=new Config();
         $obj->choisir_head();
		?>
	<body  style="background-image:url(img/fond.jpg);
	background-attachment: fixed;	background-repeat: no-repeat; font-family:arial; max-width: 100%;
                    height: auto; background-size: cover; ">


		 

	<section style="maring-top :5%;">
		 <article style="color: white;background-color: rgba(0,0,0,0.5);margin-right:10%;margin-left:10%;%;margin-top :-8%; border-radius:10px 10px;" id="volet">
             <h1 style="font-family:arial; background-color: rgba(199,21,133, 0.8);padding-top:1%;padding-bottom:1%;text-align:center;border-radius:10px 10px 0px 0px;">Rendez-vous</h1>
<?php


$res = $mysqli->query("SELECT * FROM rendez_vous ");
echo '<div style="margin-left:8%;">';
echo '<table style="border-collapse: collapse; text-align:center;">';
	echo '<tr>';
	   echo '<td style="color:white;border : 1px solid black;padding: 10px 50px;">Identifiant</td>';
	   echo '<td style="color:white;border : 1px solid black;padding: 10px 100px;">Motif</td>';
	   echo '<td style="color:white;border : 1px solid black;padding: 10px 70px;">Date</td>';
	echo '</tr>';
	
// on va scanner tous les tuples un par un
while ($data = mysqli_fetch_array($res)) {
	// on affiche les résultats
	
	echo '<tr>';
	   echo '<td style="color:white;border : 1px solid black;padding: 10px 50px;">'.$data['id'].'</td>';
	   echo '<td style="color:white;border : 1px solid black;padding: 10px 100px;">'.$data['motif'].'</td>';
	   echo '<td style="color:white;border : 1px solid black;padding: 10px 70px;">'.$data['date_debut'].'</td>';
	echo '</tr>';





}
	echo '</table>';
echo '</div>';

// on libère l'espace mémoire alloué pour cette interrogation de la base
mysqli_free_result ($req);
mysqli_close ();
?>
</article>    
</section>

<?php
	require_once("footer.php");
		foot();
}
?>
	</div>
     
   </body>
</html>