<?php
require('../system/function.php');
require('head.php');


if (isset($_POST['submit'])) {
    $server = intval($_POST['ServerID']);
    $username = xss($_POST['UserName']);
    $password = xss($_POST['Password']);
    $money = (int)abs($_POST['Money']);

    echo  $gem = setting("gem_server_$server") * $money;


    if (!empty($server) || !empty($username) || !empty($password) || !empty($money)) {

        if (data_user('cash') >= $money) {

            if (setting('gem_cash_min') <= $money) {
                if ($server > 0 && $server <= 9) {
                    $db->exec("INSERT INTO `service`
    (`username`, `account`, `password`, `amount`,`cash`, `server`, `type`, `status`, `note`, `date`) 
    VALUES 
    ('" . data_user('username') . "'," . $db->quote($username) . "," . $db->quote($password) . "," . $db->quote($gem) . "," . $db->quote($money) . "," . $db->quote($server) . ",'banngoc','0','','" . time() . "')");
                    $db->exec("UPDATE `user` SET `cash` = `cash` - $money WHERE `username` = '" . data_user('username') . "' ");
                    $success = 'Tạo đơn thành công!';
                }
            } else {
                $err = "Số tiền phải lớn hơn " . number_format(setting('gem_cash_min'));
            }
        } else {
            $err = "Số tiền không đủ. Vui lòng nạp thêm!";
        }
    } else {
        $err = "Vui lòng điền đầy đủ thông tin!";
    }
}


?>

<div class="c-layout-page">
    <!-- BEGIN: PAGE CONTENT -->
    <div class="c-content-box c-size-md c-bg-white">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center" style="font-family:Roboto; margin-bottom: 20px;">
                    <h2 style="color: #19b1ff;">HỆ THỐNG BÁN NGỌC TỰ ĐỘNG</h2>
                    <div style="width: 140px; height: 1px; margin: 20px auto; border-bottom: 4px solid #19b1ff;"></div>
                </div>
            </div>
        </div>
        <div class="header-ball">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 header-title-buy">
                        <div class="content_post">
                            <p style="text-align:center"><span style="color:#f1c40f"><strong><span style="font-size:22px"><span style="background-color:#c0392b">Đ&Atilde; C&Oacute; NGỌC GI&Aacute; TẾT 50K 300&nbsp;NGOC 100K 600 NGỌC ĐỒNG GI&Aacute; 9 SEVER</span></span></strong></span><br />
                                <br />
                                <span style="color:#e74c3c"><strong><span style="font-size:18px">Ngọc b&aacute;n tr&ecirc;n 50000</span></strong></span><br />
                                <span style="color:#e74c3c"><strong><span style="font-size:18px">Điền đ&uacute;ng t&agrave;i khoản&nbsp;mật khẩu, KH&Ocirc;NG&nbsp;biết hoa</span><br />
                                        <span style="font-size:18px">Nhập t&agrave;i khoản mật khẩu game, KH&Ocirc;NG PHẢI&nbsp;t&agrave;i khoản mật khẩu&nbsp;shop</span><br />
                                        <span style="font-size:18px">Off game 1 ph&uacute;t trước khi đặt mua</span><br />
                                        <span style="font-size:18px">Kh&ocirc;ng v&agrave;o nick khi mua</span><br />
                                        <span style="font-size:18px">Đứng sẵn ở si&ecirc;u thị</span><br />
                                        <span style="font-size:18px">Acc c&oacute; sẵn 1 ngọc</span><br />
                                        <span style="font-size:18px">Kh&ocirc;ng full h&agrave;nh trang</span><br />
                                        <span style="font-size:18px">Kh&ocirc;ng mật khẩu rương</span></strong></span><br />
                                <span style="color:#8e44ad"><span style="font-size:18px"><strong><span style="background-color:#ffffff">KHI THẤY TH&Agrave;NH C&Ocirc;NG VUI L&Ograve;NG ĐỢI TẦM 2P SAU Đ&Oacute; HẴNG V&Agrave;O GAME &lt; TR&Aacute;NH KẸT ĐỒ K&Iacute; GỬI NGỌC &gt;</span></strong></span></span><br />
                                <span style="color:#e74c3c"><strong><span style="font-size:18px">Mua xong đến shop k&yacute; gửi nhận ngọc</span></strong></span>
                            </p>

                            <p style="text-align:center"><br />
                                <span style="font-size:18px"><span style="color:#e74c3c"><strong>Thất bại th&igrave; đợi 10 ph&uacute;t sau, shop tự ho&agrave;n tiền, bạn đặt lệnh mua lại</strong></span></span>
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: PAGE CONTENT -->
</div>

<section id="dv" class="countdown groomsmen-bridesmaids">
    <form id="frmBuyGem" method="post">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center" style="padding-bottom: 20px;">
                    <div class="col-md-3 col-md-offset-5 text-center" style="padding: 10px; background-color: #19b1ff;border: 1px solid #d1ef33;margin-bottom: 30px;border-radius: 6px;">
                        <b class="t18" style="color:#ffffff;">SỐ DƯ: <?= number_format(data_user('cash')); ?> VNĐ</b>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-6 col-md-offset-3" style="padding-bottom: 45px;">
                        <div class="col-md-12 has-textbox">
                            <div class="form-group row">
                                <spam class="col-md-3 control-label bb ar">Vũ trụ:</spam>
                                <div class="col-md-8">
                                    <select class="form-control t14" name="ServerID" id="ServerID">
                                        <option value="0">Chọn vũ trụ</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 has-textbox">
                            <div class="form-group row">
                                <spam class="col-md-3 control-label bb ar">Tài khoản:</spam>
                                <div class="col-md-8">
                                    <input type="text" id="UserName" name="UserName" class="form-control t14" placeholder="Nhập tài khoản game" value="">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 has-textbox">
                            <div class="form-group row">
                                <spam class="col-md-3 control-label bb ar">Mật khẩu:</spam>
                                <div class="col-md-8">
                                    <input type="password" id="Password" name="Password" class="form-control t14" placeholder="Nhập mật khẩu" value="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 has-textbox">
                            <div class="form-group row">
                                <spam class="col-md-3 control-label bb ar">Số tiền: </spam>
                                <div class="col-md-8">
                                    <input type="number" id="Money" name="Money" class="form-control t14" placeholder="Nhập số tiền bằng số" value="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 has-textbox">
                            <div class="form-group row">
                                <spam class="col-md-3 control-label bb ar">Hệ số:</spam>
                                <div class="col-md-8">
                                    <input type="text" id="ExchangeRate" name="ExchangeRate" disabled class="form-control t14" placeholder="" value="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 has-textbox">
                            <div class="form-group row">
                                <spam class="col-md-3 control-label bb ar">Số ngọc nhận:</spam>
                                <div class="col-md-8">
                                    <input type="text" id="MoneyConsum" name="MoneyConsum" style="color: red; font-weight: bold;" disabled class="form-control t14" placeholder="" value="">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 has-textbox" style="margin-top: 25px;">
                            <div class="form-group row">
                                <div class="col-md-8 col-md-offset-3">
                                    <input name="submit" type="submit" class="btn btn-success col-xs-12" value="Mua ngay">

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="panel-heading clearfix text-center" style="color: #fdfdfd; background: #30b9ff; padding: 10px 15px;">
        <span class="t24 bb">LỊCH SỬ MUA NGỌC</span>
    </div>
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="panel-body">
                <table class="table table-hover table-custom-res">
                    <tbody>
                        <tr>
                            <th>Thời gian</th>
                            <th>Username/Password</th>
                            <th>Amount</th>
                            <th>Note</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                    </tbody>
                    <tbody>
                        <?php
                        $limit = 10;
                        if (isset($_GET["page"])) {
                            $page = $_GET["page"];
                            settype($page, "int");
                        } else {
                            $page = 1;
                        }
                        $from = ($page - 1) * $limit;

                        $data = $db->query("SELECT * FROM `service` WHERE `username` = '" . data_user('username') . "' AND `type` = 'banngoc' LIMIT $from,$limit");

                        foreach ($data as $row) {
                            $status = array('WAITING','FAILED','SUCCESS');
                            $data_account = $db->query("SELECT * FROM `nick` WHERE `id` = '" . $row['id_acc'] . "'")->fetch();
                        ?>
                            <tr>
                                <td><?= date("H:i:s d-m-Y", $row['date']); ?></td>
                                <td><?= $row['account'] . '/' . $row['password']; ?></td>
                                <td><?= number_format($row['amount']) . ' GEM/' . number_format($row['cash']) . 'đ'; ?></td>
                                <td><?= $row['note']; ?></td>
                                <td><?= $status[$row['status']]; ?></td>
                                <td>Cancel</td>


                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>

                <div class="data_paginate paging_bootstrap paginations_custom" style="text-align: center">
                    <?php
                    $tong = $db->query("SELECT `id` FROM `service` WHERE `username` = '" . data_user('username') . "' AND `type` = 'banngoc'")
                        ->rowcount();
                    if ($tong > $sotin1trang) {
                        echo '<center>' . phantrang('/profile/history?', $from, $tong, $limit) . '</center>';
                    } ?>


                </div>
            </div>
        </div>

</section>
<script>
    $("#Money").on("keyup", function() {
        var zMoney = $("#Money").val();
        var zServer = $("#ServerID").val();
        $.ajax({
            url: '/getExchange?Money=' + zMoney + "&type=2&ServerID=" + zServer,
            type: "POST",
            dataType: "json",
            data: {
                sv: $('#ServerID').val()
            },
            success: function(data) {
                $('#ExchangeRate').val(data.ExchangeRate);
                $('#MoneyConsum').val(data.Money);
            }
        });
    });
    $("#ServerID").change(function() {

        var zMoney = $("#Money").val();
        var zServer = $("#ServerID").val();
        if (zMoney != '' && zServer != null) {
            $.ajax({
                type: 'POST',
                url: '/getExchange?Money=' + zMoney + "&type=2&ServerID=" + zServer,
                dataType: "json",
                data: {
                    sv: $('#ServerID').val()
                },
                success: function(data) {
                    $("#MoneyConsum").val(data.Money);
                    $("#ExchangeRate").val(data.ExchangeRate);
                },
                error: function(data) {}
            });
        }

    });
</script>
<?php
if (isset($err)) {
    echo '<script>swal("Error!", "' . $err . '", "error");</script>';
}

if (isset($success)) {
    echo '<script>swal("Success!", "' . $success . '", "success");</script>';
}
?>
<?php
require('foot.php');
?>