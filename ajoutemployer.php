<?php
session_start();

$host_name = 'localhost';
$database = 'id7297248_basesite';
$user_name = 'id7297248_basesite';
$password = 'anis1996';


$dbh = null;
try {
  $bdd = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);

if(($_SESSION['id_admin']) AND $_SESSION['id_admin'] > 0) {
   
if(isset($_POST['forminscription'])) {
   $nom = htmlspecialchars($_POST['nom']);
   $prenom = htmlspecialchars($_POST['prenom']);
   $num = htmlspecialchars($_POST['num']);
   $adresse = htmlspecialchars($_POST['adresse']);
   $mail = htmlspecialchars($_POST['mail']);
   $mail2 = htmlspecialchars($_POST['mail2']);
   
   

   if(!empty($_POST['nom']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['prenom']) AND !empty($_POST['num']) AND !empty($_POST['adresse'])) {
      
      $prenomlength = strlen($prenom);
      $nomlength = strlen($nom);
      $numlength = strlen($num);
      if(($prenomlength <= 255) AND ($nomlength <= 255) AND ($numlength <= 255)) {
         if($mail == $mail2) {
             
            if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
             $reqmail = $bdd->prepare("SELECT * FROM employer WHERE email = ?");
            $reqmail->execute(array($mail));
            $mailexist = $reqmail->rowCount();
            
               if($mailexist == 0) {
                 
                    
                 	require_once("id.php");
                 	$obj = new Generation();
                    $id=$obj->generer();
                    require_once("B147852369.php");
                    $obj=new GenerationMP();
                    
                    $mdp=$obj->Generer_Password();
                    $mdpAffi=$mdp;
                   
                     require_once("envoyerMail.php");
                     EnvoiMail($nom,$mail,$mdpAffi);
                     //EnvoiMail('amirouche','123456','amirouchemahdi96@gmail.com');
                    $mdp = sha1($mdp);
                 
                    
                      $insertmbr = $bdd->prepare("INSERT INTO Employer(id_employer,nom_employer,prenom_employer,adresse_employer,numero,motdepasse,email) VALUES(?,?,?,?,?,?,?)");
                                       
                     $insertmbr->execute(array($id,$nom,$prenom,$adresse,$num,$mdp,$mail));
                     $erreur = "<div style=\"ttext-algin:centre;color:green;\">Le compte employé de <b > ".$nom."</b> à bien été crée !<br/>et son mot de passe est :<b > ".$mdpAffi."</b> </div>";
                  
               } else {
                  $erreur = "Adresse mail déjà utilisée !";
               }
            } else {
               $erreur = "Votre adresse mail n'est pas valide !";
            }
         } else {
            $erreur = "Vos adresses mail ne correspondent pas !";
         }
      } else {
         $erreur = "Votre pseudo ne doit pas dépasser 255 caractères !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>
<!DOCTYPE html>
<html lang="fr">	
	<head>
	<title>Ajouter employé</title>
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
         
if(!isset($_SESSION['id_admin'])) 
{
    echo '<center><font color="red" size="8"><b>ERREUR 404 ! Vous devez vous connecter pour acceder à cette page. </center></font><br />';
    
 

     
} 
else 
{
		?>
		 
<section style="maring-top :10%;">



         
         <article style="color: white;background-color: rgba(0,0,0,0.5);margin-right:34%;margin-left:34%;border-radius:10px 10px;" id="volet">
             <h1 style="font-family:arial; background-color: rgba(199,21,133, 0.8);padding-top:2%;padding-bottom:2%;padding-left:36%;border-radius:10px 10px 0px 0px;">Ajouter un Employé</h1>
         <form method="POST" style=" margin-left:12%;color:white; padding-left :5%;padding-top :5%;padding-bottom :10%; ">
            <table>
               <tr>
                  <td align="right">
                     <label for="pseudo"></label>
                  </td>
                  <td>
                     <input type="text" placeholder="Nom" style="text-align: center; color: white; background-color: rgba(0, 0, 255, 0.1);width: 100%; height: 40px;border-radius:10px 10px; margin-bottom:2%;" id="nom" name="nom" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" />
                  </td>
               </tr>
                <tr>
                  <td align="right">
                     <label for="prenom"></label>
                  </td>
                  <td>
                     <input type="text" placeholder="Prenom" style="text-align: center; color: white;background-color: rgba(0, 0, 255, 0.1);width: 100%; height: 40px;border-radius:10px 10px; margin-bottom:2%;" id="prenom" name="prenom" value="<?php if(isset($prenom)) { echo $prenom; } ?>" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="adresse"></label>
                  </td>
                  <td>
                     <input type="text" placeholder="adresse" style="text-align: center; color: white;background-color: rgba(0, 0, 255, 0.1);width: 100%; height: 40px;border-radius:10px 10px; margin-bottom:2%;" id="adresse" name="adresse" value="<?php if(isset($adresse)) { echo $adresse; } ?>" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="adresse"></label>
                  </td>
                  <td>
                     <input type="text" placeholder="numero" style="text-align: center; color: white;background-color: rgba(0, 0, 255, 0.1);width: 100%; height: 40px;border-radius:10px 10px; margin-bottom:2%;" id="num" name="num" value="<?php if(isset($num)) { echo $num; } ?>" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="mail"></label>
                  </td>
                  <td>
                     <input type="email" placeholder="Votre mail" style="text-align: center; color: white;background-color: rgba(0, 0, 255, 0.1);width: 100%; height: 40px;border-radius:10px 10px; margin-bottom:2%;" id="mail" name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="mail2"></label>
                  </td>
                  <td>
                     <input type="email"  placeholder="Confirmez votre mail" style="text-align: center; color: white;background-color: rgba(0, 0, 255, 0.1);width: 100%; height: 40px;border-radius:10px 10px; margin-bottom:2%;" id="mail2" name="mail2" value="<?php if(isset($mail2)) { echo $mail2; } ?>" />
                  </td>
               </tr>
              
               <tr>
                  <td></td>
                  <td align="center">
                     <br />
                     <input type="submit" name="forminscription" style="text-align: center; color: white;background-color: rgba(199,21,133, 0.8);left: 70%;width: 50%; height: 35px;border-radius:10px 10px;border:transparent;color:white;font-family:arial;font-weight:bold;margin-left:15%;margin-top:10%;" value="Ajouter" />
                  </td>
               </tr>
            
            </table>
         </form>
         <?php
         if(isset($erreur)) {
            echo '<font color="red" style="margin-left:15%;">'.$erreur."</font>";
         }
         ?>
         </article>
         
   
	</section>

	
 <?php

	require_once("footer.php");
		foot();
		?>
		
	</div>
     
   </body>
</html>
<?php
}}
}
 catch (PDOException $e) {
  echo "Erreur!: " . $e->getMessage() . "<br/>";
  die();
}
?>