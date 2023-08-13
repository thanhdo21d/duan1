<?php 
  session_start();
  include("../guest/pdo.php");
  if(!isset($_SESSION['id_user']))header("location: ../site/index.php");//đã fixx
?>
<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <?php 
          $user_id = mysqli_real_escape_string($db_con, $_GET['user_id'] );
          @mysqli_query($db_con,"UPDATE messages SET seen ='yes' WHERE outgoing_msg_id='{$_GET['user_id']}' and seen='no'");
          $sql = mysqli_query($db_con, "SELECT * FROM user WHERE chat_id = {$user_id}");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }else{
            header("location: users.php");
          }
        ?>
        <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <a href="#"><img src="../upload/adduser.jpg" alt=""></a>
        <div class="details">
          <span><?php echo $row['full_name'] ?></span>
          <p><?php echo $row['chat_status']; ?></p>
        </div>
      </header>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Nhập nội dung tại đây..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>

  <script src="javascript/chat.js"></script>

</body>
</html>
