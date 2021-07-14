<?php 
require('../system/function.php');
$id  = isset($_GET['id']) ? (int)$_GET['id'] : null ;

$data = $db->query("SELECT * FROM `nick` WHERE `id` = '$id' LIMIT 1")->fetch();

$loainick = $data['loainick'];
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
<table class="table table-striped">
<tbody><tr>
<th colspan="2">Thông tin tài khoản #<?=$id;?></th>
</tr>
</tbody><tbody>
<tr>
<td>Giá tiền:</td>
<th class="text-info"><?=number_format($data['cash']);?>đ</th>
</tr>
</tbody>
</table>
</li>
</ul>
</div>
<div role="tabpanel" class="tab-pane fade" id="info">
<ul class="c-tab-items p-t-0 p-b-0 p-l-5 p-r-5">
<li class="c-font-dark">
<table class="table table-striped">
<tbody>
<tr>
<th colspan="2">Chi tiết tài khoản #<?=$id;?></th>
</tr>
<tr>
<td style="width:50%"><?=$data_1[0];?>:</td>
<td class="text-danger" style="font-weight: 700"><?=$data_1[1];?></td>
</tr>
<tr>

<tr>
 </tr>
<tr>
</tr>
</tbody>
</table>
</li>
</ul>
</div>
</div>
</div>
<div class="form-group ">
<label class="col-md-3 form-control-label">Mã giảm giá:</label>
<div class="col-md-7">
    <input type="hidden" id="id" value="<?=$id;?>" />
<input type="text" class="form-control c-square c-theme " name="coupon" id="coupon" placeholder="Mã giảm giá" value="">
<span class="help-block">Nhập mã giảm giá nếu có để nhận ưu đãi</span>
</div>
</div>
<div class="form-group ">
<label class="col-md-3 form-control-label">Mã giới thiệu:</label>
<div class="col-md-7">
<input type="text" class="form-control c-square c-theme " name="magioithieu" id="magioithieu" placeholder="Mã giới thiệu" value="">
<span class="help-block">Nhập mã giới thiệu nếu có</span>
</div>
</div>
<div class="form-group ">
<label class="col-md-12 form-control-label text-danger" style="text-align: center;margin: 10px 0; ">
<?php if(data_user('id') == null)
{  
    echo'Bạn phải đăng nhập mới có thể mua tài khoản tự động.'; 
} 
elseif(data_user('cash') < $data['cash'])
{
    echo 'Tài khoản không đủ tiền. vui lòng nạp thêm tiền vào tài khoản';
}
else
{
    echo '<p id="result"></p>';
}
?>
</label>
</div>
<div style="clear: both"></div>
</div>
<div class="modal-footer">
<?php 
if(data_user('id') == null){ 
    echo '<a class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold" href="/login">Đăng nhập</a>';
}elseif(data_user('cash') < $data['cash']){
    echo '<a class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold" href="/login">Nạp tiền</a>';
} else{
    echo '<button type="submit" id="buy" name="buy" class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold">Mua ngay</button>';
}
?>
<button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>
</div>
<script>
    $(document).ready(function () {
        $('.load-modal').each(function (index, elem) {
            $(elem).unbind().click(function (e) {
                e.preventDefault();
                e.preventDefault();
                var curModal= $('#LoadModal');
                curModal.find('.modal-content').html("<div class=\"loader\" style=\"text-align: center\"><img src=\"/assets/frontend/images/loader.gif\" style=\"width: 50px;height: 50px;\"></div>");
                curModal.modal('show').find('.modal-content').load($(elem).attr('rel'));
            });
        });
    });
$("#buy").on("click", function(){
    $.ajax({
        url : "/thanhtoan",
        type : "POST",
        dataType : "text",
        data : {
            id : $('#id').val(),
            giftcode : $('#coupon').val(),
            magioithieu : $('#magioithieu').val()
        },
        success : function(data){
            $('#result').html(data);
        }
    });
});
</script>