<?php
require('../system/function.php');
require('../public/head.php');
require('menu.php');
?>
<div class="col-xs-12 col-md-9">
    <div class="panel">
        <div class="panel">
            <div class="col-sm-12 dv-title">
                <h2>THÔNG TIN TÀI KHOẢN</h2>
                <div class="gach"></div>
            </div>
        </div>
        <div class="content_post">
            <div class="row">
                <div class="col-md-8 col-md-offset-4">
                    <div class="col-md-12 has-textbox">
                        <div class="form-group row">
                            <spam class="col-md-3 col-xs-6 control-label bb ar">ID của bạn:</spam>
                            <spam class="col-md-8 col-xs-6 control-label al bb"><?= data_user('id'); ?></spam>
                        </div>
                    </div>
                    <div class="col-md-12 has-textbox">
                        <div class="form-group row">
                            <spam class="col-md-3 col-xs-6 control-label bb ar">Tên tài khoản:</spam>
                            <spam class="col-md-8 col-xs-6 control-label al bb"><?= data_user('username'); ?></spam>
                        </div>
                    </div>

                    <div class="col-md-12 has-textbox">
                        <div class="form-group row">
                            <spam class="col-md-3 col-xs-6 control-label bb ar">Email:</spam>
                            <spam class="col-md-8 col-xs-6 control-label al"><?= data_user('email'); ?></spam>
                        </div>
                    </div>
                    <div class="col-md-12 has-textbox">
                        <div class="form-group row">
                            <spam class="col-md-3 col-xs-6 control-label bb ar">Số dư:</spam>
                            <spam class="col-md-8 col-xs-6 control-label al bb" style="color:#d70f0f;"><?= number_format(data_user('cash')); ?> VNĐ</spam>
                        </div>
                    </div>
                    <div class="col-md-12 has-textbox">
                        <div class="form-group row">
                            <spam class="col-md-3 col-xs-6 control-label bb ar">Số điện thoại:</spam>
                            <spam class="col-md-8 col-xs-6 control-label al"><a href="/Home/ChangeMobile" style="color:#d70f0f;font-weight:bold;"><?= data_user('phone'); ?></a></spam>
                        </div>
                    </div>
                    <div class="col-md-12 has-textbox hide">
                        <div class="form-group row">
                            <spam class="col-md-3 col-xs-6 control-label bb ar">Nhóm tài khoản:</spam>
                            <spam class="col-md-8 col-xs-6 control-label al"></spam>
                        </div>
                    </div>
                    <div class="col-md-12 has-textbox">
                        <div class="form-group row">
                            <spam class="col-md-3 col-xs-6 control-label bb ar">Ngày tham gia:</spam>
                            <spam class="col-md-8 col-xs-6 control-label al"><?= data_user('date'); ?></spam>
                        </div>
                    </div>


                </div>
            </div>
        </div>


        <script>
            LoadTable('LogDonate', '/Home/LoadTable', 1);

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
<?php
require('../public/foot.php');
?>