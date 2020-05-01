<?php

    //session has not started
    session_start();

$host_name = 'localhost';
			$database = 'id7297248_basesite';
			$user_name = 'id7297248_basesite';
			$password = 'anis1996';

try {
  	

          $bdd = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);


if(isset($_POST['formconnexion'])) {
   $mailconnect = htmlspecialchars($_POST['mailconnect']);
   $mdpconnect = sha1($_POST['mdpconnect']);
   if(!empty($mailconnect) AND !empty($mdpconnect)) {
      $requser = $bdd->prepare("SELECT * FROM membres WHERE mail = ? AND motdepasse = ?");
      $requser->execute(array($mailconnect, $mdpconnect));
      $userexist = $requser->rowCount();
       if($userexist == 1) { 
         $userinfo = $requser->fetch();
         $_SESSION['id'] = $userinfo['id'];
         $_SESSION['pseudo'] = $userinfo['pseudo'];
         $_SESSION['mail'] = $userinfo['mail'];
         header("Location: profile.php?id=".$_SESSION['id']);
       } else {
         $erreur = "Mauvais mail ou mot de passe !";
           
       }
      
   } else {
      $erreur = "Tous les champs doivent Ãªtre complÃ©tÃ©s !";
   }
}
} catch (PDOException $e) {
  echo "Erreur!: " . $e->getMessage() . "<br/>";
  die();
}
?>
<!DOCTYPE html>
<html lang="fr">	
	<head>
	<title>Location voiture</title>
	<link rel="stylesheet" href="style.css"/>
	
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
  <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
	</head>
	
	<body style="background-image:url(img/fond.jpg);background-attachment: fixed;	background-repeat: no-repeat; font-family:arial; max-width: 100%;
                    height: auto; background-size: cover; margin-top:2%;"> 
                
	<?php
	
	require_once("config.php");
	$obj=new Config();
   $obj->choisir_head();
         
		?>
	 <h1 style="background-color: rgba(0,0,0,0.5);color: white;margin-top:-8%;text-align:center;padding-top:2%;padding-bottom:2%;margin-left:20%;margin-bottom:4%;font-family: Arial, Helvetica, sans-serif;border-radius:10px 10px;margin-right:26%;">Des voitures autour de vous, prêtes à partir</h1>


<section style="maring-top :15%;">




		 <article style="color: white;background-color: rgba(0,0,0,0.5);margin-right:5%;margin-left:5%; border-radius:10px 10px;" id="volet">
		     
		     
            
    
  <div class="container">
   <br />
   <h4 align="center">Recherche par marque <b>OU</b> par energie</h2><br />
   <div class="form-group" >
   <div class="input-group">
    <table class="table table bordered" style="margin-left:50%;margin-right:50%;font-family:arial; color:white;text-align:center;">

    <tr>
     <th>Marque</th>
       <th> </th>
     <th>Energie</th>
    </tr>
    <tr>
    <th> <input type="text" name="recherche_Serveur" id="recherche_Serveur" placeholder="Marque" class="form-control"  /> </th>
     <th> ou</th>
        <th> <input type="text" name="recherche_Emplacement" id="recherche_Emplacement" placeholder="Energie" class="form-control"  /> </th>
    </tr>
    </table>
   
   </div>
   </div>
   <br />
   <div id="result"></div>
  </div>
  </artilce>
  	</section>
 
 
<script>
$(document).ready(function(){
 
 load_data();
 
 function load_data(query)
 {
  $.ajax({
   url:"fetch2.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#recherche_Serveur').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
  
  
  
 load_data1();
 
 function load_data1(query1)
 {
  $.ajax({
   url:"fetch2.php",
   method:"POST",
   data:{query1:query1},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#recherche_Emplacement').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data1(search);
  }
  else
  {
   load_data1();
  }
 });
 
  
  
});
</script>


	


	
 <?php
	require_once("footer.php");
		foot();
		?>
	</div>
	</body>
</html>
