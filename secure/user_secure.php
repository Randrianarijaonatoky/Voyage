<?php

if(!isset($_SESSION['auth']) || is_null($_SESSION['auth'])){
    header('Location: ../pages/connexion.php');
}