<?php
session_start();

?>
<html lang="fr">	
	<head>
	<title>Annonces</title>
	<link rel="stylesheet" href="style.css"/>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<style> 
			img{
				width: 100px;
			}

		
		</style>
	
	<meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
	</head>
 
	<body  style="background-image:url(img/fond.jpg);
	background-attachment: fixed;	background-repeat: no-repeat; font-family:arial; max-width: 100%;
                    height: auto; background-size: cover; ">

<?php
    	require_once("config.php");
    	$obj=new Config();
         $obj->choisir_head();
		?>
		 
<section style="padding: 2%;">
 <article style="color: white;background-color: rgba(0,0,0,0.5);margin-right:5%;margin-left:5%;margin-top :-8%;
        border-radius:10px 10px;" id="volet">
        <h1 style="font-family:arial; background-color: rgba(199,21,133, 0.8);
        padding-top:2%;padding-bottom:2%;text-align:center;border-radius:10px 10px 0px 0px;">Annonces</h1>
  
         
    
        
<?php

$host_name = 'localhost';
$database = 'id7297248_basesite';
$user_name = 'id7297248_basesite';
$password = 'anis1996';

$mysqli = new mysqli("localhost", "id7297248_basesite", "anis1996", "id7297248_basesite");
if ($mysqli->connect_errno) {
    echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$res = $mysqli->query("SELECT * FROM annonce ");
//$desc = $mysqli->query("SELECT description FROM annonce ");
//$titre = $mysqli->query("SELECT titre FROM annonce ");
	echo '<table style=" color :white;background-color: rgba(0, 0, 255, 0.1);padding: 2%;border-radius:5px 5px; margin-bottom:1%; text-align:center;">';
// on va scanner tous les tuples un par un
while ($data = mysqli_fetch_array($res)) {
	// on affiche les résultats
	
	echo '<tr  style="text-align:center;text-decoration:none;color:white;">
		<style> 
			tr{
			
	color: white;
			}

			tr:hover{
				color: white;
	background-color: #000000;
	td a{
	     display: block;
	}
			}
		</style>
	<td style="padding:10px 50px;text-align:center;text-decoration:none;color:white;">';
	echo '<a href="monAnnonce.php?id='.$data['id_annonce'].'" style="text-decoration:none;color:white;"><img style="border-radius: 8px;"  src="'.$data['image'].'" alt="annonce" /></a>';
	echo '<p style="text-decoration:none;color:white;">'.$data['titre'].'</p>';
	echo '</td>

	<td onclick="location.href= \'monAnnonce.php?id='.$data['id_annonce'].'" style= "color:white;border-style: dotted;padding: 10px 250px;border:3px solid black;text-align:center;border-radius:5px 5px">
	<p style="color: white;">'.$data['description'].'</p>
<p style="color: red;">'.$data['prix']."€</p></td>
</tr>";

	
	
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
?>
	</div>
   <script type="text/javascript">
		 prompt("votre avis nous intéresse :");        
    </script>  
   </body>
</html>