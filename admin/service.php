<?php
$title = 'List account';
require('../system/function.php');
require('head.php');
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <?php
    if (isset($_GET['id'])) {
        $data = $db->query("SELECT * FROM `service` WHERE `id` = '" . (int)$_GET['id'] . "' LIMIT 1")->fetch();
if($data['status'] == '2'){ header('Location: /admin/service'); }
        $in_status = array(0, 1, 2);
        $status = (int)$_POST['status'];
        $note = xss($_POST['note']);

        if ($data['id'] != null) {
            if (isset($_POST['ok'])) {
                if (in_array($status, $in_status, true)) {
                    $db->exec("UPDATE `service` SET `status` = '$status', `note` = '$note' WHERE `id` = '" . $data['id'] . "'");
                    header("Location: /admin/service");
                }
            } elseif (isset($_POST['no'])) {
                header("Location: /admin/service");
            }
        } else {
            header("Location: /admin/service");
        }
    ?>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Action #<?= $_GET['id']; ?></h6>
            </div>
            <div class="card-body">
                <form method="post">
                    <div class="row form-group">
                        <div class="col-12">
                            <label>Note: </label>
                            <input class="form-control" name="note" value="<?php echo isset($_POST['note']) ? $_POST['note'] : null; ?>" />
                        </div>
                        <div class="col-12">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option value="0" <?php if ($data['status'] == '0') {
                                                        echo 'selected';
                                                    } ?>>Waiting</option>
                                <option value="1" <?php if ($data['status'] == '1') {
                                                        echo 'selected';
                                                    } ?>>Fail</option>
                                <option value="2" <?php if ($data['status'] == '2') {
                                                        echo 'selected';
                                                    } ?>>Success</option>                    
                            </select>
                        </div>
                    </div>
                    <input type="submit" name="ok" class="btn btn-success mr-2" value="Submit" />
                    <input type="submit" name="no" class="btn btn-light mr-2" value="Cancel" />

                </form>
            </div>
        </div>
    <?php } ?>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Service</h1>
    <p class="mb-4">All service.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List of service in the site</h6>
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
                            <th>Type</th>
                            <th>Status</th>
                            <th>Note</th>
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
                            <th>Type</th>
                            <th>Status</th>
                            <th>Note</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>

                    </tfoot>
                    <tbody>
                        <?php
                        $table = $db->query("SELECT * FROM `service`");
                        foreach ($table as $data) {
                            $status = array('Waiting', 'Fail', 'Success');
                        ?>
                            <tr>
                                <td><?= $data['id']; ?></td>
                                <td><?= $data['username']; ?></td>
                                <td><?= $data['account'] . '|' . $data['password']; ?><br />
                                    Server: <?= $data['server']; ?></td>
                                <td><?= number_format($data['amount']); ?></td>
                                <td><?= $data['type']; ?></td>
                                <td><?= $status[$data['status']]; ?></td>
                                <td><?= $data['note']; ?></td>
                                <td><?= date("H:i:s d-m-Y",$data['date']); ?></td>
                                <td><a href="/admin/service/<?= $data['id']; ?>" class="btn btn-primary mr-2">Action</a></td>
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
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php
require('foot.php');
?>