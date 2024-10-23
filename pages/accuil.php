<?php

  $titre= 'accuil';
      require_once('../layouts/header.php');
      require_once ('../model/model.php');

      if (isset($_POST['btn-comment'])) {
        $messages = commenter();
        // echo("mety");
      }

    $comments = showCommentaires();
    $guides  = showGuides();
    
    
    
   


?>

     <section class="acceuil">
         <!-- Carousel -->
          <div id="demo" class="carousel slide" data-bs-ride="carousel">
     
         <!-- Indicators/dots -->
         <!-- <div class="carousel-indicators">
           <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
           <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
           <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
         </div> -->
       
         <!-- The slideshow/carousel -->
         <div class="carousel-inner">
           <div class="carousel-item active">
             <img src="../public/images/image1.jpg" alt="Los Angeles" class="d-block w-100 acceuil-img">
             <!-- <video src="../public/videos/lv_0_20240609200738~2.mp4" class="acceuil-video" loop type='video/mp4'></video> -->
           </div>
           <div class="carousel-item">
             <img src="../public/images/image2.jpg" alt="Chicago" class="d-block w-100 acceuil-img">
           </div>
           <div class="carousel-item">
             <img src="../public/images/image3.jpg" alt="New York" class="d-block w-100 acceuil-img">
           </div>
         </div>
       
         <!-- Left and right controls/icons -->
         <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
           <span class="carousel-control-prev-icon"></span>
         </button>
         <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
           <span class="carousel-control-next-icon"></span>
         </button>
          </div>

          <div class="acceuil-textes">
            <img src="../public/images/logo.png" alt="" class="acceuil-textes-logo">
            
            <h1 class="acceuil-textes-title">Voyagé et découvrire Madagascar</h1>
            <p class="acceuil textes-para">Si vous voulez voyagé et decouvrire Madagascar notre agence  est faite pour vous, connectez-vous pour decoucrire plus des voyages  et faites des réservations </p>

            <a href="contact.php" class="acceuil-textes-btn btn1">Contact</a>
          </div>

     </section>

     <section class="voyages">

        <div class="voyages-cards"   >
            <div class="voyages-cards-card" data-aos="fade-up" data-aos-duration="900">
                <img src="../public/images/1713518320816.jpg" alt="Nosy-Be" class="voyages-cards-card-img">
    
                <div class="voyages-cards-card-textes">
                    <h1 class="voyages-cards-card-textes-title">Voyagé</h1>
                    <h3 class="voyages-cards-card-textes-title1">à</h3>
                    <h2 class="voyages-cards-card-textes-price">Nosy Be</h2>
                    <?php if(isset($_SESSION['id'])) { ?>
                      <a href='voyages.php' class="voyages-cards-card-textes-btn btn1">Decouvrire</a>
                      <?php } ?>
                    
                    
                </div>
    
              </div>
              <div class="voyages-cards-card" data-aos="fade-up" data-aos-duration="1300">
                  <img src="../public/images/bemaraha.jpg" alt="" class="voyages-cards-card-img">
      
                  <div class="voyages-cards-card-textes">
                      <h1 class="voyages-cards-card-textes-title">Voyagé</h1>
                      <h3 class="voyages-cards-card-textes-title1">à</h3>
                      <h2 class="voyages-cards-card-textes-price"> Tsingy Bemaraha</h2>                     
                      <?php if(isset($_SESSION['id'])) { ?>
                        <a href='voyages.php' class="voyages-cards-card-textes-btn btn1">Decouvrire</a>
                      <?php } ?>
                  </div>
      
              </div>
            <div class="voyages-cards-card" data-aos="fade-up" data-aos-duration="1700">
                <img src="../public/images/1713635988382.jpg" alt="" class="voyages-cards-card-img">
    
                <div class="voyages-cards-card-textes">
                    <h1 class="voyages-cards-card-textes-title">Voyagé</h1>
                    <h3 class="voyages-cards-card-textes-title1">à</h3>
                    <h2 class="voyages-cards-card-textes-price">Diego</h2>
                    <?php if(isset($_SESSION['id'])) { ?>
                      <a href='voyages.php' class="voyages-cards-card-textes-btn btn1">Decouvrire</a>
                    <?php } ?>
                    
                </div>
    
            </div>
        </div>

        

         
     </section>

     <section class="equipes">
        <h2 class="equipes-title">Notre guides</h2>
        <div class="equipes-cards">
          <?php foreach($guides as $guide) { ?>
            <div class="equipes-cards-card" style="visibility: visible; animation-name: fadeInUp;"
                  data-aos="zoom-in"
                  data-aos-offset="300"
                  data-aos-duration="1000">
  
                  <div class="equipes-cards-card-bg"></div>
  
                  <div class="equipes-cards-card-content">
                    <figure class="equipes-cards-card-avatar">
                      <img src="../public/images/<?= $guide['profile'] ?>" alt="" class="equipes-cards-card-avatar-img" >
                    </figure>
                    <blockquote class="equipes-cards-card-textes">
                    
                      <h4 class="equipes-cards-card-textes-nom"> <?= $guide['nom'] ?></h4>
                      <!-- <p>à</p> -->
                      <i class="fa-solid fa-location-dot"></i>

                      <h5 class="equipes-cards-card-textes-lieu"><?= $guide['lieu'] ?></h5>
                    </blockquote>
                  </div>
  
            </div>
          <?php } ?>


        </div>
          
        </div>
     </section>


<section class="populaire">
  <h1 class="populaire-title">Voyages populaires </h1>
  <div class="populaire-cards">
    <div class="populaire-cards-card">
      <figure class='populaire-cards-card-figure'>
        <img src="../public/images/1714810040298.jpg" alt="" class='populaire-cards-card-figure-img'>
      </figure>

      <div class="populaire-cards-card-textes">
        <i class="fa-solid fa-location-dot"></i>
        <h5>Nosy-Be</h5>
      </div>

      <div class="populaire-cards-card-link">
        <a class="populaire-cards-card-link-txt " href="decouvert.php">
          Decouvire
          <i class="fa-solid fa-arrow-right-long"></i>
        </a>
      </div>

    </div>

    <div class="populaire-cards-card">
      <figure class='populaire-cards-card-figure'>
        <img src="../public/images/1713631464337.jpg" alt="" class='populaire-cards-card-figure-img'>
      </figure>

      <div class="populaire-cards-card-textes">
        <i class="fa-solid fa-location-dot"></i>
        <h5>Andrigitra</h5>
      </div>

    </div>

    <div class="populaire-cards-card">
      <figure class='populaire-cards-card-figure'>
        <img src="../public/images/1714810059869.jpg" alt="" class='populaire-cards-card-figure-img'>
      </figure>

      <div class="populaire-cards-card-textes">
        <i class="fa-solid fa-location-dot"></i>
        <h5>Saint Marie</h5>
      </div>

    </div>
    <div class="populaire-cards-card">
      <figure class='populaire-cards-card-figure'>
        <img src="../public/images/1713776251078.jpg" alt="" class='populaire-cards-card-figure-img'>
      </figure>

      <div class="populaire-cards-card-textes">
        <i class="fa-solid fa-location-dot"></i>
        <h5>Manambato</h5>
      </div>

    </div>
    <div class="populaire-cards-card">
      <figure class='populaire-cards-card-figure'>
        <img src="../public/images/1713635988382.jpg" alt="" class='populaire-cards-card-figure-img'>
      </figure>

      <div class="populaire-cards-card-textes">
        <i class="fa-solid fa-location-dot"></i>
        <h5>Diego</h5>
      </div>

    </div>


    <div class="populaire-cards-card">
      <figure class='populaire-cards-card-figure'>
        <img src="../public/images/1714810045833.jpg" alt="" class='populaire-cards-card-figure-img'>
      </figure>

      <div class="populaire-cards-card-textes">
        <i class="fa-solid fa-location-dot"></i>
        <h5>Toliara</h5>
      </div>

    </div>

  </div>
</section>


<section class="avis">
  <h1 class="avis-title">Avis</h1>
  <div class="avis-cards">
     <?php foreach ($comments as $comment) { ?>
        <div class="avis-cards-card" >
    
          <div class="avis-cards-card-profil" >
            <figure class="avis-cards-card-profil-avatar">
              <img src="../upload/<?= $comment['profile'] ?>" alt="" class="avis-cards-card-profil-avatar-img">
            </figure>
            <h4 class="avis-cards-card-profil-pseudo"><?= $comment['pseudo'] ?></h4>
          </div>
          
          <div class="avis-cards-card-comment">
          <?php 
              $date1 = $comment['createdAt'];
              $date = date(' d F Y  h:i a', strtotime($date1));
              
                      
          ?>
            <h4 class="avis-cards-card-comment-date"><?php echo $date ?></h4>
          <?php ?>
            
            <?php
              $date1 = $comment['createdAt'];
              $date = date(' h ', strtotime($date1));
              // echo($date);
              // echo date(' h:i:s '); 

              //second
              $sec =  date( 'd F Y h:i:s', strtotime($date1));
              // echo($sec);
              $sec = intval($sec);
              $sec_now =  date('s');
              $sec_now = intval($sec_now);
              // echo($sec_now);



              $time_sec = $sec_now - 60 ;

              //minutes 
              


              //heure
              $now = date('h');
              $date1 = intval($date);
              $now1 = intval($now);
              // echo($now1);

              $time = $now1 - $date1;
              // echo($time);
            ?>
              <?php if($sec_now <= 60){ ?>
                <!-- <p class="avis-cards-card-comment-date"><?php echo ("il y a quelque s'instant")?></p> -->

              <?php } elseif ($time <= 24) { ?>
                <!-- <p class="avis-cards-card-comment-date"><?php echo ('il y a ' .$time .' heurre')?></p> -->
                
                
              <?php } ?>

            
            <p><?= $comment['commentaires'] ?></p>
          </div>
            
        
        </div>
        
     <?php } ?>
     
     
     
    </div>

  </div>
  <?php if(isset($_SESSION['id'])) { ?>
    <form action="#avis" method="post" id="avis">
      <div class="avis-comment">
        <textarea name="commentaire" id="" class="avis-comment-textarea" placeholder='votre avis'></textarea>
        <button type="submit" class='btn1' name="btn-comment">Envoyer</button>
      </div>

    </form>
  <?php } ?>

</section>



     <!-- <section class="contactAcceuil">
      
      <div class="contactAcceuil-content">
        <h1 class="contactAcceuil-content-title">AVENTURE</h1>
        <div class="contactAcceuil-content-aventure" >

          <figure class="contactAcceuil-content-aventure-figure">
            <img src="../public/images/1713508840264.jpg" alt="" class="contactAcceuil-content-aventure-figure-img">
          </figure>
          
          <div class="contactAcceuil-aventure-textes">
            <h4 class="contactAcceuil-aventure-textes-title">Mada Tour</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, doloribus! Corporis sequi ullam possimus porro.</p>
          </div>

        </div>
          
      </div>

      <form action="" class="contactAcceuil-contact">
        <h1 class="contactAcceuil-contact-title">CONTACTER NOUS</h1>
        <input type="email" name="" id="" placeholder=' email' class="contactAcceuil-contact-input">
        <textarea name="" id="" cols="2" rows="2" placeholder='votre message'  class="contactAcceuil-contact-input"></textarea>

        <button class="contactAcceuil-contact-btn">Envoyer</button>
      </form>



     </section> -->

    


     
<?php

    require_once('../layouts/footer.php');


?>
