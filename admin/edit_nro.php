<?php
require('../system/function.php');
require('head.php');

$id = isset($_GET['id']) ? (int)$_GET['id'] : null;
$data = $db->query("SELECT * FROM `nick` WHERE `id` = '$id'")->fetch();

if ($data['id'] == null || $id == null) {
    header('Location: /admin');
}

$is_server = array(
    '1',
    '2',
    '3',
    '4',
    '5',
    '6',
    '7',
    '8',
    '9',
    'nuocngoai'
);
$is_dangky = array(
    'Ao',
    'That'
);
$is_hanhtinh = array(
    'TD',
    'XD',
    'NM'
);
$is_loai = array(
    'sosinh',
    'win',
    'p200',
    'zin',
    'Co',
    'Khong'
);
$is_item = array(
    'nro1sao',
    'ao',
    'quan',
    'gang',
    'giay',
    'rada',
    'setdo'
);
$is_loaido = array(
    'sucdanh',
    'hp',
    'ki',
    'hutmau',
    'tnsm'
);

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

    if (!empty($giatien)) {
        if (in_array($server, $is_server, true) && in_array($hanhtinh, $is_hanhtinh, true) && in_array($dangky, $is_dangky, true) && in_array($loai, $is_loai, true)) {
            $db->exec("UPDATE `nick` SET
            `user` = '" . data_user('username') . "', 
            `account` = '$taikhoan', 
            `password` = '$matkhau', 
            `cash` = '$giatien', 
            `info1` = '$server', 
            `info2` = '$hanhtinh', 
            `info3` = '$dangky',
            `info4` = '$loai',
            `noibat` = '$noibat', 
            `image` = '$image', 
            `date` = '" . date("H:i:s d-m-Y") . "'
            WHERE `id` = '$id';
            ");
            echo '<div class="alert alert-success" role="alert">Edit success!</div>';
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
            $db->exec("UPDATE `nick` SET
        `user` = '" . data_user('username') . "', 
        `cash` = '$giatien', 
        `info1` = '$server', 
        `info2` = '$hanhtinh', 
        `info3` = '$dangky',
        `info4` = '$item',
        `info5` = '$loaido',
        `noibat` = '$noibat', 
        `image` = '$image', 
        `date` = '" . date("H:i:s d-m-Y") . "'
        WHERE `id` = '$id'
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
    if ($data['loainick'] == '0' || $data['loainick'] == '1') {
    ?>
        <h1 class="h3 mb-4 text-gray-800">Edit account #<?= $id; ?></h1>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit account #<?= $id; ?></h4>
                        <form class="forms-sample" method="POST">
                            <div class="row form-group">

                                <div class="col-3">
                                    <label>Server</label>
                                    <select class="form-control" name="server">
                                        <option value="1" <?php if ($data['info1'] == 1) {
                                                                echo "selected";
                                                            } ?>>1 Sao</option>
                                        <option value="2" <?php if ($data['info1'] == 2) {
                                                                echo "selected";
                                                            } ?>>2 Sao</option>
                                        <option value="3" <?php if ($data['info1'] == 3) {
                                                                echo "selected";
                                                            } ?>>3 Sao</option>
                                        <option value="4" <?php if ($data['info1'] == 4) {
                                                                echo "selected";
                                                            } ?>>4 Sao</option>
                                        <option value="5" <?php if ($data['info1'] == 5) {
                                                                echo "selected";
                                                            } ?>>5 Sao</option>
                                        <option value="6" <?php if ($data['info1'] == 6) {
                                                                echo "selected";
                                                            } ?>>6 Sao</option>
                                        <option value="7" <?php if ($data['info1'] == 7) {
                                                                echo "selected";
                                                            } ?>>7 Sao</option>
                                        <option value="8" <?php if ($data['info1'] == 8) {
                                                                echo "selected";
                                                            } ?>>8 Sao</option>
                                        <option value="9" <?php if ($data['info1'] == 9) {
                                                                echo "selected";
                                                            } ?>>9 Sao</option>
                                        <option value="nuocngoai" <?php if ($data['info1'] == 'nuocngoai') {
                                                                        echo "selected";
                                                                    } ?>>Nước ngoài</option>
                                    </select>
                                </div>

                                <div class="col-3">
                                    <label>Hành tinh</label>
                                    <select class="form-control" name="hanhtinh">
                                        <option value="TD" <?php if ($data['info2'] == 'TD') {
                                                                echo "selected";
                                                            } ?>>Trái đất</option>
                                        <option value="XD" <?php if ($data['info2'] == 'XD') {
                                                                echo "selected";
                                                            } ?>>Xay da</option>
                                        <option value="NM" <?php if ($data['info2'] == 'NM') {
                                                                echo "selected";
                                                            } ?>>Na mek</option>
                                    </select>
                                </div>
                                <div class="col-3">
                                    <label>Tài khoản</label>
                                    <input type="text" name="taikhoan" class="form-control" value="<?= $data['account']; ?>" />
                                </div>
                                <div class="col-3">
                                    <label>Mật khẩu</label>
                                    <input type="text" name="matkhau" class="form-control" value="<?= $data['password']; ?>" />
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-4">
                                    <label>Đăng ký</label>
                                    <select class="form-control" name="dangky">
                                        <option value="Ao" <?php if ($data['info3'] == 'Ao') {
                                                                echo "selected";
                                                            } ?>>Ảo</option>
                                        <option value="That" <?php if ($data['info3'] == 'That') {
                                                                    echo "selected";
                                                                } ?>>Thật</option>

                                    </select>
                                </div>
                                <?php if ($data['loainick'] == '0') { ?>
                                    <div class="col-4">
                                        <label>Loại</label>
                                        <select class="form-control" name="loai">
                                            <option value="sosinh" <?php if ($data['info4'] == 'sosinh') {
                                                                        echo "selected";
                                                                    } ?>>Sơ sinh</option>
                                            <option value="win" <?php if ($data['info4'] == 'win') {
                                                                    echo "selected";
                                                                } ?>>Win doanh trại</option>
                                            <option value="p200" <?php if ($data['info4'] == 'p200') {
                                                                        echo "selected";
                                                                    } ?>>200Tr Sức Mạnh</option>
                                            <option value="zin" <?php if ($data['info4'] == 'zin') {
                                                                    echo "selected";
                                                                } ?>>Zin</option>

                                        </select>
                                    </div>
                                <?php
                                } elseif ($data['loainick'] == '1') { ?>
                                    <div class="col-4">
                                        <label>Bông tai</label>
                                        <select class="form-control" name="loai">
                                            <option value="Co" <?php if ($data['info4'] == 'Co') {
                                                                    echo "selected";
                                                                } ?>>Có</option>
                                            <option value="Khong" <?php if ($data['info4'] == 'Khong') {
                                                                        echo "selected";
                                                                    } ?>>Không</option>
                                        </select>
                                    </div>
                                <?php
                                } ?>

                                <div class="col-4">
                                    <label>Giá tiền</label>
                                    <input class="form-control" name="giatien" type="number" value="<?= $data['cash']; ?>">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Thông tin nổi bật</label>
                                <textarea class="form-control" name="noibat" rows="10"><?= $data['noibat']; ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="">Hình ảnh minh họa</label>
                                <textarea class="form-control" name="image" rows="10"><?= $data['image']; ?></textarea>
                            </div>


                            <button type="submit" name="submit" class="btn btn-primary mr-2">Submit</button>

                        </form>
                    </div>
                    <!-- /.container-fluid -->
                <?php
            } elseif ($data['loainick'] == 2) {
                ?>
                    <h1 class="h3 mb-4 text-gray-800">Vật Phẩm</h1>
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Edit item #<?= $id; ?></h4>
                                    <form class="forms-sample" method="POST">
                                        <div class="row form-group">

                                            <div class="col-4">
                                                <label>Server</label>
                                                <select class="form-control" name="server">
                                                    <option value="1" <?php if ($data['info1'] == 1) {
                                                                            echo "selected";
                                                                        } ?>>1 Sao</option>
                                                    <option value="2" <?php if ($data['info1'] == 2) {
                                                                            echo "selected";
                                                                        } ?>>2 Sao</option>
                                                    <option value="3" <?php if ($data['info1'] == 3) {
                                                                            echo "selected";
                                                                        } ?>>3 Sao</option>
                                                    <option value="4" <?php if ($data['info1'] == 4) {
                                                                            echo "selected";
                                                                        } ?>>4 Sao</option>
                                                    <option value="5" <?php if ($data['info1'] == 5) {
                                                                            echo "selected";
                                                                        } ?>>5 Sao</option>
                                                    <option value="6" <?php if ($data['info1'] == 6) {
                                                                            echo "selected";
                                                                        } ?>>6 Sao</option>
                                                    <option value="7" <?php if ($data['info1'] == 7) {
                                                                            echo "selected";
                                                                        } ?>>7 Sao</option>
                                                    <option value="8" <?php if ($data['info1'] == 8) {
                                                                            echo "selected";
                                                                        } ?>>8 Sao</option>
                                                    <option value="9" <?php if ($data['info1'] == 9) {
                                                                            echo "selected";
                                                                        } ?>>9 Sao</option>
                                                    <option value="nuocngoai" <?php if ($data['info1'] == 'nuocngoai') {
                                                                                    echo "selected";
                                                                                } ?>>Nước ngoài</option>
                                                </select>
                                            </div>

                                            <div class="col-4">
                                                <label>Hành tinh</label>
                                                <select class="form-control" name="hanhtinh">
                                                    <option value="TD" <?php if ($data['info2'] == 'TD') {
                                                                            echo "selected";
                                                                        } ?>>Trái đất</option>
                                                    <option value="XD" <?php if ($data['info2'] == 'XD') {
                                                                            echo "selected";
                                                                        } ?>>Xay da</option>
                                                    <option value="NM" <?php if ($data['info2'] == 'NM') {
                                                                            echo "selected";
                                                                        } ?>>Na mek</option>
                                                </select>
                                            </div>
                                            <div class="col-4">
                                                <label>Vật phẩm</label>
                                                <select class="form-control" name="items">
                                                    <option value="nro1sao" <?php if ($data['info4'] == 'nro1sao') {
                                                                                echo "selected";
                                                                            } ?>>Bộ ngọc rồng 1 Sao</option>
                                                    <option value="ao" <?php if ($data['info4'] == 'ao') {
                                                                            echo "selected";
                                                                        } ?>>Áo</option>
                                                    <option value="quan" <?php if ($data['info4'] == 'quan') {
                                                                                echo "selected";
                                                                            } ?>>Quần</option>
                                                    <option value="gang" <?php if ($data['info4'] == 'gang') {
                                                                                echo "selected";
                                                                            } ?>>Găng</option>
                                                    <option value="giay" <?php if ($data['info4'] == 'giay') {
                                                                                echo "selected";
                                                                            } ?>>Giày</option>
                                                    <option value="rada" <?php if ($data['info4'] == 'rada') {
                                                                                echo "selected";
                                                                            } ?>>Rada</option>
                                                    <option value="setdo" <?php if ($data['info4'] == 'setdo') {
                                                                                echo "selected";
                                                                            } ?>>Sét đồ</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-4">
                                                <label>Loại đồ</label>
                                                <select class="form-control" name="loaido">
                                                    <option value="sucdanh" <?php if ($data['info5'] == 'sucdanh') {
                                                                                echo "selected";
                                                                            } ?>>Sức đánh</option>
                                                    <option value="hp" <?php if ($data['info5'] == 'hp') {
                                                                            echo "selected";
                                                                        } ?>>Tăng HP</option>
                                                    <option value="ki" <?php if ($data['info5'] == 'ki') {
                                                                            echo "selected";
                                                                        } ?>>Tăng KI</option>
                                                    <option value="hutmau" <?php if ($data['info5'] == 'hutmau') {
                                                                                echo "selected";
                                                                            } ?>>Hút máu</option>
                                                    <option value="tnsm" <?php if ($data['info5'] == 'tnsm') {
                                                                                echo "selected";
                                                                            } ?>>Tiềm năng sức mạnh</option>
                                                </select>
                                            </div>

                                            <div class="col-4">
                                                <label>Đăng ký</label>
                                                <select class="form-control" name="dangky">
                                                    <option value="Ao" <?php if ($data['info3'] == 'Ao') {
                                                                            echo "selected";
                                                                        } ?>>Ảo</option>
                                                    <option value="That" <?php if ($data['info3'] == 'That') {
                                                                                echo "selected";
                                                                            } ?>>Thật</option>

                                                </select>
                                            </div>


                                            <div class="col-4">
                                                <label>Giá tiền</label>
                                                <input class="form-control" name="giatien" type="number" value="<?=$data['cash'];?>">

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Hình ảnh minh họa</label>
                                            <textarea class="form-control" name="image" rows="10"><?=$data['image'];?></textarea>
                                        </div>


                                        <button type="submit" name="submit_items" class="btn btn-primary mr-2">Submit</button>

                                    </form>
                                </div>
                            <?php
                        }

                            ?>
                            </div>
                            <!-- End of Main Content -->
                            <?php
                            require('foot.php');
                            ?>