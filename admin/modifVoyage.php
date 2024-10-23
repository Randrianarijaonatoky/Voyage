<?php

    require_once('../layouts/headAdmin.php');
    require_once('../model/modelAdmin.php');
    
    $voyage = select_voyage();
    // var_dump($voyage);
    // update_voyage();
    if(isset($_POST['btn_update'])){
        update_voyage();
    }


?>
    
    <div class="modification">
        <input type="hidden" value="<?= $voyage['id'] ?>" name="id_update">
        
        <h1 class='title'>Mettre à jour</h1>
        <form action="" method='POST' enctype='multipart/form-data' class="modification-content">
            <diV class="modifiactio-image">

                <img src="../upload/<?= $voyage['image'] ?>" alt=""  class="modification-image-img">
            </diV>
            <h2 class="modification-title"><?= $voyage['lieu'] ?></h2>
            <input type="file" name="new_image" id="" class="input">

            <div class="modification-price">

                <div class="">
                    <label for="date">Lieu du voyage:</label><br>
                    <input type="text" name="new_lieu" id="date" placeholder="lieu du voyage" class="modification-input" value="<?= $voyage['lieu'] ?>">
                    
                </div>
                <div class="">

                    <label for="date">Prix:</label><br>
                    <input type="text" name="new_prix" id="date" placeholder="Prix du voyage" class="modification-input" value="<?= $voyage['prix'] ?>">
                </div>

            </div>
            
            <div class="modification-date">
                <div class="ml-1">
                    <label for="date">Date debut</label><br>
                    <input type="date" name="new_dateDebut" id="date" placeholder="début du voyage" class="modification-input" value="<?= $voyage['dateDebut'] ?>">

                </div>
                <div class="">
                    <label for="date">Date fin</label><br>
                    <input type="date" name="new_dateFin" id="date" placeholder="fin du voyage" class="modification-input" value="<?= $voyage['dateFin'] ?>">

                </div>


            </div>

            
            <textarea name="new_desc" id="" cols="20" rows="4" placeholder='<?= $voyage['content'] ?>' class="modification-input w-100" "></textarea>
            <div class="">

                <button type='submit' name="btn_update" class='modification-btn btn1'>Mettre à jour</button> 
            </div>
        </form>

        
    </div>
<?php

  require_once('../layouts/footAdmin.php');


?>