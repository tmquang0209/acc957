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
require("../system/function.php");

$callback = $rechargeService->callback($_GET ?? $_POST);

if (isset($callback)) {
    if ($callback['success']) {
        $get_the = $db->query("SELECT * FROM `napthe` WHERE `tran_id` = '" . $callback['data']['tran_id'] . "' AND `pin` = '" . $callback['data']['pin'] . "'")->fetch();
        // status = 1 ==> thẻ đúng + Cộng tiền cho khách bằng  $_GET['amount'] tại đây
        $congtien = $db->prepare("UPDATE `user` SET `cash` = `cash` + ? WHERE `username` = ?");
        $congtien->execute(array(
            $callback['data']['amount'],
            $get_the['username']
        ));

        $update = $db->prepare("UPDATE `napthe` SET `status` = ? WHERE `pin` = ? AND `tran_id` = ?");
        $update->execute(array(
            'Thành công',
            $callback['data']['pin'],
            $callback['data']['tran_id']
        ));

    } else {
        /// Thẻ sai hoặc đã được nạp
        $update = $db->prepare("UPDATE `napthe` SET `status` = ? WHERE `napthe`.`tran_id` = ?");
        $update->execute(array(
            'Thẻ sai',
            $callback['data']['tran_id']
        ));
    }

}
