<?php
require_once "pdo.php";

// Thêm loại hàng
function them_danh_muc($categories_name, $image)
{
    $sql = " INSERT INTO `categories`(`categories_name`,`image`) VALUES ('$categories_name','$image')";

    pdo_execute($sql);
}

// Xóa loại hàng theo mã loại
function xoa_danh_muc($id)
{
    $sql = "DELETE FROM categories WHERE id = $id";
    pdo_execute($sql);
}

// Truy vấn tất cả dữ liệu của bảng loại hàng
function lay_tat_ca_danh_muc($order = "DESC") // Tham số order nhận giá trị mặc định DESC sắp xếp theo giảm dần
{
    $sql = "SELECT * FROM categories ORDER BY id $order";
    $ds_danh_muc = pdo_query($sql);
    return $ds_danh_muc;
}
function load_ten_dm($idmm){
    if($idmm>0){
    $sql="select * from categories where id=".$idmm;
    $dm= pdo_query_one($sql);
    extract($dm);
    return $categories_name;
    }else {
        return "";
    }
} 
// Truy vấn một loại hàng theo mã loại
function lay_danh_muc_theo_ma($id)
{
    $sql = "SELECT * FROM categories WHERE id = $id";
    $danh_muc = pdo_query_one($sql);

    return $danh_muc;
}

// Lấy ra tên loại hàng theo mã loại
function lay_ten_danh_muc($id)
{
    // Nếu mã loại truyền vào lớn hơn 0
    if ($id > 0) {
        $sql = "SELECT * FROM categories WHERE id = $id";
        $danh_muc = pdo_query_one($sql);
        // Biến các cột(thuộc tính) trong bảng loại hàng thành các biến

        $categories_name = $danh_muc['categories_name'];

        return $categories_name; // Trả về biến(ten_loai) tên loại hàng
    } else {
        // Nếu $ma_loại nhỏ hơn 0 trả về chuỗi rỗng
        return "";
    }
}

// Cập nhật loại hàng theo mã loại
function set_danh_muc($id, $categories_name, $image)
{
    $sql = " UPDATE `categories` SET `categories_name`='$categories_name',`image`='$image' WHERE id = $id";
    pdo_execute($sql);
}
