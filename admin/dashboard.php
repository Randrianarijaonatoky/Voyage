<?php

    require_once('../layouts/headAdmin.php');
    require_once('../model/modelAdmin.php');
    

    $nbr_user = nombre_users();
    $nbr_voyages = nombre_voyages();
    $nbr_admin = nombre_admin();
    $nbr_reservation = nbr_reservation();

    // require_once('../model/model.php');

    $comments = showCommentaires();
    $reservations = showReservation();


    if(isset($_POST['delete_avis'])){
        delete_comments();
        echo('mety');
    }



?>





        <div class="Dashboard-content">
            <?php

            require_once('../layouts/navDashboard.php');


            ?>

            <h1 class="Dashboard-content-title">Tableau de bord</h1>

            <div class="Dashboard-content-cards">
                <div class="Dashboard-content-cards-card">
                    
                    <div class="Dashboard-content-cards-card-item">
                        <h3 class="Dashboard-content-cards-card-item-title">Utilisateurs</h3>
                        
                        <h1 class="Dashboard-content-cards-card-nbr"><?= $nbr_user['totalUser'] ?></h1>
                    </div>
                    <a href="lesUtilisateur.php" class="fa-solid fa-users Dashboard-content-cards-card-icon"></a>
                    




                    
                </div>

                <div class="Dashboard-content-cards-card">

                    <div class="Dashboard-content-cards-card-item ">
                        
                        <h3 class="Dashboard-content-cards-card-item-title">Voyages</h3>
                        <h1 class="Dashboard-content-cards-card-nbr"><?= $nbr_voyages['totalVoyage'] ?></h1>

                    </div>

                    <a href="lesVoyages.php"  class="fa-solid fa-plane-departure Dashboard-content-cards-card-icon"></a>
    
                </div>
                
                <div class="Dashboard-content-cards-card">
                    
                    <div class="Dashboard-content-cards-card-item">
                        <h3 class="Dashboard-content-cards-card-item-title">Reservation</h3>
                        <h1 class="Dashboard-content-cards-card-nbr"><?= $nbr_reservation['totalReservation'] ?></h1>
                        
                    </div>
                    
                    <a href="reservation.php" class="fa-solid fa-hand-holding-dollar Dashboard-content-cards-card-icon"></a>
                    
                </div>

                <div class="Dashboard-content-cards-card">

                    <div class="Dashboard-content-cards-card-item ">
                        
                        <h3 class="Dashboard-content-cards-card-item-title">Admin</h3>
                        <h1 class="Dashboard-content-cards-card-nbr"><?= $nbr_admin['totalAdmin'] ?></h1>

                    </div>

                    <a class="fa-solid fa-lock Dashboard-content-cards-card-icon"></a>
    
                </div>

                

                

            </div>


            <div class="Dashboard-content-cards1">
                <div class="Dashboard-content-cards1-reserva">
                    <h1 class="Dashboard-content-cards1-reserva-title" >Reservation <hr></h1>
                    
                    <div class="Dashboard-content-cards1-reserva-card">
                        <?php foreach ($reservations as $reservation) { ?>
                            <div class="Dashboard-content-cards1-reserva-listes">
        
                                <figure class="Dashboard-content-cards1-reserva-listes-profil">
                                    <img class="Dashboard-content-cards1-reserva-listes-profil-img" src="../upload/<?= $reservation['profile'] ?>" alt="">
                                    <div class="Dashboard-content-cards1-reserva-listes-profil-text">
                                        <h4><?= $reservation['nom'] ?></h4>
                                        <p class=""><?= $reservation['email'] ?></p>
                                    </div>
                                </figure>
        
                                <div class="Dashboard-content-cards1-reserva-detail">
                                    <div class="Dashboard-content-cards1-reserva-list">
                                        <i class="fa-solid fa-location-dot Dashboard-content-cards1-reserva-list-icon"></i>
                                        
                                        <p class="Dashboard-content-cards1-reserva-list-value">Toliara</p>
                                    </div>
                                    <div class="Dashboard-content-cards1-reserva-list">
                                        <i class="fa-solid fa-money-bill-1 Dashboard-content-cards1-reserva-list-icon"></i>
                                        
                                        <p class="Dashboard-content-cards1-reserva-list-value"><?= $reservation['montant'] ?></p>
                                    </div>
        
                                    <a href="reservation.php" class="">Detail</a>
        
                                </div>
            
                            </div>
                        <?php } ?>


                    </div>
                

                    
                    <a href="reservation.php">Voire les details</a>
                </div>

                <div class="Dashboard-content-cards1-avis">
                    <h1 class="Dashboard-content-cards1-reserva-title">Commentaire <hr></h1>

                    <div class="Dashboard-content-cards1-avis-content">
                        
                        <div class="Dashboard-content-cards1-avis-content-cards">
                            <?php foreach ($comments as  $comment) { ?>
                                
                                <div class="Dashboard-content-cards1-avis-content-cards-card">
                                    
    
                                    <figure class="Dashboard-content-cards1-avis-content-cards-card-profil">
                                        <img class="Dashboard-content-cards1-avis-content-cards-card-profil-img" src="../upload/<?= $comment['profile'] ?>" alt="">
                                        <div class="Dashboard-content-cards1-avis-content-cards-card-profil-text">
                                            <h4 class="Dashboard-content-cards1-avis-content-cards-card-profil-pseudo"><?= $comment['pseudo'] ?></h4>
                                            <div class="Dashboard-content-cards1-avis-content-cards-card-profil-text-desc">
                                                <p class=""><?= $comment['commentaires'] ?></p>
    
                                            </div>
                                        </div>
    
      
                                    </figure>
                                    <form action="" method="post" class="Dashboard-content-cards1-avis-content-cards-card-profil-delete">
                                        <button type="submit" name='delete_avis' class="btn-delete">

                                            <i class="fa-regular fa-trash-can LesUtilisateurs-cards-card-btn-listes-delete lesVoyages-cards-card-btn-listes-delete" name='delete_avis'></i>
                                        </button >
                                        <input type="hidden" name='id_comments' value='<?= $comment["id"] ?>'>
    
                                    </form>
    
                                </div>



                            <?php } ?>
                            


                        </div>

                    </div>
                </div>

            </div>
            


        </div>



    

<?php

  require_once('../layouts/footAdmin.php');


?>