<?php
session_start();
if (isset($_POST['update_quantity'])) {
    $quantity = array();
    $idproduct = array();
    $quantity = $_POST['quantity'];
    $idproduct = $_POST['product_id'];
    for($i=0;$i<count($_SESSION['cart']);$i++){
        $_SESSION[$i][4]=$quantity[$i];
        
    }
    
//     var_dump($quantity);
//     echo $_POST['update_quantity'];
    echo "<script>history.back()</script>";

}
?>