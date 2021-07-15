<?php
require('../system/function.php');
$id  = isset($_GET['id']) ? (int)$_GET['id'] : null;

$data = $db->query("SELECT * FROM `nick` WHERE `id` = '$id' LIMIT 1")->fetch();

$loainick = $data['loainick'];

if ($loainick == 0 || $loainick == 1 || $loainick == 2) {
    $nph = 'TeaMobi';
    $tengame = 'Ngọc rồng Online';
} elseif ($loainick == 3 || $loainick == 4) {
    $nph = 'Garena';
    if ($loainick == 3) {
        $tengame = 'Freefire';
    } elseif ($loainick == 4) {
        $tengame = 'Liên Quân Mobile';
    } else {
        $tengame = 'Unknown';
    }
} else {
    $nph = 'Unknown';
}
?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <h4 class="modal-title">Xác nhận mua tài khoản</h4>
</div>
<div class="modal-body">
    <div class="c-content-tab-4 c-opt-3" role="tabpanel">
        <ul class="nav nav-justified" role="tablist">
            <li role="presentation" class="active">
                <a href="#payment" role="tab" data-toggle="tab" class="c-font-16">Thanh toán</a>
            </li>
            <li role="presentation">
                <a href="#info" role="tab" data-toggle="tab" class="c-font-16">Tài khoản</a>
            </li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="payment">
                <ul class="c-tab-items p-t-0 p-b-0 p-l-5 p-r-5">
                    <li class="c-font-dark">
                        <div class="col-md-12 text-border">
                            <div class="form-group row">
                                <spam class="col-md-12 control-label bb">Thông tin tài khoản #<?= $id; ?></spam>
                            </div>
                        </div>
                        <div class="col-md-12 text-border">
                            <div class="form-group row">
                                <spam class="col-xs-6 col-md-6 control-label al">Nhà phát hành:</spam>
                                <spam class="col-xs-6 col-md-6 control-label bb"><?= $nph; ?></spam>
                            </div>
                        </div>
                        <div class="col-md-12 text-border">
                            <div class="form-group row">
                                <spam class="col-xs-6 col-md-6 control-label al">Tên game:</spam>
                                <spam class="col-xs-6 col-md-6 control-label bb"><?= $tengame; ?></spam>
                            </div>
                        </div>
                        <div class="col-md-12 text-border">
                            <div class="form-group row">
                                <spam class="col-xs-6 col-md-6 control-label al">Giá tiền:</spam>
                                <spam class="col-xs-6 col-md-6 control-label bb" style="color:#ff0000;">10,000 đ</spam>
                            </div>
                        </div>
            </div>

            <div role="tabpanel" class="tab-pane fade" id="info">
                <ul class="c-tab-items p-t-0 p-b-0 p-l-5 p-r-5">
                    <li class="c-font-dark">
                        <div class="col-md-12 text-border">
                            <div class="form-group row">
                                <spam class="col-md-12 control-label bb">Chi tiết tài khoản #<?= $id; ?></spam>
                            </div>
                        </div>
                        <div class="col-md-12 text-border">
                            <?php if ($loainick == 0 || $loainick == 1 || $loainick == 2) { ?>
                                <div class="form-group row">
                                    <spam class="col-xs-6 col-md-6 control-label al">Máy chủ:</spam>
                                    <spam class="col-xs-6 col-md-6 control-label bb"><?php if ($data['info1'] == 'nuocngoai') {
                                                                                            echo 'Nước ngoài';
                                                                                        } else {
                                                                                            echo $data['info1'] . ' Sao';
                                                                                        }; ?></spam>
                                </div>
                        </div>
                        <div class="col-md-12 text-border">
                            <div class="form-group row">
                                <spam class="col-xs-6 col-md-6 control-label al">Hành tinh:</spam>
                                <spam class="col-xs-6 col-md-6 control-label bb"><?= load_info2($data['info2']); ?></spam>
                            </div>
                        </div>
                        <div class="col-md-12 text-border">
                            <div class="form-group row">
                                <spam class="col-xs-6 col-md-6 control-label al">Đăng ký:</spam>
                                <spam class="col-xs-6 col-md-6 control-label bb"><?= load_info3($data['info3']); ?></spam>
                            </div>
                        </div>
                        <?php if ($loainick == 0) { ?>
                            <div class="col-md-12 text-border">
                                <div class="form-group row">
                                    <spam class="col-xs-6 col-md-6 control-label al">Loại acc:</spam>
                                    <spam class="col-xs-6 col-md-6 control-label bb"><?= load_info4($data['info4']); ?></spam>
                                </div>
                            </div>
                        <?php } elseif ($loainick == 1) { ?>

                            <div class="col-md-12 text-border">
                                <div class="form-group row">
                                    <spam class="col-xs-6 col-md-6 control-label al">Bông tai:</spam>
                                    <spam class="col-xs-6 col-md-6 control-label bb"><?= load_info4($data['info4']); ?></spam>
                                </div>
                            </div>
                        <?php } elseif ($loainick == 2) { ?>
                            <div class="col-md-12 text-border">
                                <div class="form-group row">
                                    <spam class="col-xs-6 col-md-6 control-label al">Vật phẩm:</spam>
                                    <spam class="col-xs-6 col-md-6 control-label bb"><?= load_info4($data['info4']); ?></spam>
                                </div>
                            </div>
                            <div class="col-md-12 text-border">
                                <div class="form-group row">
                                    <spam class="col-xs-6 col-md-6 control-label al">Loại đồ:</spam>
                                    <spam class="col-xs-6 col-md-6 control-label bb"><?= load_info5($data['info5']); ?></spam>
                                </div>
                            </div>

                        <?php }  
                    }elseif($loainick == 3){ ?> 
                      <div class="col-md-12 text-border">
                                <div class="form-group row">
                                    <spam class="col-xs-6 col-md-6 control-label al">Đăng ký:</spam>
                                    <spam class="col-xs-6 col-md-6 control-label bb"><?= load_info1($data['info1']); ?></spam>
                                </div>
                            </div>
                            <div class="col-md-12 text-border">
                                <div class="form-group row">
                                    <spam class="col-xs-6 col-md-6 control-label al">Pet:</spam>
                                    <spam class="col-xs-6 col-md-6 control-label bb"><?= load_info2($data['info2']); ?></spam>
                                </div>
                            </div>
                            <div class="col-md-12 text-border">
                                <div class="form-group row">
                                    <spam class="col-xs-6 col-md-6 control-label al">Thẻ vô cực:</spam>
                                    <spam class="col-xs-6 col-md-6 control-label bb"><?= load_info3($data['info3']); ?></spam>
                                </div>
                            </div>
                           
                    <?php }elseif($loainick == 4){ ?>
                        <div class="col-md-12 text-border">
                                <div class="form-group row">
                                    <spam class="col-xs-6 col-md-6 control-label al">Bảng ngọc:</spam>
                                    <spam class="col-xs-6 col-md-6 control-label bb"><?= $data['info1']; ?></spam>
                                </div>
                            </div>
                            <div class="col-md-12 text-border">
                                <div class="form-group row">
                                    <spam class="col-xs-6 col-md-6 control-label al">Bậc ngọc:</spam>
                                    <spam class="col-xs-6 col-md-6 control-label bb"><?= $data['info2']; ?></spam>
                                </div>
                            </div>
                            <div class="col-md-12 text-border">
                                <div class="form-group row">
                                    <spam class="col-xs-6 col-md-6 control-label al">Vàng:</spam>
                                    <spam class="col-xs-6 col-md-6 control-label bb"><?= $data['info3']; ?></spam>
                                </div>
                            </div>
                            <div class="col-md-12 text-border">
                                <div class="form-group row">
                                    <spam class="col-xs-6 col-md-6 control-label al">Ruby:</spam>
                                    <spam class="col-xs-6 col-md-6 control-label bb"><?= $data['info4']; ?></spam>
                                </div>
                            </div>
                            <div class="col-md-12 text-border">
                                <div class="form-group row">
                                    <spam class="col-xs-6 col-md-6 control-label al">Quân huy:</spam>
                                    <spam class="col-xs-6 col-md-6 control-label bb"><?= $data['info5']; ?></spam>
                                </div>
                            </div>
                            <div class="col-md-12 text-border">
                                <div class="form-group row">
                                    <spam class="col-xs-6 col-md-6 control-label al">Rank:</spam>
                                    <spam class="col-xs-6 col-md-6 control-label bb"><?= load_info6($data['info6']); ?></spam>
                                </div>
                            </div>
                        <?php } ?>

                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="form-group ">
        <label class="col-md-3 form-control-label">Mã giảm giá:</label>
        <div class="col-md-7">
            <input type="hidden" id="id" value="<?= $id; ?>" />
            <input type="text" class="form-control c-square c-theme " name="coupon" id="coupon" placeholder="Mã giảm giá" value="">
            <span class="help-block">Nhập mã giảm giá nếu có để nhận ưu đãi</span>
        </div>
    </div>
    <div class="form-group ">
        <label class="col-md-12 form-control-label text-danger" style="text-align: center;margin: 10px 0; ">
            <?php if (data_user('id') == null) {
                echo 'Bạn phải đăng nhập mới có thể mua tài khoản tự động.';
            } elseif (data_user('cash') < $data['cash']) {
                echo 'Tài khoản không đủ tiền. vui lòng nạp thêm tiền vào tài khoản';
            } else {
                echo '<p id="result"></p>';
            }
            ?>
        </label>
    </div>
    <div style="clear: both"></div>
</div>
<div class="modal-footer">
    <?php
    if (data_user('id') == null) {
        echo '<a class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold" href="/login">Đăng nhập</a>';
    } elseif (data_user('cash') < $data['cash']) {
        echo '<a class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold" href="/login">Nạp tiền</a>';
    } else {
        echo '<button type="submit" id="buy" name="buy" class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold">Mua ngay</button>';
    }
    ?>
    <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>
</div>
<script>
    $(document).ready(function() {
        $('.load-modal').each(function(index, elem) {
            $(elem).unbind().click(function(e) {
                e.preventDefault();
                e.preventDefault();
                var curModal = $('#LoadModal');
                curModal.find('.modal-content').html("<div class=\"loader\" style=\"text-align: center\"><img src=\"/assets/frontend/images/loader.gif\" style=\"width: 50px;height: 50px;\"></div>");
                curModal.modal('show').find('.modal-content').load($(elem).attr('rel'));
            });
        });
    });
    $("#buy").on("click", function() {
        $.ajax({
            url: "/thanhtoan",
            type: "POST",
            dataType: "text",
            data: {
                id: $('#id').val(),
                giftcode: $('#coupon').val(),
                magioithieu: $('#magioithieu').val()
            },
            success: function(data) {
                $('#result').html(data);
            }
        });
    });
</script>