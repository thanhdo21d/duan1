<?php
function get_unique_id($con,$user_id){
     $q=mysqli_query($con,"SELECT * FROM user WHERE id={$user_id}");
     $q1=mysqli_fetch_array($q);
     return $q1['chat_id'];

}
?>