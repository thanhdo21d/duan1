<?php
session_start();
include("../guest/pdo.php");
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
$countss=0;
$myId=mysqli_fetch_array(mysqli_query($db_con,"SELECT chat_id FROM user WHERE id='{$_SESSION['id_user']}'"))['chat_id'];
$countS=mysqli_query($db_con,"SELECT * FROM messages WHERE seen='no' and incoming_msg_id='$myId' group by outgoing_msg_id");
while($count=mysqli_fetch_assoc($countS))$countss++;

if(isset($_GET['count'])){
     echo json_encode(array(
          "NoSeenMsg"=>$countss,
          "time"=>get_time_now()
     ));
}
?>