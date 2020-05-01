<?php
session_start();
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
// Was there a reCAPTCHA response?
if ($_POST["g-recaptcha-response"]) {
    $resp = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}

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
   if(!empty($mailconnect) AND !empty($mdpconnect) AND ($_POST["g-recaptcha-response"])) {
        $resp = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
      $requser = $bdd->prepare("SELECT * FROM Employer WHERE email = ? AND motdepasse = ?");
      $requser->execute(array($mailconnect, $mdpconnect));
      $userexist = $requser->rowCount();
       if($userexist == 1) { 
         $userinfo = $requser->fetch();
         $_SESSION['id_employer'] = $userinfo['id_employer'];
        // $_SESSION['pseudo'] = $userinfo['pseudo'];
         $_SESSION['mail'] = $userinfo['mail'];
         header("Location: profileEmployer.php");
       } else {
         $erreur = "<p style='text-align:center'>Mauvais mail ou mot de passe !</p>";
       }
      
   } else {
      $erreur = "Tous les champs doivent etre completes!";
   }
}
} catch (PDOException $e) {
  echo "Erreur!: " . $e->getMessage() . "<br/>";
  die();
}
?>
<html>
   <head>
      <title>Espace particulier</title>
      <meta charset="utf-8">
   </head>
   <body  style="background-image:url(img/fond.jpg);background-attachment: fixed; background-repeat: no-repeat; font-family:arial; max-width: 100%;
                    height: auto; background-size: cover; ">
        <style>
            ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
  color:white;
  opacity: 4; /* Firefox */
}
        </style>
       <?php
      require_once("header.php");
      headSansConnexion();
    ?>
    <section style="maring-top :5%;">
     <article style="color: white;background-color: rgba(0,0,0,0.5);margin-right:34%;margin-left:34%;%;margin-top :-10%; border-radius:10px 10px;" id="volet">
             <h1 style="font-family:arial; background-color: rgba(199,21,133, 0.8);padding-top:2%;padding-bottom:2%;text-align:center;border-radius:10px 10px 0px 0px;">Connexion Employé(e)</h1>
    
         <form method="POST" action="" style="color:white; text-align:center;padding-top :5%;padding-bottom :10%;">
              <input type="email" name="mailconnect" style="background-color: rgba(0, 0, 255, 0.1);width: 80%; height: 40px;border-radius:10px 10px; margin-bottom:2%; color:white;" placeholder="Mail" /><br />
           
            <input type="password" name="mdpconnect" style="background-color: rgba(0, 0, 255, 0.1);width: 80%; height: 40px;border-radius:10px 10px; margin-bottom:0%;color:white;" placeholder="Mot de passe" />

            <br /><br />
            <div style="text-align:center;margin-left:12%;">
             <div class="g-recaptcha" data-sitekey="6LfGYIEUAAAAALH0VT7kSusOj_BQVVuj2JqeZU3k"
             style="border-radius:10px 10px; text-align:center;"></div>
      <script type="text/javascript"
          src="https://www.google.com/recaptcha/api.js?hl=<?php echo $lang;?>">
      </script>
      </div>
      <br/>
            <input type="submit" style="background-color: rgba(199,21,133, 0.8);width: 50%; height: 35px;border-radius:10px 10px;border:transparent;color:white;font-family:arial;font-weight:bold;margin-top:7%;" name="formconnexion" value="Se connecter" /> 
          <p style="margin-right: 70%; color: white;">Pour tester:</p>
            <p style="color: white;">email : <i>test@test.com</i></p>
            <p style="color: white;">mot de passe: <i>fHuH7KvL</i></p>
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
   </body>
</html>