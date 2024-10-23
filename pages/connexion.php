<?php
   $titre = 'Connexion';
    require_once('../layouts/header.php');
    require_once('../model/model.php');

    if(isset($_POST['btn-connect'])){
        $messages = connexion();
    }


?>
    <section class="connexion"> 
        <div>
          <!-- <img src="../public/images/00.jpg" alt=""> -->
        </div>

        <form action="" method="POST" class="connexion-form">
            <h1 class="connexion-form-title">Connectez-vous</h1>
            <div style="text-align: center;" class='messages'>
                <?php if(isset($messages)) { ?>
                    <?php if($messages) { ?>
                    <?php foreach($messages as $message) { ?> 
                           <h3 class="messages-alert"><?php echo $message ?> </h3>
                        <?php } ?> 

                    <?php }else { ?> 
                    <h2 class='messSucces'>Mety</h2>
                    
                    <?php } ?> 
                    
                <?php } ?>
                    
            </div>
            <div class="inscription-form-content ">
                <i class="fa-solid fa-envelope  inscription-form-content-icon"></i>
                <input type="email" name="email" id="" class="input" placeholder="Votre email">

            </div>
            <div class="inscription-form-content">
                <i class="fa-solid fa-lock inscription-form-content-icon"></i>

                <input type="password" name="password" id="" class="input" placeholder="Mot de passe">
            </div>
            <button type="submit" name="btn-connect" class="connexion-form-btn btn1">Connexion</button>

            <p class='text-center mt-2'> Créer votre compte
                <a href="inscription.php">Inscivez-vous</a>
            </p>
        </form>
    </section>

<?php

require_once('../layouts/footer.php');


?>
