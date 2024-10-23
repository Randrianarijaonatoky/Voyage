<?php

    require_once('../layouts/headAdmin.php');
    
    $reservations = showReservation();
    $nbr_reservation = nbr_reservation();
    // $montant_reservation = montant_reservation();


?>


   <div class='reservationAdmin'>
        <?php

          require_once('../layouts/navDashboard.php');


        ?>
       <h1 class='reservationAdmin-title' >Tous les réservations</h1>
      <div class="reservationAdmin-cards">
           <div class="reservationAdmin-cards-card">
              <div class="reservationAdmin-cards-card-item">
                 <h3 class="reservationAdmin-cards-card-item-title">Réservation</h3>
                        
                 <h1 class="reservationAdmin-cards-card-item-nbr"><?= $nbr_reservation['totalReservation'] ?></h1>
              </div>
              <div class="reservationAdmin-cards-card-value">
                <i class="fa-solid fa-hand-holding-dollar reservationAdmin-cards-card-value-icon"></i>

              </div>
           </div>
           <div class="reservationAdmin-cards-card">
              <div class="reservationAdmin-cards-card-item">
                 <h3 class="reservationAdmin-cards-card-item-title">Total du montant</h3>
                        
                 <h1 class="reservationAdmin-cards-card-item-nbr">1 200 500Ar</h1>
              </div>
              <div class="reservationAdmin-cards-card-value">
                <i class="fa-regular fa-credit-card reservationAdmin-cards-card-value-icon"></i>

              </div>
           </div>


      </div>
      <div class="container mt-3">
  <h1 class='reservationAdmin-title'>Detail de tous les reservation</h1>
  <p></p>            
  <table class="table   reservationAdmin-table ">
    <thead>
      <tr class='reservationAdmin-table-titre'>
        <th>profil</th>
        <th>Nom</th>
        <th>Email</th>
        <th>contact</th>
        <th>voyage</th>
        <th>Nbr de presonne</th>
        <th>Montant Payer</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($reservations as $reservation) { ?>
        <tr class="reservationAdmin-table-content">
          <td  class="reservationAdmin-table-content-text">
            <img src="../upload/<?= $reservation['profile'] ?>" alt="" class="reservationAdmin-table-content-image">
          </td>
          <td class="reservationAdmin-table-content-text"><?= $reservation['nom'] ?></td>
          <td class="reservationAdmin-table-content-text"><?= $reservation['email'] ?></td>
          <td class="reservationAdmin-table-content-text"><?= $reservation['contact'] ?></td>
          <td class="reservationAdmin-table-content-text"><?= $reservation['lieu'] ?></td>
          <td class="reservationAdmin-table-content-text"><?= $reservation['nombrePersonne'] ?></td>
          <td class="reservationAdmin-table-content-text"><?= $reservation['montant'] ?></td>
        </tr>
      <?php } ?>

    </tbody>
  </table>

</div>
   </div>

      
   </div>

   
   

<?php

require_once('../layouts/footAdmin.php');


?>