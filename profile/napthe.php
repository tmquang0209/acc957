<?php
require('../system/function.php');
require('../public/head.php');
require('menu.php');

if (isset($_POST['submit'])) {
    if (!isset($_POST['type']) || !isset($_POST['serial']) || !isset($_POST['pin'])) {
        $err = '<div class="alert alert-danger alert-block"><button type="button" class="close" data-dismiss="alert">×</button>Bạn cần nhập đầy đủ thông tin .</div>';
    } else {
        $type = $_POST['type'];
        $pin = $_POST['pin'];
        $serial = $_POST['serial'];
        $amount = $_POST['amount'];


        if ($type == '' || $serial == '' || $pin == '' || $amount == '') {
            $err = '<div class="alert alert-danger alert-block"><button type="button" class="close" data-dismiss="alert">×</button>Bạn cần nhập đầy đủ thông tin .</div>';
        } else {

            $tranid = time() . rand(10000, 99999);  /// Cái này có thể mà mã order của bạn, nó là duy nhất (enique) để phân biệt giao dịch.


            $response = $rechargeService->send($type, $amount, $pin, $serial, $tranid);
            if ($response['success']) {
                $smtp = $db->prepare("INSERT INTO `napthe`
                (`username`, `serial`, `pin`, `amount`, `telco`, `status`, `tran_id`, `date`) 
                VALUES
                          (?,?,?,?,?,?)
                          ");
    
                $data = array(data_user('username'), $serial, $pin, (int)$amount, $type, $response['handleSuccess'] ? 'Thẻ sai' : 'Chờ', $tranid, date("H:i:s d-m-Y"));
                $smtp->execute($data);
                $err = '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button>' . $response['message'] . ' .</div>';
            } else {
    
                $err = '<div class="alert alert-danger alert-block"><button type="button" class="close" data-dismiss="alert">×</button>' . $response['message'] . ' .</div>';
            }
        }
    }
}
?>

<div class="col-xs-12 col-md-9">
    <div class="panel">
        <div class="panel">
            <div class="col-sm-12 dv-title">
                <h2>NẠP TIỀN THẺ CÀO</h2>
                <div class="gach"></div>
            </div>
            <form method="POST" action="">
    <div class="form-group">
      <label>Loại thẻ:</label>
      <select class="form-control" name="type">
        <option value="">-- Chọn loại thẻ --</option>
        <option value="VIETTEL" <?php if ($_POST['type'] == 'VIETTEL') {
            echo "selected";
        } ?>>Viettel
        </option>
        <option value="MOBIFONE" <?php if ($_POST['type'] == 'MOBIFONE') {
            echo "selected";
        } ?>>Mobifone
        </option>
        <option value="VINAPHONE" <?php if ($_POST['type'] == 'VINAPHONE') {
            echo "selected";
        } ?>>Vinaphone
        </option>
        <option value="VIETNAMOBILE" <?php if ($_POST['type'] == 'VIETNAMOBILE') {
            echo "selected";
        } ?>>Vietnammobile
        </option>
        <option value="GATE" <?php if ($_POST['type'] == 'GATE') {
            echo "selected";
        } ?>>Gate
        </option>
        <option value="ZING" <?php if ($_POST['type'] == 'ZING') {
            echo "selected";
        } ?>>Zing
        </option>
        <option value="SCOIN" <?php if ($_POST['type'] == 'SCOIN') {
            echo "selected";
        } ?>>Scoin
        </option>
        <option value="VCOIN" <?php if ($_POST['type'] == 'VCOIN') {
            echo "selected";
        } ?>>Vcoin
        </option>
        <option value="BIT" <?php if ($_POST['type'] == 'BIT') {
            echo "selected";
        } ?>>BIT
        </option>
      </select>
    </div>
    <div class="form-group">
      <label>Mệnh giá:</label>
      <select class="form-control" name="amount">
        <option value="">-- Chọn mệnh giá --</option>
        <option value="10000"<?php if ($_POST['amount'] == '10000') {
            echo "selected";
        } ?>>10,000đ
        </option>
        <option value="20000"<?php if ($_POST['amount'] == '20000') {
            echo "selected";
        } ?>>20,000đ
        </option>
        <option value="30000"<?php if ($_POST['amount'] == '30000') {
            echo "selected";
        } ?>>30,000đ
        </option>
        <option value="50000"<?php if ($_POST['amount'] == '50000') {
            echo "selected";
        } ?>>50,000đ
        </option>
        <option value="100000"<?php if ($_POST['amount'] == '100000') {
            echo "selected";
        } ?>>100,000đ
        </option>
        <option value="200000"<?php if ($_POST['amount'] == '200000') {
            echo "selected";
        } ?>>200,000đ
        </option>
        <option value="300000"<?php if ($_POST['amount'] == '300000') {
            echo "selected";
        } ?>>300,000đ
        </option>
        <option value="500000"<?php if ($_POST['amount'] == '500000') {
            echo "selected";
        } ?>>500,000đ
        </option>
        <option value="1000000"<?php if ($_POST['amount'] == '1000000') {
            echo "selected";
        } ?>>1,000,000đ
        </option>
      </select>
    </div>
    <div class="form-group">
      <label>Số seri:</label>
      <input type="text" class="form-control" name="serial" value="<?= isset($serial) ? $serial : null; ?>" />
    </div>
    <div class="form-group">
      <label>Mã thẻ:</label>
      <input type="text" class="form-control" name="pin" value="<?= isset($pin) ? $pin : null; ?>" />
    </div>
    <div class="form-group">
        <?php echo (isset($err)) ? $err : ''; ?>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-success btn-block" name="submit">NẠP NGAY</button>
    </div>
  </form>
            <div class="header-ball">
                <div class="row">
                    <div class="col-md-12 header-title-buy">
                        <div class="content_post">
                            <p style="text-align:center"><strong><span style="color:#e74c3c"><span style="font-size:20px">NẠP THẺ KH&Ocirc;NG CHIẾT KHẤU<br />
                                            nạp 10k được 10k ...100k được 100k</span></span></strong></p>

                            <p style="text-align:center"><strong><span style="color:#e74c3c"><span style="font-size:20px">SAI MỆNH GI&Aacute;&nbsp;-50% THẺ</span></span></strong></p>

                            <p style="text-align:center">&nbsp;</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section id="dv" class="countdown groomsmen-bridesmaids">
            <div class="row">
                <div class="panel-heading clearfix text-center" style="color: #fdfdfd; background: #30b9ff; padding: 10px 15px;">
                    <span class="t24 bb">LỊCH SỬ NẠP THẺ</span>
                </div>
            </div>
            <div class="overlay"></div>
            <div class="row">
                <div id="LogDonate">

                </div>
            </div>
        </section>
        <script>
            function Donate() {
                showLoading();
                $.ajax({
                    type: 'POST',
                    url: '/Home/Deposit',
                    data: $("#frmDonate *").serialize(),
                    success: function(data) {
                        if (data.Code == 1) {
                            swal("Thông báo", data.Messeger);
                            hideLoading();
                            LoadTable('LogDonate', '/Home/LoadDepositList', 1);
                            document.getElementById('imgcaptcha').src = '/Home/Captcha?' + Math.random();
                            $("#NetworkSeri").val('');
                            $("#NetworkCode").val('');
                            $("#Captcha").val('');
                        } else {
                            swal("Lỗi!", data.Messeger);
                            hideLoading();
                        }

                    },
                    error: function(data) {
                        hideLoading();
                    }
                });
            }
            $(document).ready(function() {
                LoadTable('LogDonate', '/Home/LoadDepositList', 1);

                function loadDataTable() {
                    var table = $('#tb_hisser').DataTable({
                        "lengthChange": false,
                        "searching": false,
                        "pageLength": 10,
                        info: false,
                        "ordering": false,
                        "scrollX": true,
                        "language": {
                            "sProcessing": "Đang xử lý...",
                            "sLengthMenu": "Xem _MENU_ mục",
                            "sZeroRecords": "Không có dữ liệu",
                            "sInfo": "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
                            "sInfoEmpty": "Đang xem 0 đến 0 trong tổng số 0 mục",
                            "sInfoFiltered": "(được lọc từ _MAX_ mục)",
                            "sInfoPostFix": "",
                            "sSearch": "Tìm:",
                            "sUrl": "",
                            "oPaginate": {
                                "sFirst": "<<",
                                "sPrevious": "<",
                                "sNext": ">",
                                "sLast": ">>"
                            }
                        }
                    });
                }
                $("#Donate").on("click", function() {
                    Donate();
                    event.preventDefault();
                });
                $("#Network").change(function() {
                    showLoading();
                    $.ajax({
                        type: 'POST',
                        url: '/Home/GetCardValueByNetWork',
                        data: {
                            code: $("#Network").val()
                        },
                        success: function(data) {
                            $("#CardValue").html('');
                            if (data.Code == 1) {
                                hideLoading();
                                $("#CardValue").append("<option>Chọn mệnh giá</option>");
                                $.each(data.Data, function(key, value) {
                                    $("#CardValue").append("<option value='" + value.Value + "'>" + value.Text + "</option>");
                                });
                            } else {
                                $("#CardValue").append("<option>Chọn mệnh giá</option>");
                                swal("Lỗi!", data.Messeger);
                                hideLoading();
                            }

                        },
                        error: function(data) {
                            hideLoading();
                        }
                    });
                });
                $("#CardValue").change(function() {
                    if ($(this).val() > 0)
                        $("#MoneyConsum").val(formatNumber($(this).val(), '.', ',') + " VNĐ");
                    else
                        $("#MoneyConsum").val("0 VNĐ");
                });
            });
        </script>

    </div>
</div>
</div>
</section>
</div>
</div>
</div>
</div>
<!-- END: PAGE CONTENT -->
</div>
</body>
<script>
    $(function() {

        var url = window.location.pathname,
            urlRegExp = new RegExp(url.replace(/\/$/, '') + "$");
        $('.c-menu a').each(function() {
            if (urlRegExp.test(this.href.replace(/\/$/, ''))) {
                $(this).addClass('active');
            }
        });
        var table = $('#tb_hisser').DataTable({
            "lengthChange": false,
            "searching": false,
            "pageLength": 5,
            info: false,
            "ordering": false,
            "scrollX": true,
            "language": {
                "sProcessing": "Đang xử lý...",
                "sLengthMenu": "Xem _MENU_ mục",
                "sZeroRecords": "Không có dữ liệu",
                "sInfo": "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
                "sInfoEmpty": "Đang xem 0 đến 0 trong tổng số 0 mục",
                "sInfoFiltered": "(được lọc từ _MAX_ mục)",
                "sInfoPostFix": "",
                "sSearch": "Tìm:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "<<",
                    "sPrevious": "<",
                    "sNext": ">",
                    "sLast": ">>"
                }
            }
        });
    });
    loadDataTable();

    function loadDataTable(strName) {
        var table = $('#tb_hisser').DataTable({
            "lengthChange": false,
            "searching": false,
            "pageLength": 5,
            info: false,
            "ordering": false,
            "scrollX": true,
            "language": {
                "sProcessing": "Đang xử lý...",
                "sLengthMenu": "Xem _MENU_ mục",
                "sZeroRecords": "Không có dữ liệu",
                "sInfo": "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
                "sInfoEmpty": "Đang xem 0 đến 0 trong tổng số 0 mục",
                "sInfoFiltered": "(được lọc từ _MAX_ mục)",
                "sInfoPostFix": "",
                "sSearch": "Tìm:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "<<",
                    "sPrevious": "<",
                    "sNext": ">",
                    "sLast": ">>"
                }
            }
        });

    }
</script>



<?php
require('../public/foot.php');
?>