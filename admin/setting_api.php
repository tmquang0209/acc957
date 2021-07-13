<?php
$title = 'Setting website';
require('../system/function.php');
require('head.php');
$napthe = json_decode(setting('api_napthe'), true);
$rechargeServiceList = [
    'CardVip' => 'CardVip.Vn',
    'NapTuDong' => 'NapTuDong.Com',
    'TheSieuRe' => 'TheSieuRe.Com',
];
if (isset($_POST['submit'])) {
    $service = xss($_POST['service']);
    $id = xss($_POST['id']);
    $partner = xss($_POST['partner_key']);


    update_setting('api_napthe',json_encode([
        'service' => $service,
        'id' => $id,
        'secret' => $partner
    ]));
}

?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <h1 class="h3 mb-4 text-gray-800">Setting</h1>
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Setting website</h4>
                    <form class="forms-sample" method="POST">
                        <div class="row form-group">
                            <div class="col-12">
                                <label>Cổng</label>
                                <select class="form-control" name="service">
                        <?php foreach ($rechargeServiceList as $key => $value): ?>
                          <option
                            value="<?= $key ?>" <?= $key === $napthe['service'] ? 'selected' : null ?> ><?= $value ?></option>
                        <?php endforeach; ?>
                    </select>
                            </div>
                        </div>
                        <div class="form-group"><label>ID</label>

<input type="text" class="form-control" name="id" value="<?= $napthe['id']; ?>" />
</div>
<div class="form-group"><label>Partner Key</label>
<input type="text" class="form-control" name="partner_key" value="<?= $napthe['secret']; ?>" />
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