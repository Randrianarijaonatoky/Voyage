<?php

if(isset($_SESSION['role'])=== 'user'){
    header('Location: ../page/acceuil.php');
}