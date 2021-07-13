<footer class="c-layout-footer c-layout-footer-3 c-bg-dark">
    <div class="c-prefooter">
        <div class="container">
            <div class="col-md-4">
                <div class="c-container c-first">
                    <div class="c-content-title-2">
                        <h3 class="c-font-uppercase c-font-bold c-font-white" style="color:#d8d8d8 !important;">
                            Về <span class="c-theme-font" style="color:#0b93a3 !important"><?= $_SERVER['SERVER_NAME']; ?></span>


                        </h3>
                        <div class="c-line-left hide"></div>
                        <p class="c-text">
                            Hệ thống mua bán nick game tự động uy tín, nhanh gọn, an toàn tuyệt đối.
                        </p>
                    </div>
                    <ul class="c-links">
                        <li><a href="/Home/Guide?id=GIOITHIEU">Giới thiệu</a></li>
                        <li><a href="/Home/Guide?id=DIEUKHOAN">Điều Khoản</a></li>
                        <li style="border-bottom: 1px solid #d8d8d8;"><a href="/Home/Guide?id=UYTINHCUASHOP">Uy Tín Của Shop</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="c-container c-last">
                    <div class="c-content-title-2">
                        <h3 class="c-font-uppercase c-font-bold c-font-white" style="color:#d8d8d8 !important;">CHI TIẾT LIÊN HỆ</h3>
                        <div class="c-line-left hide"></div>
                        <p></p>
                    </div>
                    <ul class="c-socials">
                        <li><a href="<?= setting('facebook'); ?>" target="_blank"><i class="icon-social-facebook"></i></a></li>
                        <li><a href="<?= setting('youtube'); ?>" target="_blank"><i class="icon-social-youtube"></i></a></li>
                    </ul>
                    <ul class="c-address">
                        <!--<li><i class="icon-pointer c-theme-font"></i> One Boulevard, Beverly Hills</li>-->
                        <li><a href="tel:0396498015" class="c-font-regular" style="color:#d8d8d8 !important;">Hotline: <?= setting('phone'); ?> (8h-22h)</a></li>
                        <li><a href="" class="c-font-regular" style="color:#d8d8d8 !important;">Email: <?= setting('email'); ?></a></li>
                        <li style="color:#d8d8d8 !important;">Web được phát triển bởi <a href="https://www.facebook.com/tmq.dz.pro/" target="_blank" style="color: red;"><b>TmQ</b></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-6 col-sm-12 c-col" style="padding-bottom:10px;">
                <p class="c-copyright c-font-grey">
                    <span class="c-font-grey-3"> </span>
                </p>
            </div>
        </div>
    </div>
</footer>
<div class="modal fade" id="thongbao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Thông báo
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h5>

            </div>
            <div class="modal-body">
                <div id="thongbaodata">

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>



<!-- END: footer -->
<script>
    $(document).ready(function() {
        if ($("#mess").val() != '') {
            swal($("#mess").val());
        }
        $(".atm").on("click", function() {
            $(".atm").removeClass('btn-info');
            $(this).addClass('btn-info');
        });
        $('.Date').datepicker({
            format: 'dd/mm/yyyy',
            language: "vi",
            orientation: "right",
            autoclose: true
        });
    });
</script>
<script>
    $(function() {
        $('input[name="daterange"]').daterangepicker({
            opens: 'left'
        }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });
    });
</script>
<div style="display: none" id="notice">
    <p style="text-align:center"><?= setting('notification'); ?></p>

</div>
<script>
    $(document).ready(function() {
        //swal({
        //    title: 'DichVuGame.vn - Thông báo',
        //    html: true,
        //    text: $("#notice").html(),
        //    showCloseButton: true,
        //    focusConfirm: false,
        //});

        $("#thongbaodata").html($("#notice").html());
        $("#thongbao").modal('show');

    });
</script>

<div class="modal fade" id="Modal_ATM" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" style="color:#19b1ff;">&times;</button>
                <h4 class="modal-title" style="color:#19b1ff;">Nạp tiền từ ATM hoặc Ví điện tử</h4>
            </div>
            <div class="modal-body">
                <a href="/Home/Guide?id=HD-NAPTHE">
                    <h4 class="text-center" style="color:#ff1919;font-weight:bold;">HƯỚNG DẪN CHI TIẾT NẠP TIỀN TỪ ATM - VÍ TẠI ĐÂY</h4>
                </a>

                <div class="row">
                    <div class="col-md-12">

                        <a data-toggle="tab" href="#ATM" class="btn btn-lg col-xs-6 btn-default atm btn-info rounded-0">ATM</a>
                        <a data-toggle="tab" href="#VDT" class="btn btn-lg col-xs-6 btn-default atm rounded-0">Ví điện tử</a>
                        <div class="tab-content" style="padding-top: 55px;">
                            <div id="ATM" class="tab-pane fade in active">
                                <div class="col-md-12 p-5 text-border">
                                    <div class="form-group row">
                                        <spam class="col-md-12 control-label bb">Thông tin tài khoản ngân hàng</spam>
                                    </div>
                                </div>

                                <div class="col-md-12 p-5 text-border">
                                    <div class="form-group row">
                                        <spam class="col-md-8 col-xs-7 control-label al bb">Tên tài khoản: BÙI XUÂN QUÂN</spam>
                                        <spam class="col-md-4 col-xs-5 control-label bb">Chi nhánh</spam>
                                    </div>
                                </div>
                                <div class="col-md-12 p-5 text-border">
                                    <div class="form-group row">
                                        <spam class="col-xs-3 col-md-4 control-label">VIETCOMBANK:</spam>
                                        <spam class="col-xs-4 col-md-4 control-label bb">0561000607469</spam>
                                        <spam class="col-xs-5 col-md-4 control-label bb">Bảo Lộc</spam>
                                    </div>
                                </div>
                                <div class="col-md-12 p-5 text-border">
                                    <div class="form-group row">
                                        <spam class="col-xs-3 col-md-4 control-label">AGRIBANK:</spam>
                                        <spam class="col-xs-4 col-md-4 control-label bb">5495205019810</spam>
                                        <spam class="col-xs-5 col-md-4 control-label bb">Bảo Lộc</spam>
                                    </div>
                                </div>


                            </div>
                            <div id="VDT" class="tab-pane fade">
                                <div class="col-md-12 p-5 text-border">
                                    <div class="form-group row">
                                        <spam class="col-md-12 control-label bb">Thông tin tài khoản ví điện tử</spam>
                                    </div>
                                </div>

                                <div class="col-md-12 p-5 text-border">
                                    <div class="form-group row">
                                        <spam class="col-xs-7 control-label">Tcsr (thecaosieure.com):</spam>
                                        <spam class="col-xs-5 control-label bb">0396498015</spam>
                                    </div>
                                </div>
                                <div class="col-md-12 p-5 text-border">
                                    <div class="form-group row">
                                        <spam class="col-xs-7 control-label">TSR (Thesieure.com):</spam>
                                        <spam class="col-xs-5 control-label bb">0396498015</spam>
                                    </div>
                                </div>
                                <div class="col-md-12 p-5 text-border">
                                    <div class="form-group row">
                                        <spam class="col-xs-7 control-label">Momo (ví Momo):</spam>
                                        <spam class="col-xs-5 control-label bb">0396498015</spam>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <p style="color:#19b1ff;">
                            Nội dung thanh toán: <strong>Nap Tien acc957.com</strong> {tên tài khoản hoặc số điện thoại}
                            Chuyển xong liên hệ fanpage : <a href=" https://www.facebook.com/ytboctiiu957"> <strong style="color:#ff0000;">Chăm sóc khách hàng - acc957.com</strong> </a> hoặc
                            Hotline <strong style="color:#ff0000;">0396498015</strong> để được xử lý.
                        </p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Đóng</button>
            </div>
        </div>

    </div>
</div>

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
</script>
</body>

</html>