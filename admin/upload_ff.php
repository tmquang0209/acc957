<?php
require('../system/function.php');
require('head.php');

$in_array = array('1','2');

if (isset($_POST['submit'])) {
    $taikhoan = xss($_POST['taikhoan']);
    $matkhau = xss($_POST['matkhau']);
    $dangky = xss($_POST['dangky']);
    $pet = xss($_POST['pet']);
    $tvc = xss($_POST['tvc']);
    $giatien = (int)abs($_POST['giatien']);
    $noibat = xss($_POST['noibat']);
    $image = xss($_POST['image']);



    if (!empty($giatien)) {
        if (in_array($dangky, $in_array, true) && in_array($pet, $in_array, true) && in_array($tvc, $in_array, true)) {
            $db->exec("INSERT INTO `nick` SET
            `user` = '" . data_user('username') . "', 
            `account` = '$taikhoan', 
            `password` = '$matkhau', 
            `cash` = '$giatien', 
            `loainick` = '3',
            `info1` = '$dangky', 
            `info2` = '$pet', 
            `info3` = '$tvc',
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

                            <div class="col-4">
                                <label>Đăng Ký</label>
                                <select class="form-control" name="dangky">
                                    <option value="1">Facebook</option>
                                    <option value="2">Vkontakte</option>
                                </select>
                            </div>

                            <div class="col-4">
                                <label>Pet</label>
                                <select class="form-control" name="pet">
                                    <option value="1">Có</option>
                                    <option value="2">Không</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <label>Thẻ vô cực</label>
                                <select class="form-control" name="tvc">
                                    <option value="1">Có</option>
                                    <option value="2">Không</option>

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