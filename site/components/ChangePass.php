
<?php
if(isset($_POST['submit'])){
     $OldPass=$_POST['OldPass'];
     $NewPass=$_POST['NewPass'];
     if($OldPass==$NewPass) echo "<script>alert('Hai mật khẩu không được trùng nhau')</script>";
     else if(mysqli_fetch_array(mysqli_query($db_con,"SELECT * FROM user WHERE id='{$_SESSION['id_user']}' and password='$OldPass'"))){
          @mysqli_query($db_con,"UPDATE user SET password='$NewPass' WHERE id='{$_SESSION['id_user']}'");
          echo "<script>alert('Đổi mật khẩu thành công!')</script>";
     }
     else echo "<script>alert('Mật khẩu cũ không đúng !')</script>";

}
?>
<center id="changePass" class="h-80 border-solid border-2">
     <form action="" class="mt-5" method="post">
          <div>
               <label   class="py-2">Điền mật khẩu hiện tại</label>
               <input type="password" placeholder="Điền mật khẩu hiện tại" name="OldPass" class="h5 m-4 border-slate-500 w-[350px] rounded-md h-[35px]" style="border:1px green solid;padding:0px 10px" pattern=".{1,}"  title="Vui lòng nhập ít nhất 1 ký tự" oninput="this.setCustomValidity('')" onchange="this.value = this.value.trim()">
          </div>
          <div>
               <label   class="py-2"> Điền mật Mật khẩu mới</label>

               <input type="password" placeholder="Mật khẩu mới" name="NewPass" class="h5 m-3 w-[350px] rounded-md h-[35px]"  style="border:1px green solid;padding:0px 10px" required pattern=".{1,}"  title="Vui lòng nhập ít nhất 1 ký tự" oninput="this.setCustomValidity('')" onchange="this.value = this.value.trim()">
          </div>
          <button type="submit" basename="none" name="submit" class="border-solid border-slate-500 bg-green-400 w-[100px] text-white hover:bg-[#03a9f4] rounded-md" style="padding:5px 10px;border:1px #03a9f4 solid">Thay đổi</button>


     </form>


</center>