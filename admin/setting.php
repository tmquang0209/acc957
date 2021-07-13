<?php
$title = 'Setting website';
require('../system/function.php');
require('head.php');

if (isset($_POST['submit'])) {
    $logo = xss($_POST['logo']);
    $title = xss($_POST['title']);
    $facebook = xss($_POST['facebook']);
    $youtube = xss($_POST['youtube']);
    $phone = xsS($_POST['phone']);
    $email = xss($_POST['email']);
    $maintenance = xss($_POST['maintenance']);
    $notification = xss($_POST['notification']);

    update_setting('logo',$logo);
    update_setting('title', $title);
    update_setting('facebook', $facebook);
    update_setting('youtube', $youtube);
    update_setting('phone', $phone);
    update_setting('email', $email);
    update_setting('maintenance', $maintenance);
    update_setting('notification', $notification);
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
                                <label>Logo</label>
                                <input class="form-control" name="logo" value="<?= setting('logo'); ?>" />
                            </div>
                            <div class="col-12">
                                <label>Title</label>
                                <input class="form-control" name="title" value="<?= setting('title'); ?>" />
                            </div>

                            <div class="col-12">
                                <label>Facebook</label>
                                <input class="form-control" name="facebook" value="<?= setting('facebook'); ?>" />
                            </div>
                            <div class="col-12">
                                <label>Youtube</label>
                                <input class="form-control" name="youtube" value="<?= setting('youtube'); ?>" />
                            </div>
                            <div class="col-12">
                                <label>Phone number</label>
                                <input class="form-control" name="phone" value="<?= setting('phone'); ?>" />
                            </div>
                            <div class="col-12">
                                <label>Email</label>
                                <input class="form-control" name="email" value="<?= setting('email'); ?>" />
                            </div>
                            <div class="col-12">
                                <label>Maintenance</label>
                                <select class="form-control" name="maintenance">
                                    <option value="on" <?php if (setting('maintenance') == 'on') {
                                                            echo 'selected';
                                                        } ?>>On</option>
                                    <option value="off" <?php if (setting('maintenance') == 'off') {
                                                            echo 'selected';
                                                        } ?>>Off</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Notification</label>
                            <textarea class="form-control" name="notification" rows="10"><?= setting('notification'); ?></textarea>
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