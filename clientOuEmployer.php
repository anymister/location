<html lang="fr">	
	<head>
	<title>Mon espace</title>
	<link rel="stylesheet" href="style.css"/>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="max-width=device-max-width, initial-scale=1">
	</head>
	
	<body  style="background-image:url(img/fond.jpg);background-attachment: fixed;	background-repeat: no-repeat; font-family:arial; max-max-width: 100%;
                    height: auto; background-size: cover; ">

   <?php
	require_once("config.php");
	$obj=new Config();
   	$obj->choisir_head();
         
		?>
		 
<section style="maring-top :5%;">
		 <article style="color: white;background-color: rgba(0,0,0,0.5);margin-right:34%;margin-left:34%;%;margin-top :-8%; border-radius:10px 10px;padding-bottom:6%;text-align:center;" id="volet">
             <h1 style="font-family:arial; background-color: rgba(199,21,133, 0.8);padding-top:2%;padding-bottom:2%;text-align:center;border-radius:10px 10px 0px 0px;">Choisir mon espace</h1>
    
        <p>Je me connecter à mon espace</p>
      <div style="margin-top:22%;">
        
            <a href="connexion.php"style=" text-align:center; padding-left:5%; max-max-width: 20%; height: 40px;background-color: rgba(199,21,133, 0.8);padding-left:6.5%;padding-right:6.5% ;padding-top:1.1% ;padding-bottom:1.3% ;border-radius:5px 5px; margin-top:5%;color:white;color:white;font-family:arial;text-decoration: none;"value="Connexion">Client</a>
 				<a href="connexionEmployer.php"style=" max-max-width: 20%; height: 40px;background-color: rgba(199,21,133, 0.8);padding-left:3.5%;padding-right:3.5% ;padding-top:1.1% ;padding-bottom:1.3% ;border-radius:5px 5px; color:white;color:white;font-family:arial;text-decoration: none;"value="Connexion">Employé</a>
         </div>
          </article>
        
     
        </section>
	
 <?php
	require_once("footer.php");
		foot();
		?>
	</div>
     
   </body>
</html>