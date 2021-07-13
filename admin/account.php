<?php
$title = 'List account';
require('../system/function.php');
require('head.php');
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <?php
    if (isset($_GET['id'])) {
        $data = $db->query("SELECT * FROM `nick` WHERE `id` = '" . (int)$_GET['id'] . "' LIMIT 1")->fetch();
        if ($data['id'] != null) {
            if (isset($_POST['ok'])) {
                $db->exec("DELETE FROM `nick` WHERE `id` = '".$data['id']."'");
                header("Location: /admin/list_".$_GET['value']."");
            } elseif (isset($_POST['no'])) {
                header("Location: /admin/list_".$_GET['value']."");
            }
        } else {
            header("Location: /admin/list_".$_GET['value']."");
        }
    ?>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Delete #<?= $_GET['id']; ?></h6>
            </div>
            <div class="card-body">
                <form method="post">

                    <input type="submit" name="ok" class="btn btn-danger mr-2" value="Accept" />
                    <input type="submit" name="no" class="btn btn-light mr-2" value="Cancel" />

                </form>
            </div>
        </div>
    <?php } ?>
    <!-- Page Heading -->
    <?php
    if (isset($_GET['value'])) {
        $value = xss($_GET['value']);
        if ($_GET['value'] == 'sosinh') {
            $loainick = 0;
            $info4 = 'Species';
        } elseif ($_GET['value'] == 'tamtrung') {
            $loainick = 1;
            $info4 = 'Earring';
        }
        if ($value == 'sosinh' || $value == 'tamtrung') {
    ?>
            <h1 class="h3 mb-2 text-gray-800"><?php if ($value == 'sosinh') {
                                                    echo 'Nick Sơ Sinh';
                                                } elseif ($value == 'tamtrung') {
                                                    echo 'Nick Tầm Trung';
                                                } ?></h1>
            <p class="mb-4">All accounts posted.</p>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">List of account in the site</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Infomation account</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>

                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Infomation account</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>

                            </tfoot>
                            <tbody>
                                <?php
                                $table = $db->query("SELECT * FROM `nick` WHERE `loainick` = '$loainick'");
                                foreach ($table as $data) {
                                    
                                    $status = array('Still', 'Sold');
                                ?>
                                    <tr>
                                        <td><?= $data['id']; ?></td>
                                        <td><?= $data['user']; ?></td>
                                        <td>
                                            <?= $data['account'] . '|' . $data['password']; ?><br />
                                            Server: <?= $data['info1']; ?><br />
                                            Planet: <?= load_info2($data['info2']); ?><br />
                                            Registration: <?= load_info3($data['info3']); ?><br />
                                             <?=$info4.': '.load_info4($data['info4']);?>
                                           
                                        </td>
                                        <td><?= number_format($data['cash']); ?></td>
                                        <td><?= $status[$data['status']]; ?></td>
                                        <td><?= $data['date']; ?></td>
                                        <td><a href="/admin/list_<?=$_GET['value'];?>/<?= $data['id']; ?>" class="btn btn-danger mr-2">Delete</a>
                                        <a href="/admin/edit_<?=$_GET['value'];?>/<?= $data['id']; ?>" class="btn btn-primary mr-2">Edit</a></td>
                    </div>
                    </td>
                    </tr>
            <?php }
                             ?>
            </tbody>
            </table>
                </div>
            </div>
</div>
<?php }elseif($value == 'vatpham'){ ?>
    <h1 class="h3 mb-2 text-gray-800">Items</h1>
            <p class="mb-4">All accounts posted.</p>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">List of account in the site</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Infomation account</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>

                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Infomation account</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>

                            </tfoot>
                            <tbody>
                                <?php
                                $table = $db->query("SELECT * FROM `nick` WHERE `loainick` = '2'");
                                foreach ($table as $data) {
                                    
                                    $status = array('Still', 'Sold');
                                ?>
                                    <tr>
                                        <td><?= $data['id']; ?></td>
                                        <td><?= $data['user']; ?></td>
                                        <td>
                                            Server: <?= $data['info1']; ?><br />
                                            Planet: <?= load_info2($data['info2']); ?><br />
                                            Registration: <?= load_info3($data['info3']); ?><br />
                                            Items: <?=load_info4($data['info4']);?><br/>
                                            Species: <?=load_info5($data['info5']);?>
                                           
                                        </td>
                                        <td><?= number_format($data['cash']); ?></td>
                                        <td><?= $status[$data['status']]; ?></td>
                                        <td><?= $data['date']; ?></td>
                                        <td><a href="/admin/list_vatpham/<?= $data['id']; ?>" class="btn btn-danger mr-2">Delete</a>
                                        <a href="/admin/edit_vatpham/<?= $data['id']; ?>" class="btn btn-primary mr-2">Edit</a></td>
                    </div>
                    </td>
                    </tr>
            <?php }
                             ?>
            </tbody>
            </table>
                </div>
            </div>
</div>
<?php }elseif($value == 'freefire'){ ?>
    <h1 class="h3 mb-2 text-gray-800">Freefire</h1>
            <p class="mb-4">All accounts posted.</p>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">List of account in the site</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Infomation account</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>

                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Infomation account</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>

                            </tfoot>
                            <tbody>
                                <?php
                                $table = $db->query("SELECT * FROM `nick` WHERE `loainick` = '3'");
                                foreach ($table as $data) {
                                    
                                    $status = array('Still', 'Sold');
                                ?>
                                    <tr>
                                        <td><?= $data['id']; ?></td>
                                        <td><?= $data['user']; ?></td>
                                        <td>
                                        <?= $data['account'] . '|' . $data['password']; ?><br />   
                                        Registration: <?= load_info1($data['info1']); ?><br />
                                            Pet: <?= load_info2($data['info2']); ?><br />
                                            TVC: <?= load_info3($data['info3']); ?><br />
                                        </td>
                                        <td><?= number_format($data['cash']); ?></td>
                                        <td><?= $status[$data['status']]; ?></td>
                                        <td><?= $data['date']; ?></td>
                                        <td><a href="/admin/list_freefire/<?= $data['id']; ?>" class="btn btn-danger mr-2">Delete</a>
                                        <a href="/admin/edit_freefire/<?= $data['id']; ?>" class="btn btn-primary mr-2">Edit</a></td>
                    </div>
                    </td>
                    </tr>
            <?php }
                             ?>
            </tbody>
            </table>
                </div>
            </div>
</div>
<?php }elseif($value == 'lienquan'){ ?>
    <h1 class="h3 mb-2 text-gray-800">Liên Quân Mobile</h1>
            <p class="mb-4">All accounts posted.</p>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">List of account in the site</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Infomation account</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>

                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Infomation account</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>

                            </tfoot>
                            <tbody>
                                <?php
                                $table = $db->query("SELECT * FROM `nick` WHERE `loainick` = '4'");
                                foreach ($table as $data) {
                                    
                                    $status = array('Still', 'Sold');
                                ?>
                                    <tr>
                                        <td><?= $data['id']; ?></td>
                                        <td><?= $data['user']; ?></td>
                                        <td>
                                        <?= $data['account'] . '|' . $data['password']; ?><br />   
                                        Bảng ngọc: <?= $data['info1']; ?><br />
                                        Bậc ngọc: <?= $data['info2']; ?><br />
                                        Vàng: <?= $data['info3']; ?><br />
                                        Ruby: <?= $data['info4']; ?><br />
                                        Quân huy: <?= $data['info5']; ?><br />
                                        Rank: <?= load_info6($data['info6']); ?>
                                        </td>
                                        <td><?= number_format($data['cash']); ?></td>
                                        <td><?= $status[$data['status']]; ?></td>
                                        <td><?= $data['date']; ?></td>
                                        <td><a href="/admin/list_lienquan/<?= $data['id']; ?>" class="btn btn-danger mr-2">Delete</a>
                                        <a href="/admin/edit_lienquan/<?= $data['id']; ?>" class="btn btn-primary mr-2">Edit</a></td>
                                        
                    </div>
                    </td>
                    </tr>
            <?php }
                             ?>
            </tbody>
            </table>
                </div>
            </div>
</div>
<?php }  } ?>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php
require('foot.php');
?>