<?php
require('system/function.php');
require('public/head.php');

$giaodich_gem = $db->query("SELECT `id` FROM `service` WHERE `type` = 'banngoc' ")->rowCount();
$giaodich_gold = $db->query("SELECT `id` FROM `service` WHERE `type` = 'banvang' ")->rowCount();

?>
<div id="Listdv" class="c-content-box c-size-md c-bg-white groomsmen-bridesmaids">
    <div class="container">
        <!-- Begin: Testimonals 1 component -->
        <div class="row">
            <div class="heading col-sm-12 text-center" style=" margin-bottom: 20px; margin-top:40px;">
                <h2>
                    MENU GIAO DỊCH
                </h2>
                <div style="width: 100px; height: 1px; margin: 20px auto; border-bottom: 4px solid #e90606;"></div>
            </div>
            <div class="row-flex-safari game-list">
                <div class="col-sm-3 col-xs-6 p-5">
                    <div class="classWithPad1" style="border: 0px solid #cccccc;">
                        <a href="/Home/Deposit" title="">
                            <div class="news_image">
                                <img src="Img/NapThe.png">
                            </div>
                        </a>
                        <div class="news_title">
                            <a href="/Home/Deposit" title="">NẠP THẺ</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6 p-5">
                    <div class="classWithPad1" style="border: 0px solid #cccccc;">
                        <a href="/thong-tin-tai-khoan" title="">
                            <div class="news_image">
                                <img src="Img/TaiKhoan.png">
                            </div>
                        </a>
                        <div class="news_title">
                            <a href="/thong-tin-tai-khoan" title="">TÀI KHOẢN</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6 p-5">
                    <div class="classWithPad1" style="border: 0px solid #cccccc;">
                        <a href="#dich-vu" title="">
                            <div class="news_image">
                                <img src="Img/DichVu.png">
                            </div>
                        </a>
                        <div class="news_title">
                            <a href="#dich-vu" title="">DỊCH VỤ</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6 p-5">
                    <div class="classWithPad1" style="border: 0px solid #cccccc;">
                        <a href="/" title="">
                            <div class="news_image">
                                <img src="Img/NickRandom.png">
                            </div>
                        </a>
                        <div class="news_title">
                            <a href="/" title="">VÒNG QUAY</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End-->
    </div>
</div>
<div class="c-content-box c-size-md c-bg-white groomsmen-bridesmaids">
    <div class="container">
        <!-- Begin: Testimonals 1 component -->
        <div class="row">
            <div class="heading col-sm-12 text-center" style=" margin-bottom: 20px; margin-top:40px;">
                <h2>
                    DANH MỤC GAME
                </h2>
                <div style="width: 100px; height: 1px; margin: 20px auto; border-bottom: 4px solid #e90606;"></div>
            </div>
            <div class="row-flex-safari game-list">
                <div class="col-sm-4 col-xs-6 p-5">
                    <div class="classWithPad">
                        <a href="/ngocrong-sosinh" title="">
                            <div class="news_image">
                                <img src="Img/NRO_SOSINH.png" alt="SƠ SINH">
                            </div>
                        </a>
                        <div class="news_title">
                            <a href="/ngocrong-sosinh" title=""> NICK SƠ SINH + WIN DOANH TRẠI + ZIN</a>
                        </div>
                        <div class="news_description">
                            <p>Số tài khoản: <?=thongke('0','0');?></p>
                            <p>Đã bán: <?=thongke('0','1');?></p>
                        </div>
                        <div class="a-more">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1">
                                    <a href="/ngocrong-sosinh" title="">
                                        <div class="view">
                                            XEM THÊM
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-6 p-5">
                    <div class="classWithPad">
                        <a href="/ngorong-tamtrung" title="">
                            <div class="news_image">
                                <img src="Img/NRO_TAMTRUNG.png" alt="TẦM TRUNG">
                            </div>
                        </a>
                        <div class="news_title">
                            <a href="/ngocrong-tamtrung" title=""> NGỌC RỒNG NICK TẦM TRUNG</a>
                        </div>
                        <div class="news_description">
                            <p>Số tài khoản: <?=thongke('1','0');?></p>
                            <p>Đã bán: <?=thongke('1','1');?></p>
                        </div>
                        <div class="a-more">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1">
                                    <a href="/ngocrong-tamtrung" title="">
                                        <div class="view">
                                            XEM THÊM
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-6 p-5">
                    <div class="classWithPad">
                        <a href="/ngocrong-vatpham" title="">
                            <div class="news_image">
                                <img src="Img/NRO_ITEM.png" alt="SHOP VẬT PHẨM NRO">
                            </div>
                        </a>
                        <div class="news_title">
                            <a href="/ngocrong-vatpham" title=""> SHOP VẬT PHẨM</a>
                        </div>
                        <div class="news_description">
                            <p>Số tài khoản: <?=thongke('2','0');?></p>
                            <p>Đã bán: <?=thongke('2','1');?></p>
                        </div>
                        <div class="a-more">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1">
                                    <a href="/ngocrong-vatpham" title="">
                                        <div class="view">
                                            XEM THÊM
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-6 p-5">
                    <div class="classWithPad">
                        <a href="/freefire" title="">
                            <div class="news_image">
                                <img src="Img/FF_NORMAL.jpg" alt="THƯỜNG">
                            </div>
                        </a>
                        <div class="news_title">
                            <a href="/freefire" title=""> FREE FIRE ONLINE</a>
                        </div>
                        <div class="news_description">
                            <p>Số tài khoản: <?=thongke('3','0');?></p>
                            <p>Đã bán: <?=thongke('3','1');?></p>
                        </div>
                        <div class="a-more">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1">
                                    <a href="/freefire" title="">
                                        <div class="view">
                                            XEM THÊM
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-6 p-5">
                    <div class="classWithPad">
                        <a href="/lienquan" title="">
                            <div class="news_image">
                                <img src="Img/LQM_NORMAL.png" alt="B&#204;NH THƯỜNG">
                            </div>
                        </a>
                        <div class="news_title">
                            <a href="/lienquan" title=""> LIÊN QUÂN MOBILE</a>
                        </div>
                        <div class="news_description">
                            <p>Số tài khoản: <?=thongke('4','0');?></p>
                            <p>Đã bán: <?=thongke('4','1');?></p>
                        </div>
                        <div class="a-more">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1">
                                    <a href="/lienquan" title="">
                                        <div class="view">
                                            XEM THÊM
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- End-->


    </div>
</div>

<div id="dvgames" class="c-content-box c-size-md c-bg-white groomsmen-bridesmaids">
    <div class="container">
        <!-- Begin: Testimonals 1 component -->
        <div class="row">
            <div class="heading col-sm-12 text-center" style=" margin-bottom: 20px;">
                <h2>
                    DỊCH VỤ GAME
                </h2>
                <div style="width: 100px; height: 1px; margin: 20px auto; border-bottom: 4px solid #0090ff;"></div>
            </div>
            <div class="row-flex-safari game-list row-centered">
                <div class="col-sm-3 col-xs-6 p-5 col-centered">
                    <div class="classWithPad1">
                        <a href="/Home/BuyGold" title="">
                            <div class="news_image">
                                <img src="upload-usr/images/dichvugame-1.png" alt="BÁN VÀNG TỰ ĐỘNG">
                            </div>
                        </a>
                        <div class="news_title">
                            <a href="/Home/BuyGold" title="">BÁN VÀNG TỰ ĐỘNG</a>
                        </div>
                        <div class="news_description">
                            <p>Tổng giao dịch: <?=number_format($giaodich_gold);?></p>
                        </div>
                        <div class="a-more" style="margin-top: 40px;">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1">
                                    <a href="/Home/BuyGold" title="">
                                        <div class="view1">MUA NGAY</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6 p-5 col-centered">
                    <div class="classWithPad1">
                        <a href="/Home/BuyGem" title="">
                            <div class="news_image">
                                <img src="upload-usr/images/dichvugame-2.png" alt="BÁN NGỌC TỰ ĐỘNG">
                            </div>
                        </a>
                        <div class="news_title">
                            <a href="/Home/BuyGem" title="">BÁN NGỌC TỰ ĐỘNG</a>
                        </div>
                        <div class="news_description">
                            <p>Tổng giao dịch: <?=number_format($giaodich_gem);?></p>
                        </div>
                        <div class="a-more" style="margin-top: 40px;">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1">
                                    <a href="/Home/BuyGem" title="">
                                        <div class="view1">MUA NGAY</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
        <!-- End-->


    </div>
</div>

<!-- END: PAGE CONTENT -->
</div>


<div class="c-content-box c-size-md c-bg-white groomsmen-bridesmaids" style="padding-bottom:20px;">
    <div class="container">
        <div class="row">
            <div class="row-flex-safari game-list">
                <a target="_blank" href="https://muabanthe.vn?idqc=koioctiiu957">
                    <img src="adskoi.jpg">
                </a>

            </div>
        </div>
    </div>
</div>
<?php
require('public/foot.php')
?>