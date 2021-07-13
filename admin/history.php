<?php
$title = 'Hisory';
require('../system/function.php');
require('head.php');
if(isset($_GET['value']))
{
    $value = xss($_GET['value']);
    if($value == "topup"){
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">History</h1>
    <p class="mb-4">Top up card.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List of recharge cards in the page</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Serial</th>
                            <th>Pin</th>
                            <th>Amount</th>
                            <th>Telco</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>

                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Serial</th>
                            <th>Pin</th>
                            <th>Amount</th>
                            <th>Telco</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>

                    </tfoot>
                    <tbody>
                        <?php
                        $table = $db->query("SELECT * FROM `napthe`");
                        foreach ($table as $data) {
                        ?>
                            <tr>
                                <td><?= $data['id']; ?></td>
                                <td><?= $data['username']; ?></td>
                                <td><?= $data['cash']; ?></td>
                                <td><?= admin(); ?></td>
                                <td><?= ban(); ?></td>
                                <td><?= $data['date']; ?></td>
                                <td><a href="?username=<?= data_user('username'); ?>" class="btn btn-danger mr-2">Edit</a>
            </div>
            </td>
            </tr>
        <?php } ?>
        </tbody>
        </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->
<?php
 }elseif($value == 'account'){ 
 ?>
 <!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">History</h1>
    <p class="mb-4">Buy account.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List of buy account in the page</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>ID_Account</th>
                            <th>Amount</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tfoot>

                    <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>ID_Account</th>
                            <th>Amount</th>
                            <th>Date</th>
                        </tr>

                    </tfoot>
                    <tbody>
                        <?php
                        $table = $db->query("SELECT * FROM `muanick`");
                        foreach ($table as $data) {
                        ?>
                            <tr>
                                <td><?= $data['id']; ?></td>
                                <td><?= $data['username']; ?></td>
                                <td><?= $data['id_acc']; ?></td>
                                <td><?= $data['cash'] ?></td>
                                <td><?= $data['date']; ?></td>
            </div>
            </td>
            </tr>
        <?php } ?>
        </tbody>
        </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->
<?php 
}elseif($value == 'balance'){
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">History</h1>
    <p class="mb-4">Balance fluctuations.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List of balance fluctuations in the page</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Text</th>
                            <th>Cash</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tfoot>

                    <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Text</th>
                            <th>Cash</th>
                            <th>Date</th>
                        </tr>

                    </tfoot>
                    <tbody>
                        <?php
                        $table = $db->query("SELECT * FROM `balance`");
                        foreach ($table as $data) {
                        ?>
                            <tr>
                                <td><?= $data['id']; ?></td>
                                <td><?= $data['username']; ?></td>
                                <td><?= $data['cash']; ?></td>
                                <td><?= admin(); ?></td>
                                <td><?= ban(); ?></td>
                                <td><?= $data['date']; ?></td>
                                <td><a href="?username=<?= data_user('username'); ?>" class="btn btn-danger mr-2">Edit</a>
            </div>
            </td>
            </tr>
        <?php } ?>
        </tbody>
        </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->
<?php
}
}
?>
</div>
<!-- End of Main Content -->

<?php
require('foot.php');
?>