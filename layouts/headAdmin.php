<?php 
   session_start();

   require_once('../database/Db.php');
   require_once('../model/modelAdmin.php');
   $users = list_user();

   Db();

//    $date = getDb()->query("SELECT colone_timestamp, FROM_UNIXTIME(colone_timestamp) as valeur_datetime, CAST(FROM_UNIXTIME(colone_timestamp) as date) as valeur_date FROM avis ");
//    $date->execute();
//    var_dump($date);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" href="../public/fontawesome-free-6.0.0-web/css/all.min.css">
    <link rel="stylesheet" href="../public/bootstrap-5.0.2-dist/css/bootstrap.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>Dashboard</title>
</head>
<body>

    
    <section class="Dashboard">
        
        
     
            <ul class="Dashboard-listes">
                
                <li class='Dashboard-listes-profile'>
                        
                       <img src="../upload/<?= $_SESSION['profile'] ?>" alt="" class="dashboardNav-profile-img">
                       <p class="Dashboard-listes-profile-pseudo"><?= $_SESSION['pseudo'] ?></p>
                       
                    </li>

                



                <a href="../pages/accuil.php" class="Dashboard-listes-accueil lien-nav">
                    <i class="fa-solid fa-arrow-left-long  Dashboard-listes-icons"></i>
                    Accueil 
                    
                </a>

                <hr>
                <li>
                    
                    <a href="../admin/dashboard.php" class="Dashboard-listes-liste lien-nav">
                        <i class="fa-solid fa-gauge  Dashboard-listes-icons"></i>
                        Tableau de bord
                    </a>
                </li>
                <hr>

                <h4 class="Dashboard-listes-titleVoyage lien-nav">
                    <i class="fa-solid fa-plane-departure Dashboard-listes-icons"></i>
                    Voyages 
                    <i class="fa-solid fa-chevron-down Dashboard-listes-btn1"></i> 
                    <i class="fa-solid fa-chevron-up Dashboard-listes-btn1-2" style="display: none;" ></i> 
                </h4>
                <div class="Dashboard-listes-voyage" style="display: none;" >
                    <div class="Dashboard-listes-Utilisateur-content">
                       

                            <a href="../admin/lesVoyages.php" class='lien-nav'>Tous les voyages</a><br>
                        
                        <a href="../admin/ajoutVoyage.php" class='lien-nav'>Ajouté une voyage</a><br>

                    </div>
                </div>
                <hr>

                <h4 class="Dashboard-listes-titleUtilisateur lien-nav">
                    <i class="fa-solid fa-user-group  Dashboard-listes-icons"></i>
                    Utilisateurs 
                    <i class="fa-solid fa-chevron-down Dashboard-listes-btn2  Dashboard-listes-icons"></i> 
                    <i class="fa-solid fa-chevron-up Dashboard-listes-btn2-1" style="display: none;" ></i> 
                </h4>
                <div class="Dashboard-listes-Utilisateur" style="display: none;" > 
                    <div class="Dashboard-listes-Utilisateur-content">

                        <a href="../admin/lesUtilisateur.php" class='lien-nav'>Tous les Utilisateurs </a><br>
                        <a href="" class='lien-nav'>Modification</a><br>
                    </div>
                    
                </div>
                <hr>

                <a class="Dashboard-listes-titleUtilisateur-reserv lien-nav" href='../admin/reservation.php'>
                    <i class="fa-solid fa-comments-dollar  Dashboard-listes-icons"></i>
                    Réservation    
                </a>


                
                

            </ul>




            