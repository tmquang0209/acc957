<?php 
/*
$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
$$ NAME CODE: SHOP BÁN TỰ ĐỘNG ĐA CHỨC NĂNG             $$
$$ DEVELOPER: TRẦN MINH QUANG (TMQ)                     $$
$$ CONTACT: 0397847805 - tmquang0209@gmail.com          $$
$$ CREATE: 06/2020                                      $$
$$ VUI LÒNG KHÔNG XÓA BẢN QUYỀN ĐỂ TÔN TRỌNG TÁC GIẢ    $$
$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
 */
require('../system/function.php');

if(data_user('id') != null){
$id = isset($_POST['id'])? (int)$_POST['id'] : null;
$coupon = xss($_POST['giftcode']);
$magioithieu = xss($_POST['magioithieu']);

//lấy dữ liệu account
$data = $db->query("SELECT * FROM `nick` WHERE `id` = '$id'")->fetch();
//lấy dữ liệu coupon
//$data_coupon = $db->query("SELECT `code`,`amount` FROM `TMQ_coupon` WHERE `code` = '$coupon'")->fetch();
//check mã giới thiệu
//$data_mgt = $db->query("SELECT `referral_code` FROM `TMQ_user` WHERE `referral_code` = '$magioithieu'")->fetch();
//lấy tên chuyên mục

if($data['id'] == null){
    $result = 'Tài khoản không tồn tại';
}elseif($id == null){
    $result = 'Có lỗi xảy ra!';
}elseif($data['status'] != 0){
    $result = 'Tài khoản đã được mua bởi người khác.';
}elseif($data['cash'] > data_user('cash')){
    $result = 'Tài khoản của bạn không đủ tiền.';
// }elseif(!empty($coupon) && $data_coupon['code'] == null){
//    $result = 'Mã giảm giá không tồn tại.';
// }elseif(!empty($coupon) && $data_coupon['amount'] >= $data['cash']){
//    $result = 'Mã giảm giá không phù hợp.';   
// }elseif(!empty($magioithieu) && !$data_mgt['referral_code']){
//     $result = 'Mã giới thiệu không hợp lệ.';
}else{
    // if($data_coupon['code'] == null){
    //     $giamoi = $data['cash'];
    // }else{
    //     $giamoi = $data['cash']-$data_coupon['amount'];
    // }
    $result = 'Thành công.';
    //xử lý dữ liệu
    $db->exec("UPDATE `user` SET `cash` = `cash` - ".$data['cash']." WHERE `username` = '".data_user('username')."'");
    $db->exec("UPDATE `nick` SET `status` = '1' WHERE `id` = '$id'");
    
    $db->exec("INSERT INTO `muanick` SET
    `username` = '".data_user('username')."', 
    `id_acc` = '".$data['id']."', 
    `cash` = '".$data['cash']."', 
    `date` = '".time()."'
    ");
    echo '<script> window.location="/profile/tran_acc"; </script>';
}
print $result;


}