<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo RACINE_SITE; ?>inclusion/css/style.css">
  <title>Document</title>
</head>
<body>
<header>
    <div class="conteneur">
       
     
       <div class="titre"> <a href="" title="Ecole_de_la_Reussite">Ecole de la Reussite</a> 
    </div>
    
         <nav>
          <?php
           if(employesEstConnecte())
           {
              echo '<a href="' . RACINE_SITE . 'admin/emploi_temps.php">Emploi du Temps</a>';
              echo '<a href="' . RACINE_SITE . 'conect_emp.php?action=deconnexion">Se deconnecter</a>';
            }
            if(employesEstConnecteEtEstSuperAdmin())
             { 
            
               echo '<a href="' . RACINE_SITE . 'admin/gestion_eleves.php">Gestion des eleves</a>';
               echo '<a href="' . RACINE_SITE . 'admin/gestion_employes.php">Gestion des employes</a>';
             }
    
             if(employesEstConnecteEtEstAdmin())
              {
                 
                  echo '<a href="' . RACINE_SITE . 'admin/gestion_eleves.php">Gestion des eleves</a>';                 
              }
             

                  if(eleveEstConnecte())
                  {
                    echo '<a href=" '. RACINE_SITE .'accueil.php">Accueil</a>';
                     echo '<a href="' . RACINE_SITE . 'profil.php">Votre profil</a>';
                     echo '<a href="' . RACINE_SITE . 'admin/emploi_temps.php">Emploi du Temps</a>';
                     echo '<a href="' . RACINE_SITE . 'conect_eleves.php?action=deconnexion">Se deconnecter</a>';
                   }    
              else
                 {
                    echo '<a href=" '. RACINE_SITE .'accueil.php">Accueil</a>'; 
                   echo '<a href=" '. RACINE_SITE .'employes.php">Employes</a>';
                    echo '<a href=" '. RACINE_SITE .'conect_eleves.php">Eleves</a>';
                     echo '<a href=" '. RACINE_SITE .'">Nous contacter</a>';
                     }
          ?>
                  
         </nav>
       </div>
       <div class="clear"></div>  
    </header>
</body>
</html>