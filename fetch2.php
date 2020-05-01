<?php
//fetch.php
$connect = mysqli_connect("localhost", "id7297248_basesite", "anis1996", "id7297248_basesite");
$output = '';
if(!isset($_POST["query1"]) )
{
     
}
else
{
    $emplacement = mysqli_real_escape_string($connect, $_POST["query1"]);
}
     
if(!isset($_POST["query"]) )
{
     
}
else{
    $search = mysqli_real_escape_string($connect, $_POST["query"]);
}
 
 if(isset($_POST["query1"]) || isset($_POST["query"]  ))
{
     
 $query = "
  SELECT * FROM annonce
  WHERE matricule_voiture IN(SELECT matricule FROM voiture WHERE marque LIKE '".$search."'
   || energie LIKE '".$emplacement."')
 
 ";
 
}
else
{

 $query = "
  SELECT * FROM annonce
 ";


 
}
	
$result = mysqli_query($connect, $query);
/*
echo '<table 
	style=" margin-left:auto;
margin-right:auto;
border-collapse:collapse;
border:1px solid #000000;
width:85%;
background-color: white;">';*/
echo '<table class="table table bordered" style="margin-left:2%;margin-right:60%;font-family:arial; color:white;text-align:center;width:88%;">';
	
//	color :white;background-color: rgba(0, 0, 255, 0.1);padding: 2%;border-radius:5px 5px; margin-bottom:1%; text-align//:center;">';
    while ($data = mysqli_fetch_array($result)) {
 echo '<tr  style="text-align:center;text-decoration:none;color:white;"class="tr">
		<style> 
	.tr:hover{
				color: white;
	background-color: #000000;
	td a{
	     display: block;
	}
			}

		</style>
	<td style="padding:10px 50px;text-align:center;text-decoration:none;color:white;">';
	
	echo '<a href="monAnnonce.php?id='.$data['id_annonce'].'" style="text-decoration:none;color:white;"><img style="width: 100px;" src="photos_annonces/'.$data['id_annonce'].'.jpg" alt="annonce" /></a>';
	echo '<p style="text-decoration:none;color:white;">'.$data['titre'].'</p>';
	echo '</td>

	<td onclick="location.href= \'monAnnonce.php?id='.$data['id_annonce'].'" style= "color:white;border-style: dotted;padding: 10px 250px;border:3px solid black;text-align:center;border-radius:5px 5px">
	<p style="color: white;">'.$data['description'].'</p>
<p style="color: red;">'.$data['prix']."€</p></td>
</tr>";

	
 }
 echo '</table>';
//mysqli_free_result ($req);
//mysqli_close ();


 
?>
