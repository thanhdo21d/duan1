<?php
session_start();

include "../global.php";
include "../guest/pdo.php";
include "../guest/product.php";
include "../guest/category.php";
include "../guest/order.php";
include "../guest/account.php";
include "../guest/binh_luan.php";
include "layout/header.php";
include "../guest/thongke.php";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case "status":
            if (isset($_POST['luu']) && ($_POST['luu'])) {
                $ttdh = $_POST['status'];
                $id = $_POST['id'];
                update_order($id, $ttdh);
            }
            $order = loadall_order_admin();
            if (!empty($order)) {
                include "order/listorder.php";
            }
            break;
        case "them_dm":
            if (isset($_POST['btn_luu'])) {
                $categories_name = $_POST['categories_name'];
                //file upload
                $file = $_FILES['image'];
                $image = $file['name'];
                them_danh_muc($categories_name, $image);
                $thong_bao = "Thêm thành công";
            }
            include "danh-muc/add.php";
            break;

        case "list-cate":
            $ds_danh_muc = lay_tat_ca_danh_muc();
            include "danh-muc/list-cate.php";
            break;

        case "xoa_dm":
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                xoa_danh_muc($_GET['id']);
            }
            $ds_danh_muc = lay_tat_ca_danh_muc();
            include "danh-muc/list-cate.php";
            break;
        case "sua_dm":
            if (isset($_GET['id']) && ($_GET['id']) > 0) {
                $id = $_GET['id'];
                $danh_muc = lay_danh_muc_theo_ma($id);
                include "danh-muc/update-cate.php";
            }
            break;
        case "cap_nhat_dm":
            if (isset($_POST['btn_update']) && ($_POST['btn_update'])) {
                $id = $_POST['id'];
                $categories_name = $_POST['categories_name'];
                $image = $_FILES['image']['name'];
                $target_dir = "../upload/";

                if ($image == "") {
                    $image = $_POST['old_image'];
                }
                $target_file = $target_dir . basename($_FILES['image']['name']);
                if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                    $thong_bao = "Đăng tải ảnh thành công";
                } else {
                    $thong_bao = "Đăng tải ảnh lên thất bại !";
                }
                set_danh_muc($id, $categories_name, $image);
                $thong_bao = "Cập nhật thành công";
            }
            $ds_danh_muc = lay_tat_ca_danh_muc();
            include "danh-muc/list-cate.php";
            break;

        case "them_san_pham":
            if (isset($_POST['btn_luu'])) {
                $product_name = $_POST['product_name'];
                $product_price = $_POST['product_price'];
                $product_price_sale = $_POST['product_price_sale'];

                $description = $_POST['description'];
                $origin = $_POST['origin'];
                $id_categories = $_POST['id_categories'];

                //file upload
                $file = $_FILES['image'];
                $image = $file['name'];

                $file = $_FILES['image2'];
                $image2 = $file['name'];
                $file = $_FILES['image3'];
                $image3 = $file['name'];

                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES['image']['name']);
                $target_file = $target_dir . basename($_FILES['image2']['name']);
                $target_file = $target_dir . basename($_FILES['image3']['name']);
                them_san_pham($product_name, $product_price, $product_price_sale, $description, $image, $image2, $image3, $origin, $id_categories);
                $thong_bao = "Thêm thành công";
            }
            $ds_danh_muc = lay_tat_ca_danh_muc();
            include "san_pham/addsp.php";
            break;

        case "listsp":
            $ds_danh_muc = lay_tat_ca_danh_muc();
            $ds_san_pham = lay_tat_ca_san_pham_admin();

            include "san_pham/listsp.php";
            break;

            /* case "danh_sach_sp_trang":
            $danh_sach_sp = lay_san_pham_theo_trang('id', 5);
            include "san_pham/listsp.php";
            break;
*/
        case "xoa_san_pham":
            if (isset($_GET['id']) && ($_GET['id']) > 0) {
                $san_pham = xoa_san_pham($_GET['id']);
            }
            $danh_sach_sp = lay_tat_ca_san_pham_admin();
            include "san_pham/listsp.php";
            break;

        case "sua_san_pham":
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $san_pham = lay_san_pham_theo_ma($_GET['id']);
            }
            $ds_danh_muc = lay_tat_ca_danh_muc();
            include "san_pham/updatesp.php";
            break;

        case "cap_nhat_sp":
            if (isset($_POST['btn_update']) && ($_POST['btn_update'])) {
                $id = $_POST['id'];
                $product_name = $_POST['product_name'];
                $product_price = $_POST['product_price'];
                $product_price_sale = $_POST['product_price_sale'];
             
    include "layout/home.php";
}