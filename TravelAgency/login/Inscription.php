<?php
$Connection= mysqli_connect("localhost","root","", "myoo agency");

$Erreur_tableau=array(); //un tableau qui contiendra les erreurs
function name () {
  global $Erreur_tableau ; // en mettant global, on utilise la var Erreur-tableau pour l'utiliser dans le local
 if (!isset($_POST['nom'])){ // pour verifier que le nom existe
  $Erreur_tableau['error_pas_de_nom']= 'Veuillez saisir un nom';  //le nom n'existe pas
  return false ; //c'est pour returner
  }
  else if($_POST['nom']==''){
   $Erreur_tableau['error_aucun_resultat']= 'Veuillez saisir un nom'; //le tableau existe mais il est vide
    return false ;
  }
 else {
  if (preg_match("%[^A-Za-z]%", $_POST['nom'])){
    $Erreur_tableau['error_aucune_lettre']= 'Votre nom ne doit contenir que des lettres';
    return false ;
  }
 }
 return true ;
}

function firstname () {
 global $Erreur_tableau ;
if (!isset($_POST['prenom'])){
  $Erreur_tableau['error_pas_de_prenom']= 'Veullez saisir un prenom';
  return false ;
 }
 else if($_POST['prenom']==''){
  $Erreur_tableau['error_aucun_resultat']= 'Veuillez saisir un prenom';
  return false ;
 }
 else {
  if (preg_match("%[^A-Za-z]%", $_POST['prenom'])){ //preg_match ("")
    $Erreur_tableau['error_aucune_lettre']= 'Votre prenom ne doit contenir que des lettres';
    return false ;
  }
 }
 return true ;
}

function nom_dutilisateur () {
  global $Erreur_tableau ;
if (!isset($_POST['nomU'])){
  $Erreur_tableau['error_pas_de_nomU']= 'Veuillez saisir un nomU';
  return false ;
 }
 else if($_POST['nomU']==''){
  $Erreur_tableau['error_aucun_resultat']= 'Veuillez saisir un nomU';
  return false ;
 }
 
} 

function Nido ($Connection) {  //création d'une fonction qui verifie si l'utilisateur existe
  global $Erreur_tableau ;
   $requete='SELECT * FROM users WHERE nickname =" ' . mysqli_real_escape_string($Connection, $_POST['nomU']) . '";'; // en cas ou un mauvais code (injection) a été mis, celui ne sera pas prise en compte.
   $resultat= mysqli_query($Connection, $requete);
   while ($_r= mysqli_fetch_array($resultat)) {  //$_r = requete pour recuper les resultats
     if($_POST['nomU']==$_r['nickname'])
     return true ;
   } 
   $Erreur_tableau ["erro_gnedzigni"]= 'le nom d\'utilisateur existe déjà';
   return false ;
 }
  function verificationDate() {
    global $Erreur_tableau;
    if (!isset($_POST['date'])) {$Erreur_tableau['error_noDate'] = "Veillez saisir une date de naissance."; return false;}
    else if (bonFormatDate($_POST['date'])) {
        foreach(explode("-",$_POST['date']) as $i) /*explode("séparateur", "chaine de caractère") est une fonction qui divise une chaine de caractère en plusieurs morceaux selon le séparateur et les met dans un tableau.*/  {
            if ($i == 0) {
              if (strlen(explode("-",$_POST['date'])[$i]) != 4) {
                  $Erreur_tableau['error_mauvaisFormatDate']="Mauvais format de la date"; return false;
              }
            }
            else {
              if (strlen(explode("-",$_POST['date'])[$i]) != 2){
                  $Erreur_tableau['error_mauvaisFormatDate']="Mauvais format de la date"; return false;
              }
            }
          foreach(range(0,strlen(explode("-",$_POST['date'])[$i])-1) as $j ) {
              if(preg_match("%[^0-9]%", explode("-",$_POST['date'])[$i][$j])){
                $Erreur_tableau['error_mauvaisFormatDate']="Mauvais format de la date"; return false;
              }
          }
        }
    }
    else return true;
  }
function bonFormatDate($date) { //Fonction qui vérifie le format de la date
    $nbTiret = 0;
    foreach(range(0, strlen($date)-1) as $i) // range($a, $b) --> [$a,$a+1, ... , $b] (condtion : $a <= $b) , fonction qui crée un tableau contenant tous les entier entre $a et $b ($a et $b inclu)   //strlen pour mettre la longueur de n'importe quel chaine de caractère
    // $tableau1 = array(); $tableau1["k"] = "Moi"; $tableau1[] = "Toi"; $tableau1[] = false;
      {
        if ($date[$i] == "-") $nbTiret++;
      }
    return ($nbTiret === 2);
    // if ($nbTiret == 2) return true;
    // else return false;
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
<div style="display: flex; flex-direction: row; justify-content: center; background-color: beige"> <!--row = pour faire une ligne--> <!-- justify-center = pour centrer-->
    <div class="login-div" style="width: 400px; height: auto; border: 1px black solid; display: flex; flex-direction: column; justify-content: space-around;" > <!--crée la  ligne noire--> <!-- justify-content : space-around
  = espace les bords, les divisions,...-->
     <h1 style="font: 30px 'Arial', sans-serif; font-weight: bold; text-align: center; margin-bottom: 20px;">Inscription</h1>
       <div style="display: flex; flex-direction: row; justify-content: center;">
         <form method="post" action="#" style="margin: 0px 0 20px 0; padding: 0 30px;display: flex; flex-direction: column; ">   <!--formulaire (post/get = pour créer des comptes) (action = c'est la traitement vers une page-->
       <label for="nom">Nom </label> <!---->
         <input style="height: 30px; width:220px;" type="text" name="nom"> <!--c'est la boite qui contiendra le nom de l'utilisateur-->
         <br>
         <label for="prenom">Prénom</label> <!---->
         <input style="height: 30px; width:220px;" type="text" name="prenom"> <!--c'est la boite qui contiendra le nom de l'utilisateur-->
         <br>
         <label for="nomU">Nom d'utilisateur</label> <!---->
         <input style="height: 30px; width:220px;" type="text" name="nomU"> <!--c'est la boite qui contiendra le nom de l'utilisateur-->
         <br>
         <label for="date">Date de naissance</label> <!---->
         <input style="height: 30px; width:220px;" type="date" name="date" id="date"> <!--c'est la boite qui contiendra le nom de l'utilisateur-->
         <br>
           
           <label for="sexe">Genre</label>
          <div> 

              <label for="Homme"> Homme
              <input type="radio" id="Homme" name="sexe" value="homme">
            </label>
              <label for="Femme"> Femme
              <input type="radio" id="Femme" name="sexe" value="femme">
            </label>
            </div>


            <br>

        <label for="passeword"> Mots de passe</label> <!--en mettant label avant input permet de faire apparaitre le nom--> 
         <input style="height: 30px; width:220px;" type="password" name="passeword" minlength="8">
              
              <br>

              <label for="Cpasseword">Confirmation du mots de passe</label> <!--en mettant label avant input permet de faire apparaitre le nom--> 
         <input style="height: 30px; width:220px;" type="password" name="Cpasseword" minlength="8">

        <button style="margin: 20px 40% 0 40% ">OK</button> 
          <div> <!--pour empecher les arrengement des anciens divs-->
            <input type="checkbox" name="Chigou">
           <label for="Chigou"> Garder ma putain de session active </label>
          </div>
      </form> 
       </div>
    </div>
  </div>
</body>
</html>