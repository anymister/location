<?php
session_start();
if(!isset($_SESSION['id_admin'])) 
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
	<title>Employés</title>
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


		 

<section style="background-color:#808080;margin-left:13%;margin-top:auto; margin-right: 13%;" >
      
<article>
<?php


$res = $mysqli->query("SELECT * FROM Employer ");

echo '<table style="border-collapse: collapse;">';
	echo '<tr>';
	   echo '<td style="border : 1px solid black;padding: 10px 50px;">NOM ET PRENOM</td>';
	   echo '<td style="border : 1px solid black;padding: 10px 100px;">Adresse mail </td>';
	   echo '<td style="border : 1px solid black;padding: 10px 70px;">Telephone    </td>';
	echo '</tr>';
	
// on va scanner tous les tuples un par un
while ($data = mysqli_fetch_array($res)) {
	// on affiche les résultats
	
	echo '<tr>';
	   echo '<td style="border : 1px solid black;padding: 10px 50px;">'.$data['nom_employer'].$data['prenom_employer'].'</td>';
	   echo '<td style="border : 1px solid black;padding: 10px 100px;">'.$data['email'].'</td>';
	   echo '<td style="border : 1px solid black;padding: 10px 70px;">'.$data['numero'].'</td>';
	echo '</tr>';





}
	echo '</table>';


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