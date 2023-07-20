

            <div class="home mt-5   py-10 mr-8 bg-[#F4F6FA] h-auto rounded">
                <div class="">
                    <h1 class="text-center text-cyan-500 pb-10  text-4xl "
                        style="font-family: 'Courier New', Courier, monospace">LIST ĐƠN HÀNG</h1>
                    <table class="table border-2 border-cyan-500 shadow-lg shadow-cyan-500/50 mx-auto">
                        <tr class="border-2 border-cyan-500  text-[#551AA9] ">
                            <th class="border-2 border-cyan-500   py-2">ID Đơn hàng</th>
                            <th class="border-2 border-cyan-500 px-4 py-2">Chi tiết đơn hàng</th>
                            <th class="border-2 border-cyan-500 px-4 py-2">Tên khách hàng</th>
                            <th class="border-2 border-cyan-500 px-4 py-2">Số điện thoại</th>
                            <th class="border-2 border-cyan-500 px-4 py-2">Địa chỉ</th>
                            <th class="border-2 border-cyan-500 px-4 py-2">Tổng giá trị</th>
                            <th class="border-2 border-cyan-500 px-4 py-2">Trạng Thái</th>
                            <th class="border-2 border-cyan-500 px-4 py-2">Thời gian đặt hàng</th>
                            <th class="border-2 border-cyan-500 px-4 py-2">Phương thức thanh toán</th>
                            <th class="border-2 border-cyan-500 px-4 py-2">
                                Action
                            </th>
                        </tr>
                           
                        <?php  $tong = 0;
                          $i = 0;
                         foreach($order as $order){
                    
                            $status = get_status($order['status']);
                           $pttt = $order['pttt'];
                        $ttdh = 0;
                       if (isset($order['status']) && ($order['status'] != "")) {
                        $ttdh = $order['status'];
                       }
                     echo '
                     <form  action="index.php?act=status" method="post">
                        <tr class="text-[#551AA9] space-x-4">
                     <td class="border-2 border-cyan-500 py-4 px-2 text-center">
                     <tr class="text-[#551AA9] space-x-4">
                            <td class="border-2 border-cyan-500 py-4 px-2 text-center">
                            '.$order['id'].'
                            </td>
                            <td class="border-2 border-cyan-500 py-4 px-2 text-center">
                            <a class="py-1 px-4 bg-[#1E74A4] hover:bg-[#BAAACE] hover:text-white text-white rounded-md mx-2"
                            href="index.php?act=detail_order&code_cart='.$order['code_cart'].'">Xem</a>
                            </td>
                            <td class="border-2 border-cyan-500 py-4  text-center">
                            '.$order['ship_name_user'].'
                            </td>
                            <td class="border-2 border-cyan-500 py-4 px-2 text-center">
                            '.$order['ship_phone_user'].'
                            </td>
                            <td class="border-2 border-cyan-500 py-4 px-2 text-center">
                            '.$order['ship_address'].'
                            </td>
                            <td class="border-2 border-cyan-500 py-2 px-2 text-center ">
                            '.$order['total'].'
                            </td>
                            <td class="border-2 border-cyan-500 py-4  text-center">
                            <select name="status"> ';
                            $liststatus = checkstatus();
                            foreach($liststatus as $liststatus){
                                if($order['status'] == $liststatus['0']){
                                    echo'
                               <option selected="selected" value="'.$liststatus[0].'">'.$liststatus[1].'</option>
                                    ';
                                }
                                else{
                                    echo'
                               <option value="'.$liststatus[0].'">'.$liststatus[1].'</option>
                                    ';
                                }
                            }
                            echo '
                        </select>
                            </td>
                            <td class="border-2 border-cyan-500 py-4  text-center">
                            '.$order['time'].'
                            </td>
                            <td class="border-2 border-cyan-500 py-4  text-center">
                            '.$pttt.'
                            <td class="border-2 border-cyan-500 py-4 px-2 text-center">
                                    <input type="hidden" name="id" value="'.$order['id'].'">
                                    <input class="py-1 px-4 bg-[#1E74A4] hover:bg-[#BAAACE] hover:text-white text-white rounded-md mx-2" type="submit" name="luu" value="Lưu">
                            </td>
                        </tr>
                        </td>
        </tr>
        </form>
     
        ';} ?>
                      
                      
                        
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>