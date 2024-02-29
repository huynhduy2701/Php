<?php
   
    $action = isset($_GET['action']) ? $_GET['action'] : '';
    if ($action === 'buy') {
       
            // Get the product ID from the URL
            include_once './View/buy.php';
       
        
    
    } else {
        // Handle other actions or load a default view
        include_once 'View/home.php';
    }
    
?>