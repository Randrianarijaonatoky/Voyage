<?php

    require_once('../layouts/headAdmin.php');
    require_once('../model/modelAdmin.php');

    if(isset($_POST['poster'])){
        // echo "poster";
        $messages = addVoyage();
    }


?>




   <form class="modification" action="" method='POST' enctype='multipart/form-data'>
        <h1 class='title'>Ajouter une voyage</h1>
        <?php if(isset($messages)) { ?>
            <?php foreach($messages as $message) { ?> 
                <h3 class='message'><?= $message ?> </h3>
            <?php } ?> 

        <?php }?> 
        <img src="" alt="" id="image-pic"  class="modification-img">
        <h2 class="modification-title"></h2>
        <input type="file" name="image" id="image-file" class="input" >
        <div class="w-60 m-auto ">
            <label for="date" >Lieu du voyage:</label><br>
            <input type="text" id="date" name='lieu' placeholder="lieu du voyage" class="modification-input">
            
        </div>
        <div class="modification-date">
            <div>
                
                <label for="date" class='modification-date-label'>Date début</label>
                <input type="date" id="date" name='dateDebut' placeholder="début du voyage" class="modification-input  ">
            </div>
            <div class="">

                <label for="date" class='modification-date-label'>Date Fin</label>
                <input type="date" id="date" name='dateFin' placeholder="fin du voyage" class="modification-input ">
            </div>

            <div>

                <label for="date" class='modification-date-label'>Prix:</label>
                <input type="text" id="date" name='prix' placeholder="Prix du voyage" class="modification-input ">
            </div>
            <div>

                <label for="date" class='modification-date-label'>Nombre de place:</label>
                <input type="number" id="date" name='nombre' max="60" min="1" class="modification-input ">
            </div>



        </div>

        
        <textarea name="desc" id="" cols="30" rows="7" placeholder='votre description...' class="modification-input"></textarea>

        <button class='modification-btn btn1'  name='poster'>Poster</button>
            
        
    </form>

<?php

  require_once('../layouts/footAdmin.php');


?>