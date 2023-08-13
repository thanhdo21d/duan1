<div class="home mt-5 mr-8 bg-[#F4F6FA] h-auto rounded">
    <div class="admin   px-40 py-4 my-10 mx-8 rounded-md">
        <div class="search2 text-center">

            <input type="text" placeholder="Thêm Users" class="mt-5 text-center rounded-md  px-24 py-1">

        </div>


        <div class="ad-r">
            <div class="grid grid-cols-2 justify-between">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: #1884C7;">
                        <path d="M19 8h-2v3h-3v2h3v3h2v-3h3v-2h-3zM4 8a3.91 3.91 0 0 0 4 4 3.91 3.91 0 0 0 4-4 3.91 3.91 0 0 0-4-4 3.91 3.91 0 0 0-4 4zm6 0a1.91 1.91 0 0 1-2 2 1.91 1.91 0 0 1-2-2 1.91 1.91 0 0 1 2-2 1.91 1.91 0 0 1 2 2zM4 18a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3v1h2v-1a5 5 0 0 0-5-5H7a5 5 0 0 0-5 5v1h2z">
                        </path>
                    </svg>
                    <h1 class="text-[20px] mx-4 font-semibold text-sky-600 my-5">Thêm sản phẩm</h1>
                </div>
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: #5fe6c2;">
                        <path d="M15 11h7v2h-7zm1 4h6v2h-6zm-2-8h8v2h-8zM4 19h10v-1c0-2.757-2.243-5-5-5H7c-2.757 0-5 2.243-5 5v1h2zm4-7c1.995 0 3.5-1.505 3.5-3.5S9.995 5 8 5 4.5 6.505 4.5 8.5 6.005 12 8 12z">
                        </path>
                    </svg>
                    <a href="index.php?act=listsp" class="text-[20px] mx-4 font-semibold text-sky-600 ">Danh
                        sách</a>
                </div>

            </div>
            <form action="index.php?act=them_san_pham" method="post" enctype="multipart/form-data" class="" id="update_hang_hoa">


                <p class="text-[#551AA9] text-[20px] my-4" for="">Tên Sản Phẩm</p>
                <input type="text" required name="product_name"  class="border w-full px-10 rounded-lg py-2 mt-2">

                <p class="text-[#551AA9] text-[20px] my-4" for="">Giá</p><input required type="text" name="product_price"  class="border w-full px-10 rounded-lg py-2 mt-2">

                <p class="text-[#551AA9] text-[20px] my-4" for="">Giảm Giá</p><input required type="text" name="product_price_sale"  class="border w-full px-10 rounded-lg py-2 mt-2">


                <br>
                <label class="uppercase font-1xl  text-[#551AA9] text-[20px] my-4">Mô tả</label>
                <br>
                <textarea required cols="30" rows="10" placeholder="Expensive ..." name="description" class="border w-full rounded-lg px-10 py-2 h-48 mt-2"></textarea>


                <p class="text-[#551AA9] text-[20px] my-4" for="">Image Main</p>
                <input required type="file" name="image" class=" text-[#551AA9] text-[20px] my-2">

                <p class="text-[#551AA9] text-[20px] my-4" for="">Image 2</p>
                <input required type="file" name="image2" class=" text-[#551AA9] text-[20px] my-2">

                <p class="text-[#551AA9] text-[20px] my-4" for="">Image 3</p>
                <input required type="file" name="image3" class=" text-[#551AA9] text-[20px] my-2">



                <p class="text-[#551AA9] text-[20px] my-4" for="">Origin</p><input required type="text" name="origin"  class="border w-full px-10 rounded-lg py-2 mt-2">



                <p class="text-[#551AA9] text-[20px] my-4" for="">Cate_Id</p>
                <select name="id_categories" id="" class="w-full border rounded-lg px-10 py-2">
                    <?php
                    foreach ($ds_danh_muc as $dsdm) {
                        extract($dsdm);
                    ?>
                        <option value="<?= $id  ?>">
                            <?= $categories_name ?>
                        </option>
                    <?php
                    }
                    ?>
                </select>
                <?php
                if (isset($thong_bao) && ($thong_bao != "")) {
                    echo "<h3 class='alert-text'>$thong_bao</h3>";
                }
                ?>
                <button type="submit" name="btn_luu" class="bg-[#ff523b] my-10 py-2 px-8 hover:bg-[#BAAACE] hover:text-white rounded-lg">Add
                    Cate</button>
            </form>
        </div>

    </div>
</div>
</div>
</body>

</html>