<form action="réservation.php" method="post"
<p> bonjour le monde </p>

<div>
	<p>Entrer le code id de la réservation</p>
	<input type="text" name="Id" /> <br />
	<p>Entrer la date de réservation</p>
	<input type="text" name="Date_reservation"> <br />
	<p>Entrer le prix de réservation</p>
	<input type="text" name="Prix" /> <br />
	<input type="submit" value="Valider" /> <br />

</div>

<?php

$user = 'root';
$pass = '';

try 
{
  
  $db = new PDO ('mysql:host=localhost;dbname=myoo agency;charset=utf8', 'root', '');
  array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
  die('Erreur de connexion : ' . $e->getMessage());
}

$reponse = $db->query('Select * from reservation');

while ($donnees = $reponse->fetch())
{
	?>

	<p>
		identification de la réservation <?php echo $donnees['Id']; ?> <br />
		le  nombre de passager <?php echo $donnees['Nbre_passager']; ?> <br />
		la date de réservation <?php echo $donnees['Date_reservation']; ?> <br />
		le prix de la réservation <?php echo $donnees['Prix']; ?> <br />
		identification du client <?php echo $donnees['Id_1']; ?> <br />
   </p>

   <?php
  try
  {
    $Id = ($_POST['Id']);
    $Id_1 = ($_POST['Id_1']);
    $Date_reservation = ($_POST['Date_reservation']);
    $Nbre_passager = ($_POST['Nbre_passager']);
    $Prix = ($_POST['Prix']);

    $req = $bd->prepare('insert into reservation(Id, Id_1, Date_reservation, Nbre_passager, Prix) values (:5, :6, :23/12/2023, :103, :957)');

    $req->execute(array(
    	'Id' => $Id,
    	'Id_1'   => $Id_1,
    	'Date_reservation'   => $Date_reservation ,
    	'Nbre_passager'   => $Nbre_passager,
    	'Prix'  => $Prix
    ));
   echo('La nouvelle réservation avec insert requete préparée a bien été enregistré avec les données suivantees '. $_POST['Id']. ' ' .$_POST['Id_1']. ' ' .$_POST['Date_reservation']. ' ' .$_POST['Nbre_passager']. ' ' .$_POST['Prix']);

     echo('<br />'. '<br />');
   }
  catch (Exception $e)
  {
    die('Erreur d\'insertion avec variable ou enregistrement déjà existant'. $e->getMessage());
  }

   ?>

   <?php
}
  $reponse->closeCursor();
  ?>
