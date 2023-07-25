
<?php
function loadall_taikhoan()
{
    $sql = "select * from user order by id desc";
    $listtaikhoan = pdo_query($sql);
    return $listtaikhoan;
}
function getaddress($id)
{
    $sql = "SELECT `full_name`, `phone`, `address` FROM `user` WHERE id =" . $id;
    $address = pdo_query_one($sql);
    return $address;
}
function search_id()
{
    $sql = "select id from user order by id desc LIMIT 0,1";
    $listtaikhoan = pdo_query_one($sql);
    $iduser = $listtaikhoan['id'];
    return $iduser;

}
function role(){
    $sql = "SELECT * FROM `role`";
    $role = pdo_query($sql);
    return $role;
}
function role_check($id){
    $sql = "SELECT * FROM `role` where id = " . $id;
    $role = pdo_query_one($sql);
    return $role;
}
// Cập nhật tài khoản phía admin
function cap_nhat_tai_khoan_admin($id, $user_name, $full_name, $email, $phone, $address, $password, $role)
{
    $sql = "UPDATE `user` SET `user_name`='$user_name',`full_name`='$full_name',`email`='$email',`phone`='$phone',`address`='$address',`password`='$password',`role`='$role' WHERE `id` = '$id'";
    pdo_execute($sql);
}

// Xóa tài khoản theo mã khách hàng
function xoa_tai_khoan($id)
{
    $sql = "DELETE FROM user WHERE id = '$id'";
    pdo_execute($sql);
}

// Kiểm tra email
function ktra_email($email)
{
    // Truy vấn đến tài khoản mà email trùng với tham số email truyền vào
    $sql = "SELECT * FROM khach_hang WHERE email = '$email'";
    $tai_khoan_email = pdo_query_one($sql);
    return $tai_khoan_email;
}

// Kiểm tài khoản có tồn tại trong database ko

// Cập nhật mật khẩu theo mã khách hàng


// Cập nhật tài khoản phía admin


// Xóa tài khoản theo mã khách hàng


// Kiểm tra email


// Kiểm tài khoản có tồn tại trong database ko

// Cập nhật mật khẩu theo mã khách hàng
