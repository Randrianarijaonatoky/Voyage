<?php
    $titre = 'Reservation ' . $_GET['id'];
    require_once('../layouts/header.php');
    // require_once('../model/modelAdmin.php');
    // require_once('../model/model.php');
    include_once('../model/model.php');

    
    
    $voyage = select_voyage();
    
    
   
    if(isset($_POST['test'])){
        
        // echo'mety';
        reservation();
        // test();
    }
    
    
    if(isset($_POST["btn-confirm"])){
        echo'mety';
    }
    
    
?>

<div class="reserva-fond">
    <img src="../upload/<?= $voyage["image"] ?>" alt="" class="reserva-fond-img">
</div>

<div class="reserva">
    
    <form class="voyageDetail-reservation" action="" method="POST" >
        <!-- <i class="fa-solid fa-xmark voyageDetail-reservation-croix  "></i> -->
        <h2 class="voyageDetail-reservation-title">Faite votre réservation</h2>
        
        <h2 class="voyageDetail-reservation-title text-danger" ><?= $voyage["lieu"] ?></h2>
        <p class="text-center">Place disponible: <?= $voyage["nombrePlace"] ?> </p>
        <input type="hidden" value="<?= $voyage["id"] ?> " name="id_voyage">
        <input type="hidden" value="<?= $voyage["lieu"] ?> " name="lieu">
        
        <div class="voyageDetail-reservation-content " >

            <label for="nom">Nom</label><br>
            <input type="text" id="nom" placeholder="entre votre nom" name="nom" class="voyageDetail-reservation-input input"><br>

            <label for="email">email</label><br>
            <input type="email" id="email" placeholder="entre votre email" class="voyageDetail-reservation-input input" name="reservation_email"><br>

            
            <label for="nom">Numero télephone</label><br>
            <input type="text" id="nom" placeholder="+261....." name="contact" class="voyageDetail-reservation-input input"><br>
    

                
            
            <div class="voyageDetail-reservation-nombre">
                <label for="destination">Nombres de personne</label>
    

                <input type="number" id="inputNumber" min="1" max="<?= $voyage["nombrePlace"] ?>" name="inputNumber" <?= $voyage["nombrePlace"] ?> value="1">


               
                
                <!-- <div class="voyageDetail-reservation-nombre-boutton">
                    <button id="plus"   class="voyageDetail-reservation-nombre-boutton-btn" onclick="">+</button>
                    <p class="text-center voyageDetail-reservation-nombre-boutton-nbr">1</p>
                    <button id="moin" class="voyageDetail-reservation-nombre-boutton-btn">-</button>
                </div> -->

            </div>

            
        </div>

                    <!-- <p id="result"  class="text-center"></p> -->
        <?php 
        
            // $num =intval($_POST['num']);
            // $test = $_POST['prix'];

    
               
            //   $prix = $voyage["prix"] ;

            //   $prix = intval($prix);
            //   $montant =  $prix * $num;

            //   echo($prix);
                
        ?>

        
        <h2 class="voyageDetail-reservation-price" >Montant total: <span id='result' name="prix"><?= $voyage['prix']?></span></h2>
        <input type="hidden" name="prix" id="prix" value="<?= $voyage['prix']?>">

        
        <!-- montant ampidirna anty base de donné -->
        <input type="hidden" id="DbPrice" name="Db_Price" value="<?= $voyage['prix']?>" >


        <!-- <button type="submit" class="voyageDetail-reservation-btn1 btn1 btn-confirm">Confirmer</button> -->
        <button type="submit" onclick="" class="voyageDetail-reservation-btn1 btn1 btn-confirm" name="test">Confirmer</button>
        <a href="voyages.php" class="voyageDetail-reservation-btn2 ">Annuler</a>

        
    </form>
    
</div>

<?php

require_once('../layouts/footer.php');


?>