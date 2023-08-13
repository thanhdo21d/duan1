<?php
    session_start();

    include_once "../../guest/pdo.php";
    include_once "function.php";

    $outgoing_id = get_unique_id($db_con,$_SESSION['id_user']);
    $sql = "SELECT * FROM user WHERE NOT chat_id = {$outgoing_id} ORDER BY id DESC";
    $r=mysqli_fetch_array(mysqli_query($db_con,"SELECT * FROM user WHERE id='{$_SESSION['id_user']}'"));
    if($r['user_name']!='admin') $sql = "SELECT * FROM user WHERE user_name='admin'";
    


    
    $query = mysqli_query($db_con, $sql);
    $output = "";
    $onSeen="";
    $noSeen="";
    if(mysqli_num_rows($query) == 0){
        $output = "Không có thành viên nào để chat 🥲";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }
    $output=$noSeen.$onSeen;
    echo $output;
?>