<?php
function executeRequete($req)
     {
         global $pdo;
         $resultat = $pdo->query($req);
         if(!$resultat)
         {
             die("Erreur sur la requette sql.<br>Message :" .$pdo ->error ."<br>Code :" .$req);
         }
         return $resultat;
     }

     function employesEstConnecte()
    {
        if(!isset($_SESSION['employes'])) 
        return false;
        else 
        return true;
    }

    function employesEstConnecteEtEstAdmin()
    {
        if(employesEstConnecte() && $_SESSION['employes']['statut'] == 1)
         return true;
        else return false;
    }

    function employesEstConnecteEtEstSuperAdmin()
    {
      if(employesEstConnecte() && $_SESSION['employes']['statut'] == 2)
         return true;
        else return false;
    }

    function eleveEstConnecte()
    {
        if(!isset($_SESSION['eleves'])) 
        return false;
        else 
        return true;
    }
?>