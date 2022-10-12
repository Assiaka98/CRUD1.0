<?php require_once("/home/sakha/Bureau/Xampp/CRUD1.0/inclusion/bd.inc.php"); ?>
<?php require_once("/home/sakha/Bureau/Xampp/CRUD1.0/inclusion/header.inc.php"); ?>
<?php
/*$recup = $conect_ma_BD->query("SELECT * FROM eleves");*/
$resultat =executeRequete("SELECT * FROM eleves");
 
 

  echo "<table border= 2px style =margin:5px ;> <tr>";
  for($i=0; $i < $resultat->columnCount(); $i++) 
  {
    $Nom_colonne = $resultat->getColumnMeta($i);
    echo '<th>' .$Nom_colonne['name'].'</th>';
  }

  
    echo  '<th>Modifier</th>';
    echo '<th>Supprimer</th>';
    echo "</tr>";

  while($ligne = $resultat->fetch(PDO::FETCH_ASSOC))
  {
    echo '<tr>';
    foreach($ligne as $indice => $information)
    {
      echo '<td>' .$information . '</td>';
    }

    $id_eleve=$ligne['id_eleve'];
    echo '<form method ="POST" enctype = "multipart/form/data">';
    echo "<td><button name = 'modif', type = 'submit', value = '$id_eleve' >Modifier</button></td>";
    echo "<td><button name = 'supp', type = 'submit', value = '$id_eleve',  OnClick='return(confirm(\'En etes vous certain ?\'));'>Supprimer</button></td>";
    echo '</form>';
    echo '</tr>';
  }
  echo '</table>';




  if(isset($_POST['supp']))
  { 
    $résultat = executeRequete("SELECT * FROM eleves WHERE id_eleve=$id_eleve");
    //$elve_a_supprimer = $résultat->fetch(PDO::FETCH_ASSOC);
    //if(!empty($eleve_a_supprimer['id_eleve']));
    //$contenu .= '<div class="validation">Suppression du produit : ' . $id_eleve. '</div>';
     /*executeRequete("INSERT  INTO  archive(id_eleve, prenom, nom,  sexe, classe, prenom_t, nom_t, email, tel, profession,  date_inscrip, montant  VALUES ('$_POST[id_eleve]','$_POST[prenom]','$_POST[nom]','$_POST[sexe]', '$_POST[classe]', 
     '$_POST[prenom_t]','$_POST[nom_t]', '$_POST[email]', '$_POST[tel]', 
       '$_POST[profession]', '$_POST[date_inscrip]','$_POST[montant]') WHERE id_eleve='$_POST[id_eleve]'");*/
    executeRequete("DELETE FROM eleves WHERE id_eleve=$id_eleve");

  }



  if(isset($_POST['modif']))
  { 
    $id_eleve=$ligne['id_eleve'];
    $résultat = executeRequete("SELECT * FROM eleves WHERE id_eleve=$id");
    $resultat->fetch(PDO::FETCH_ASSOC); 
    var_dump($resultat);
  }



  
?>
<?php require_once ("/home/sakha/Bureau/Xampp/CRUD1.0/inclusion/footer.inc.php"); ?>


