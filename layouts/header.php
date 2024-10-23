<?php 
  session_start();
  require_once('../database/Db.php');

  Db();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" href="../public/css/camera.css">
    <link rel="stylesheet" href="../public/bootstrap-5.0.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../public/aos/dist/aos.css">
    <link rel="stylesheet" href="../public/fontawesome-free-6.0.0-web/css/all.min.css">
    <link rel="apple-touch-icon" href="../public/images/tokyy.jpg">
    
    <title>Voyages: <?=$titre?></title>
</head>
<body>
    <nav class="nav">
        
        <ul class="nav-listes">
            <?php if(isset($_SESSION['role']) && $_SESSION['role'] === 'user') { ?>
                <li><a href="../pages/accuil.php" class="nav-listes-liste">Accueil</a></li>
                <li><a href="../pages/voyages.php" class="nav-listes-liste">Voyages</a></li>
                <li><a href="../pages/contact.php" class="nav-listes-liste">Contact</a></li>
                
            <?php }  elseif(isset($_SESSION['role']) && $_SESSION['role'] === 'admin') { ?>
                <li><a href="../pages/accuil.php" class="nav-listes-liste">Accueil</a></li>
                <li><a href="../pages/voyages.php" class="nav-listes-liste">Voyages</a></li>
                <li><a href="../admin/dashboard.php" class="nav-listes-liste">Dashboard</a></li>
                <!-- <li><a href="../PayPal-JavaScript-FullStack-Standard-Checkout-Sample-main/client/checkout.php" class="nav-listes-liste">paypal</a></li> -->
                <?php } else { ?> 
                    <li><a href="../pages/accuil.php" class="nav-listes-liste">Accueil</a></li>
                    <li><a href="../pages/voyages.php" class="nav-listes-liste">Voyages</a></li>
                <li><a href="../pages/inscription.php" class="nav-listes-liste">inscription</a></li>
                
                <li><a href="../pages/contact.php" class="nav-listes-liste">Contact</a></li>

            <?php } ?>   


            
        </ul>
        <div class="nav-connexion">
            <?php if(isset($_SESSION['role']) && $_SESSION['role'] === 'user')  { ?>
                
                <a href="../secure/deconnexion.php" class="nav-connexion-txt">Deconnexion</a>
                <?php }  elseif(isset($_SESSION['role']) && $_SESSION['role'] === 'admin') { ?>
                    <a href="../secure/deconnexion.php" class="nav-connexion-txt">Deconnexion</a>
                
            <?php }  else { ?> 
                <a href="../pages/connexion.php" class="nav-connexion-txt">connexion</a>
            <?php } ?>  



            
        </div>

     </nav>


     <!-- <div class="navigation" id="navigation"   > 
        <a href="../pages/<?= $titre ?>.php" id="navigation">
            <i class="fa-solid fa-chevron-up navigation-btn"  ></i>
        </a>
     </div> -->
     
       
            <i class="fa-solid fa-chevron-up navigation-btn" id="navigation" style="display: none;"></i>
        
     

     <!-- <header class="header"> -->
    

        <!-- <div class="header-image"> -->
            <!-- <img src="../public/images/logo.png" alt="logo" class="header-image-logo"> -->
            <!-- <h1 class="header-image-title">MADA TOUR</h1> -->

        <!-- </div> -->
     
    <!-- </header> -->
