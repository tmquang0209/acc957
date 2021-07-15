<?php
require('../system/function.php');
require('head.php');

if (isset($_POST['submit_gold'])) {
    $cash = isset($_POST['gold_cash_min'])? xss($_POST['gold_cash_min']) : 0;
    update_setting('gold_cash_min',$cash);
    for ($i = 1; $i <= 9; $i++) {
        update_setting('gold_server_' . $i . '', $_POST['gold_server_' . $i]);
    }
}

if (isset($_POST['submit_gem'])) {
    $cash = isset($_POST['gem_cash_min'])? xss($_POST['gem_cash_min']) : 0;
    update_setting('gem_cash_min',$cash);
    for ($i = 1; $i <= 9; $i++) {
        update_setting('gem_server_' . $i . '', $_POST['gem_server_' . $i]);
    }
}
if (isset($_GET)) {
    $value = xss($_GET['value']);
    if ($value == 'gold') {
  
?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->

        <h1 class="h3 mb-4 text-gray-800">Setting Service Gold</h1>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Exchange Rate</h4>
                        <form class="form-horizontal" method="POST">
                        <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Cash min</label>
                                                <div class="col-sm-10">
                                                    <?php $cashmin = setting('gold_cash_min'); ?>
                                                    <input type="number" step="any" name="gold_cash_min" class="form-control" placeholder="Cash min" value="<?= isset($cashmin) ? $cashmin : 0; ?>">
                                                </div>
                                            </div>
                            <?php
                            for ($i = 1; $i <= 9; $i++) {
                                $sv =  'gold_server_' . $id;
                                $setting = setting("gold_server_$i"); ?>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Server <?= $i; ?></label>
                                    <div class="col-sm-10">
                                        <input type="number" step="any" name="gold_server_<?= $i; ?>" class="form-control" placeholder="Exchange Rate Gold Server <?= $i; ?>" value="<?= isset($setting) ? $setting : null; ?>">
                                    </div>
                                </div>
                            <?php } ?>
                            <button type="submit" name="submit_gold" class="btn btn-primary mr-2">Submit</button>

                        </form>
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->







            <?php } if ($value == 'gem') { ?>


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->

                    <h1 class="h3 mb-4 text-gray-800">Setting Service</h1>
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Exchange Rate Gem</h4>
                                    <form class="form-horizontal" method="POST">
                                    <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Cash min</label>
                                                <div class="col-sm-10">
                                                    <?php $cashmin = setting('gem_cash_min'); ?>
                                                    <input type="number" step="any" name="gem_cash_min" class="form-control" placeholder="Cash min" value="<?= isset($cashmin) ? $cashmin : 0; ?>">
                                                </div>
                                            </div>
                                        <?php
                                        for ($i = 1; $i <= 9; $i++) {
                                            $sv =  'gem_server_' . $id;
                                            $setting = setting("gem_server_$i"); ?>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Server <?= $i; ?></label>
                                                <div class="col-sm-10">
                                                    <input type="number" step="any" name="gem_server_<?= $i; ?>" class="form-control" placeholder="Exchange Rate Gem Server <?= $i; ?>" value="<?= isset($setting) ? $setting : 0; ?>">
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <button type="submit" name="submit_gem" class="btn btn-primary mr-2">Submit</button>

                                    </form>
                                </div>
                                <!-- /.container-fluid -->
                            </div>
                            <!-- End of Main Content -->
                        <?php } }
                    require('foot.php');
                        ?>