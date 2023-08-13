<div class="home mt-5 mr-8 bg-[#F4F6FA] h-auto rounded px-10">
    <h1 class="text-center text-cyan-500 pt-10  text-4xl " style="font-family: 'Courier New', Courier, monospace">Add DANH MỤC</h1>
    <div class="ad-r px-40 py-10 grid grid-cols-2 items-center">
        <div class="">
            <div class="">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: #1884C7;">
                        <path d="M19 8h-2v3h-3v2h3v3h2v-3h3v-2h-3zM4 8a3.91 3.91 0 0 0 4 4 3.91 3.91 0 0 0 4-4 3.91 3.91 0 0 0-4-4 3.91 3.91 0 0 0-4 4zm6 0a1.91 1.91 0 0 1-2 2 1.91 1.91 0 0 1-2-2 1.91 1.91 0 0 1 2-2 1.91 1.91 0 0 1 2 2zM4 18a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3v1h2v-1a5 5 0 0 0-5-5H7a5 5 0 0 0-5 5v1h2z">
                        </path>
                    </svg>
                    <h1 class="text-[20px] mx-4 font-semibold text-sky-600 my-5">Thêm danh mục</h1>
                </div>
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: #5fe6c2;">
                        <path d="M15 11h7v2h-7zm1 4h6v2h-6zm-2-8h8v2h-8zM4 19h10v-1c0-2.757-2.243-5-5-5H7c-2.757 0-5 2.243-5 5v1h2zm4-7c1.995 0 3.5-1.505 3.5-3.5S9.995 5 8 5 4.5 6.505 4.5 8.5 6.005 12 8 12z">
                        </path>
                    </svg>
                    <a href="index.php?act=list-cate" class="text-[20px] mx-4 font-semibold text-sky-600 ">Danh sách</a>
                </div>

            </div>

            <form action="index.php?act=them_dm" method="post" enctype="multipart/form-data" class="">


                <p class="text-[#551AA9] text-[20px] my-4" for="">Cate_Name</p><input type="text" required name="categories_name" placeholder="Túi ...." class=" px-10 py-2 rounded-md">
                <p class="text-[#551AA9] text-[20px] my-4" for="">Image</p>
                <input required type="file" name="image" class="text-[#551AA9] text-[20px] my-2 ">


                <br>
                <button type="submit" name="btn_luu" class="bg-[#ff523b] my-10 py-2 px-8 hover:bg-[#BAAACE] hover:text-white rounded-lg">Add
                    Cate</button>
            </form>
            <?php
            if (isset($thong_bao) && ($thong_bao != "")) {
                echo "<h3 class='alert-text'>$thong_bao</h3>";
            }
            ?>
        </div>
        <div class="">
            <hr class="my-10">
            <img class="shadow-2xl shadow-cyan-500/50" src="../upload/danhmuc123.jpg" alt="">
            <hr class="my-10">
        </div>
    </div>
</div>
</div>
</div>
</body>

</html>