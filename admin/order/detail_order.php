
            <div class="home mt-5 mr-8 bg-[#F4F6FA] h-auto rounded">
                <!-- content -->
                <h1 class="text-center text-cyan-500 pt-6 pb-8  text-4xl "
                    style="font-family: 'Courier New', Courier, monospace">CHI TIẾT ĐƠN HÀNG</h1>

                <div class="px-40">
                    <div class="">      
                    <hr>
                  
                     

                            <?php 
                            $tong = 0;
                            foreach($listorder_detail as $listorder){
                                $price = $listorder['quanlity']*$listorder['product_price'];
                                $tong += $price;
                                $hinh = $img_path . $listorder['image'];
                                $id_size = $listorder['size'];
                                $id_color = $listorder['color'];
                                $size = $listorder['size'];
                                $color = $listorder['color'];
                                
                            echo '
                            <div class="flex my-10 grid grid-cols-4">
                        <div class="bg-[#F3F3F5]"><img srcset="'.$hinh.' 4x" alt=""></div>

                        <div class="mx-10 flex justify-between items-center col-span-3">
                            <div class="">
                        <h3 class="font-semibold">'.$listorder['product_name'].'</h3>
                        <label class="my-10">Số Lượng : x'.$listorder['quanlity'].'</label><br>
                        <label class="my-10">Phân loại hàng : Size '.$size.", màu: ".$color.'  </label>
                    </div>

                    <div class="">
                        <span>'.$listorder['product_price'].' VNĐ</span>
                    </div>
                </div>
                                
                </div>
                       
                   
                      ';
                    }
                    echo '<div class="flex items-center text-xl space-x-2 justify-end my-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        class="bi bi-basket2-fill" viewBox="0 0 16 16">
                        <path
                            d="M5.929 1.757a.5.5 0 1 0-.858-.514L2.217 6H.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h.623l1.844 6.456A.75.75 0 0 0 3.69 15h8.622a.75.75 0 0 0 .722-.544L14.877 8h.623a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1.717L10.93 1.243a.5.5 0 1 0-.858.514L12.617 6H3.383L5.93 1.757zM4 10a1 1 0 0 1 2 0v2a1 1 0 1 1-2 0v-2zm3 0a1 1 0 0 1 2 0v2a1 1 0 1 1-2 0v-2zm4-1a1 1 0 0 1 1 1v2a1 1 0 1 1-2 0v-2a1 1 0 0 1 1-1z" />
                    </svg>
                    <label for="" class="text-xl font-semibold">Tổng Tiền : '.$tong.' </label>

                    </div>';
                            ?>
                    <hr>
                    
                <hr class="my-10">
            </div>
        </div>
    </div>
</body>

</html>