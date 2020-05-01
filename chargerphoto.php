<html>
    <head><title>Transfere Photo</title>
    	<link rel="stylesheet" href="style.css"/></head>
    
        <article>
<?php

$section= $_SESSION['id_employer'];
$groupe=$_SESSION['titre'];
$num=$_SESSION['prix'];

    $maxsize=1048576;
$erreur=0;  
if ($_FILES['icone']['error'] > 0) $erreur = 1;


//echo $erreur;
$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
//1. strrchr renvoie l'extension avec le point (« . »).
//2. substr(chaine,1) ignore le premier caractère de chaine.
//3. strtolower met l'extension en minuscules.
$extension_upload = strtolower(  substr(  strrchr($_FILES['icone']['name'], '.')  ,1)  );
if ( in_array($extension_upload,$extensions_valides) ){echo '<p style="color: red;	padding-left: 40%;	font-size: 30pt;margin-top: 20%;
 	background-color: rgba(0,0,0,0.6);">Bravo !<br/></p>';
echo '<p style="color: red ;	padding-left: 38%;
 	font-size: 18pt;background-color: rgba(0,0,0,0.4);">Transfert réussi.</p><p style="	padding-left: 45%;"><form> <input type="button" onclick="window.close();" value="Fermer la fenêtre" style="margin-left: 40%;"> </form></p>';
    
}
else $erreur = 1;

$image_sizes = getimagesize($_FILES['icone']['tmp_name']);
//if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight) $erreur = "Image trop grande";
//Créer un dossier 'fichiers/1/'
  mkdir('fichier/1/', 0777, true);
 
//Créer un identifiant difficile à deviner
  $nom = md5(uniqid(rand(), true));
  $nom = "photos_annonces/{$_GET['id']}.{$extension_upload}";
  if($erreur!=1){
      //$resultat = move_uploaded_file($_FILES['icone']['tmp_name'],$nom);
      //***********
      $newWidth=550;
      $targetFile=$section.$groupe.$num; 
      $originalFile=$_FILES['icone']['tmp_name'];

    $info = getimagesize($originalFile);
    $mime = $info['mime'];

    switch ($mime) {
            case 'image/jpeg':
                    $image_create_func = 'imagecreatefromjpeg';
                    $image_save_func = 'imagejpeg';
                    $new_image_ext = 'jpg';
                    break;

            case 'image/png':
                    $image_create_func = 'imagecreatefrompng';
                    $image_save_func = 'imagepng';
                    $new_image_ext = 'png';
                    break;

            case 'image/gif':
                    $image_create_func = 'imagecreatefromgif';
                    $image_save_func = 'imagegif';
                    $new_image_ext = 'gif';
                    break;

            default: 
                    throw new Exception('Unknown image type.');
    }

    $img = $image_create_func($originalFile);
    list($width, $height) = getimagesize($originalFile);

    $newHeight = ($height / $width) * $newWidth;
    $tmp = imagecreatetruecolor($newWidth, $newHeight);
    imagecopyresampled($tmp, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

    if (file_exists($targetFile)) {
            unlink($targetFile);
    }
    $tmpfil='avatars/'.$section.$groupe.$num.'jpg';
     if (file_exists($tmpfil)) {
            unlink($tmpfil);
    }
     if (file_exists($tmpfil)) {
            unlink($tmpfil);
    }
     if (file_exists($tmpfil.'gif')) {
            unlink($tmpfil.'gif');
    }
     if (file_exists($tmpfil.'jpeg')) {
            unlink($tmpfil.'jpeg');
    }
    
    $image_save_func($tmp, "$targetFile.$new_image_ext");

       //**********

if ($resultat){ echo '<p style="color: red;	margin-left: 30%;	font-size: 30pt;
 	margin-right: 30%;">Bravo !<br/></p>';
echo '<p style="color: red ;	margin-left: 30%;
 	margin-right: 30%;	font-size: 16pt;">Transfert reussi.</p>';
}}else {
     echo '<p style="color: red;	padding-left: 45%;	font-size: 40pt;margin-top: 20%;
 	padding-right: 40%;background-color: rgba(0,0,0,0.6);">Transfert echoué verifier l\'extension ou la taille de votre image</p>';
}

?>
</article>
</body>
</html>