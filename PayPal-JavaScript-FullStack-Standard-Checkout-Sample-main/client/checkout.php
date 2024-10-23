<?php 
  
  // $titre = 'Reservation';
  // require_once('../../layouts/header.php');
  // require_once('../../model/model.php');
  // $voyage = select_voyage();
    
    
  // if(isset($_POST['test'])){
      
  //     echo'mety';
  //     reservation();
  //     // test();
  // }
  
  
  // if(isset($_POST["btn-confirm"])){
  //     echo'mety';
  // }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
  </head>
  <body>

    <div id="paypal-button-container">

    </div>
    <p id="result-message"></p>
    
    <script src="https://www.paypal.com/sdk/js?client-id=AZxNRUuysO04Y4Q6UqIuSsFb1MLwEtyYxL0q9yvMt15-fp-V29P309fNThhpslLGPYEJaahk_9HV0WFi&components=buttons&enable-funding=venmo,paylater" data-sdk-integration-source="integrationbuilder_sc"></script>
    <script src="app.js"></script>
  </body>
</html>