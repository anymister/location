<?php
session_start();
function convertImage($source, $width, $height, $ext) {

  $imageSize = getimagesize($source);
  $ext=strtolower($ext);
  switch($ext) {
    case 'png':
    $imageRessource = imagecreatefrompng($source);
      break;
    case 'jpg':
    $imageRessource = imagecreatefromjpeg($source);
      break;
    case 'jpeg':
    $imageRessource = imagecreatefromjpeg($source);
      break;
  }
  $imageFinal = imagecreatetruecolor($width, $height);
  $final = imagecopyresampled($imageFinal, $imageRessource, 0, 0, 0, 0, $width, $height, $imageSize[0], $imageSize[1]);

  switch($ext) {
    case 'png':
    imagepng($imageFinal, $source);
      break;
    case 'jpg':
    imagejpeg($imageFinal, $source);
      break;
    case 'jpeg':
    imagejpeg($imageFinal, $source);
      break;
  }
}
function upload_image($file_ext,$file_destination,$file_error,$file_size,$file_tmp) {

  $allowed = array("png","jpg","jpeg");

  if(in_array($file_ext, $allowed)){
    if($file_error === 0){
      if($file_size <= 2097152){
        if(move_uploaded_file($file_tmp, $file_destination)){
          convertImage($file_destination, '200', '200', $file_ext);
        }
      }
    }
  }
}
function random_str($nbr) {
    $str = "";
    $chaine = "abcdefghijklmnpqrstuvwxyABCDEFGHIJKLMNOPQRSUTVWXYZ0123456789";
    $nb_chars = strlen($chaine);

    for($i=0; $i<$nbr; $i++)
    {
        $str .= $chaine[ rand(0, ($nb_chars-1)) ];
    }

    return $str;
}

$host_name = 'localhost';
$database = 'id7297248_basesite';
$user_name = 'id7297248_basesite';
$password = 'anis1996';


$dbh = null;
try {
  $bdd = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);

if (isset($_POST['upload'])){
  $titre = htmlspecialchars($_POST['titre']);
   $imatricule = htmlspecialchars($_POST['imatricule']);
   $prix= htmlspecialchars($_POST['prix']);
   $description= htmlspecialchars($_POST['description']);
   
  if(!empty($_POST['titre']) AND !empty($_POST['imatricule']) AND !empty($_POST['prix']) AND !empty($_POST['description'])) {
    
           if (isset($_FILES['file'])) {
               $file = $_FILES['file'];
               $file_name = $file['name'];
               $file_tmp = $file['tmp_name'];
               $file_size = $file['size'];
               $file_error = $file['error'];

               $file_ext = explode('.', $file_name);
               $file_ext = strtolower(end($file_ext));
               $random = random_str(15);
               $file_name_new = strtoupper($random.'.'.$file_ext);

               
               $file_destination = "./image_voiture/".$file_name_new;
               upload_image($file_ext,$file_destination,$file_error,$file_size,$file_tmp);

                          require_once("id.php");
                          $obj = new Generation();
                          $id=$obj->generer();       
                      echo $id;
                      echo $description;
                      echo $titre;
                      echo $imatricule;
                      echo $file_destination;
                      echo $prix;
                      $insertmbr = $bdd->prepare("INSERT INTO annonce(id_annonce, description,titre,prix,matricule_voiture,id_employer,image) VALUES(?,?,?,?,?,?,?)");
                      $insertmbr->execute(array($id,$description,$titre,$prix,$imatricule,$__SESSION['id_employer'],$file_destination));
                                       $erreur = "l'annonce a été ajouter ! <a href=\"annonce.php\">accéder au annonces</a>";
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
   <title>Dépot d'annonce</title>
   <link rel="stylesheet" href="style.css"/>
   <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
  
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
    	require_once("config.php");
    	$obj=new Config();
         $obj->choisir_head();
		?>
      
<section style="maring-top :5%;">




         
         <article style=" color: white;background-color: rgba(0,0,0,0.5);margin-right:20%;margin-left:20%;margin-top :-8%; border-radius:10px 10px;" id="volet">
             <h1 style="text-align: center;font-family:arial; background-color: rgba(199,21,133, 0.8);padding-top:2%;padding-bottom:2%;border-radius:10px 10px 0px 0px;">Dépot d'annonce</h1>
         <form method="POST" style="color:white;padding-top :5%;padding-bottom :10%;" enctype="multipart/form-data">
            <table>
                 <tr>
                  <td align="right">
                      <label for='Titre' class='labelTitre'></label>
                  </td>
                  <td>
                     <input type="text" placeholder="titre" style="color: white;background-color: rgba(0, 0, 255, 0.1);width: 80%; height: 40px;border-radius:10px 10px; margin-bottom:2%;" id="titre" name="titre" type='text' size='30' autocomplete='off' required/>
                  </td>
               </tr>
               <tr>
                  <td align="right">
                      <label for='Matricule' class='labelMatricule'></label>
                  </td>
                  <td>
                     <input type="text" placeholder="imatricule" style="color: white;background-color: rgba(0, 0, 255, 0.1);width: 80%; height: 40px;border-radius:10px 10px; margin-bottom:2%;" id="imatricule" name="imatricule" type='text' size='9' autocomplete='off' required/>
                  </td>
               </tr>
               
              
                <tr>
                  <td align="right">
                      <label for='prix' class='labelPrix'></label>
                  </td>
                  <td>
                     <input type="text" placeholder="prix" style="color: white;background-color: rgba(0, 0, 255, 0.1);width: 80%; height: 40px;border-radius:10px 10px; margin-bottom:2%;" id="prix" name="prix" type='text' size='30' autocomplete='off' required/>
                  </td>
               </tr>
               
                <tr>
                  <td align="right">
                      <label for='Description' class='labelDescription'></label>
                  </td>
                  <td>
                     <input type="text" placeholder="description" style="color: white;background-color: rgba(0, 0, 255, 0.1);width: 80%; height: 80px;border-radius:10px 10px; margin-bottom:2%;" id="description" name="description" type='text' size='300' autocomplete='off' required/>
                  </td>
               </tr>
                <tr>
                  <td align="right">
                      <label for='image' class='labelImage'></label>
                  </td>
                  <td>
                     <br />
                     <input type="file" name="file" style="background-color: rgba(0, 0, 255, 0.1);width: 80%; height: 40px;border-radius:10px 10px; margin-bottom:2%;" required/>
                  </td>
               </tr>

               <tr>
                  <td></td>
                  <td style="text-align:center;">
                     <br />
                     <input type="submit" name="upload" style="background-color: rgba(199,21,133, 0.8);width: 50%; height: 35px;border-radius:10px 10px;border:transparent;color:white;font-family:arial;font-weight:bold;margin-top:1%;" value="Déposer" />
                  </td>
               </tr>
            </table>
          <?php
              if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
         </form>
         </article>
  
        
   </section>
   
 <?php
   require_once("footer.php");
      foot();
      ?>
   </div>
     
   </body>
</html>