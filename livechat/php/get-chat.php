<?php 
    session_start();
    if(isset($_SESSION['id_user'])){
        include_once "../../guest/pdo.php";

        include_once "function.php";

        $outgoing_id = get_unique_id($db_con,$_SESSION['id_user']);
        $incoming_id = mysqli_real_escape_string($db_con, $_POST['incoming_id']);
        $output = "";
        $sql = "SELECT * FROM messages LEFT JOIN user ON user.chat_id = messages.outgoing_msg_id
                WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY messages.id ";
        $query = mysqli_query($db_con, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['outgoing_msg_id'] === $outgoing_id){
                    $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>'. $row['msg'] .'</p>
                                </div>
                                </div>';
                }else{
                    $output .= '<div class="chat incoming">
                                <img src="../upload/adduser.jpg" alt="">
                                <div class="details">
                                    <p>'. $row['msg'] .'</p>
                                    <h6>'.$row['time'].'</h6>
                                </div>
                                </div>';
                }
            }
        }else{
            $output .= '<div class="text">Không có đoạn tin nào để hiển thị , mọi tin nhắn bạn gửi sẽ hiển thị tại đây.</div>';
        }
        echo $output;
    }else{
        header("location:./site/index.php");//đã fixx

    }

?>