<?php

   function EnvoiMail($nom,$mail,$mdp)
      {

$email = $mail;
$msg="a";

if(($nom!=null)&&($email!=null)&&($msg!=null)){// Déclaration de l'adresse de destination.
if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn|gmail).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
{
	$passage_ligne = "\r\n";
}
else
{
	$passage_ligne = "\n";
}
//=====Déclaration des messages au format texte et au format HTML.
$message_txt = "";
$message_html = "<html><head></head><body>Bonjour ".$nom.", Bienvenu chez Location de voiture, votre compte a etais creer avec succes. Voici vos c
coordonnées pour vous connectez a votre compte sur notre plateforme :<br/><br/>
<b>Pseudo :</b>".$nom."<br />
<b>Email:</b>".$email." <br />
<b>Mot de passe :</b>".$mdp."<br />

Cliquez sur ce lien pour vous connectez : https://locationwordpress.000webhostapp.com/sitePHP/connexion.php
Merci d 'avoir choisis notre entreprise.<br/>
</body></html>";
//==========
 
//=====Création de la boundary
$boundary = "-----=".md5(rand());
//==========
 
//=====Définition du sujet.
$sujet = "Message admin";
//=========
 $mail1 ='anismerepere@live.fr';
//=====Création du header de l'e-mail.
$header = "From: \"Message Admin Location\"<".$mail1 .">".$passage_ligne;
$header.= "Reply-to: \"Location\" <".$mail .">".$passage_ligne;
$header.= "MIME-Version: 1.0".$passage_ligne;
$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
//==========
 
//=====Création du message.
$message = $passage_ligne."--".$boundary.$passage_ligne;
//=====Ajout du message au format texte.
$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_txt.$passage_ligne;
//==========
$message.= $passage_ligne."--".$boundary.$passage_ligne;
//=====Ajout du message au format HTML
$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_html.$passage_ligne;
//==========
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
//==========
 
//=====Envoi de l'e-mail.
mail($mail,$sujet,$message,$header);
//==========
    }
}
 function nousContacter($nom,$email,$num,$msg){


$mail = "mezraganis@gmail.com";

if(($nom!=null)&&($email!=null)&&($msg!=null)){// Déclaration de l'adresse de destination.
if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
{
	$passage_ligne = "\r\n";
}
else
{
	$passage_ligne = "\n";
}
//=====Déclaration des messages au format texte et au format HTML.
$message_txt = "";
$message_html = "<html><head></head><body>Bonjour, une personne vous à envoyez un message depuis le site Location de Voiture, voici sa demande:<br/>
<b>NOM Prenom :</b>".$nom."<br />
<b>Email:</b>".$email." <br />
<b>Numero :</b>".$num."<br />
<b>Message :</b>".$msg."<br />
Pour honoré votre contrat veuillez lui repondre (par mail/telephone) à sa requette dans les plus bref delais, au revoir.<br/>
</body></html>";
//==========
 
//=====Création de la boundary
$boundary = "-----=".md5(rand());
//==========
 
//=====Définition du sujet.
$sujet = "Message client SIREM";
//=========
 $mail1 ='anismerepere@live.fr';
//=====Création du header de l'e-mail.
$header = "From: \"Message client SIREM\"<".$mail1 .">".$passage_ligne;
$header.= "Reply-to: \"Message client SIREM\" <".$mail .">".$passage_ligne;
$header.= "MIME-Version: 1.0".$passage_ligne;
$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
//==========
 
//=====Création du message.
$message = $passage_ligne."--".$boundary.$passage_ligne;
//=====Ajout du message au format texte.
$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_txt.$passage_ligne;
//==========
$message.= $passage_ligne."--".$boundary.$passage_ligne;
//=====Ajout du message au format HTML
$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_html.$passage_ligne;
//==========
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
//==========
 
//=====Envoi de l'e-mail.
mail($mail,$sujet,$message,$header);
//==========
}

 
}
 ?>