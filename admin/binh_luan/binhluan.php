

            <div class="home mt-5   py-10 mr-8 bg-[#F4F6FA] h-auto rounded">
                <div class="">
                    <h1 class="text-center text-cyan-500 pb-10  text-4xl "
                        style="font-family: 'Courier New', Courier, monospace">TỔNG HỢP BÌNH LUẬN</h1>
                    <table class="table border-2 border-cyan-500 shadow-lg shadow-cyan-500/50 mx-auto">
                        <tr class="border-2 border-cyan-500  text-[#551AA9] ">
                            <th class="border-2 border-cyan-500 px-4 py-2">Tên KH</th>
                            <th class="border-2 border-cyan-500 px-10 py-2">Hàng hóa</th>
                            <th class="border-2 border-cyan-500 px-4 py-2">Số bình luận</th>
                            <th class="border-2 border-cyan-500 px-4 py-2">Ngày bình luận</th>
                            <th class="border-2 border-cyan-500 px-4 py-2">Đánh giá</th>
                            <th class="border-2 border-cyan-500 px-[180px] py-2">Nội Dung</th>


                        </tr>

                        <?php foreach ($cates as $cate) : ?>
                        <tr class="text-[#551AA9] space-x-4">

                            <td class="border-2 border-cyan-500 py-4 px-2 text-center">
                                Duy
                            </td>
                            <td class="border-2 border-cyan-500 py-4  text-center">
                                Túi Dior Lớn
                            </td>

                            <td class="border-2 border-cyan-500 py-4 px-2 text-center">
                                1
                            </td>
                            <td class="border-2 border-cyan-500 py-4 px-2 text-center">
                                04/12/2022
                            </td>
                            <td class="border-2 border-cyan-500 py-2 px-2 text-center ">
                                5 sao
                            </td>
                            <td class="border-2 border-cyan-500 py-4  text-center">
                                Sản Phẩm Đẹp
                            </td>


                            <td class="border-2 border-cyan-500 py-4 px-2 text-center">
                                <a class="py-1 px-4 bg-[#1E74A4] hover:bg-[#BAAACE] hover:text-white text-white rounded-md mx-2"
                                    href="edit-cate.php?cate_id=<?= $cate['cate_id'] ?>">Xóa</a>

                            </td>
                        </tr>
                        <tr class="text-[#551AA9] ">

                            <td class="border-2 border-cyan-500 py-4 px-2 text-center">
                                Phi
                            </td>
                            <td class="border-2 border-cyan-500 py-4  text-center">
                                Dép LV Blue
                            </td>

                            <td class="border-2 border-cyan-500 py-4 px-2 text-center">
                                2
                            </td>
                            <td class="border-2 border-cyan-500 py-4 px-2 text-center">
                                03/12/2022
                            </td>
                            <td class="border-2 border-cyan-500 py-2 px-2 text-center ">
                                4 sao
                            </td>
                            <td class="border-2 border-cyan-500 py-4  text-center">
                                Hàng hóa đúng như mẫu chuẩn đẹp
                            </td>


                            <td class="border-2 border-cyan-500 py-4 px-2 text-center">
                                <a class="py-1 px-4 bg-[#1E74A4] hover:bg-[#BAAACE] hover:text-white text-white rounded-md mx-2"
                                    href="edit-cate.php?cate_id=<?= $cate['cate_id'] ?>">Xóa</a>

                            </td>
                        </tr>
                        <?php endforeach ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>