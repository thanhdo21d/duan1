<?php
require_once "pdo.php";

// Thêm bình luận
function them_binh_luan($comment, $id_product, $id_user, $ngay_bl, $stars)
{
  $sql = "INSERT INTO product_rev(comment, id_product, id_user, ngay_bl, stars) VALUES ('$comment', '$id_product', '$id_user', '$ngay_bl', $stars)";
  pdo_execute($sql);
}

// Xóa bình luận theo mã bình luận
function xoa_binh_luan($id)
{
  $sql = "DELETE FROM product_rev WHERE id = $id";
  pdo_execute($sql);
}

// Truy vấn tất cả bình luận
function lay_tat_ca_binh_luan()
{
  $sql = "SELECT * FROM product_rev ORDER BY ngay_bl DESC";
  $ds_binh_luan = pdo_query($sql);
  return $ds_binh_luan;
}

// Truy vấn bình luận theo từng hàng hóa
function lay_binh_luan_theo_hh($id_product)
{
  // Truy vấn bình luận, tên hàng hóa, mã khách hàng, hình của khách hàng gộp từ 3 bảng hàng hóa, bình luận và khách hàng theo điều kiện mã hàng hoá của bảng bình luận trùng tham số mã hàng hóa truyền vào
  $sql = "SELECT bl.*, hh.product_name,kh.user_name, kh.id FROM product_rev bl JOIN product hh ON bl.id_product = hh.id JOIN user kh ON kh.id = bl.id_user WHERE bl.id_product = $id_product ORDER BY ngay_bl DESC";
  $ds_binh_luan = pdo_query($sql);
  return $ds_binh_luan;
}
