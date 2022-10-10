<?php require_once("inclusion/bd.inc.php"); ?>
<?php require_once("inclusion/header.inc.php"); ?>
<?php
   if($_POST)
   {
       $verif_caractere = preg_match('#^[a-zA-Z0-9._-]+$#', $_POST['email']);
       if(!$verif_caractere && (strlen($_POST['email']) < 3 || strlen($_POST['email']) > 20) ) 
       {
          $contenu .= "<div class='erreur'>Veuillez saisir un mail correcte S.V.P</div>";  
       }
       else
           {
               $employes = executeRequete("SELECT * FROM employes WHERE email = '$_POST[email]'");
               if($employes->rowCount()!= 0)
               {
                   $contenu .= "<div class='erreur'>Vous avez deja un compte <a href=\"conect_emp.php\"><u>Cliquez ici pour vous connecter</u></a>.</div>";
                   echo "$contenu";
               }
               else
               {
                   foreach($_POST as $indice => $valeur)
                   {
                       $_POST[$indice] = htmlEntities(addSlashes($valeur));
                   }
                   executeRequete("INSERT INTO eleves (prenom, nom,  sexe, classe, prenom_t, nom_t, email, tel, profession,  date_inscrip, montant) 
                   VALUES ('$_POST[prenom]','$_POST[nom]','$_POST[sexe]', '$_POST[classe]', 
                   '$_POST[prenom_t]','$_POST[nom_t]', '$_POST[email]', '$_POST[tel]', 
                     '$_POST[profession]', '$_POST[date_inscrip]','$_POST[montant]')");
                   $contenu .= 
                   "<div class='validation'>
                      l eleve a bien ete a inscrit
                   </div>";
                   echo "$contenu";
               }
           }
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
  <div class="inscrip_employes">
  <form method="POST" action="">
    <label for="prenom">Prenom de l'eleve</label><br>
    <input type="text" name="prenom" placeholder="prenom" id="prenom" required=""><br><br>
    <label for="prenom">Nom de l'eleve</label><br>
    <input type="text" name="nom" placeholder="nom" id="nom" required=""><br><br>
    <label for="sexe">Sexe</label><br>
    Garçon <input type="radio" name="sexe" placeholder="sexe" id="sexe" value="m" checked=""> -
    Fille <input type="radio" name="sexe" placeholder="sexe" id="sexe" value="f"> <br><br>
    <label for="classe">Classe</label><br>
    <select name="classe">
      <option value="6eme">6eme</option>
      <option value="5eme">5eme</option>
      <option value="4eme">4eme</option>
      <option value="3eme">3eme</option>
    </select><br><br>
    <label for="prenom">Prenom du tuteur</label><br>
    <input type="text" name="prenom_t" placeholder="prenom" id="prenom" required=""><br><br>
    <label for="prenom">Nom du tuteur</label><br>
    <input type="text" name="nom_t" placeholder="nom" id="nom" required=""><br><br>
    <label for="email">E-mail</label><br>
    <input type="email" id="email" name="email" placeholder="exemple@gmail.com" ><br>
    <label for="prenom">Telephone</label><br>
    <input type="text" name="tel"  id="prenom" required=""><br><br>
    <label for="prenom">Profession tuteur</label><br>
    <input type="text" name="profession"  id="prenom" required=""><br><br>
    <label for="date_inscrip">Date d'inscription </label><br>
    <input type="date" name="date_inscrip" placeholder="ex: 2015-07-30" id="prenom"><br><br>
    <label for="montant">Montant</label><br>
    <input type="text" name="montant" placeholder="montant" id="salaire"><br><br>
    <input type="submit"><br><br>
  </form>
  </div>

</body>
</html>

<?php require_once("inclusion/footer.inc.php"); ?>