<div class="home mt-5  px-40 py-10 mr-8 bg-[#F4F6FA] h-auto rounded">
    <h1 class="text-center text-cyan-500 py-6  text-4xl " style="font-family: 'Courier New', Courier, monospace">THÊM NGƯỜI DÙNG</h1>
    <div class="grid grid-cols-2 items-center">
        <div class="ad-r">
            <div class="">

                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: #5fe6c2;">
                        <path d="M15 11h7v2h-7zm1 4h6v2h-6zm-2-8h8v2h-8zM4 19h10v-1c0-2.757-2.243-5-5-5H7c-2.757 0-5 2.243-5 5v1h2zm4-7c1.995 0 3.5-1.505 3.5-3.5S9.995 5 8 5 4.5 6.505 4.5 8.5 6.005 12 8 12z">
                        </path>
                    </svg>
                    <a href="index.php?act=list-user" class="text-[20px] mx-4 font-semibold text-sky-600 ">Danh
                        sách</a>
                </div>

            </div>
            <form action="index.php?act=them_tai_khoan" method="POST" enctype="multipart/form-data">
                <p class="text-[#551AA9] text-[20px] my-4" for="">Họ và tên :</p>
                <input required type="text" name="full_name" placeholder="name....." class="px-10 py-2 rounded-md">
                <p class="text-[#551AA9] text-[20px] my-4" for="">Email *</p>
                <input required type="email" name="email" placeholder="Email....." class="px-10 py-2 rounded-md">
                <p class="text-[#551AA9] text-[20px] my-4" for="">Tài khoản</p>
                <input required type="text" name="user_name" placeholder="username....." class="px-10 py-2 rounded-md">

                <p class="text-[#551AA9] text-[20px] my-4" for="">Mật khẩu</p>
                <input required type="password" name="password" placeholder="******" class="px-10 py-2 rounded-md">
                <p class="text-[#551AA9] text-[20px] my-4" for="">Điện Thoại *</p>
                <input required type="number" name="phone" placeholder="+098....." class="px-10 py-2 rounded-md">
                <p class="text-[#551AA9] text-[20px] my-4" for="">Địa chỉ *</p>
                <input required type="text" name="address" placeholder="Hà Nội....." class="px-10 py-2 rounded-md">
                <div class=" py-10 space-y-4 space-x-4">
                    <label for="" class="text-[#551AA9] text-[20px] my-4">Vai trò *</label><br>
                    <input type="radio" name="role" value="0"><label for="">Khách hàng</label>
                    <input type="radio" name="role" value="1"><label for="">Quản trị viên</label>
                </div>
                <input type="submit" name="btn_insert" value="Add User" class="bg-[#ff523b] my-10 py-2 px-8 hover:bg-[#BAAACE] hover:text-white rounded-lg">
            </form>
        </div>
        <div class="">
            <hr class="my-10">
            <img class="rounded" src="../upload/adduser.jpg" alt="">
            <hr class="my-10">
        </div>
    </div>
</div>