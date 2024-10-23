<?php
$titre = 'Insctiption';

    require_once('../layouts/header.php');
    require_once('../model/model.php');

    if(isset($_POST['btn-inscri'])){
        $messages = inscription();
    }
?>
    <section class='inscription'>
        <div class="inscription-profile">
            <!-- <img src="../public/images/00.jpg" alt="photo de profile" class="inscription-profile-img">
            <h2 class="incription-profile-title">Votre photo de profile</h2> -->
        </div>
        <form action="" class="inscription-form" method="POST" enctype="multipart/form-data">
            <h1 class="inscription-form-title">Inscrivez-vous</h1>
            <div class="messagesForm" style="text-align: center;">
            <?php if(isset($messages)) { ?>
                <?php if($messages) { ?>
                    <?php foreach($messages as $message) { ?> 
                        <h3 class="messages-alert"><?php echo $message ?> </h3>
                    <?php } ?> 

                <?php }else { ?> 
                    <h2 class='messages-succes'>Votre compte a ete creer avec succes</h2>
                    
                    <?php } ?> 
                    
            <?php } ?>


            </div>
            <div class="inscription-form-content">
                <input type="text" name="pseudo" id="" class="input" placeholder="Votre pseudo">
                <i class="fa-solid fa-user-large inscription-form-content-icon"></i>

            </div>
            
            <div class="inscription-form-content">
                <i class="fa-solid fa-envelope  inscription-form-content-icon"></i>
                <input type="email" name="email" id="" class="input" placeholder="Votre email">

            </div>

            <div class="inscription-form-content">
                <i class="fa-solid fa-lock inscription-form-content-icon"></i>

                <input type="password" name="password" id="" class="input" placeholder="Mot de passe">
            </div>
            
            <div class="inscription-form-content">
                <i class="fa-solid fa-lock inscription-form-content-icon"></i>
                <input type="password" name="passwordConfirm" id="" class="input" placeholder="confirmer  le mot de passe">

            </div>
            <label for="" class="label">Choisissez votre photo de profile</label>
            <input type="file" name="image" id="" class="input">
            <button type="submit" name="btn-inscri" class="inscription-from-btn btn1">S'inscire</button>
        </form>

        
    </section>
    
    
<?php

require_once('../layouts/footer.php');


?>