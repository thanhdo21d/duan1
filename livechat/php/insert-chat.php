<?php 
function get_time_now() {
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $weekday = date("l");
    $weekday = strtolower($weekday);
    switch($weekday) {
        case 'monday':
            $weekday = 'Thứ hai';
            break;
        case 'tuesday':
            $weekday = 'Thứ ba';
            break;
        case 'wednesday':
            $weekday = 'Thứ tư';
            break;
        case 'thursday':
            $weekday = 'Thứ năm';
            break;
        case 'friday':
            $weekday = 'Thứ sáu';
            break;
        case 'saturday':
            $weekday = 'Thứ bảy';
            break;
        default:
            $weekday = 'Chủ nhật';
            break;
    }
    return $weekday.', '.date('d/m/Y H:i:s');
}
    session_start();
    if(isset($_SESSION['id_user'])){
        include_once "../../guest/pdo.php";
        
        include_once "function.php";


        $outgoing_id = get_unique_id($db_con,$_SESSION['id_user']);
        $incoming_id = mysqli_real_escape_string($db_con, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($db_con, $_POST['message']);
        $time=get_time_now();
        if(!empty($message)){
            $sql = mysqli_query($db_con, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg,time)
                                        VALUES ({$incoming_id}, {$outgoing_id}, '{$message}' ,'{$time}')") or die();
        }
    }else{
        header("location:./site/index.php");//đã fixx
    }


    
?>