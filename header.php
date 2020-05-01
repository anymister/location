	<?php
	class Header{
	   
  public function head_Client(){
           

  	echo'
  	<header class="header"  style="background-attachment: fixed;margin-bottom:12%;">
	<a href="./accueil.php"><img src="img/ucp.png" alt="ucp"  style="background-attachment: fixed;padding-left:5%;" width="11%" height="11%"/> </a> 
		     <div id="cssmenu">
		     <a href="./profile.php"><img src="img/profil.png" alt="ucp"  style="background-attachment: fixed;margin-left:90%;margin-bottom:-3.5%;margin-top:1.5%;" width="5%" height="5%"/> </a> 
<ul>
   
   <li><a href="accueil.php">Accueil</a></li>
   <li><a href="annonce.php">Annonces</a></li>
   <li><a href="contact.php">Contact</a></li>
   <li><a href="louer.php">Louer</a></li>
  <li><a href="./html2pdf/examples/prin.php" target="_blank">Mes facteurs</a></li>
   <li><a href="rendez_vous.php">Rendez-Vous</a></li>
    <li><a href="deconnexion.php">Se déconnecter</a>
</ul>
</div>

   	</header>
   	
';
	
      
  }
  /*<?php
  require_once("header.php");
  require_once("styleMenu.php");
  $head=new Header();
  $head->head_Admin();
?>*/
  public function head_Employe(){
    
      	echo'<header class="header"  style="background-attachment: fixed;margin-bottom:12%;">
            	<a href="accueil.php"><img src="img/ucp.png" alt="ucp"  style="background-attachment: fixed;padding-left:5%;" width="13%" height="13%"/> </a> 

    	
         		     <div id="cssmenu">
                 <a href="./profileEmployer.php"><img src="img/profil.png" alt="ucp"  style="background-attachment: fixed;margin-left:90%;margin-bottom:-3.5%;margin-top:1.5%;" width="5%" height="5%"/> </a> 
<ul>
   
   <li><a href="accueil.php">Accueil</a></li>
   <li><a href="annonce.php">Annonces</a></li>
   <li><a href="depot_annonce.php">Dépot</a></li>
   <li><a href="affichage _des_rendez_vous.php">Rendez-Vous</a></li>
   <li><a href="testAnnonce.php">Annonces En Attends</a></li>
   <li><a href="contact.php">Contact</a></li>
    <li><a href="deconnexion.php">Se déconnecter</a>
</ul>
</div>
       
	</header>';
  }
 
  public function head_Admin(){
     
      
    	echo'<header class="header"  style="background-attachment: fixed;margin-bottom:12%;">
        	<a href="accueil.php"><img src="img/ucp.png" alt="ucp"  style="background-attachment: fixed;padding-left:5%;" width="13%" height="13%"/> </a> 
    	 
          <div id="cssmenu">
<ul>
   
   <li><a href="accueil.php">Accueil</a></li>
<li><a href="Affiche_employer.php">Employés</a></li>
   <li><a href="ajoutemployer.php">Ajouter</a></li>
     <li><a href="newfile.txt" target="_blank">visiteurs</a></li>
      <li><a href="recherche_employer.php" >Recherche</a></li>
    <li><a href="deconnexion.php">Se déconnecter</a>
</ul>
</div>
       
	</header>';
  }
  public function head(){
	echo'<header class="header"  style="background-attachment: fixed;">
	<a href="accueil.php"><img src="img/ucp.png" alt="ucp"  style="background-attachment: fixed;padding-left:5%;" width="13%" height="13%"/> </a> 
	
	<div style="padding-left :40%;margin-top :-3%;margin-bottom :12%;">
	<form method="post" enctype="img" style="color:white;" action="connexion.php">
  
       <a href="clientOuEmployer.php"style=" width: 15%; height: 35px;background-color: rgba(0,255,0, 0.7);padding-left:3.5%;padding-right:3.5% ;padding-top:1.1% ;padding-bottom:1.3% ;border-radius:15px 15px; color:white;color:white;font-family:arial;text-decoration: none;"value="Connexion">Connexion</a>
       
    
    <a href="inscriptionUtilisateur.php"style=" width: 15%; height: 35px;background-color: rgba(199,21,133, 0.8);padding-left:3.5%;padding-right:3.5% ;padding-top:1.1% ;padding-bottom:1.3% ;border-radius:15px 15px; color:white;color:white;font-family:arial;text-decoration: none;"value="Connexion">Inscription</a>

</form></header>';}

  public function head_Sans_Connexion(){
      	echo'<header class="header"  style="background-attachment: fixed;">
	<a href="accueil.php"><img src="img/ucp.png" alt="ucp"  style="background-attachment: fixed;padding-left:5%;" width="13%" height="13%"/> </a> 
	
	<div style="padding-left :40%;margin-top :-3%;margin-bottom :12%;">
	<form method="post" enctype="img" style="color:white;" action="connexion.php">
 
</form></header>';
      
  }
	    
}
function head_nouveau(){
	echo'<header class="header"  style="background-attachment: fixed;">
	<a href="accueil.php"><img src="img/ucp.png" alt="ucp"  style="background-attachment: fixed;padding-left:5%;" width="13%" height="13%"/> </a> 
	 <nav style="margin-bottom: 5%;margin-top: -2%;">
            <ul class="top-menu">
               <li ><a href="Accueil.php>">Accueil</a><div class="menu-item" id="item1"></div></li>
               <li><a href="annonce.php">Annonce</a><div class="menu-item" id="item2"></div></li>
               <li><a href="depot_annonce.php>">Dépôt</a><div class="menu-item" id="item3"></div></li>
               <li><a href="deconnexion.php">Déconnecté</a><div class="menu-item" id="item4"></div></li>
      
            </ul>
         </nav>
       
	
	</header>';}
function head(){
	echo'<header class="header"  style="background-attachment: fixed;">
	<a href="accueil.php"><img src="img/ucp.png" alt="ucp"  style="background-attachment: fixed;padding-left:5%;" width="13%" height="13%"/> </a> 
	
	<div style="padding-left :40%;margin-top :-3%;margin-bottom :12%;">
	<form method="post" enctype="img" style="color:white;" action="connexion.php">
  
       <a href="clientOuEmployer.php"style=" width: 15%; height: 35px;background-color: rgba(0,255,0, 0.7);padding-left:3.5%;padding-right:3.5% ;padding-top:1.1% ;padding-bottom:1.3% ;border-radius:15px 15px; color:white;color:white;font-family:arial;text-decoration: none;"value="Connexion">Connexion</a>
       
    
    <a href="inscriptionUtilisateur.php"style=" width: 15%; height: 35px;background-color: rgba(199,21,133, 0.8);padding-left:3.5%;padding-right:3.5% ;padding-top:1.1% ;padding-bottom:1.3% ;border-radius:15px 15px; color:white;color:white;font-family:arial;text-decoration: none;"value="Connexion">Inscription</a>

</form></header>';}
	function headSansConnexion(){
	echo'<header class="header"  style="background-attachment: fixed;">
	<a href="accueil.php"><img src="img/ucp.png" alt="ucp"  style="background-attachment: fixed;padding-left:5%;" width="13%" height="13%"/> </a> 
	
	<div style="padding-left :40%;margin-top :-3%;margin-bottom :12%;">
	<form method="post" enctype="img" style="color:white;" action="connexion.php">
 
</form></header>';}
function headc(){
	echo'<header class="header"  style="background-attachment: fixed;">
	<a href="index.php"><img src="img/ucp.png" alt="ucp"  style="background-attachment: fixed;padding-left:5%;" width="13%" height="13%"/> </a> 
	
	<div style="padding-left :60%;margin-top :-5%;margin-bottom :12%;">
	 <a style=" width: 15%; height: 35px;background-color: rgba(199,21,133, 0.8);padding-left:3.5%;padding-right:3.5% ;padding-top:1.1% ;padding-bottom:1.3% ;border-radius:15px 15px;color:white;color:white;font-family:arial;text-decoration: none;" >Mon historique </a>
    <a href="profile.php" style=" width: 15%; height: 35px;background-color: rgba(199,21,133, 0.8);padding-left:3.5%;padding-right:3.5% ;padding-top:1.1% ;padding-bottom:1.3% ;border-radius:5px 5px; color:white;color:white;font-family:arial;text-decoration: none;margin-left:1%; "value="Connexion">Mon compte</a>
<a href="annonce.php"style=" margin-left:1%;margin-top:-1%; position:absolute;background-color:rgba(0,0,0,0.5);padding-left:1%;padding-right:1% ;padding-top:0.8% ;padding-bottom:0.8% ;border-radius:5px 5px; color:white;border:1px solid white;color:white;font-family:arial;text-decoration: none;"value="Connexion"> Annonces</a>
</form></header>';}
function headadmin(){
 
   
    	echo'<header class="header"  style="background-attachment: fixed;">
	<a href="accueil.php"><img src="img/ucp.png" alt="ucp"  style="background-attachment: fixed;padding-left:5%;" width="13%" height="13%"/> </a> 
	 <nav style="margin-top:-4%;">
            <ul class="top-menu">
               <li style="police:12px;"><a href="tableauDeBord.php>">Menu</a><div class="menu-item" id="item1"></div></li>
                <li><a href="accueil.php>">Accueil</a><div class="menu-item" id="item2"></div></li>
               <li><a href="annonce.php">Annonce</a><div class="menu-item" id="item3"></div></li>
               <li><a href="depot_annonce.php>">Employés</a><div class="menu-item" id="item4"></div></li>
               <li><a href="newfile.txt" target="blanc" >visiteurs</a><div class="menu-item" id="item1"></div></li>
               <li><a href="deconnexion.php">Déconnecté</a><div class="menu-item" id="item2"></div></li>
      
            </ul>
         </nav>
       
	</header>';
}
function headSansMenu(){
 
   	echo'<header class="header"  style="background-attachment: fixed;">
	<a href="accueil.php"><img src="img/ucp.png" alt="ucp"  style="background-attachment: fixed;padding-left:5%;" width="13%" height="13%"/> </a> ';
}
function menu(){

	echo'<div style="margin-left: 50%;padding-right: 10%;">
<ul id="nav">
<li class="current"><a href="acceuil.php">Accueil</a></li><!-- n1 -->		
<li><a href="annonce.php">Annonce</a></li>
<li><a href="https://locationwordpress.000webhostapp.com/blog/">Contact</a></li>
</ul>
<br /><br /><br /><br /><br /><br />
</div>';
}
?>
