<?php
require('../system/function.php');
require('head.php');


$is_server = array('1', '2', '3', '4', '5', '6', '7', '8', '9', 'nuocngoai');
$is_dangky = array('Ao', 'That');
$is_hanhtinh = array('TD', 'XD', 'NM');
$is_loai = array('sosinh', 'win', 'p200', 'zin', 'Co', 'Khong');
$is_item = array('nro1sao', 'ao', 'quan', 'gang', 'giay', 'rada', 'setdo');
$is_loaido = array('sucdanh', 'hp', 'ki', 'hutmau', 'tnsm');

if (isset($_POST['submit'])) {
    $taikhoan = xss($_POST['taikhoan']);
    $matkhau = xss($_POST['matkhau']);
    $server = xss($_POST['server']);
    $hanhtinh = xss($_POST['hanhtinh']);
    $dangky = xss($_POST['dangky']);
    $loai = xss($_POST['loai']);
    $giatien = (int)abs($_POST['giatien']);
    $noibat = xss($_POST['noibat']);
    $image = xss($_POST['image']);
    $loainick = 0;

    if ($_GET['value'] == 'sosinh') {
        $loainick = 0;
    } elseif ($_GET['value'] == 'tamtrung') {
        $loainick = 1;
    }



    if (!empty($giatien)) {
        if (in_array($server, $is_server, true) && in_array($hanhtinh, $is_hanhtinh, true) && in_array($dangky, $is_dangky, true) && in_array($loai, $is_loai, true)) {
            $db->exec("INSERT INTO `nick` SET
            `user` = '" . data_user('username') . "', 
            `account` = '$taikhoan', 
            `password` = '$matkhau', 
            `cash` = '$giatien', 
            `loainick` = '$loainick',
            `info1` = '$server', 
            `info2` = '$hanhtinh', 
            `info3` = '$dangky',
            `info4` = '$loai',
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


if (isset($_POST['submit_items'])) {

    $server = xss($_POST['server']);
    $hanhtinh = xss($_POST['hanhtinh']);
    $item = xss($_POST['items']);
    $loaido = xss($_POST['loaido']);
    $dangky = xss($_POST['dangky']);
    $giatien = (int)abs($_POST['giatien']);
    $image = xss($_POST['image']);

    if (!empty($giatien)) {
        if (in_array($server, $is_server, true) && in_array($hanhtinh, $is_hanhtinh, true) && in_array($dangky, $is_dangky, true) && in_array($item, $is_item, true) && in_array($loaido, $is_loaido, true)) {
            $db->exec("INSERT INTO `nick` SET
        `user` = '" . data_user('username') . "', 
        `cash` = '$giatien', 
        `loainick` = '2',
        `info1` = '$server', 
        `info2` = '$hanhtinh', 
        `info3` = '$dangky',
        `info4` = '$item',
        `info5` = '$loaido',
        `noibat` = '$noibat', 
        `status` = '0', 
        `image` = '$image', 
        `date` = '" . date("H:i:s d-m-Y") . "'
        ");
            echo '<div class="alert alert-success" role="alert">Upload success!</div>';
        }
    }
}



?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <?php
    if (isset($_GET['value'])) {
        $value = xss($_GET['value']);
        if ($value == 'sosinh' || $value == 'tamtrung') {
    ?>
            <h1 class="h3 mb-4 text-gray-800"><?php if ($value == 'sosinh') {
                                                    echo 'Nick Sơ Sinh';
                                                } elseif ($value == 'tamtrung') {
                                                    echo 'Nick Tầm Trung';
                                                } ?></h1>
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Đăng tài khoản</h4>
                            <form class="forms-sample" method="POST">
                                <div class="row form-group">

                                    <div class="col-3">
                                        <label>Server</label>
                                        <select class="form-control" name="server">
                                            <option value="1">1 Sao</option>
                                            <option value="2">2 Sao</option>
                                            <option value="3">3 Sao</option>
                                            <option value="4">4 Sao</option>
                                            <option value="5">5 Sao</option>
                                            <option value="6">6 Sao</option>
                                            <option value="7">7 Sao</option>
                                            <option value="8">8 Sao</option>
                                            <option value="9">9 Sao</option>
                                            <option value="nuocngoai">Nước ngoài</option>
                                        </select>
                                    </div>

                                    <div class="col-3">
                                        <label>Hành tinh</label>
                                        <select class="form-control" name="hanhtinh">
                                            <option value="TD">Trái đất</option>
                                            <option value="XD">Xay da</option>
                                            <option value="NM">Na mek</option>
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <label>Tài khoản</label>
                                        <input type="text" name="taikhoan" class="form-control" />
                                    </div>
                                    <div class="col-3">
                                        <label>Mật khẩu</label>
                                        <input type="text" name="matkhau" class="form-control" />
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-4">
                                        <label>Đăng ký</label>
                                        <select class="form-control" name="dangky">
                                            <option value="Ao">Ảo</option>
                                            <option value="That">Thật</option>

                                        </select>
                                    </div>
                                    <?php if ($value == 'sosinh') { ?>
                                        <div class="col-4">
                                            <label>Loại</label>
                                            <select class="form-control" name="loai">
                                                <option value="sosinh">Sơ sinh</option>
                                                <option value="win">Win doanh trại</option>
                                                <option value="p200">200Tr Sức Mạnh</option>
                                                <option value="zin">Zin</option>

                                            </select>
                                        </div>
                                    <?php } elseif ($value == 'tamtrung') { ?>
                                        <div class="col-4">
                                            <label>Bông tai</label>
                                            <select class="form-control" name="loai">
                                                <option value="Co">Có</option>
                                                <option value="Khong">Không</option>
                                            </select>
                                        </div>
                                    <?php } ?>

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
                    <?php
                } elseif ($value == 'vatpham') {
                    ?>
                        <h1 class="h3 mb-4 text-gray-800">Vật Phẩm</h1>
                        <div class="row">
                            <div class="col-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Đăng vật phẩm</h4>
                                        <form class="forms-sample" method="POST">
                                            <div class="row form-group">

                                                <div class="col-4">
                                                    <label>Server</label>
                                                    <select class="form-control" name="server">
                                                        <option value="1">1 Sao</option>
                                                        <option value="2">2 Sao</option>
                                                        <option value="3">3 Sao</option>
                                                        <option value="4">4 Sao</option>
                                                        <option value="5">5 Sao</option>
                                                        <option value="6">6 Sao</option>
                                                        <option value="7">7 Sao</option>
                                                        <option value="8">8 Sao</option>
                                                        <option value="9">9 Sao</option>
                                                        <option value="nuocngoai">Nước ngoài</option>
                                                    </select>
                                                </div>

                                                <div class="col-4">
                                                    <label>Hành tinh</label>
                                                    <select class="form-control" name="hanhtinh">
                                                        <option value="TD">Trái đất</option>
                                                        <option value="XD">Xay da</option>
                                                        <option value="NM">Na mek</option>
                                                    </select>
                                                </div>
                                                <div class="col-4">
                                                    <label>Vật phẩm</label>
                                                    <select class="form-control" name="items">
                                                        <option value="nro1sao">Bộ ngọc rồng 1 Sao</option>
                                                        <option value="ao">Áo</option>
                                                        <option value="quan">Quần</option>
                                                        <option value="gang">Găng</option>
                                                        <option value="giay">Giày</option>
                                                        <option value="rada">Rada</option>
                                                        <option value="setdo">Sét đồ</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-4">
                                                    <label>Loại đồ</label>
                                                    <select class="form-control" name="loaido">
                                                        <option value="sucdanh">Sức đánh</option>
                                                        <option value="hp">Tăng HP</option>
                                                        <option value="ki">Tăng KI</option>
                                                        <option value="hutmau">Hút máu</option>
                                                        <option value="tnsm">Tiềm năng sức mạnh</option>
                                                    </select>
                                                </div>

                                                <div class="col-4">
                                                    <label>Đăng ký</label>
                                                    <select class="form-control" name="dangky">
                                                        <option value="Ao">Ảo</option>
                                                        <option value="That">Thật</option>

                                                    </select>
                                                </div>


                                                <div class="col-4">
                                                    <label>Giá tiền</label>
                                                    <input class="form-control" name="giatien" type="number">

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Hình ảnh minh họa</label>
                                                <textarea class="form-control" name="image" rows="10"></textarea>
                                            </div>


                                            <button type="submit" name="submit_items" class="btn btn-primary mr-2">Submit</button>

                                        </form>
                                    </div>
                        <?php

                            }
                        }

                        ?>
                            </div>
                            <!-- End of Main Content -->
                            <?php
                            require('foot.php');
                            ?>