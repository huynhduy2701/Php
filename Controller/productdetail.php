<?php
// Include necessary files and initialize objects

$action = isset($_GET['action']) ? $_GET['action'] : '';
$act = isset($_GET['act']) ? $_GET['act'] : '';

if ($action === 'sanpham') {
    if ($act === 'productdetail') {
        // Get the product ID from the URL
        $productId = isset($_GET['id']) ? $_GET['id'] : '';

        if (!empty($productId)) {
            // Load the specific view for the 'productdetail' action
            include_once 'View/productdetail.php';
        } else {
            // Handle the case where the product ID is not provided
            include_once 'View/home.php';
        }
    }else{
        
    }
} else {
    // Handle other actions or load a default view
    include_once 'View/home.php';
}
