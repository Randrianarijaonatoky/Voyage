<?php
// session_start();

require_once('../layouts/headAdmin.php');
require_once('../model/modelAdmin.php');


?>

    <nav class="dashboardNav">
        <div class="dashboardNav-search">
            <input type="search" name="" id="" class="dashboardNav-search-input">
            <button class="dashboardNav-search-btn" > 
                <i class="fa-solid fa-magnifying-glass dashboardNav-search-btn-icon"></i>
            </button>

        </div>
        
        <div class="dashboardNav-profile">
            <div class="dashboardNav-profile-messages">
                <i class="fa-solid fa-envelope dashboardNav-profile-icon" id="mess">
                    <span class="badge badge-danger badge-counter dashboardNav-profile-icon-nbr">3</span>
                    
                </i>
                <div class="dashboardNav-messages-mp">
                  <div class="dashboardNav-messages-mp-users">
                    <div class="dashboardNav-messages-mp-users-user">
                        
                    </div>
            
                  </div>
                </div>
                
            </div>
            <i class="fas fa-bell fa-fw dashboardNav-profile-icon">

                <span class="badge badge-danger badge-counter dashboardNav-profile-icon-nbr">9</span>
            </i>

            <a href="../secure/deconnexion.php"  class='dashboardNav-profile-icon'>
            <i class="fa-solid fa-arrow-right-from-bracket ashboardNav-profile-icon" title='Deconnexion'></i>
            </a>


            <!-- <img src="../upload/<?= $_SESSION['profile'] ?>" alt="" class="dashboardNav-profile-img"> -->
        </div>
        
    </nav>

    <div class="dashboardNav-mess" id="contenair-mess" style="display: none;">
        <div class="dashboardNav-mess-tete">
            
            <h5 class="dashboardNav-mess-tete-title">Message </h5>
            <i class="fa-solid fa-square-xmark dashboardNav-mess-tete-icon" id="croix"></i>
        </div>
        <div class="dashboardNav-mess-cards">
            <a href="message.php" class="dashboardNav-mess-cards-card table-hover mt-1">
                
                <img src="../public/images/1.jpg" class="dashboardNav-mess-cards-card-img" alt="">

                
                <div class="dashboardNav-mess-cards-card-text">
                    <h5 class="dashboardNav-mess-cards-card-text-mp">Salama! mba saika anotany</h5>
                    <p class="dashboardNav-mess-cards-card-text-mp">20 jun 2024 8:24 </p>   
                    
                </div>
            </a>
            <hr>       
     
            <a href="message.php" class="dashboardNav-mess-cards-card table-hover mt-1">
                
                <img src="../public/images/1.jpg" class="dashboardNav-mess-cards-card-img" alt="">

                
                <div class="dashboardNav-mess-cards-card-text">
                    <h5 class="dashboardNav-mess-cards-card-text-mp">Salama! mba saika anotany</h5>
                    <p class="dashboardNav-mess-cards-card-text-mp">20 jun 2024 8:24 </p>   
                    
                </div>
            </a>
            <hr>       
     
   

        </div>
    </div>
    

