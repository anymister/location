<?php
session_start();

$host_name = 'localhost';
$database = 'id7297248_basesite';
$user_name = 'id7297248_basesite';
$password = 'anis1996';



$dbh = null;
try {
  $bdd = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);


if(isset($_SESSION['id_employer'])) {
   $requser = $bdd->prepare("SELECT * FROM Employer WHERE id_employer = ?");
   $requser->execute(array($_SESSION['id_employer']));
   $user = $requser->fetch();
   if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $user['pseudo']) {
      $newpseudo = htmlspecialchars($_POST['newpseudo']);
      $insertpseudo = $bdd->prepare("UPDATE membres SET pseudo = ? WHERE id = ?");
      $insertpseudo->execute(array($newpseudo, $_SESSION['id_employer']));
      header('Location: profilEmployer.php');
   }
   if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['mail']) {
      $newmail = htmlspecialchars($_POST['newmail']);
      $insertmail = $bdd->prepare("UPDATE membres SET mail = ? WHERE id = ?");
      $insertmail->execute(array($newmail, $_SESSION['id_employer']));
      header('Location: profilEmployer.php');
   }
   if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])) {
      $mdp1 = sha1($_POST['newmdp1']);
      $mdp2 = sha1($_POST['newmdp2']);
      if($mdp1 == $mdp2) {
         $insertmdp = $bdd->prepare("UPDATE Employer SET motdepasse = ? WHERE id_employer = ?");
         $insertmdp->execute(array($mdp1, $_SESSION['id_employer']));
         header('Location: profileEmployer.php');
      } else {
         $msg = "Vos deux mdp ne correspondent pas !";
      }
   }
   
?>
<html>
   <head>
      <title>Edition profile CarLoc</title>
      <meta charset="utf-8">
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
    
         <article style="color: white;background-color: rgba(0,0,0,0.5);margin-right:34%;margin-left:32%;%;margin-top :-3%; border-radius:10px 10px;" id="volet">
             <h1 style="font-family:arial; background-color: rgba(199,21,133, 0.8);padding-top:2%;padding-bottom:2%;padding-left:30%;border-radius:10px 10px 0px 0px;">Edition profile</h1>
            <form method="POST" style="color:white; padding-top :5%;padding-bottom :10%; action="#" enctype="multipart/form-data">
               <label>Pseudo :</label>
               <input type="text"  style="background-color: rgba(0, 0, 255, 0.1);width: 80%; height: 40px;border-radius:10px 10px; margin-bottom:2%;color:white;"name="newpseudo" placeholder="Pseudo" value="<?php echo $user['pseudo']; ?>" /><br /><br />
               <label>Mail :</label>
               <input type="text"  style="background-color: rgba(0, 0, 255, 0.1);width: 80%; height: 40px;border-radius:10px 10px; margin-bottom:2%;color:white;"name="newmail" placeholder="Mail" value="<?php echo $user['mail']; ?>" /><br /><br />
              
               <input type="password"  style="background-color: rgba(0, 0, 255, 0.1);width: 80%; height: 40px;border-radius:10px 10px; margin-bottom:2%;color:white;"name="newmdp1" placeholder="Mot de passe"/><br /><br />
              
               <input type="password"  style="background-color: rgba(0, 0, 255, 0.1);width: 80%; height: 40px;border-radius:10px 10px; margin-bottom:2%;color:white;" name="newmdp2" placeholder="Confirmation du mot de passe" /><br /><br />
               <input type="submit" style="background-color: rgba(199,21,133, 0.8);width: 50%; height: 35px;border-radius:10px 10px;border:transparent;color:white;font-family:arial;font-weight:bold;margin-left:25%;margin-top:10%;" value="Mettre à jour mon profil " />
            </form>
            <?php if(isset($msg)) { echo $msg; } ?>
         </article>
     
   </body>
</html>
<?php   
}
else {
  
   header("Location: connexionEmloyer.php");
}}
 catch (PDOException $e) {
  echo "Erreur!: " . $e->getMessage() . "<br/>";
  die();
}
?>