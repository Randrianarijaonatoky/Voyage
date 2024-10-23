<?php

    require_once('../layouts/headAdmin.php');
    require_once('../model/modelAdmin.php');

    $users = list_user();
    $nbr_user = nombre_users();

    if(isset($_POST['delete'])){
      delete_users();
      
      
      
   }

//    $date = '2012-11-20';
// echo date('F d Y', strtotime($date));


?>

   <div class='LesUtilisateurs'>
      <?php

         require_once('../layouts/navDashboard.php');


      ?>
      <h3 class='LesUtilisateurs-title'>Tous les Utilisateurs (<?= $nbr_user['totalUser'] ?>)</h3>
        <div class="LesUtilisateurs-cards">
            <?php foreach ($users as $user) :?>
               
               <div class="LesUtilisateurs-cards-card">

                  <figure class="LesUtilisateurs-cards-card-avatar">
                        <img src="../upload/<?= $user['profile'] ?>" alt="" class="LesUtilisateurs-cards-card-avatar-img">
                  </figure>
               
                  <h3 class="LesUtilisateurs-cards-card-pseudo"><?= $user['pseudo'] ?></h3>
                  <p class="LesUtilisateurs-cards-card-email"><?= $user['email'] ?></p>

                  <div class="LesUtilisateurs-cards-card-btn">
                     <button class="LesUtilisateurs-cards-card-btn-btn1">id: <?= $user['id'] ?></button>
                     <ul class="LesUtilisateurs-cards-card-btn-listes">   
                        <i class="fa-regular fa-trash-can LesUtilisateurs-cards-card-btn-listes-delete lesVoyages-cards-card-btn-listes-delete"></i>
                     </ul>
                  </div>
               </div> 
               
               <div  class="delete" style='display: none;'>
                  <h1>Effacer</h1>
                  <p>Êtes-vous sure de vouloire effacer cette utilisateur?</p>
                  
                  <div class="clearfix">
                     <button type="button" class="cancelbtn">Cancel</button>
                     <form action="" method='POST'  >
                        <input type="hidden" name='id_user' value='<?= $user['id'] ?>'>
                        <button type="submit" name='delete' class="deletebtn">Effacer
       
                        </button>
                     </form>
                  </div>
                     
               </div>
           <?php endforeach?>
        </div>

      
        

  </div>
        </div>
   </div>
      



        




<?php

    require_once('../layouts/footAdmin.php');


?>