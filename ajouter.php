<?php
session_start();
$ob=new ajouter();
$ob->ajouter();

class ajouter{
  public function ajouter(){
    try{

  require_once("config.php");

                    $obj=new config();

                    $bdd=$obj->pdo();

if(isset($_GET['id']) AND $_GET['id'] > 0) {
   
if(isset($_POST['forminscription'])) {
   $nom = htmlspecialchars($_POST['nom']);
   $prenom = htmlspecialchars($_POST['prenom']);
   $num = htmlspecialchars($_POST['num']);
   $adresse = htmlspecialchars($_POST['adresse']);
   $mail = htmlspecialchars($_POST['mail']);
   $mail2 = htmlspecialchars($_POST['mail2']);
      $matricule = htmlspecialchars($_POST['matricule']);
   

   if(!empty($_POST['nom']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['prenom']) AND !empty($_POST['num']) AND !empty($_POST['adresse'])) {
      
      $prenomlength = strlen($prenom);
      $nomlength = strlen($nom);
      $numlength = strlen($num);
      if(($prenomlength <= 255) AND ($nomlength <= 255) AND ($numlength <= 255)) {
         if($mail == $mail2) {
             
            if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
             $reqmail = $bdd->prepare("SELECT * FROM employer WHERE mail = ?");
            $reqmail->execute(array($mail));
            $mailexist = $reqmail->rowCount();
            
               if($mailexist == 0) {
                 
                    
                 	require_once("id.php");
                 	$obj = new Generation();
                    $id=$obj->generer();
                    require_once("B147852369.php");
                    $obj=new GenerationMP();
                     $mdp=$obj->Generer_Password();
                     require_once("envoyerMail.php");
                     EnvoiMail($nom,$mail,$mdp);
                    $mdp = sha1($mdp);
                
                    if($_SESSION['id']==1){
                      $insertmbr = $bdd->prepare("INSERT INTO Employer(id_employer,nom_employer,prenom_employer,adresse_employer,numero,motdepasse,email) VALUES(?,?,?,?,?,?,?)");
                          $insertmbr->execute(array($id,$nom,$prenom,$adresse,$num,$mdp,$mail));
                            }else {
                            	   $insertmbr = $bdd->prepare("INSERT INTO proprietaire(nom_proprietaire,prenom_proprietaire,email_proprietaire,motdepasse_propirietaire,matricule_vehicule,adresse_proprietaire,numero) VALUES(?,?,?,?,?,?,?)");
                            $insertmbr->execute(array($nom,$prenom,$mail,$mdp,$matricule,$adresse,$num));
                            	}           
                     
                     $erreur = "<div style=\"color:green;\">Le compte employé de <b > ".$nom."</b> à bien été crée !</div>";
                  
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
}}
?>
<!DOCTYPE html>
<html lang="fr">	
	<head>
	<title>Ajouter employé</title>
	<link rel="stylesheet" href="style.css"/>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<?php
	require_once("styleMenu.php");
		?>
	</head>
	
	<body  style="background-image:url(img/fond.jpg);background-attachment: fixed;	background-repeat: no-repeat; font-family:arial; max-width: 100%;
                    height: auto; background-size: cover; ">

   <?php
    	require_once("config.php");
    	$obj=new Config();
         $obj->choisir_head();
		?>
		 
<section style="maring-top :10%;">




         
         <article style="color: white;background-color: rgba(0,0,0,0.5);margin-right:34%;margin-left:34%;border-radius:10px 10px;" id="volet">
             <h1 style="font-family:arial; background-color: rgba(199,21,133, 0.8);padding-top:2%;padding-bottom:2%;text-align:center;border-radius:10px 10px 0px 0px;">Ajouter </h1>
         <form method="POST" style="color:white; text-align:center;padding-top :5%;padding-bottom :10%; ">
            <table>
               <tr>
                  <td align="right">
                     <label for="pseudo"></label>
                  </td>
                  <td>
                     <input type="text" placeholder="Nom" style="background-color: rgba(0, 0, 255, 0.1);width: 110%; height: 40px;border-radius:10px 10px; margin-bottom:2%;text-align:center;" id="nom" name="nom" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" />
                  </td>
               </tr>
                <tr>
                  <td align="right">
                     <label for="prenom"></label>
                  </td>
                  <td>
                     <input type="text" placeholder="Prenom" style="background-color: rgba(0, 0, 255, 0.1);width: 110%; height: 40px;border-radius:10px 10px; margin-bottom:2%;text-align:center;" id="prenom" name="prenom" value="<?php if(isset($prenom)) { echo $prenom; } ?>" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="adresse"></label>
                  </td>
                  <td>
                     <input type="text" placeholder="adresse" style="background-color: rgba(0, 0, 255, 0.1);width: 110%; height: 40px;border-radius:10px 10px; margin-bottom:2%;text-align:center;" id="adresse" name="adresse" value="<?php if(isset($adresse)) { echo $adresse; } ?>" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="adresse"></label>
                  </td>
                  <td>
                     <input type="text" placeholder="numero" style="background-color: rgba(0, 0, 255, 0.1);width: 110%; height: 40px;border-radius:10px 10px; margin-bottom:2%;text-align:center;" id="num" name="num" value="<?php if(isset($num)) { echo $num; } ?>" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="mail"></label>
                  </td>
                  <td>
                     <input type="email" placeholder="Votre mail" style="background-color: rgba(0, 0, 255, 0.1);width: 110%; height: 40px;border-radius:10px 10px; margin-bottom:2%;text-align:center;" id="mail" name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="mail2"></label>
                  </td>
                  <td>
                     <input type="email"  placeholder="Confirmez votre mail" style="background-color: rgba(0, 0, 255, 0.1);width: 110%; height: 40px;border-radius:10px 10px; margin-bottom:2%;text-align:center;" id="mail2" name="mail2" value="<?php if(isset($mail2)) { echo $mail2; } ?>" />
                  </td>
               </tr>
              
               <tr>
                  <td></td>
                  <td align="center">
                     <br />
                     <input type="submit" name="forminscription" style="background-color: rgba(199,21,133, 0.8);width: 50%; height: 35px;border-radius:10px 10px;border:transparent;color:white;font-family:arial;font-weight:bold;margin-top:10%;text-align:center;" value="Ajouter" />
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
	';?>
	
 <?php
	require_once("footer.php");
		foot();
		?>
	</div>
     
   </body>
</html>
<?php
}

 catch (PDOException $e) {
  echo "Erreur!: " . $e->getMessage() . "<br/>";
  die();
}}}
?>