<?php
session_start(); // Make sure to start the session in your controllers

include_once 'model/delete.php';

if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['item_key'])) {
    $itemKey = $_GET['item_key'];

    // Create an instance of the delete class
    $deleteObj = new delete();

    // Call the deleteCartItem function
    $deleteObj->deleteCartItem($itemKey);

    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=giohang" />';
}

// include_once 'view/buy.php';
?>