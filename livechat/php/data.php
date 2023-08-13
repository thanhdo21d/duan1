<?php
    while($row = mysqli_fetch_assoc($query)){
        $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['chat_id']}
                OR outgoing_msg_id = {$row['chat_id']}) AND (outgoing_msg_id = {$outgoing_id} 
                OR incoming_msg_id = {$outgoing_id}) ORDER BY id DESC LIMIT 1";
        $query2 = mysqli_query($db_con, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="Không có tin nhắn nào !";
        (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
        if(isset($row2['outgoing_msg_id'])){
            ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "Bạn: " : $you = "";
            if($outgoing_id==$row2['outgoing_msg_id']){
                $checkLastSeen=false;
            }
            else{
                // $checkLastSeen=mysqli_fetch_array(mysqli_query($db_con,"SELECT * FROM messages WHERE incoming_msg_id='$outgoing_id' and seen='no' order by id desc limit 1"));
            $checkLastSeen=mysqli_fetch_array(mysqli_query($db_con,"SELECT * FROM messages WHERE incoming_msg_id='$outgoing_id' and outgoing_msg_id='{$row['chat_id']}' and seen='no' order by id desc limit 1"));
            }
            
        }else{
            $you = "";
            $checkLastSeen=mysqli_fetch_array(mysqli_query($db_con,"SELECT * FROM messages WHERE incoming_msg_id='$outgoing_id' and outgoing_msg_id='{$row['chat_id']}' and seen='no' order by id desc limit 1"));
        }
        ($row['chat_status'] == "Đã offline") ? $offline = "offline" : $offline = "";
        ($outgoing_id == $row['chat_id']) ? $hid_me = "hide" : $hid_me = "";
        //
        //
        if($checkLastSeen){
            $noSeen.='<a href="chat.php?user_id='. $row['chat_id'] .'" >
            <div class="content">
            <img src="../upload/adduser.jpg" alt="">
            <div class="details">
                <span>'. $row['full_name'] .'</span>
                <p style="color:#000">'. $you . $msg .'</p>
            </div>
            </div>
            <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
        </a>';
        }
        else{
            $onSeen.='<a href="chat.php?user_id='. $row['chat_id'] .'" >
            <div class="content">
            <img src="../upload/adduser.jpg" alt="">
            <div class="details">
                <span>'. $row['full_name'] .'</span>
                <p style="color:#ccc">'. $you . $msg .'</p>
            </div>
            </div>
            <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
        </a>';
        }
        // $output .= '<a href="chat.php?user_id='. $row['chat_id'] .'" >
        //             <div class="content">
        //             <img src="../upload/adduser.jpg" alt="">
        //             <div class="details">
        //                 <span>'. $row['full_name'] .'</span>
        //                 <p style="color:'.($checkLastSeen?"#000":"#ccc").'">'. $you . $msg .'</p>
        //             </div>
        //             </div>
        //             <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
        //         </a>';
    }
?>
