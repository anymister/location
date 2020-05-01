<!DOCTYPE html>
<html lang="fr">	
	<head>
	<title>Envoie reussi</title>

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
.bs-example{
margin: 20px;
}
</style>
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

	<?php
	
	require_once("config.php");
	$obj=new Config();
   $obj->choisir_head();
         
		?>

	 
<section style="maring-top :10%;">

<?php 
$nom=$_POST["name"];
$email=$_POST["email"];
$num=$_POST["num"];
$msg=$_POST["msg"]; 
	require_once("envoyerMail.php");
nousContacter($nom,$email,$num,$msg);



?>

<article style="color: white;background-color: rgba(0,0,0,0.5);margin-right:30%;margin-left:30%;margin-top :8%;padding-bottom :2%; border-radius:10px 10px;" id="volet">
     <h1 style="font-family:arial; background-color: rgba(199,21,133, 0.8);
        padding-top:2%;padding-bottom:2%;text-align:center;border-radius:10px 10px 0px 0px;">Envoi du mail en cours</h1>
        <p style="color:white; text-align:center;">Patientez jusqu'a la fin du chargement s'il vous plait, vous allez etre rediréger directement.</p>
<div class="bs-example">
<!-- Progress bar HTML -->
<div class="progress progress-striped active">
<div class="progress-bar"></div>
</div>

<!-- jQuery Script -->
<script type="text/javascript">
var i = 0;
function makeProgress(){
if(i < 99){
	i++;
	$(".progress-bar").css("width", i + "%").text(i + " %");
}else{
  



        window.location.href = "accueil.php";
        exit();
        
      
}
// Wait for sometime before running this script again
setTimeout("makeProgress()", 50);
}
makeProgress();
</script>
</div>

</article>

	
	</section>
	
		<?php
	
	require_once("footer.php");
	foot();
         
		?>
	</div>
	</body>
</html>