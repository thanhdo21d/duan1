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
                $description = $_POST['description'];
                $origin = $_POST['origin'];
                $image2 = $_FILES['image2']['name'];

                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES['image2']['name']);

                if (move_uploaded_file($_FILES['image2']['tmp_name'], $target_file)) {
                    $thong_bao = "Đăng tải ảnh thành công";
                } else {
                    $thong_bao = "Cập nhật hình ảnh thất bại !";
                }

                $id_categories  = $_POST['id_categories'];

                cap_nhat_san_pham($id, $product_name, $product_price, $product_price_sale, $description, $origin, $image2, $id_categories);
            }
            $danh_sach_sp = lay_tat_ca_san_pham_admin();
            include "san_pham/listsp.php";
            break;
        case "them_tai_khoan":
            if (isset($_POST['btn_insert'])) {
                $user_name = $_POST['user_name'];
                $full_name = $_POST['full_name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $password = $_POST['password'];
                $role = $_POST['role'];
                them_tai_khoan($user_name, $full_name, $email, $phone, $address, $password, $role);
                $thong_bao = "Thêm tài khoản thành công";
            }
            include "user/add-user.php";
            break;

        case "list-user":
            $role_test = role();
            $users = loadall_taikhoan();
            include "user/list-user.php";
            break;


        case "xoa_us":
            if (isset($_GET['id']) && ($_GET['id']) > 0) {
                $tai_khoan = xoa_tai_khoan($_GET['id']);
            }

            $users = loadall_taikhoan();
            include "user/list-user.php";
            break;

        case "sua_us":
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $tai_khoan = lay_tai_khoan_theo_ma($_GET['id']);
                include "user/update-user.php";
            }
            break;
        case "cap_nhat_tk":
            if (isset($_POST['btn_update']) && ($_POST['btn_update'])) {
                $id = $_POST['id'];
                $user_name = $_POST['user_name'];
                $full_name = $_POST['full_name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $password = $_POST['password'];
                $role = $_POST['role'];

                cap_nhat_tai_khoan_admin($id, $user_name, $full_name, $email, $phone, $address, $password, $role);
                $thong_bao = "Cập nhật thành công";
                $users = loadall_taikhoan();
            }
            include "user/list-user.php";
            break;
        case "listorder":
            $order = loadall_order_admin();
            if (!empty($order)) {
                include "order/listorder.php";
            }
            break;

        case "detail_order":
            $code_cart = $_GET['code_cart'];

            $listorder_detail = loadone_order($code_cart);

            include "order/detail_order.php";
            break;

        case "cap_nhat_sp":
            if (isset($_POST['btn_update']) && ($_POST['btn_update'])) {
                $ma_hang_hoa = $_POST['ma_hang_hoa'];
                $ten_hang_hoa = $_POST['ten_hang_hoa'];
                $don_gia = $_POST['don_gia'];
                $giam_gia = $_POST['giam_gia'];

                $hinh = $_FILES['hinh']['name'];

                $target_dir = "../public/image/";
                $target_file = $target_dir . basename($_FILES['hinh']['name']);

                if (move_uploaded_file($_FILES['hinh']['tmp_name'], $target_file)) {
                    $thong_bao = "Đăng tải ảnh thành công";
                } else {
                    $thong_bao = "Cập nhật hình ảnh thất bại !";
                }

                $ngay_nhap = $_POST['ngay_nhap'];
                $mau = $_POST['mau'];
                $mo_ta = htmlentities($_POST['mo_ta']);
                $thong_so = htmlentities($_POST['thong_so']);
                $dac_biet = $_POST['dac_biet'];
                $so_luot_xem = $_POST['so_luot_xem'];
                $ma_loai = $_POST['ma_loai'];

                cap_nhat_san_pham($ma_hang_hoa, $ten_hang_hoa, $don_gia, $giam_gia, $hinh, $ngay_nhap, $mau, $mo_ta, $thong_so, $dac_biet, $so_luot_xem, $ma_loai);
                $thong_bao = "Cập nhật thành công";
            }
            $danh_sach_sp = lay_tat_ca_san_pham_admin();
            include "san_pham/list.php";
            break;



        case "binh_luan":
            $danh_sach_bl = lay_tat_ca_binh_luan();
            $danh_sach_sp = lay_tat_ca_san_pham_admin();

            include "binh_luan/listbl.php";
            break;
        case "thong_ke":
            $ds_thong_ke_hh = loadall_thongke_2();
            include "thong_ke/list.php";
            break;
        case "chi_tiet_bl":
            if (isset($_GET['ma_hang_hoa']) && ($_GET['ma_hang_hoa'] > 0)) {
                $ds_chi_tiet_bl = lay_binh_luan_theo_hh($_GET['ma_hang_hoa']);
            }
            include "binh_luan/chi_tiet_binh_luan.php";
            break;

        case "xoa_binh_luan":
            if (isset($_GET['id']) && ($_GET['id']) > 0) {
                $tai_khoan = xoa_binh_luan($_GET['id']);
            }
            if (isset($_GET['id_product']) && ($_GET['id_product'] > 0)) {
                $ds_chi_tiet_bl = lay_binh_luan_theo_hh($_GET['id_product']);
            }
            $ds_binh_luan = lay_tat_ca_binh_luan();
            include "binh_luan/listbl.php";
            break;


            /*case "thong_ke":
            $ds_thong_ke_hh = thong_ke_hang_hoa();
            include "thong_ke/list.php";
            break;
            // case "bieu_do":
            //   $ds_thong_ke_hh = thong_ke_hang_hoa();
            //   include "thong_ke/chart.php";
            //   break;*/

        default:
            $danh_muc = count(lay_tat_ca_danh_muc());
            $san_pham = count(lay_tat_ca_san_pham_admin());
            $tai_khoan = count(loadall_taikhoan());
            $binh_luan = count(lay_tat_ca_binh_luan());
            include "layout/home.php";
            break;
    }
} else {
    $danh_muc = count(lay_tat_ca_danh_muc());
    $san_pham = count(lay_tat_ca_san_pham_admin());
    $tai_khoan = count(loadall_taikhoan());
    $binh_luan = count(lay_tat_ca_binh_luan());

    include "layout/home.php";
}