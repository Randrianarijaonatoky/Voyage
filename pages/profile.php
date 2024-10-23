<?php

  $titre= 'accuil';
      require_once('../layouts/header.php');
      require_once ('../model/model.php');


    
    
   


?>
<section class="profile">
    <h1 class="text-center">Bienvenue</h1>
    
    <div class="equipes-cards-card aos-init aos-animate profile-content" style="visibility: visible; animation-name: fadeInUp;" data-aos="zoom-in" data-aos-offset="300" data-aos-duration="1000">
      
        <div class="equipes-cards-card-bg profile-bg" ></div>
    
        <div class="equipes-cards-card-content">
            <figure class="equipes-cards-card-avatar">
            <img src="../upload/<?= $_SESSION['profile'] ?>" alt="" class="equipes-cards-card-avatar-img">
            </figure>
            <blockquote class="equipes-cards-card-textes">
            
            <h4 class="equipes-cards-card-textes-nom"><?= $_SESSION['pseudo'] ?></h4>
            <p><?= $_SESSION['email'] ?></p>
            
    
            <h5 class="equipes-cards-card-textes-lieu">******</h5>

            <a href="accuil.php">Acceuil</a>
            </blockquote>
        </div>
    
    </div>
</section>


<?php

    require_once('../layouts/footer.php');


?>
