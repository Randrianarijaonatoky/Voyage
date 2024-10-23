<?php

    require_once('../layouts/headAdmin.php');
    require_once('../model/modelAdmin.php');

  $nbr_voyage = nombre_voyages();
  $voyages = list_voyage();
  
 
  

  if(isset($_POST['delete'])){
     delete_voyages();
     var_dump($id);
  }



?>

<div class="lesVoyages">
  <?php

    require_once('../layouts/navDashboard.php');


  ?>
  <h1 class="lesVoyages-title text-center">Tous les voyages (<?= $nbr_voyage["totalVoyage"] ?>)</h1>

  <a href="ajoutVoyage.php">
       <i class="fa-solid fa-circle-plus lesVoyages-add"></i>
  </a>

  <div class="lesVoyages-cards">
    <?php foreach($voyages as $voyage)  :?> 

      <div class="lesVoyages-cards-card">
        <input type="hidden" name='id-voyage' value='<?= $voyage["id"] ?>'>
        <img src="../upload/<?= $voyage["image"] ?>" alt="" class="lesVoyages-cards-card-img">
        <h3 class="lesVoyages-cards-card-title"><?= $voyage["lieu"] ?></h3>
        <p class="lesVoyages-cards-card-date"><?= $voyage["dateDebut"] ?> au <span><?= $voyage["dateFin"] ?></span></p>
  
        <div class="lesVoyages-cards-card-btn">
          <button class="lesVoyages-cards-card-btn-btn1"><?= $voyage["prix"] ?></button>
          <ul class="lesVoyages-cards-card-btn-listes">
            <a href="modifVoyage.php?id=<?= $voyage["id"] ?>">
              <i class="fa-regular fa-pen-to-square lesVoyages-cards-card-btn-listes-edit"></i>
            </a>
            <i class="fa-regular fa-trash-can lesVoyages-cards-card-btn-listes-delete" id="delete"></i>
          </ul>
        </div>
  
      </div>
      <div  class="delete" style='display: none;'>
         <h1>Effacer</h1>
         <p>Êtes-vous sure de vouloire effacer cette voyage?</p>
         
         <div class="clearfix">
           <button type="button" class="cancelbtn">Cancel</button>
           <form action="" method='POST'  >
             <input type="hidden" name='id_voyage' value='<?= $voyage["id"] ?>'>
             
             <button type="submit" name='delete' class="deletebtn">Effacer</button>
           </form>
         </div>
                    
       </div>
    <?php endforeach ?>



    
  </div>
  

  <!-- <div class="delete" style='display: none;'>
     <div class="delete-content">

       <h1>Effacer</h1>
       <p>Êtes-vous sure de vouloire effacer?</p>
   
       <div class="clearfix">
         <button type="button" class="cancelbtn">Cancel</button>
         <button type="button" class="deletebtn">Effacer</button>
       </div>
     </div> -->


  </div>
  
<?php

require_once('../layouts/footAdmin.php');


?>