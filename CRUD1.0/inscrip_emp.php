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
                    executeRequete("INSERT INTO employes (prenom, nom, email,mdp, sexe, profession, ville, cp, adresse, date_embauche) 
                    VALUES ('$_POST[prenom]','$_POST[nom]', '$_POST[email]', '$_POST[mdp]', 
                     '$_POST[sexe]', '$_POST[profession]', '$_POST[ville]', '$_POST[cp]', '$_POST[adresse]','$_POST[date_embauche]')");
                    $contenu .= 
                    "<div class='validation'>
                        Vous êtes inscrit . <a href=\"connexion.php\"><u>Cliquez ici pour vous connecter</u></a>
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
        <label for="prenom">Prenom</label><br>
        <input type="text" id="prenom" name="prenom" placeholder="Votre Prenom"><br>
       <label for="nom">Nom</label><br>
       <input type="text" id="nom" name="nom" placeholder="Votre Nom" ><br>
       <label for="email">E-mail</label><br>
       <input type="email" id="email" name="email" placeholder="exemple@gmail.com" ><br>
       <label for="mdp">Mot de passe</label><br>
       <input type="password" id="mdp" name="mdp" required="required" ><br>
       <label for="sexe">Sexe</label><br>
       <input name="sexe" value="m" checked="" type="radio">Masculin
       <input name="sexe" value="f" type="radio">Feminin<br>
       <label for="taille">Profession</label><br>
           <select name="profession">
              <option value="prof">Professeur</option>
              <option value="insti">Instituteur</option>
              <option value="survei">Surveilleiant</option>
           </select><br><br>  
           <label for="date_inscrip">Date d'embauchement </label><br>
    <input type="date" name="date_embauche" placeholder="ex: 2015-07-30" id="prenom"><br><br>          
      <label for="ville">Ville</label><br>
       <input type="text" id="ville" name="ville" placeholder="Votre Ville" pattern="[a-zA-Z0-9-_.]{5,15}" title="caractères acceptés : a-zA-Z0-9-_."><br><br>
       <label for="cp">Code Postal</label><br>
       <input type="text" id="code" name="cp"placeholder="Votre Code Postal" pattern="[0-9]{5}" title="5 chiffres requis : 0-9"><br>
      <label for="adresse">Adresse</label><br>
      <textarea id="adresse" name="adresse" placeholder="votre dresse" pattern="[a-zA-Z0-9-_.]{5,15}" ="caractères acceptés : a-zA-Z0-9-_."></textarea><br><br>
      <input type="submit" name="inscription" value="S'inscrire"><br>
    </form> 
    </div>
    
  </body>
</html>



<?php require_once("inclusion/footer.inc.php"); ?>