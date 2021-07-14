<?php
require('../system/function.php');
require('head.php');



$id = isset($_GET['id']) ? (int)$_GET['id'] : header('Location: /');


$data = $db->query("SELECT * FROM `nick` WHERE `id` = '$id' LIMIT 1")->fetch();

if($data['id'] == null || $data['status'] != 0){
    header('Location: /');
}

if($data['loainick'] == 0 || $data['loainick'] == 1 || $data['loainick'] == 2){
$loainick = 'NGỌC RỒNG ONLINE';
}elseif($data['loainick'] == 3){
$loainick = 'FreeFire';
}elseif($data['loainick'] == 4){
$loainick = 'LIÊN QUÂN MOBILE';
}


?>


<style>
    img {
        cursor: zoom-in;
    }

    .col-xs-6 .btn {
        margin-top: 5px;
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

<div class="c-layout-page">
    <div class="c-overflow-hide c-bg-white">
        <div class="container">
            <div class="col-sm-12 text-center" style="margin-bottom: 20px;margin-top:20px;">
                <h2 style="color: #e7505a;"><?=$loainick;?></h2>
                <div style="width: 140px; height: 1px; margin: 20px auto; border-bottom: 4px solid #00bff3;"></div>
            </div>
            <div class="col-sm-12 text-center" style=" margin-bottom: 50px;">
                <h2 style="font-family:Roboto;"><span>THÔNG TIN TÀI KHOẢN </span><span style="color:#e7505a;">#<?=$id;?></span></h2>
                <span>Để Xem thêm chi tiết về tài khoản vui lòng kéo xuống bên dưới.</span>
            </div>
                <div class="c-shop-product-details-4">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group row">
                                <spam class="col-xs-6 control-label s-product-nameprice">ATM/ VÍ:</spam>
                                <spam class="col-xs-6 control-label s-product-price"><?=number_format($data['cash']*0.7);?> VNĐ</spam>
                            </div>
                            <div class="form-group row">
                                <spam class="col-xs-6 control-label s-product-nameprice">TIỀN CARD:</spam>
                                <spam class="col-xs-6 control-label s-product-price"><?=number_format($data['cash']);?> VNĐ</spam>
                            </div>
                        </div>
                        <div class="col-md-3">
                                <div class="form-group row">
                                            <div class="col-xs-6 ar">
                                                <?php 
if(data_user('username') == null){
                                                ?>
                                                
                                                
<a href="/dang-nhap" class="btn btn-info btn-block btn2">MUA NGAY</a>


<?php }else{ ?>
    <button type="button" class="btn btn-info btn-block btn2 load-modal" rel="/buyacc/<?=$id;?>">Mua ngay</button>
<?php } ?>
    <a href="javascript:void(0);" data-toggle='modal' data-target='#Modal_ATM' class="btn btn-success btn-block btn2">ATM/VÍ</a>
                                            </div>
                                            <div class="col-xs-6">

                                                <a href="/Home/Deposit" class="btn btn-success btn-block btn2">NẠP THẺ</a>
                                            </div>
                                </div>
                        </div>

                    </div>

                    <div class="c-product-meta">
                        <div class="c-content-divider">
                            <i class="icon-dot"></i>
                        </div>
                        <div class="row">
                            <?php if($data['loainick'] == 0){ ?>
                                <div class="col-xs-2 col-sm-3 col-xs-6 c-product-variant">
                                            <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Máy chủ: <span class="c-font-red"><?php if($data['info1'] == 'nuocngoai'){ echo 'Nước ngoài'; }else{ echo $data['info1'].' Sao'; };?></span></p>
                                        </div>
                                        <div class="col-xs-2 col-sm-3 col-xs-6 c-product-variant">
                                            <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Hành tinh: <span class="c-font-red"><?=load_info2($data['info2']);?></span></p>
                                        </div>
                                        <div class="col-xs-2 col-sm-3 col-xs-6 c-product-variant">
                                            <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Đăng ký: <span class="c-font-red"><?=load_info3($data['info3']);?></span></p>
                                        </div>
                                        <div class="col-xs-2 col-sm-3 col-xs-6 c-product-variant">
                                            <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Loại: <span class="c-font-red"><?=load_info4($data['info4']);?></span></p>
                                        </div>
                            <?php }elseif($data['loainick'] == 1){ ?> 
                                <div class="col-xs-2 col-sm-3 col-xs-6 c-product-variant">
                                            <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Máy chủ: <span class="c-font-red"><?php if($data['info1'] == 'nuocngoai'){ echo 'Nước ngoài'; }else{ echo $data['info1'].' Sao'; };?></span></p>
                                        </div>
                                        <div class="col-xs-2 col-sm-3 col-xs-6 c-product-variant">
                                            <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Hành tinh: <span class="c-font-red"><?=load_info2($data['info2']);?></span></p>
                                        </div>
                                        <div class="col-xs-2 col-sm-3 col-xs-6 c-product-variant">
                                            <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Đăng ký: <span class="c-font-red"><?=load_info3($data['info3']);?></span></p>
                                        </div>
                                        <div class="col-xs-2 col-sm-3 col-xs-6 c-product-variant">
                                            <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Bông tai: <span class="c-font-red"><?=load_info4($data['info4']);?></span></p>
                                        </div> 
                            <?php }elseif($data['loainick'] == 2){ ?>
                                <div class="col-xs-2 col-sm-3 col-xs-6 c-product-variant">
                                            <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Máy chủ: <span class="c-font-red"><?php if($data['info1'] == 'nuocngoai'){ echo 'Nước ngoài'; }else{ echo $data['info1'].' Sao'; };?></span></p>
                                        </div>
                                        <div class="col-xs-2 col-sm-3 col-xs-6 c-product-variant">
                                            <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Hành tinh: <span class="c-font-red"><?=load_info2($data['info2']);?></span></p>
                                        </div>
                                        <div class="col-xs-2 col-sm-3 col-xs-6 c-product-variant">
                                            <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Đăng ký: <span class="c-font-red"><?=load_info3($data['info3']);?></span></p>
                                        </div>
                                        <div class="col-xs-2 col-sm-3 col-xs-6 c-product-variant">
                                            <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Vật phẩm: <span class="c-font-red"><?=load_info4($data['info4']);?></span></p>
                                        </div>  
                                        <div class="col-xs-2 col-sm-3 col-xs-6 c-product-variant">
                                            <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Loại đồ: <span class="c-font-red"><?=load_info5($data['info5']);?></span></p>
                                        </div>    
                            <?php }elseif($data['loainick'] == 3){ ?>
                                <div class="col-xs-2 col-sm-3 col-xs-6 c-product-variant">
                                            <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Đăng ký: <span class="c-font-red"><?=load_info1($data['info1']);?></span></p>
                                        </div>
                                        <div class="col-xs-2 col-sm-3 col-xs-6 c-product-variant">
                                            <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Pet: <span class="c-font-red"><?=load_info2($data['info2']);?></span></p>
                                        </div>
                                        <div class="col-xs-2 col-sm-3 col-xs-6 c-product-variant">
                                            <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Thẻ vô cực: <span class="c-font-red"><?=load_info3($data['info3']);?></span></p>
                                        </div>
                            <?php }elseif($data['loainick'] == 4){ ?>
                                        <div class="col-xs-2 col-sm-3 col-xs-6 c-product-variant">
                                            <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Bảng ngọc: <span class="c-font-red"><?=$data['info1'];?></span></p>
                                        </div>
                                        <div class="col-xs-2 col-sm-3 col-xs-6 c-product-variant">
                                            <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Vàng: <span class="c-font-red"><?=$data['info3'];?></span></p>
                                        </div>
                                        <div class="col-xs-2 col-sm-3 col-xs-6 c-product-variant">
                                            <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Ruby: <span class="c-font-red"><?=$data['info4'];?></span></p>
                                        </div>
                                        <div class="col-xs-2 col-sm-3 col-xs-6 c-product-variant">
                                            <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Quân huy: <span class="c-font-red"><?=$data['info5'];?></span></p>
                                        </div>
                                        <div class="col-xs-2 col-sm-3 col-xs-6 c-product-variant">
                                            <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Rank: <span class="c-font-red"><?=load_info6($data['info6']);?></span></p>
                                        </div>
                                      <?php } ?>  
                            <div class="col-sm-12 col-xs-12 c-product-variant">
                                <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Nổi bật: <span class="c-font-red"><?=$data['noibat'];?></span></p>
                            </div>
                        </div>

                        <div class="c-content-divider">
                            <i class="icon-dot"></i>
                        </div>
                    </div>
                </div>
                <div class="container m-t-20 content_post">
                    <div class="col-sm-12 text-center" style=" margin-bottom: 50px;">
                        <h2 style="font-family:Roboto; font-size:15px;"><span>Hình ảnh chi tiết của tài khoản </span><span style="color:#e7505a;"><?=$loainick.' #'.$id;?></span></h2>
                    </div>
                    <?php 
                $image = explode(PHP_EOL,$data['image']);
                foreach($image as $row){
                    ?>
                        <p>
                            <img src="<?=$row;?>" class="zoom">
                        </p>
                        <?php } ?>
                       
                </div>
</div></div>
<?php
require('foot.php');
?>