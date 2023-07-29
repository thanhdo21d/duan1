<div class="detail-pro-review">
    <h1 class="detail-pro-review-title text-2xl">Nhận xét đánh giá</h1>
    <?php
    foreach ($danh_sach_bl as $dsbl) {
        extract($dsbl);
    ?>
        <br>

        <div class="detail-pro-user-review">
            <div class="detail-pro-user-rate">
                <span class="detail-pro-date"><?= $ngay_bl ?></span>
                <div class="detail-pro-user-stars">
                    <?php
                    for ($i = 1; $i <= $stars; $i++) {
                        echo "<span class='fa fa-star detail-pro-user-icon'></span>";
                    }
                    ?>
                </div>
                <span class="detail-pro-user-info">by <?= $user_name ?></span>
            </div>
            <p class="detail-pro-user-commet">
                <?= $comment ?>
            </p>
        </div>

    <?php
    }
    ?>
    <?php
    $check = false;
    $id_product = $pro['id'];

    if (isset($_SESSION['id_user'])) {
        $order = checkcomment($_SESSION['id_user']);
        foreach ($order as $order) {
            if ($id_product == $order['id_product']) {
                $check = true;
                break;
            }
        }
    }

    if (isset($_SESSION['dangky']) && ($check == true)) {
        $id = $_SESSION['id_user'];
        $order = loadall_order($id);
        echo '
               

    </form>

</div>
<!-- End detail product review -->