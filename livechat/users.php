<?php 
  session_start();
  include_once "../guest/pdo.php";
  if(!isset($_SESSION['id_user']))header("location:./site/index.php");//đã fixx
  else{
    include("./php/function.php");
    $_SESSION['unique_id']=get_unique_id($db_con,$_SESSION['id_user']);
  }
?>
<?php include_once "./header.php"; ?>
<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php 
            $sql = mysqli_query($db_con, "SELECT * FROM user WHERE chat_id = {$_SESSION['unique_id']} order by id ");
            // $sql=mysqli_query($db_con,"SELECT * FROM messages WHERE incoming_msg_id= {$_SESSION['unique_id']} group by outgoing_msg_id order by id desc");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          <img src="../upload/63.png" alt="">
          <div class="details">
            <span><?php echo $row['full_name'] ?></span>
            <p><?php echo $row['chat_status']; ?></p>
          </div>
        </div>
        <!-- <a href="../logout.php" class="logout">Đăng xuất</a> -->
      </header>
      <div class="search">
        <span class="text">Chọn người dùng để chat</span>
        <input type="text" placeholder="Tìm kiếm nhanh...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
  
      </div>
    </section>
  </div>

 

  <script src="./javascript/users.js"></script>


</body>
</html>
