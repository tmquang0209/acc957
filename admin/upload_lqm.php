<?php
require('../system/function.php');
require('head.php');

$in_rank = array(
    'chua', 
    'dong_v', 'dong_iv', 'dong_iii' ,'dong_ii','dong_i' , 
    'bac_v','bac_iv','bac_iii','bac_ii','bac_i',
    'vang_v','vang_iii','vang_ii','vang_i',
    'bachkim_v','bachkim_iv','bachkim_iii','bachkim_ii','bachkim_i',
    'kimcuong_v','kimcuong_iv','kimcuong_iii','kimcuong_ii','kimcuong_i',
    'tinhanh_i','tinhanh_ii','tinhanh_iii','tinhanh_iv','tinhanh_v',
    'caothu','thachdau'
);

if (isset($_POST['submit'])) {
    $taikhoan = xss($_POST['taikhoan']);
    $matkhau = xss($_POST['matkhau']);
    $bangngoc = (int)$_POST['bangngoc'];
    $bacngoc = (int)$_POST['bacngoc'];
    $gold = (int)$_POST['gold'];
    $ruby = (int)$_POST['ruby'];
    $quanhuy = (int)$_POST['quanhuy'];
    $rank = xss($_POST['rank']);
    $giatien = (int)abs($_POST['giatien']);
    $noibat = xss($_POST['noibat']);
    $image = xss($_POST['image']);

    if (!empty($giatien)) {
        if (in_array($rank, $in_rank, true)) {
            $db->exec("INSERT INTO `nick` SET
            `user` = '" . data_user('username') . "', 
            `account` = '$taikhoan', 
            `password` = '$matkhau', 
            `cash` = '$giatien', 
            `loainick` = '4',
            `info1` = '$bangngoc', 
            `info2` = '$bacngoc', 
            `info3` = '$gold',
            `info4` = '$ruby',
            `info5` = '$quanhuy',
            `info6` = '$rank',
            `noibat` = '$noibat', 
            `status` = '0', 
            `image` = '$image', 
            `date` = '" . date("H:i:s d-m-Y") . "'
            ");
            echo '<div class="alert alert-success" role="alert">Upload success!</div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">BUGGGGG!</div>';
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">Please complete all information!</div>';
    }
}

?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <h1 class="h3 mb-4 text-gray-800">Nick Freefire</h1>
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Đăng tài khoản</h4>
                    <form class="forms-sample" method="POST">
                        <div class="row form-group">

                            <div class="col-2">
                                <label>Bảng ngọc</label>
                                <input class="form-control" name="bangngoc" />
                            </div>

                            <div class="col-2">
                                <label>Bậc ngọc</label>
                                <input class="form-control" name="bacngoc" />
                            </div>
                            <div class="col-2">
                                <label>Vàng</label>
                                <input class="form-control" name="gold" />
                            </div>
                            <div class="col-2">
                                <label>Ruby</label>
                                <input class="form-control" name="ruby">
                            </div>
                            <div class="col-2">
                                <label>Quân huy</label>
                                <input class="form-control" name="quanhuy">
                            </div>
                            <div class="col-2">
                                <label>Rank</label>
                                <select class="form-control" name="rank">
                                    <option value="chua">Chưa rank</option>
                                    <option value="dong_v">Đồng V</option>
                                    <option value="dong_iv">Đồng IV</option>
                                    <option value="dong_iii">Đồng III</option>
                                    <option value="dong_ii">Đồng II</option>
                                    <option value="dong_i">Đồng I</option>
                                    <option value="bac_v">Bạc V</option>
                                    <option value="bac_iv">Bạc IV</option>
                                    <option value="bac_iii">Bạc III</option>
                                    <option value="bac_ii">Bạc II</option>
                                    <option value="bac_i">Bạc I</option>
                                    <option value="vang_v">Vàng V</option>
                                    <option value="vang_iv">Vàng IV</option>
                                    <option value="vang_iii">Vàng III</option>
                                    <option value="vang_ii">Vàng II</option>
                                    <option value="vang_i">Vàng I</option>
                                    <option value="bachkim_v">Bạch Kim V</option>
                                    <option value="bachkim_iv">Bạch Kim IV</option>
                                    <option value="bachkim_iii">Bạch Kim III</option>
                                    <option value="bachkim_ii">Bạch Kim II</option>
                                    <option value="bachkim_i">Bạch Kim I</option>
                                    <option value="kimcuong_v">Kim Cương V</option>
                                    <option value="kimcuong_iv">Kim Cương IV</option>
                                    <option value="kimcuong_iii">Kim Cương III</option>
                                    <option value="kimcuong_ii">Kim Cương II</option>
                                    <option value="kimcuong_i">Kim Cương I</option>
                                    <option value="tinhanh_i">Tinh Anh I</option>
                                    <option value="tinhanh_ii">Tinh Anh II</option>
                                    <option value="tinhanh_iii">Tinh Anh III</option>
                                    <option value="tinhanh_iv">Tinh Anh IV</option>
                                    <option value="tinhanh_v">Tinh Anh V</option>
                                    <option value="caothu">Cao thủ</option>
                                    <option value="thachdau">Thách đấu</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">

                            <div class="col-4">
                                <label>Tài khoản</label>
                                <input type="text" name="taikhoan" class="form-control" />
                            </div>
                            <div class="col-4">
                                <label>Mật khẩu</label>
                                <input type="text" name="matkhau" class="form-control" />
                            </div>
                            <div class="col-4">
                                <label>Giá tiền</label>
                                <input class="form-control" name="giatien" type="number">

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Thông tin nổi bật</label>
                            <textarea class="form-control" name="noibat" rows="10"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Hình ảnh minh họa</label>
                            <textarea class="form-control" name="image" rows="10"></textarea>
                        </div>


                        <button type="submit" name="submit" class="btn btn-primary mr-2">Submit</button>

                    </form>
                </div>
                <!-- /.container-fluid -->


            </div>
            <!-- End of Main Content -->
            <?php
            require('foot.php');
            ?>