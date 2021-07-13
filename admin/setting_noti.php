<?php
$title = 'Setting notification';
require('../system/function.php');
require('head.php');

if (isset($_POST['submit'])) {
    update_setting('noti_sosinh',xss($_POST['sosinh']));
    update_setting('noti_tamtrung', xss($_POST['tamtrung']));
    update_setting('noti_vatpham', xss($_POST['vatpham']));
    update_setting('noti_freefire', xss($_POST['freefre']));
    update_setting('noti_lienquan', xss($_POST['lienquan']));
}

?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <h1 class="h3 mb-4 text-gray-800">Notification</h1>
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Setting notification</h4>
                    <form class="forms-sample" method="POST">
                    <div class="form-group">
                            <label for="">Sơ sinh</label>
                            <textarea class="form-control" name="sosinh" rows="10"><?= setting('noti_sosinh'); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Tầm trung</label>
                            <textarea class="form-control" name="tamtrung" rows="10"><?= setting('noti_tamtrung'); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Vật phẩm</label>
                            <textarea class="form-control" name="vatpham" rows="10"><?= setting('noti_vatpham'); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Freefire</label>
                            <textarea class="form-control" name="freefire" rows="10"><?= setting('noti_freefire'); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Liên quân</label>
                            <textarea class="form-control" name="lienquan" rows="10"><?= setting('noti_lienquan'); ?></textarea>
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