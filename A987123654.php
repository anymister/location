<?php
session_start();

$host_name = 'localhost';
$database = 'id7297248_basesite';
$user_name = 'id7297248_basesite';
$password = 'anis1996';


$dbh = null;
try {
  $bdd = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);


if(isset($_POST['formconnexion'])) {
   $mailconnect = htmlspecialchars($_POST['mailconnect']);
   $mdpconnect = sha1($_POST['mdpconnect']);
   if(!empty($mailconnect) AND !empty($mdpconnect)) {
      $requser = $bdd->prepare("SELECT * FROM admin WHERE id_admin = ? AND motdepasse_admin = ?");
      $requser->execute(array($mailconnect, $mdpconnect));
      $userexist = $requser->rowCount();
       if($userexist == 1) { 
         $userinfo = $requser->fetch();
         $_SESSION['id_admin'] = $userinfo['id_admin'];
         
        
         header("Location: ajoutemployer.php?id=".$_SESSION['id_admin']);
       } else {
         $erreur = "Mauvais mail ou mot de passe !";   
       }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
} catch (PDOException $e) {
  echo "Erreur!: " . $e->getMessage() . "<br/>";
  die();
}
?>
<html>
   <head>
      <title>Connexion Admin</title>
      <meta charset="utf-8">
          <style>
      /*  by Chris Coyier http://css-tricks.com */

* { margin: 0; padding: 0; }
body { font: 14px Georgia, serif; }
/* propriétés de base du menu */
nav {width: 960px;height: 100px;margin: 50px auto; text-align: center;display: block;font-family: verdana,arial;}

/* attention à bien faire correspondre l'id de chaque item avec le code */
#item1 { background: #41D05F; }
#item2 { background: #E42B2B; }
#item3 { background: #ff8400; }
#item4 { background: #a800ff; }
#item5 { background: #49a7f3; }

.top-menu li {display: inline-block;text-align: center;margin: 30px 5px;position: relative;
-webkit-transition: all 0.3s ease;
-moz-transition: all 0.3s ease;
-o-transition: all 0.3s ease;
}
.top-menu li:hover {margin: 30px 20px; }
.top-menu li:active {margin: 30px 33px; }
.top-menu li a  {width: 100px;height: 100px;z-index: 9999;position: absolute;top: 35px;font-weight: bold;display: block;
text-decoration: none;
font-size: 20px;
color: #fff;
text-shadow: 0px 1px 1px rgba(0,0,0,0.4), 0px 4px 6px rgba(0,0,0,0.1), 0px 9px 11px rgba(0,0,0,0.1);
-webkit-transition: all 0.1s linear; 
-moz-transition: all 0.1s linear;
-o-transition: all 0.1s linear;
}
.top-menu li:active a {font-size: 26px;top: 30px;text-shadow: none;}
.top-menu li div.menu-item {width: 100px;height: 100px;display: block;
-webkit-transition: all 0.2s ease; 
-moz-transition: all 0.2s ease;
-o-transition: all 0.2s ease;
-webkit-border-top-left-radius: 100px; 
-webkit-border-bottom-right-radius: 100px; 
-moz-border-radius-topleft: 100px; 
-moz-border-radius-bottomright: 100px; 
border-top-left-radius: 100px; 
border-bottom-right-radius: 100px;
-webkit-transform: rotate(45deg);
-moz-transform: rotate(45deg);
-o-transform: rotate(45deg);
}
.top-menu li:hover div.menu-item{ 
-webkit-border-top-left-radius: 80px; 
-webkit-border-bottom-right-radius: 80px; 
-moz-border-radius-topleft: 80px; 
-moz-border-radius-bottomright: 80px; 
border-top-left-radius: 80px; 
border-bottom-right-radius: 80px; 
-webkit-transform: rotate(225deg);
-moz-transform: rotate(225deg);
-o-transform: rotate(225deg);
}
.top-menu li:active div.menu-item{ 
   -webkit-border-top-left-radius: 50px; 
   -webkit-border-bottom-right-radius: 50px; 
   -moz-border-radius-topleft: 50px; 
   -moz-border-radius-bottomright: 50px; 
   border-top-left-radius: 50px; 
   border-bottom-right-radius: 50px; 
           </style>


   </head>
   <body style="background-color:black;">
      <div align="center" style="margin-top:15%;">
         <h2 style="color:white;">Connexion admin</h2>
         <br /><br />
         <form method="POST" action=" "style="">
            <input type="id" name="mailconnect" placeholder="Mail"style="" />
            <input type="password" name="mdpconnect" placeholder="Mot de passe"style="" />
            <br /><br />
            <input type="submit" name="formconnexion" value="Se connecter !" />
         </form>
         <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
      </div>
   </body>
</html>
