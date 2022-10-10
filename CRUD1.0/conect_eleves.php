<?php require_once("inclusion/bd.inc.php"); ?>

<?php

if(isset($_GET['action']) && $_GET['action']== "deconnexion")
{
    session_destroy();
}

if(eleveEstConnecte())
{
    header("location:profil_eleve.php");
}


  if($_POST)
  {
    $résultat = executeRequete("SELECT * FROM eleves WHERE email='$_POST[mail]'");
    if($résultat->rowCount() != 0)
    {
      $eleves = $résultat->fetch(PDO::FETCH_ASSOC);
      if($eleves['tel'] == $_POST['mdp'])
      {
          foreach($eleves as $indice => $element)
          {
            if($indice != 'mdp')
            {
              $_SESSION['eleves'][$indice] = $element;
            }
          }
        header("location:profil_eleve.php");
      }
      else { $contenu .= '<div class="erreur">Mot de passe incorecte</div>';}
    }
    else{$contenu .= '<div class="erreur">Mail incorrecte</div>';}
  }
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php require_once("inclusion/header.inc.php"); ?>
<?php echo $contenu ;?>
  <div class="container">
    <form method="POST" action="">
      <p>
        <label for="mail">Mail</label><br>
        <input type="email" id="pseudo" name="mail" maxlength="20" class="case"placeholder="Votre email"title="Carracteres accepte a-zA-Z0-9-_." required="required"><br>
      </p><br>
      <p>
          <label for="mdp">Mot de Passe</label><br>
          <input type="password" id="mdp" name="mdp" class="case" required="required"><br>
        </p><br>
        <p>
          <input type="submit" value="Se connecter" class="btn" >
        </p>
      </form> 
  </div>
<div class="clear"></div>
</body>
</html>

<?php require_once("inclusion/footer.inc.php"); ?>