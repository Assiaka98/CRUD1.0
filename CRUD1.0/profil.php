<?php require_once("inclusion/bd.inc.php"); 

if(!employesEstConnecte()) header("location:conect_emp.php");

$contenu .= '<p class ="centre"> Bonjour <strong>' .$_SESSION['employes']['prenom'] .'</strong></p>';
$contenu .= '<div class="cadre"<h2>Voici vos informations</h2>';
$contenu .= '<p>Votre email est '.$_SESSION['employes']['email'].'<br>';
$contenu .= '<p>Votre ville est '.$_SESSION['employes']['ville'].'<br>';
$contenu .= '<p>Votre code postal est '.$_SESSION['employes']['cp'].'<br>';
$contenu .= '<p>Votre adresse est '.$_SESSION['employes']['adresse'].'</p></div><br><br>';


 require_once("inclusion/header.inc.php"); 
  echo $contenu;
  require_once("inclusion/footer.inc.php");  
 ?>