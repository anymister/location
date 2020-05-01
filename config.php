<?php

class Config{
  public function pdo()
      {
      	$host_name = 'localhost';
			$database = 'id7297248_basesite';
			$user_name = 'id7297248_basesite';
			$password = 'anis1996';

          $bdd = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
          return $bdd;
      }
      public function session()
      {
          return session_start();
      }
      function ifsessionExists(){
             
             if($_SESSION['id_proprietaire']!=null)
             {
                 return 2;
             }
              if($_SESSION['id_employer']!=null)
             {
                 return 3;
             }
                 else if($_SESSION['id_admin']!=null)
             {
                     return 4;
             }
                else if($_SESSION['id']!=null)
             {
              return 1;   
             }
                 
                    
         else{
               return 6;
             }
         }
         function choisir_head()
         {
             	
	require_once("header.php");


	$obj=new Config();
	$b=$obj->ifsessionExists();
	$head= new Header();
	if($b==1)
	    {
	       return  $head->head_Client();
	    }
	    else if($b==2)
	    {
	        
           return $head->head_Proprietaire();
	    }
	    else if($b==3)
	    {
	        
           return $head->head_Employe();
	    }
	    else if($b==4)
	    {
	        
           return $head->head_Admin();
	    }
	   
	    else if($b==6)
	    {
	        return $head->head();
	    }
	    
    }
}
?>
