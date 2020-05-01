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
  SELECT * FROM Employer
  WHERE nom_employer LIKE '".$search."'
   || prenom_employer LIKE '".$emplacement."'
 
 ";
 
}
else
{
 $query = "
  SELECT * FROM employer
 ";
}
$result = mysqli_query($connect, $query);

 echo '
  <div class="table-responsive" style="margin-right:7%;">
   <table class="table table bordered" style="color:white;">
    <tr>
     <th>Telephone</th>
     <th>Email</th>
     <th>identifiant</th>
  </tr>';
    while ($data = mysqli_fetch_array($result)) {
 echo '
  
  <tr>

    <td>'.$data["numero"].'</td>
    <td>'.$data["email"].'</td>
    <td>'.$data["id_employer"].'</td>
 
   </tr>
  ';
 }
 


 
?>
