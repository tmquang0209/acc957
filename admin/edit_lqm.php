<?php
require('../system/function.php');
require('head.php');

$id = isset($_GET['id']) ? (int)$_GET['id'] : null;
$data = $db->query("SELECT * FROM `nick` WHERE `id` = '$id'")->fetch();

if ($data['id'] == null || $id == null) {
    header('Location: /admin');
}


$in_rank = array(
    'chua',
    'dong_v', 'dong_iv', 'dong_iii', 'dong_ii', 'dong_i',
    'bac_v', 'bac_iv', 'bac_iii', 'bac_ii', 'bac_i',
    'vang_v', 'vang_iii', 'vang_ii', 'vang_i',
    'bachkim_v', 'bachkim_iv', 'bachkim_iii', 'bachkim_ii', 'bachkim_i',
    'kimcuong_v', 'kimcuong_iv', 'kimcuong_iii', 'kimcuong_ii', 'kimcuong_i',
    'tinhanh_i', 'tinhanh_ii', 'tinhanh_iii', 'tinhanh_iv', 'tinhanh_v',
    'caothu', 'thachdau'
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
            $db->exec("UPDATE `nick` SET
            `user` = '" . data_user('username') . "', 
            `account` = '$taikhoan', 
            `password` = '$matkhau', 
            `cash` = '$giatien', 
            `info1` = '$bangngoc', 
            `info2` = '$bacngoc', 
            `info3` = '$gold',
            `info4` = '$ruby',
            `info5` = '$quanhuy',
            `info6` = '$rank',
            `noibat` = '$noibat', 
            `image` = '$image', 
            `date` = '" . date("H:i:s d-m-Y") . "'
            WHERE `id` = '$id'
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

    <h1 class="h3 mb-4 text-gray-800">Edit account LQM #<?=$id;?></h1>
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit account LQM #<?=$id;?></h4>
                    <form class="forms-sample" method="POST">
                        <div class="row form-group">

                            <div class="col-2">
                                <label>B???ng ng???c</label>
                                <input class="form-control" name="bangngoc" value="<?=$data['info1'];?>" />
                            </div>

                            <div class="col-2">
                                <label>B???c ng???c</label>
                                <input class="form-control" name="bacngoc" value="<?=$data['info2'];?>"/>
                            </div>
                            <div class="col-2">
                                <label>V??ng</label>
                                <input class="form-control" name="gold" value="<?=$data['info3'];?>"/>
                            </div>
                            <div class="col-2">
                                <label>Ruby</label>
                                <input class="form-control" name="ruby" value="<?=$data['info4'];?>">
                            </div>
                            <div class="col-2">
                                <label>Qu??n huy</label>
                                <input class="form-control" name="quanhuy" value="<?=$data['info5'];?>">
                            </div>
                            <div class="col-2">
                                <label>Rank</label>
                                <select class="form-control" name="rank">
                                    <option value="chua" <?php if ($data['info6'] == "chua") {
                                                                echo 'selected';
                                                            } ?>>Ch??a rank</option>
                                    <option value="dong_v" <?php if ($data['info6'] == "dong_v") {
                                                                echo 'selected';
                                                            } ?>>?????ng V</option>
                                    <option value="dong_iv" <?php if ($data['info6'] == "dong_iv") {
                                                                echo 'selected';
                                                            } ?>>?????ng IV</option>
                                    <option value="dong_iii" <?php if ($data['info6'] == "dong_iii") {
                                                                    echo 'selected';
                                                                } ?>>?????ng III</option>
                                    <option value="dong_ii" <?php if ($data['info6'] == "dong_ii") {
                                                                echo 'selected';
                                                            } ?>>?????ng II</option>
                                    <option value="dong_i" <?php if ($data['info6'] == "dong_i") {
                                                                echo 'selected';
                                                            } ?>>?????ng I</option>
                                    <option value="bac_v" <?php if ($data['info6'] == "bac_v") {
                                                                echo 'selected';
                                                            } ?>>B???c V</option>
                                    <option value="bac_iv" <?php if ($data['info6'] == "bac_iv") {
                                                                echo 'selected';
                                                            } ?>>B???c IV</option>
                                    <option value="bac_iii" <?php if ($data['info6'] == "bac_iii") {
                                                                echo 'selected';
                                                            } ?>>B???c III</option>
                                    <option value="bac_ii" <?php if ($data['info6'] == "bac_ii") {
                                                                echo 'selected';
                                                            } ?>>B???c II</option>
                                    <option value="bac_i" <?php if ($data['info6'] == "bac_i") {
                                                                echo 'selected';
                                                            } ?>>B???c I</option>
                                    <option value="vang_v" <?php if ($data['info6'] == "vang_v") {
                                                                echo 'selected';
                                                            } ?>>V??ng V</option>
                                    <option value="vang_iv" <?php if ($data['info6'] == "vang_iv") {
                                                                echo 'selected';
                                                            } ?>>V??ng IV</option>
                                    <option value="vang_iii" <?php if ($data['info6'] == "vang_iii") {
                                                                    echo 'selected';
                                                                } ?>>V??ng III</option>
                                    <option value="vang_ii" <?php if ($data['info6'] == "vang_ii") {
                                                                echo 'selected';
                                                            } ?>>V??ng II</option>
                                    <option value="vang_i" <?php if ($data['info6'] == "vang_i") {
                                                                echo 'selected';
                                                            } ?>>V??ng I</option>
                                    <option value="bachkim_v" <?php if ($data['info6'] == "bachkim_v") {
                                                                    echo 'selected';
                                                                } ?>>B???ch Kim V</option>
                                    <option value="bachkim_iv" <?php if ($data['info6'] == "bachkim_iv") {
                                                                    echo 'selected';
                                                                } ?>>B???ch Kim IV</option>
                                    <option value="bachkim_iii" <?php if ($data['info6'] == "bachkim_iii") {
                                                                    echo 'selected';
                                                                } ?>>B???ch Kim III</option>
                                    <option value="bachkim_ii" <?php if ($data['info6'] == "bachkim_ii") {
                                                                    echo 'selected';
                                                                } ?>>B???ch Kim II</option>
                                    <option value="bachkim_i" <?php if ($data['info6'] == "bachkim_i") {
                                                                    echo 'selected';
                                                                } ?>>B???ch Kim I</option>
                                    <option value="kimcuong_v" <?php if ($data['info6'] == "kimcuong_v") {
                                                                    echo 'selected';
                                                                } ?>>Kim C????ng V</option>
                                    <option value="kimcuong_iv" <?php if ($data['info6'] == "kimcuong_iv") {
                                                                    echo 'selected';
                                                                } ?>>Kim C????ng IV</option>
                                    <option value="kimcuong_iii" <?php if ($data['info6'] == "kimcuong_iii") {
                                                                        echo 'selected';
                                                                    } ?>>Kim C????ng III</option>
                                    <option value="kimcuong_ii" <?php if ($data['info6'] == "kimcuong_ii") {
                                                                    echo 'selected';
                                                                } ?>>Kim C????ng II</option>
                                    <option value="kimcuong_i" <?php if ($data['info6'] == "kimcuong_i") {
                                                                    echo 'selected';
                                                                } ?>>Kim C????ng I</option>
                                    <option value="tinhanh_i" <?php if ($data['info6'] == "tinhanh_i") {
                                                                    echo 'selected';
                                                                } ?>>Tinh Anh I</option>
                                    <option value="tinhanh_ii" <?php if ($data['info6'] == "tinhanh_ii") {
                                                                    echo 'selected';
                                                                } ?>>Tinh Anh II</option>
                                    <option value="tinhanh_iii" <?php if ($data['info6'] == "tinhanh_iii") {
                                                                    echo 'selected';
                                                                } ?>>Tinh Anh III</option>
                                    <option value="tinhanh_iv" <?php if ($data['info6'] == "tinhanh_iv") {
                                                                    echo 'selected';
                                                                } ?>>Tinh Anh IV</option>
                                    <option value="tinhanh_v" <?php if ($data['info6'] == "tinhanh_v") {
                                                                    echo 'selected';
                                                                } ?>>Tinh Anh V</option>
                                    <option value="caothu" <?php if ($data['info6'] == "caothu") {
                                                                echo 'selected';
                                                            } ?>>Cao th???</option>
                                    <option value="thachdau" <?php if ($data['info6'] == "thachdau") {
                                                                    echo 'selected';
                                                                } ?>>Th??ch ?????u</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">

                            <div class="col-4">
                                <label>T??i kho???n</label>
                                <input type="text" name="taikhoan" class="form-control" value="<?=$data['account'];?>"/>
                            </div>
                            <div class="col-4">
                                <label>M???t kh???u</label>
                                <input type="text" name="matkhau" class="form-control" value="<?=$data['password'];?>"/>
                            </div>
                            <div class="col-4">
                                <label>Gi?? ti???n</label>
                                <input class="form-control" name="giatien" type="number" value="<?=$data['cash'];?>">

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Th??ng tin n???i b???t</label>
                            <textarea class="form-control" name="noibat" rows="10"><?=$data['noibat'];?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="">H??nh ???nh minh h???a</label>
                            <textarea class="form-control" name="image" rows="10"><?=$data['image'];?></textarea>
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