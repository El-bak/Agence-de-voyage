<?php

$user = 'root';
$pass = '';

try 
{
  
  $db = new PDO ('mysql:host=localhost;dbname=myoo agency', $user, $pass);
  foreach ($db->query('SELECT * FROM circuit') as $row) 
  {

  }

}
 catch (PDOException $e) 
{
  print "Erreur :" . $e->getMessage() . "<br/>";
  die;
}


?>


<!DOCTYPE.HTML>
<html>
<head>
<meta charset="UTF-8" />
<link rel="stylesheet" type="text/css" href="Style.css">
  <title>Travel Agency</title>
</head>
<body style="background-color: lightblue">
	<!--Partie Header-->
<header> <!--frere de div--> 
<h1 class="color">Travel Agency<span class="Orange">.</span></h1>
   <nav>
      <ul>
            <li><a href="http://localhost:8080/Travelagency/#">Acceuil</a></li>
            <li><a href="http://localhost:8080/Travelagency/steps.html">Destination</a></li>
          <li><a href="http://localhost:8080/Travelagency/possibilities.html">Circuits</a></li>
            <li><a href="http://localhost:8080/Travelagency/contact.html">Contact</a></li>
          <li><a  href="http://localhost:8080/Travelagency/#">se connecter</a></li> <!--lien pour la page se connecter--> <!--login = c'est une page entiere--><!--# sa renvoie vers la mm page-->
      </ul>
    </nav>
</header>
<div style="display: flex; flex-direction: column; ">  <!--style: permet d'écrire directe les codes Css--> <!-- flex-direction = pour aligner en forme de colonne-->
  <div style="display: flex; flex-direction: row; justify-content: center; background-color: beige"> <!--row = pour faire une ligne--> <!-- justify-center = pour centrer-->
    <div class="login-div" style="width: 400px; height: auto; border: 1px black solid; display: flex; flex-direction: column; justify-content: space-around;" > <!--crée la  ligne noire--> <!-- justify-content : space-around
  = espace les bords, les divisions,...-->
     <h1 style="font: 30px 'Arial', sans-serif; font-weight: bold; text-align: center; margin-bottom: 20px;">Connection</h1>
       <div style="display: flex; flex-direction: row; justify-content: center;">
         <form method="post" action="#" style="margin: 0px 0 20px 0; padding: 0 30px;display: flex; flex-direction: column; ">   <!--formulaire (post/get = pour créer des comptes) (action = c'est la traitement vers une page-->
       <label for="nom">Nom d'utilisateur</label> <!---->
         <input style="height: 30px; width:220px;" type="text" name="nom"> <!--c'est la boite qui contiendra le nom de l'utilisateur-->
         <br>

        <label for="passeword"> Mots de passe</label> <!--en mettant label avant input permet de faire apparaitre le nom--> 
         <input style="height: 30px; width:220px;" type="password" name="passeword">
        <button style="margin: 20px 40% 0 40% ">OK</button> 
        <a id="forget password" href="http://localhost:8080/Travelagency/rsl/"
          <div> <!--pour empecher les arrengement des anciens divs-->
            <input type="checkbox" name="Chigou">
           <label for="Chigou"> Garder ma putain de session active </label>
          </div>
               <a href="Inscription.php">S'inscrire</a>
      </form> 
       </div>
    </div>
  </div> 
</div>
</body>
</html>
