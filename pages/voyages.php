<?php
    $titre = 'voyages';
    require_once('../layouts/header.php');
    require_once('../model/modelAdmin.php');
    // require_once('../model/model.php');
    $now = date('d F Y');
    

    if(isset($_POST['btn-reserva'])){
    }
    
    

    if(isset($_POST['btn-search'])){

       $message = [];
        if(count(recherche_voyage()) > 0 ) {
            $voyages = recherche_voyage();
            
        }
    }else {
        $voyages = list_voyage();
        
    }
    
    


?>
    
    <section class="voyageDetail" >
        <div class="voyageDetail-title">
            <h1 class="voyageDetail-title-titre">Tous les voyages disponibles:</h1>

            <form action="" class="voyageDetail-title-form" method="post">
                <input type="search" name="query" id="" class="voyageDetail-title-search" placeholder="Recherche...">
                <button type="submit" name="btn-search" class="voyageDetail-title-btn btn1">Rechercher</button>
            </form>

        </div>

        

        <div class="voyageDetail-cards">

            <?php foreach($voyages as $voyage) :?>  
        
                <div class="voyageDetail-cards-card">
                    <input type="hidden" value="<?= $voyage["id"] ?> " name="id_voyage">
                    <img src="../upload/<?= $voyage["image"] ?>" alt="<?= $voyage["lieu"] ?>" class="voyageDetail-cards-card-img">
        
                    <div class="voyageDetail-cards-card-textes">
                        <h1 class="voyageDetail-cards-card-textes-title"><?= $voyage["lieu"] ?> </h1>

                            <p class="lesVoyages-cards-card-date"><?= $voyage["dateDebut"] ?>  au <span><?= $voyage["dateFin"] ?></span></p>

                
                       
                        <div class="voyageDetail-cards-card-textes-content">
                            <p class="voyageDetail-cards-card-textes-content-para"><?= $voyage["content"] ?></p>
                            
                        </div>
                        <h6 class="voyageDetail-cards-card-textes-plc">Place: <?= $voyage["nombrePlace"] ?> </h6>
                        <hr>
                        <div class="voyageDetail-cards-card-textes-end">
                            <h2 class="voyageDetail-cards-card-textes-end-price"><?= $voyage["prix"] ?></h2>
                            <?php if(isset($_SESSION['id'])) { ?>
                            
                                <a href="reservation.php?id=<?= $voyage["id"] ?>" class="voyageDetail-cards-card-textes-end-btn btn1 btn-reserva">Réservé</a>
                            <?php } ?>

                        </div>
                    </div>
        
                </div>

                <?php endforeach?> 
                
                
            </div>




    </section>


<?php

require_once('../layouts/footer.php');


?>