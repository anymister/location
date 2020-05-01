<?php
session_start();
 if (session_start() == false) { header("Location : connexion.php"); } 
 else {
$host_name = 'localhost';
$database = 'id7297248_basesite';
$user_name = 'id7297248_basesite';
$password = 'anis1996';


$dbh = null;
try {
  $bdd = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);


if(isset($_POST['prendre'])) {
  $id=$_SESSION['id'];
  $date_debut = htmlspecialchars($_POST['date_debut']);
  $motif = htmlspecialchars($_POST['motif']);
   if(!empty($_POST['date_debut']) AND !empty($_POST['motif'])) {
   				$reqmail = $bdd->prepare("SELECT * FROM rendez_vous WHERE id = ?");
               $reqmail->execute(array($id));
               $mailexist = $reqmail->rowCount();
               if($mailexist == 0) {
    				$insertmbr = $bdd->prepare("INSERT INTO rendez_vous(id,motif,date_debut) VALUES(?,?,?)");
					$insertmbr->execute(array($id,$motif,$date_debut));
					echo "<p style=' color:red;'>vontre rendez-vous ".$date_debut."</p>";  
                	echo "<p style=' color:red;'>pour le motif: ".$motif."</p>";  
               		echo "<p style=' color:black;'>merci d'être présent(e)</p>";
				}else
				{
					$erreur = '<p style="text-align:center">vous avez deja un rendez-vous !</p>';
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
<!DOCTYPE html>
<html lang="fr">  
   <head>
   <title>rendez-vous</title>
   <link rel="stylesheet" href="style.css"/>
   <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
   <meta name"viewport" content="width=device-width,initial-scal=3">
   
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
   </head> 
   <body  style="background-image:url(img/fond.jpg);background-attachment: fixed; background-repeat: no-repeat; font-family:arial; max-width: 100%;
                    height: auto; background-size: cover;  ">
     <?php
      require_once("config.php");
      $obj=new Config();
         $obj->choisir_head();
         if(!isset($_SESSION['id'])&&!isset($_SESSION['id_employer'])&&!isset($_SESSION['id_admin'])) 
{
    echo '<center><font color="red" size="8"><b>ERREUR 404 ! Vous devez vous connecter pour acceder à cette page. </center></font><br />';
    
 
          header("Location: clientOuEmployer.php");

     
} 
else 
{
    ?>
         
  
       
<section style="maring-top :5%;">

  <article style=" color: white;background-color: rgba(0,0,0,0.5);margin-right:10%;margin-left:58%;margin-top :-8%; border-radius:10px 10px;" id="volet">
             <h1 style="font-family:arial; background-color: rgba(199,21,133, 0.8);padding-top:2%;padding-bottom:2%;padding-left:36%;border-radius:10px 10px 0px 0px;">rendez-vous</h1>
           <p style="text-align: center;color: white;"> pour louer votre voiture il faut prendre un rendez-vous avec un employé(e)s</p>

         <form method="POST" style="color:white;margin-left:10%; padding-left :5%;padding-top :5%;padding-bottom :10%; ">
            <table>
               <tr>
                  <td align="right">
                      <label for='motif' class='motif'></label>
                  </td>
                  <td>
                    <input type="text" placeholder="motif de votre rendez-vous" style=" color: white; background-color: rgba(0, 0, 255, 0.1);width: 110%; height: 80px;border-radius:10px 10px; margin-bottom:2%;" name="motif" required/>
                      
                  </td>
               </tr>
               <tr>
                 <tr>
                  <td align="right">
                      <label for='date_debut' class='labelDateDebut'></label>
                  </td>
                  <td>
                  <input type="date" placeholder="date_debut" style=" color: white; background-color: rgba(0, 0, 255, 0.1);width: 110%; height: 40px;border-radius:10px 10px; margin-bottom:2%;" name="date_debut" <?php echo'min="'.date('Y-m-d').'"';?> min="'.date('Y-m-d').'" required/>
                      
                  </td>
               </tr>
               <tr>
                  <td></td>
                  <td align="center">
                     <br />
                     <input type="submit" name="prendre" style="background-color: rgba(199,21,133, 0.8);width: 50%; height: 35px;border-radius:10px 10px;border:transparent;color:white;font-family:arial;font-weight:bold;margin-left:50%;margin-top:10%;" value="prendre" />
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
 
         <article style=" color: white;background-color: rgba(0,0,0,0.5);margin-right:58%;margin-left:10%;margin-top:-33%; border-radius:10px 10px;" id="volet">
         	<h1 style="font-family:arial; background-color: rgba(199,21,133, 0.8);padding-top:2%;padding-bottom:2%;padding-left:36%;border-radius:10px 10px 0px 0px;">mon rendez-vous</h1>
            <table border="2" style="text-align: center;">
            <?php
            	$getid = intval($_SESSION['id']);
   				$requser = $bdd->prepare('SELECT * FROM rendez_vous WHERE id = ?');
   				$requser->execute(array($getid));
   				$userinfo = $requser->fetch();
   			echo'
          		<tr> 
          			<th style="width:50%;height: 30%"> Date </th>
          			<td> '.$userinfo['date_debut'].'</td>
          		</tr>
          		<tr>
          			<th style="width:50%;height: 30%">Motif</th>
          			<td>'.$userinfo['motif'].'</td>

          		</tr>
            </table>';
            ?>

          <p style="text-align: center; color: white;">pour prendre un nouveau rendez vous , vous devez supprimer votre ancien rendez vous et prendre un nouveau</p>
        <br/><br/><br/>
        	<form method="POST" style="color:white;margin-left:10%; padding-left :5%;padding-top :5%;padding-bottom :10%; ">
           
                     <input type="submit" name="supprimer" style="background-color: rgba(199,21,133, 0.8);width: 40%; height: 35px;border-radius:10px 10px;border:transparent;color:white;font-family:arial;font-weight:bold;margin-left:40%;margin-top:10%;" value="supprimer" />
            </form> 
            <?php
            if(isset($_POST['supprimer'])) {
				$getid = intval($_SESSION['id']);
   				$requser = $bdd->prepare('DELETE FROM rendez_vous WHERE id = ?');
   				$requser->execute(array($getid));
   				$erreur = '<p style="text-align:center">vous vous avez supprimé votre rendez-vous !</p>';	
   			}  
         	?>
 </section>

<div style="margin-top: 40%;">
   
 <?php
}
   require_once("footer.php");
      foot();
 }
?>
 </div>
   </body>
</html>