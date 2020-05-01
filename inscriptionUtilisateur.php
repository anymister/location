<?php

require_once "_recaptchalib.php";
// Register API keys at https://www.google.com/recaptcha/admin
$siteKey = "6LfGYIEUAAAAALH0VT7kSusOj_BQVVuj2JqeZU3k";
$secret = "6LfGYIEUAAAAADxeN6Qv3ik60E5Nu3LeIRb6nyQn";
// reCAPTCHA supported 40+ languages listed here: https://developers.google.com/recaptcha/docs/language
$lang = "en";
// The response from reCAPTCHA
$resp = null;
// The error code from reCAPTCHA, if any
$error = null;
$reCaptcha = new ReCaptcha($secret);

$host_name = 'localhost';
$database = 'id7297248_basesite';
$user_name = 'id7297248_basesite';
$password = 'anis1996';


$dbh = null;
try {
  $bdd = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);


if(isset($_POST['forminscription'])) {
   $pseudo = htmlspecialchars($_POST['pseudo']);
   $date_naissance = htmlspecialchars($_POST['date_naissance']);
   $mail = htmlspecialchars($_POST['mail']);
   $mail2 = htmlspecialchars($_POST['mail2']);
   $mdp = sha1($_POST['mdp']);
   $mdp2 = sha1($_POST['mdp2']);
   $nump =  htmlspecialchars($_POST['num']);
   if(!empty($_POST['pseudo'])AND !empty($_POST['date_naissance']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])AND !empty($_POST['num']) AND ($_POST["g-recaptcha-response"])) {
        $resp = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
      $pseudolength = strlen($pseudo);
      if($pseudolength <= 255) {
         if($mail == $mail2) {
            if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
               $reqmail = $bdd->prepare("SELECT * FROM membres WHERE mail = ?");
               $reqmail->execute(array($mail));
               $mailexist = $reqmail->rowCount();
               if($mailexist == 0) {
                  if($mdp == $mdp2) {
                      $id=rand(2,10000);
                     $insertmbr = $bdd->prepare("INSERT INTO membres(id,pseudo, mail, motdepasse,numeropermis,date_naissance) VALUES(?,?, ?, ?,?,?)");
                     $insertmbr->execute(array($id,$pseudo, $mail, $mdp,$nump,$date_naissance));
                     $erreur = "votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";
                  } else {
                     $erreur = "Vos mots de passes ne correspondent pas !";
                  }
               } else {
                  $erreur = "Adresse mail déjà utilisée  !";
               }
            } else {
               $erreur = "Votre adresse mail n'est pas valide !";
            }
         } else {
            $erreur = "Vos adresses mail ne correspondent pas !";
         }
      } else {
         $erreur = "Votre pseudo ne doit pas dépasser 255 caracteres !";
      }
   } else {
      $erreur = "tous les champs doivent être completes !";
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
	<title>Inscription Location</title>
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
	
		 
<section style="margin-top :20%;text-align:center;">
  <article style="color: white;background-color: rgba(0,0,0,0.5);margin-right:34%;margin-left:34%;%;margin-top :-13%; border-radius:10px 10px;text-align:center;" id="volet">
             <h2 style="font-family:arial; background-color: rgba(199,21,133, 0.8);padding-top:2%;padding-bottom:2%;text-align:center;border-radius:10px 10px 0px 0px;">Inscription</h2>
         <form method="POST" style="color:white; text-align:center;padding-top :5%;padding-bottom :7%;padding-left:10%; ">
            <table>
               <tr>
                  <td align="center">
                     <label for="pseudo"></label>
                  </td>
                  <td>
                     <input type="text" placeholder="Nom et Prénom" style="background-color: rgba(0, 0, 255, 0.1);width: 80%; height: 40px;border-radius:10px 10px; margin-bottom:2%;color:white;" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" />
                  </td>
               </tr>
               <tr>
                  <td align="center">
                     <label for="date de naissance "></label>
                  </td>
                  <td>
                     <input type="date" placeholder="Date de Naissance" style="background-color: rgba(0, 0, 255, 0.1);width: 80%; height: 40px;border-radius:10px 10px; margin-bottom:2%;color:white;" id="date_naissance" name="date_naissance" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" />
                  </td>
               </tr>
               <tr>
                  <td align="center">
                     <label for="Numero"></label>
                  </td>
                <td>
                     <input type="num"  placeholder="Numéro de permis" style="background-color: rgba(0, 0, 255, 0.1);width: 80%; height: 40px;border-radius:10px 10px; margin-bottom:2%; color:white;" id="num" name="num" value="" />
                  </td>
                  </tr>
               <tr>
                  <td align="center">
                     <label for="mail"></label>
                  </td>
                  <td>
                     <input type="email" placeholder="Votre mail" style="background-color: rgba(0, 0, 255, 0.1);width: 80%; height: 40px;border-radius:10px 10px; margin-bottom:2%;color:white;" id="mail" name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>" />
                  </td>
               </tr>
                <tr>
                  <td align="center">
                     <label for="mail2"></label>
                  </td>
                  <td>
                     <input type="email"  placeholder="Confirmez votre mail" style="background-color: rgba(0, 0, 255, 0.1);width: 80%; height: 40px;border-radius:10px 10px; margin-bottom:2%;color:white;" id="mail2" name="mail2" value="<?php if(isset($mail2)) { echo $mail2; } ?>" />
                  </td>
                  
               </tr>
               
               <tr>
                  <td align="center">
                     <label for="mdp"></label>
                  </td>
                  <td>
                     <input type="password" placeholder="Votre mot de passe" style="background-color: rgba(0, 0, 255, 0.1);width: 80%;text-align:center; height: 40px;border-radius:10px 10px; margin-bottom:2%;color:white;" id="mdp" name="mdp" />
                  </td>
              </tr>
                <tr>
                  <td align="center">
                     <label for="mdp2"></label>
                  </td>
                  <td>
                     <input type="password"  style="background-color: rgba(0, 0, 255, 0.1);width: 80%; height: 40px;border-radius:10px 10px; margin-bottom:2%;text-align:center;color:white;"placeholder="Confirmez mot de passe" id="mdp2" name="mdp2" />
                  </td>
               </tr>
                <tr>
                  <td align="center">
                     <label for="recaptcha"></label>
                  </td>
                  <td>
                     <div class="g-recaptcha" data-sitekey="6LfGYIEUAAAAALH0VT7kSusOj_BQVVuj2JqeZU3k"
             style="border-radius:10px 10px; "></div>
      <script type="text/javascript"
          src="https://www.google.com/recaptcha/api.js?hl=<?php echo $lang;?>">
      </script>
                  </td>
               </tr>
               
               <tr>
                  <td></td>
                  <td align="center">
                     <br />
                     <input type="submit" name="forminscription" style="background-color: rgba(199,21,133, 0.8);width: 50%; height: 35px;border-radius:10px 10px;border:transparent;color:white;font-family:arial;font-weight:bold;text-align:center;margin-top:1%;" value="Je m'inscris" />
                  </td>
               </tr>
            </table>
         </form>
        
         <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
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