<div class="home pb-4 mt-5 mr-8 bg-[#F4F6FA] h-auto rounded">
    <!-- content -->
    <h1 class="text-center text-cyan-500 pt-6 pb-8  text-4xl " style="font-family: 'Courier New', Courier, monospace">THỐNG KÊ DANH MỤC</h1>
    <div class="">
        <table class="table  shadow-2xl shadow-cyan-500/50 mx-auto border-2 border-cyan-500/50mx-auto my-5">
            <tr class="border-2 border-cyan-500/50  text-[#551AA9] ">
                <th class="border-2 border-cyan-500/50  px-6 py-2">Mã danh mục</th>
                <th class="border-2 border-cyan-500/50  px-6 py-2">Tên danh mục</th>
                <th class="border-2 border-cyan-500/50  px-6 py-2">Số lượng đã bán</th>
                <th class="border-2 border-cyan-500/50  px-6 py-2">Giá</th>
            </tr>
            <?php
            // if ((isset($ds_thong_ke_hh)) && ($ds_thong_ke_hh != [])) {
                // foreach ($ds_thong_ke_hh as $dstk) {
                    $r=mysqli_query($db_con,"SELECT * FROM categories");
                    while($row=mysqli_fetch_assoc($r)){
                        $madm=$row['id'];
                        $tendm=$row['categories_name'];
                        if(mysqli_fetch_array(mysqli_query($db_con,"SELECT product_price FROM product WHERE id_categories='$madm'"))){
                            $pro_id=mysqli_fetch_array(mysqli_query($db_con,"SELECT id FROM product WHERE id_categories='$madm'"))['id'];
                        $maxprice=mysqli_fetch_array(mysqli_query($db_con,"SELECT product_price FROM product WHERE id_categories='$madm'"))['product_price'];
                        $minprice=$maxprice;
                        $avgprice=($minprice+$maxprice)/2;
                        // $countsp=mysqli_fetch_array(mysqli_query($db_con,"SELECT origin FROM product WHERE id_categories='$madm'"))['origin'];
                        $ch=mysqli_query($db_con,"SELECT * FROM `order` WHERE status=3 ");
                        $countsp=0;
                        while($c=mysqli_fetch_assoc($ch)){
                            $id_order=$c['code_cart'];
                            $countsp+=mysqli_fetch_array(mysqli_query($db_con,"SELECT count(*) FROM detail_order WHERE id_product=$pro_id and id_order='$id_order'"))['count(*)'];
                        }

                        
            ?>
                    <tr class="border-2 border-cyan-500/50  px-6 py-2">
                        <td class="border-2 border-cyan-500/50 text-center px-6 py-2"><?= $madm ?></td>
                        <td class="border-2 border-cyan-500/50 text-center  px-6 py-2"><?= $tendm ?></td>
                        <td class="border-2 border-cyan-500/50 text-center px-6 py-2"><?= $countsp ?></td>
                        <td class="border-2 border-cyan-500/50 text-center px-6 py-2"><?= number_format($maxprice) ?></td>
                        <!-- <td class="border-2 border-cyan-500/50 text-center  px-6 py-2"><?= number_format($minprice) ?></td> -->
                        <!-- <td class="border-2 border-cyan-500/50 text-center  px-6 py-2"><?= number_format($avgprice) ?></td> -->
                    </tr>
            <?php
                }
            }
            ?>
        </table>
        <!-- <div class="bg-[#F8FAFC] text-center mx-10 my-10 shadow-cyan-500 shadow-lg px-8 py-3 rounded-lg w-[15%]">
            <a href="">XEM BIỂU ĐỒ</a>
        </div> -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
        <center style="height:500px">
        <canvas id="myChart" style="width:400px"></canvas>
        <?php
        $DonHangMoi=mysqli_fetch_array(mysqli_query($db_con,"SELECT count(*) FROM `order` WHERE status=0"))['count(*)'];
        $DangXuLi=mysqli_fetch_array(mysqli_query($db_con,"SELECT count(*) FROM `order` WHERE status=1"))['count(*)'];
        $DangGiaoHang=mysqli_fetch_array(mysqli_query($db_con,"SELECT count(*) FROM `order` WHERE status=2"))['count(*)'];
        $DaGiaoHang=mysqli_fetch_array(mysqli_query($db_con,"SELECT count(*) FROM `order` WHERE status=3"))['count(*)'];
        ?>
        </center>


    <script>
   var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Đơn hàng mới', 'Đang xử li', 'Đang giao hàng', 'Đã giao hàng'],
        datasets: [{
            label: 'Tổng đơn: ',
            data: [<?=$DonHangMoi?>, <?=$DangXuLi?>, <?=$DangGiaoHang?>, <?=$DaGiaoHang?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 2
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

        </script>
    </div>
    <div>
    <h1 class="text-center text-cyan-500 pt-6 pb-8  text-4xl " style="font-family: 'Courier New', Courier, monospace">THỐNG KÊ SẢN PHẨM</h1>

    <table class="table  shadow-2xl shadow-cyan-500/50 mx-auto border-2 border-cyan-500/50mx-auto my-5">
            <tr class="border-2 border-cyan-500/50  text-[#551AA9] ">
                <th class="border-2 border-cyan-500/50  px-6 py-2">Mã sản phẩm</th>
                <th class="border-2 border-cyan-500/50  px-6 py-2">Tên sản phẩm</th>
                <th class="border-2 border-cyan-500/50  px-6 py-2">Giá tiền</th>
                <th class="border-2 border-cyan-500/50  px-6 py-2">Img</th>
                <th class="border-2 border-cyan-500/50  px-6 py-2">Đã bán</th>


                <!-- <th class="border-2 border-cyan-500/50  px-6 py-2">Giá cao nhất</th>
                <th class="border-2 border-cyan-500/50  px-6 py-2">Giá thấp nhất</th>
                <th class="border-2 border-cyan-500/50  px-6 py-2">Giá trung bình</th> -->
            </tr>
            <?php
            // if ((isset($ds_thong_ke_hh)) && ($ds_thong_ke_hh != [])) {
                // foreach ($ds_thong_ke_hh as $dstk) {
                    $r=mysqli_query($db_con,"SELECT * FROM product");
                    while($row=mysqli_fetch_assoc($r)){
                        $madm=$row['id'];
                        $product_name=$row['product_name'];
                        $product_price=$row['product_price'];
                        $countB=mysqli_fetch_array(mysqli_query($db_con,"SELECT count(*) FROM detail_order WHERE id_product='{$row['id']}'"))['count(*)'];
                        

                        
            ?>
                    <tr class="border-2 border-cyan-500/50  px-6 py-2">
                        <td class="border-2 border-cyan-500/50 text-center px-6 py-2"><?= $madm ?></td>
                        <td class="border-2 border-cyan-500/50 text-center  px-6 py-2"><?= $product_name ?></td>
                        <td class="border-2 border-cyan-500/50 text-center px-6 py-2"><?= number_format($product_price) ?> VNĐ</td>
                        <td class="border-2 border-cyan-500/50 text-center px-6 py-2" ><img  style="height:40px;width:40px;border:1px green dashed;border-radius:100%" src="../upload/<?=$row['image']?>" alt=""></td>
                   
                        <td class="border-2 border-cyan-500/50 text-center  px-6 py-2"><?= $countB ?></td>

                        <!-- <td class="border-2 border-cyan-500/50 text-center  px-6 py-2"><?= number_format($avgprice) ?></td> -->
                    </tr>
            <?php
            }
            ?>
        </table>
    </div>
</div>

</div>
</div>
</body>

</html>