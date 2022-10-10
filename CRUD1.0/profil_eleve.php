<?php require_once("inclusion/bd.inc.php"); 

if(!eleveEstConnecte()) header("location:conect_eleves.php");

$contenu .= '<p class ="centre"> Bonjour <strong>' .$_SESSION['eleves']['prenom'] .'</strong></p>';
$contenu .= '<div class="cadre"<h2>Voici vos informations</h2>';
$contenu .= '<p>Classe: '.$_SESSION['eleves']['classe'].'<br>';
$contenu .= '<p>Votre id est '.$_SESSION['eleves']['id_eleve'].'<br>';



 require_once("inclusion/header.inc.php"); 
  echo $contenu;
  require_once("inclusion/footer.inc.php");  