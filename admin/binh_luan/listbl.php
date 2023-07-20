<div class="home mt-5 mr-8 bg-[#F4F6FA] h-auto rounded">
    <!-- content -->
    <h1 class="text-center text-cyan-500 pt-6 pb-8  text-4xl " style="font-family: 'Courier New', Courier, monospace">List BÌNH LUẬN</h1>
    <div class="">
        <table class="table shadow-2xl shadow-cyan-500/50 mx-auto border-2 border-cyan-500/50mx-auto my-5">
            <tr class="border-2 border-cyan-500/50  text-[#551AA9] ">
                <th class="border-2 border-cyan-500/50  px-6 py-2">Hàng hóa</th>
                <th class="border-2 border-cyan-500/50  px-6 py-2">Nội dung</th>
                <th class="border-2 border-cyan-500/50  px-6 py-2">Ngày BL</th>
                <th class="border-2 border-cyan-500/50  px-6 py-2">Người BL</th>
                <th class="border-2 border-cyan-500/50  px-6 py-2">Đánh giá</th>
                <th class="border-2 border-cyan-500/50  px-6 py-2"></th>
            </tr>
            <?php
            if ((isset($danh_sach_bl)) && ($danh_sach_bl != [])) {
                foreach ($danh_sach_bl as $dsbl) {
                    extract($dsbl);
                    $product = lay_san_pham_theo_ma($id_product);
                    $user = lay_tai_khoan_theo_ma($id_user);
                    $xoabl = "index.php?act=xoa_binh_luan&id=" . $id . "&id_product=" . $id_product;
            ?>
                    <tr class="border-2 border-cyan-500/50  px-6 py-2">
                        <td class="border-2 border-cyan-500/50 text-center px-6 py-2"><?= $product['product_name'] ?></td>
                        <td class="border-2 border-cyan-500/50 text-center  px-6 py-2"><?= $comment ?></td>
                        <td class="border-2 border-cyan-500/50 text-center px-6 py-2"><?= $ngay_bl ?></td>
                        <td class="border-2 border-cyan-500/50 text-center px-6 py-2"><?= $user['user_name'] ?></td>
                        <td class="border-2 border-cyan-500/50 text-center  px-6 py-2"><?= $stars ?><span> sao</span></td>
                        <td><a onclick="return confirm('Bạn có muốn xóa không')" class="text-white text-center hover:bg-[#BAAACE] hover:text-white bg-[#AC3131] py-1 px-4 rounded-md mx-2" href="<?= $xoabl ?>">Xóa</a></td>
                    </tr>
            <?php
                }
            }
            ?>
        </table>
    </div>
</div>

</div>
</div>
</body>

</html>