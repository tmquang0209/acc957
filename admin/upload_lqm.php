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
                    <h4 class="card-title">????ng t??i kho???n</h4>
                    <form class="forms-sample" method="POST">
                        <div class="row form-group">

                            <div class="col-2">
                                <label>B???ng ng???c</label>
                                <input class="form-control" name="bangngoc" />
                            </div>

                            <div class="col-2">
                                <label>B???c ng???c</label>
                                <input class="form-control" name="bacngoc" />
                            </div>
                            <div class="col-2">
                                <label>V??ng</label>
                                <input class="form-control" name="gold" />
                            </div>
                            <div class="col-2">
                                <label>Ruby</label>
                                <input class="form-control" name="ruby">
                            </div>
                            <div class="col-2">
                                <label>Qu??n huy</label>
                                <input class="form-control" name="quanhuy">
                            </div>
                            <div class="col-2">
                                <label>Rank</label>
                                <select class="form-control" name="rank">
                                    <option value="chua">Ch??a rank</option>
                                    <option value="dong_v">?????ng V</option>
                                    <option value="dong_iv">?????ng IV</option>
                                    <option value="dong_iii">?????ng III</option>
                                    <option value="dong_ii">?????ng II</option>
                                    <option value="dong_i">?????ng I</option>
                                    <option value="bac_v">B???c V</option>
                                    <option value="bac_iv">B???c IV</option>
                                    <option value="bac_iii">B???c III</option>
                                    <option value="bac_ii">B???c II</option>
                                    <option value="bac_i">B???c I</option>
                                    <option value="vang_v">V??ng V</option>
                                    <option value="vang_iv">V??ng IV</option>
                                    <option value="vang_iii">V??ng III</option>
                                    <option value="vang_ii">V??ng II</option>
                                    <option value="vang_i">V??ng I</option>
                                    <option value="bachkim_v">B???ch Kim V</option>
                                    <option value="bachkim_iv">B???ch Kim IV</option>
                                    <option value="bachkim_iii">B???ch Kim III</option>
                                    <option value="bachkim_ii">B???ch Kim II</option>
                                    <option value="bachkim_i">B???ch Kim I</option>
                                    <option value="kimcuong_v">Kim C????ng V</option>
                                    <option value="kimcuong_iv">Kim C????ng IV</option>
                                    <option value="kimcuong_iii">Kim C????ng III</option>
                                    <option value="kimcuong_ii">Kim C????ng II</option>
                                    <option value="kimcuong_i">Kim C????ng I</option>
                                    <option value="tinhanh_i">Tinh Anh I</option>
                                    <option value="tinhanh_ii">Tinh Anh II</option>
                                    <option value="tinhanh_iii">Tinh Anh III</option>
                                    <option value="tinhanh_iv">Tinh Anh IV</option>
                                    <option value="tinhanh_v">Tinh Anh V</option>
                                    <option value="caothu">Cao th???</option>
                                    <option value="thachdau">Th??ch ?????u</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">

                            <div class="col-4">
                                <label>T??i kho???n</label>
                                <input type="text" name="taikhoan" class="form-control" />
                            </div>
                            <div class="col-4">
                                <label>M???t kh???u</label>
                                <input type="text" name="matkhau" class="form-control" />
                            </div>
                            <div class="col-4">
                                <label>Gi?? ti???n</label>
                                <input class="form-control" name="giatien" type="number">

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Th??ng tin n???i b???t</label>
                            <textarea class="form-control" name="noibat" rows="10"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="">H??nh ???nh minh h???a</label>
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