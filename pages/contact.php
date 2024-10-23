<?php
    $titre = 'Contact';
    require_once('../layouts/header.php');


?>
   <section class='connexion'>

       <form action="" method="post" class="connexion-form">
           <h1 class="connexion-form-title">Connacter moi</h1>
           <div class="inscription-form-content">
                <i class="fa-solid fa-envelope  inscription-form-content-icon"></i>
                <input type="email" name="email" id="" class="input" placeholder="Votre email">

            </div>
           <textarea name="" id="" class="input  textarea" placeholder="Votre Message.."></textarea>
           <button type="submit" class="contact-btn btn1">Envoyer</button>
   
       </form>
   </section>

    

    
<?php
    
    require_once('../layouts/footer.php');


?>