<?php
require('../system/function.php');
require('head.php');
?>
<style>
    .input-group .input-group-btn>.btn,
    .input-group .input-group-addon {
        background-color: #f3f3f3;
        border-radius: 0px;
        padding-top: 9px;
    }

    .input-group .input-group-btn>.btn,
    .input-group .input-group-addon {
        background-color: #FAFAFA;
        font-size: 14px;
    }

    .form-control {
        border-radius: 4px;
    }

    .form-group {
        margin-bottom: 0px;
    }

    .row-flex-safari [class*="col-"] {
        margin-bottom: 5px;
    }

    .item-list .a-more .view3 a {
        font-weight: bold;
    }

    .price_item span {
        font-weight: bold;
    }

    .item-list .a-more .price_item {
        font-weight: bold;
    }
</style>
<div class="c-layout-page">
    <!-- BEGIN: PAGE CONTENT -->
    <div class="c-content-box c-size-md c-bg-white">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center" style="font-family:Roboto; margin-bottom: 20px;">
                    <h2 style="color: #19b1ff;">LIÊN QUÂN MOBILE - Thường</h2>
                    <div style="width: 140px; height: 1px; margin: 20px auto; border-bottom: 4px solid #19b1ff;"></div>
                </div>
            </div>
            <div class="header-ball">
                <div class="row">
                    <div class="col-md-12 header-title-buy">
                        <div class="content_post">
                            <?php echo setting('noti_freefire'); ?>
                        </div>
                    </div>
                </div>
            </div>

            <form class="" id="frmBuy" name="frmBuy">
                <div class="content_post">
                    <div class="row">
                        <div class="row-flex-safari game-list">
                            <div class="col-md-3 p-5">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">Mã Số</span>
                                        <input class="form-control" id="Code" name="Code" placeholder="Nhập Mã Số" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 p-5">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">Giá</span>

                                        <select class="form-control" id="Money" name="Money">
                                            <option value="" selected>Tất cả</option>
                                            <option value="0 200000">Dưới 200k</option>
                                            <option value="200000 400000">Từ 200k đến 400k</option>
                                            <option value="400000 600000">Từ 400k đến 600k</option>
                                            <option value="600000 1000000">Từ 600k đến 1000k</option>
                                            <option value="1000000 1500000">Từ 1000k đến 1500k</option>
                                            <option value="1500000 2000000">Từ 1500k đến 2000k</option>
                                            <option value="2000000 99999999">Trên 2000k</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 p-5">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">Bảng ngọc</span>
                                        <input class="form-control" id="Field01" min="0" name="Field01" placeholder="Bảng ngọc" type="number" value="" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 p-5">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">Bậc ngọc</span>
                                        <input class="form-control" id="Field02" name="Field02" placeholder="Bậc ngọc" type="text" value="" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 p-5">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">V&#224;ng</span>
                                        <input class="form-control" id="Field03" name="Field03" placeholder="Vàng" type="text" value="" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 p-5">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">Ruby</span>
                                        <input class="form-control" id="Field04" name="Field04" placeholder="Ruby" type="text" value="" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 p-5">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">Qu&#226;n huy</span>
                                        <input class="form-control" id="Field05" name="Field05" placeholder="Quân huy" type="text" value="" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 p-5">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">Rank</span>
                                        <select class="form-control" id="Field06" name="Field06">
                                            <option value="">Rank</option>
                                            <option value="chua">Chưa rank</option>
                                            <option value="dong_v">Đồng V</option>
                                            <option value="dong_iv">Đồng IV</option>
                                            <option value="dong_iii">Đồng III</option>
                                            <option value="dong_ii">Đồng II</option>
                                            <option value="dong_i">Đồng I</option>
                                            <option value="bac_v">Bạc V</option>
                                            <option value="bac_iv">Bạc IV</option>
                                            <option value="bac_iii">Bạc III</option>
                                            <option value="bac_ii">Bạc II</option>
                                            <option value="bac_i">Bạc I</option>
                                            <option value="vang_v">V&#224;ng V</option>
                                            <option value="vang_iv">V&#224;ng IV</option>
                                            <option value="vang_iii">V&#224;ng III</option>
                                            <option value="vang_ii">V&#224;ng II</option>
                                            <option value="vang_i">V&#224;ng I</option>
                                            <option value="bachkim_v">Bạch Kim V</option>
                                            <option value="bachkim_iv">Bạch Kim IV</option>
                                            <option value="bachkim_iii">Bạch Kim III</option>
                                            <option value="bachkim_ii">Bạch Kim II</option>
                                            <option value="bachkim_i">Bạch Kim I</option>
                                            <option value="kimcuong_v">Kim Cương V</option>
                                            <option value="kimcuong_iv">Kim Cương IV</option>
                                            <option value="kimcuong_iii">Kim Cương III</option>
                                            <option value="kimcuong_ii">Kim Cương II</option>
                                            <option value="kimcuong_i">Kim Cương I</option>
                                            <option value="tinhanh_i">Tinh Anh I</option>
                                            <option value="tinhanh_ii">Tinh Anh II</option>
                                            <option value="tinhanh_iii">Tinh Anh III</option>
                                            <option value="tinhanh_iv">Tinh Anh IV</option>
                                            <option value="tinhanh_v">Tinh Anh V</option>
                                            <option value="caothu">Cao thủ</option>
                                            <option value="thachdau">Th&#225;ch đấu</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 p-5">
                                <div class="form-group">
                                    <div class="input-group">
                                        <button type="submit" class="btn btn-info btn0" style="padding: 4px 30px;">TÌM KIẾM</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row row-flex item-list">
                <?php

                $limit = 30;
                if (isset($_GET["page"])) {
                    $page = $_GET["page"];
                    settype($page, "int");
                } else {
                    $page = 1;
                }
                $from = ($page - 1) * $limit;


                if (isset($_GET)) {
                    $id = xss($_GET['Code']);
                    $money = xss($_GET['Money']);
                    $field01 = xss($_GET['Field01']);
                    $field02 = xss($_GET['Field02']);
                    $field03 = xss($_GET['Field03']);
                    $field04 = xss($_GET['Field04']);
                    $field05 = xss($_GET['Field05']);
                    $field06 = xss($_GET['Field06']);

                    if ($id != '') {
                        $id = "AND `id` = '" . (int)$id . "'";
                    }
                    if ($money != '') {
                        $tach = explode(" ", $money);
                        $money = "AND `cash` BETWEEN '" . (int)$tach[0] . "' AND '" . (int)$tach[1] . "'";
                    }
                    if ($field01 != '') {
                        $field01 = "AND `info1` = '$field01'";
                    }
                    if ($field02 != '') {
                        $field02 = "AND `info2` = '$field02'";
                    }
                    if ($field03 != '') {
                        $field03 = "AND `info3` = '$field03'";
                    }
                    if ($field04 != '') {
                        $field04 = "AND `info4` = '$field04'";
                    }
                    if ($field05 != '') {
                        $field05 = "AND `info5` = '$field05'";
                    }
                    if ($field06 != '') {
                        $field06 = "AND `info6` = '$field06'";
                    }


                    $data = $db->query("SELECT * FROM `nick` WHERE `loainick` = '4' AND `status` = '0' $id $money $field01 $field02 $field03 $field04 $field05 $field06 LIMIT $from,$limit");
                } else {
                    $data = $db->query("SELECT * FROM `nick` WHERE `loainick` = '4' AND `status` = '0' LIMIT $from,$limit");
                }
                foreach ($data as $row) {
                    $thumb = explode(PHP_EOL, $row['image'])[0];
                ?>

                    <div class="col-sm-6 col-md-3 p-5">
                        <div class="classWithPad">
                            <div class="image">
                                <a href="/view/<?= $row['id']; ?>">
                                    <img src="<?= $thumb; ?>">
                                    <span class="ms">Mã số: <?= $row['id']; ?></span>
                                </a>
                            </div>
                            <div class="description">
                                ATM/VÍ ĐIỆN TỬ: <?= number_format($row['cash'] * 0.7); ?> VNĐ
                            </div>
                            <div class="attribute_info">
                                <div class="row">
                                    <div class="col-xs-6 a_att">
                                        Bảng ngọc: <b><?= $row['info1']; ?></b>
                                    </div>
                                    <div class="col-xs-6 a_att">
                                        Bậc ngọc: <b><?= $row['info2']; ?></b>
                                    </div>
                                    <div class="col-xs-6 a_att">
                                        Vàng: <b><?= $row['info3']; ?></b>
                                    </div>
                                    <div class="col-xs-6 a_att">
                                        Ruby: <b><?= $row['info4']; ?></b>
                                    </div>
                                    <div class="col-xs-6 a_att">
                                        Quân huy: <b><?= $row['info5']; ?></b>
                                    </div>
                                    <div class="col-xs-6 a_att">
                                        Rank: <b><?= load_info6($row['info6']); ?></b>
                                    </div>
                                </div>
                            </div>
                            <div class="a-more">
                                <div class="row">
                                    <div class="col-xs-8 p-5">
                                        <div class="price_item">
                                            <span>TIỀN CARD:</span> <?= number_format($row['cash']); ?> VNĐ
                                        </div>
                                    </div>
                                    <div class="col-xs-4 p-5">
                                        <div class="view3">
                                            <a href="/view/<?= $row['id']; ?>">Chi tiết</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
            <div class="dataTables_wrapper no-footer">
                <div class="dataTables_paginate paging_simple_numbers" id="tb_hisser_paginate">
                    <?php
                    $tong = $db->query("SELECT * FROM `nick` WHERE `loainick` = '4' AND `status` = '0'")->rowcount();
                    if ($tong > $sotin1trang) {
                        if (isset($_GET)) {
                            if ($id != null || $money != null || $field01 != null || $field02 != null || $field03 != null || $field04 != null || $field05 != null || $field06 != null) {
                                $link = $_SERVER['REQUEST_URI'] . '&';
                            } else {
                                $link = '?';
                            }
                        }
                        echo '<center>' . phantrang($link, $from, $tong, $limit) . '</center>';
                    } ?>
                </div>
            </div>
        </div>
        <!-- END: PAGE CONTENT -->

    </div>
</div>

<?php
require('foot.php');
?>