<?php
    session_start();
    include_once "../../guest/pdo.php";
    include_once "function.php";

    $outgoing_id = get_unique_id($db_con,$_SESSION['id_user']);
    $searchTerm = mysqli_real_escape_string($db_con, $_POST['searchTerm']);

    $sql = "SELECT * FROM user WHERE NOT chat_id = {$outgoing_id} AND (full_name LIKE '%{$searchTerm}%' OR lower(full_name) LIKE lower('%{$searchTerm}%')) ";
    $output = "";
    $query = mysqli_query($db_con, $sql);
    if(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }else{
        $output = 'Không tìm thấy tài khoản nào 😶';
    }
    echo $output;
?>