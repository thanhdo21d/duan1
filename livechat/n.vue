<?php
include("db_con.php");
session_start();
ob_start();
$infomation=mysqli_query($con,"select * from web_info");
$row1=mysqli_fetch_array($infomation);
//THông tin web
$web_url=$row1['web_url']="https://11a1hoangmai.tk";
$_SESSION['web_url']=$web_url;

$web_name=$row1['web_name'];
$web_icon=$row1['web_favicion'];
$web_description=$row1['web_description'];
$facebook=$row1['web_facebook'];
$twitter="https://twitter.com/kous1608";
$skype="0";
$youtube="0";
$instagram="https://instagram.com/kous1608";
$linkedin="0";



$body_style="background:#2196f3;";//#03a9f4
$alert_bg="background:#5150e0fc";
$footer_bg="background:#33b9d4";

$header_reponsive_ad="<div class='widget-content'>
    <a class='sora-ads-full' href='javascript:;'>Quảng cáo</a>
    </div>";
    
$web_logo="./resource/imgs/Neeon_logo.png";
$web_message_icon="message.gif";
$web_message="
    <div class='demo-float'>
    <span class='df-hide'><i class='fa fa-times'></i></span>\n<div class='df-logo'></div>
    <h3>#querry</h3>
    <p class='excerpt'> Bạn cần tìm kiếm nhiều hơn ?  </p>
    <a href='login.php' title='😍'>Đăng nhập ngay❤️ </a>\n</div>";
if(isset($_SESSION['user_id'])){
    $web_message="";
}
//đếm số bài post
$sql_select_users_all = "SELECT * FROM post ORDER BY id desc";
$result_sql_select_users_all = mysqli_query($con, $sql_select_users_all);
$count_all_posts=0;
while ($rowusers_all = mysqli_fetch_assoc($result_sql_select_users_all))
{
   $count_all_posts++;
}

function find_author_name($author_id,$con){
    //tìm tên tác giả 
    $sql=mysqli_query($con,"select * from users where user_id='$author_id'");
    $ss=mysqli_fetch_array($sql);
    return $author=$ss['name'];
}
function find_author_avatar($author_id,$con){
    //tìm tên tác giả 
    $sql=mysqli_query($con,"select * from users where user_id='$author_id'");
    $sss=mysqli_fetch_array($sql);
    return $author=$sss['image'];
}
function find_author_type($author_id,$con){
    //tìm tên tác giả 
    $sql=mysqli_query($con,"select * from users where user_id='$author_id'");
    $ssss=mysqli_fetch_array($sql);
    return $author=$ssss['type'];
}
function find_author_score($author_id,$con){
    //tìm tên tác giả 
    $sql=mysqli_query($con,"select * from users where user_id='$author_id'");
    $sssss=mysqli_fetch_array($sql);
    return $author=$sssss['score'];
}
function update_view($id,$row,$value,$con){
    $s_update=mysqli_query($con,"UPDATE post SET $row='$value' WHERE id={$id}");

}
////Lấy thời gian 

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
///

?>