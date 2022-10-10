<?php require_once("/home/sakha/Bureau/Xampp/CRUD1.0/inclusion/bd.inc.php"); ?>
<?php require_once("/home/sakha/Bureau/Xampp/CRUD1.0/inclusion/header.inc.php"); ?>
<?php
/*$recup = $conect_ma_BD->query("SELECT * FROM eleves");*/
$recup =executeRequete("SELECT * FROM eleves");
 
 
  /**Affichage */ 
  $present = '';
  $abcent = '';
  echo "<table border= 2px style =margin:5px ;> <tr>";
  for($i=0; $i < $recup->columnCount(); $i++) 
  {
    $Nom_colonne = $recup->getColumnMeta($i);
    echo '<th>' .$Nom_colonne['name'].'</th>';
  }

    
    echo  '<th>Modifier</th>';
    echo '<th>Supprimer</th>';
    echo "</tr>";

  while($ligne = $recup->fetch(PDO::FETCH_ASSOC))
  {
    echo '<tr>';
    foreach($ligne as $indice => $information)
    {
      echo '<td>' .$information . '</td>';
    }
    /*$action = 'Modifier';
    $action1 = 'Suprimer';*/
    
    echo '<td><button<a href="?action=modification&id_eleve=' . $ligne['id_eleve'] .'">Modifier</a></button></td>';
    echo '<td><button<a href="?action=suppression&id_eleve=' . $ligne['id_eleve'] .'" OnClick="return(confirm(\'En etes vous certain ?\'));">Supprimer</a></button></td>';
    
    echo '</tr>';
  }
  echo '</table>';




  if(isset($_GET['action']) && $_GET['action'] == "suppression")
  { 
    $résultat = executeRequete("SELECT * FROM eleves WHERE id_eleve=$_GET[id_eleve]");
    $produit_a_supprimer = $résultat->fetch(PDO::FETCH_ASSOC);
    if(!empty($produit_a_supprimer['id_eleve']));
    $contenu .= '<div class="validation">Suppression du produit : ' . $_GET['id_eleve'] . '</div>';
    executeRequete("INSERT INTO  archive WHERE id_eleve=$_GET[id_eleve]");
    $_GET['action'] = 'affichage';
  }




  if(!empty($_POST))
  { 
  
  if(isset($_GET['action']) && $_GET['action'] == 'modification')
  {
    $bdd = $_POST['id_eleve'];
  }

  foreach($_POST as $indice => $valeur)
  {
    $_POST[$indice] = htmlEntities(addSlashes($valeur));
  }
  executeRequete("REPLACE INTO eleves (id_eleve, prenom, nom, sexe, classe, prenom_t, nom_t, email, tel, profession, date_inscrip,montant) values('$_POST[id_eleve]', '$_POST[prenom]', '$_POST[nom]', '$_POST[sexe]', '$_POST[classe]', '$_POST[prenom_t]', '$_POST[nom_t]',
  '$_POST[email]',  '$_POST[tel]', '$_POST[profession]','$_POST[date_inscrip]','$_POST[montant]')");
  $contenu .= '<div class="validation">Le produit a été ajouté</div>';
  $_GET['action'] = 'affichage';
  }



  
?>
<?php require_once ("/home/sakha/Bureau/Xampp/CRUD1.0/inclusion/footer.inc.php"); ?>


