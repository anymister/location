<?php
session_start();
?>
<html lang="fr">	
	<head>
	<title>Annonces</title>
	<link rel="stylesheet" href="style.css"/>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	 <?php
   require_once("styleMenu.php");
 ?>
	<style> 
			img{
				width: 100px;
			}

			img:hover{
				width: 250px;
			}
		</style>
	
	</head>
    
<?php
    	require_once("config.php");
    	$obj=new Config();
         $obj->choisir_head();
		?>
	<body  style="background-image:linear-gradient( rgba(255, 255, 0, 0.3),rgba(0, 0, 255, 0.4)),url(img/fond.jpg);
	background-attachment: fixed;	background-repeat: no-repeat; font-family:arial; max-width: 100%;
                    height: auto; background-size: cover; ">


		 
<section style="padding: 2%;">
 <article style="color: white;background-color: rgba(0,0,0,0.5);margin-right:5%;margin-left:5%;%;margin-top :-8%;
        border-radius:10px 10px;" id="volet">
        <h1 style="font-family:arial; background-color: rgba(199,21,133, 0.8);
        padding-top:2%;padding-bottom:2%;text-align:center;border-radius:10px 10px 0px 0px;">Annonces</h1>
  
         
    
        
<?php
session_start();
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
	
	echo '<tr style="text-align:center;">
		<style> 
			tr{
			
	color: white;
			}

			tr:hover{
				color: white;
	background-color: #000000;
			}
		</style>
	<td style="padding:10px 50px;text-align:center;">';
	echo '<a href="monAnnonce.php?id='.$data['id_annonce'].'"><img src="photos_annonces/'.$data['id_annonce'].'.jpg" alt="Photo de montagne"  /></a>';
	echo '<p>'.$data['titre'].'</p>';
	echo '</td>
	<td style= "border-style: dotted;padding: 10px 250px;border:3px solid black;text-align:center;border-radius:5px 5px"><a href="monAnnonce.php?id='.$data['id_annonce'].'">
	<p>Déscription de l\'annonce : <br />
	'.$data['description'].'<br />
</p>'.$data['prix']."€</a></td>
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
  	    <form style="text-align: center;">
<input  type="button" value="Changer la couleur de fond" onClick="ConfirmMessage()">
</form>
<script type="text/javascript">
   function ConfirmMessage() {
       if (confirm("Voulez-vous changer la couleur de fond de page ?")) { 
           // Clic sur OK
          
           document.body.background=./img/imageDeFond.jpg;
       }
   }
</script>
   </body>
</html>