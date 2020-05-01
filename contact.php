<?php
// On démarre la session
session_start ();

?>
<!DOCTYPE html>
<html lang="fr">	
	<head>
	<title>Contact</title>
	<link rel="stylesheet" href="style.css"/>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
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

<section style="maring-top :10%;text-align:center;">

<article style="color: white;background-color: rgba(0,0,0,0.5);margin-right:34%;margin-left:34%;margin-top :-4%;padding-bottom :5%; border-radius:10px 10px;" id="volet">
<h1 style="font-family:arial; background-color: rgba(199,21,133, 0.8);padding-top:2%;padding-bottom:2%;text-align:center;border-radius:10px 10px 0px 0px;">Contact</h1>
<div style="text-align:center;">
    <p style="font-family:galibri; margin-left:5%;margin-top:5%;">N'hesitez pas à nous contacter</p>
<h2>Par mail</h2><p> location@location.com</p><br />
<h2>Par telephone</h2> 07.30.65.21.25</p>
<p style="font-family:galibri; margin-left:5%;margin-top:5%;">Ou directement en cliquant ci-dessous</p>
</div>




	<a  a href="nousContacter.php" style=" background-color: rgba(199,21,133, 0.8);padding-left:3%;padding-right:3%;	padding-top:1.5% ;padding-bottom:1.5% ;border-radius:5px 5px; color:white;border:1px solid white;color:white;font-family:arial;
	text-decoration: none;font-family:arial;text-align:center;">Nous Contacter</a>
	
</article>	
	</section>
	
		<?php
	
	require_once("footer.php");
	foot();
         
		?>
	</div>
	</body>
</html>