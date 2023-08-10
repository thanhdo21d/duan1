<div class="home pb-4 mt-5 mr-8 bg-[#F4F6FA] h-auto rounded">
    <!-- content -->
    <h1 class="text-center text-cyan-500 pt-6 pb-8  text-4xl " style="font-family: 'Courier New', Courier, monospace">THỐNG KÊ</h1>
    <div class="">
        <table class="table  shadow-2xl shadow-cyan-500/50 mx-auto border-2 border-cyan-500/50mx-auto my-5">
            <tr class="border-2 border-cyan-500/50  text-[#551AA9] ">
                <th class="border-2 border-cyan-500/50  px-6 py-2">Mã danh mục</th>
                <th class="border-2 border-cyan-500/50  px-6 py-2">Tên danh mục</th>
                <th class="border-2 border-cyan-500/50  px-6 py-2">Số lượng </th>
                <th class="border-2 border-cyan-500/50  px-6 py-2">Giá cao nhất</th>
                <th class="border-2 border-cyan-500/50  px-6 py-2">Giá thấp nhất</th>
                <th class="border-2 border-cyan-500/50  px-6 py-2">Giá trung bình</th>
            </tr>
            <?php
            if ((isset($ds_thong_ke_hh)) && ($ds_thong_ke_hh != [])) {
                foreach ($ds_thong_ke_hh as $dstk) {
                    extract($dstk);

            ?>
                    <tr class="border-2 border-cyan-500/50  px-6 py-2">
                        <td class="border-2 border-cyan-500/50 text-center px-6 py-2"><?= $madm ?></td>
                        <td class="border-2 border-cyan-500/50 text-center  px-6 py-2"><?= $tendm ?></td>
                        <td class="border-2 border-cyan-500/50 text-center px-6 py-2"><?= $countsp ?></td>
                        <td class="border-2 border-cyan-500/50 text-center px-6 py-2"><?= number_format($maxprice) ?></td>
                        <td class="border-2 border-cyan-500/50 text-center  px-6 py-2"><?= number_format($minprice) ?></td>
                        <td class="border-2 border-cyan-500/50 text-center  px-6 py-2"><?= number_format($avgprice) ?></td>
                    </tr>
            <?php
                }
            }
            ?>
        </table>
        <div class="bg-[#F8FAFC] text-center mx-10 my-10 shadow-cyan-500 shadow-lg px-8 py-3 rounded-lg w-[15%]">
            <a href="">XEM BIỂU ĐỒ</a>
        </div>
    </div>
</div>

</div>
</div>
</body>

</html>