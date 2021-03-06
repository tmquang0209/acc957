<?php
//code by TmQ
require('config.php');

// PAM Import File
include $_SERVER['DOCUMENT_ROOT'] . '/PAM/init.php';

function xss($text)
{
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}

function mahoa($password)
{
    return md5(md5($password));
}

function data_user($data)
{
    global $db;
    $username = $_SESSION['username'];
    $dulieu = $db->query("select * from `user` where `username` = '$username' limit 1")->fetch();
    if ($dulieu['id'] == null) {
        $_SESSION['username'] = null;
    } else {
        return $dulieu[$data];
    }
}

function admin()
{

    if (data_user('admin') == 0) {
        return 'User';
    } elseif (data_user('admin') == 1) {
        return 'Collaborators';
    } elseif (data_user('admin') == 9) {
        return 'Admin';
    }
}

function ban()
{
    if (data_user('ban') == 0) {
        return 'Active';
    } elseif (data_user('ban') == 1) {
        return 'Inactive';
    }
}

function exit_admin()
{
    $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    if (admin() == 'User') {
        if (strpos($url, 'admin') !== false) {
            header('Location: /');
        }
    }
}
exit_admin();

function thongke($loai,$status){
    global $db;
    $total = $db->query("SELECT `id` FROM `nick` WHERE `loainick` = '$loai' AND `status` = '$status' ")->rowCount();
    return $total;
}

function percent($table, $type)
{
    global $db;
    $data = $db->query("SELECT `id` FROM `$table` WHERE $type")->rowCount();
    $total = $db->query("SELECT `id` FROM `$table`")->rowCount();
    return round(($data / $total) * 100);
}
function setting($data)
{
    global $db;
    $set = $db->query("SELECT * FROM `setting` WHERE `key` = '$data'")->fetch();

    if ($set['key'] == null) {
        $text = '';
    } else {
        $text = $set['text'];
    }
    return $text;
}
function update_setting($row, $text)
{
    global $db;
    $check = $db->query("SELECT * FROM `setting` WHERE `key` = '$row' LIMIT 1")->fetch();
    if ($check['key'] == null) {
        $db->exec("INSERT INTO `setting` (`key`,`text`) VALUES ('$row','$text')");
    } else {
        $db->exec("UPDATE `setting` SET `text` = '$text' WHERE `key` = '$row'");
    }
}

//Ph??n trang
function phantrang($url, $start, $total, $kmess)
{
    $out[] = '<div class="row"><center><ul class="pagination">';
    $neighbors = 2;
    if ($start >= $total) $start = max(0, $total - (($total % $kmess) == 0 ? $kmess : ($total % $kmess)));
    else $start = max(0, (int)$start - ((int)$start % (int)$kmess));
    $base_link = '<li><a class="pagenav" href="' . strtr($url, array(
        '%' => '%%'
    )) . 'page=%d' . '">%s</a></li>';
    $out[] = $start == 0 ? '' : sprintf($base_link, $start / $kmess, '??');
    if ($start > $kmess * $neighbors) $out[] = sprintf($base_link, 1, '1');
    if ($start > $kmess * ($neighbors + 1)) $out[] = '<li><a>...</a></li>';
    for ($nCont = $neighbors; $nCont >= 1; $nCont--) if ($start >= $kmess * $nCont) {
        $tmpStart = $start - $kmess * $nCont;
        $out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);
    }
    $out[] = '<li class="active"><a>' . ($start / $kmess + 1) . '</a></li>';
    $tmpMaxPages = (int)(($total - 1) / $kmess) * $kmess;
    for ($nCont = 1; $nCont <= $neighbors; $nCont++) if ($start + $kmess * $nCont <= $tmpMaxPages) {
        $tmpStart = $start + $kmess * $nCont;
        $out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);
    }
    if ($start + $kmess * ($neighbors + 1) < $tmpMaxPages) $out[] = '<li><a>...</a></li>';
    if ($start + $kmess * $neighbors < $tmpMaxPages) $out[] = sprintf($base_link, $tmpMaxPages / $kmess + 1, $tmpMaxPages / $kmess + 1);
    if ($start + $kmess < $total) {
        $display_page = ($start + $kmess) > $total ? $total : ($start / $kmess + 2);
        $out[] = sprintf($base_link, $display_page, '??');
    }
    $out[] = '</ul></center></div>';
    return implode('', $out);
}

function load_info1($data)
{
    switch ($data) {
        case "1":
            return "Facebook";
            break;
        case "2":
            return "Vkontakte";
            break;
        default:
            return "Unknown";
    }
}
function load_info2($data)
{
    switch ($data) {
        case "TD":
            return "Tr??i ?????t";
            break;
        case "XD":
            return "Xayda";
            break;
        case "NM":
            return "Na mek";
            break;
        case "1":
            return "C??";
            break;
        case "2":
            return "Kh??ng";
            break;
        default:
            return "Unknown";
    }
}
function load_info3($data)
{
    switch ($data) {
        case "Ao":
            return "???o";
            break;
        case "That":
            return "Th???t";
            break;
        case "1":
            return "C??";
            break;
        case "2":
            return "Kh??ng";
            break;
        default:
            return "Unknown";
    }
}
function load_info4($data)
{
    switch ($data) {
        case "sosinh":
            return "S?? sinh";
            break;
        case "win":
            return "Win doanh tr???i";
            break;
        case "p200":
            return "200Tr s???c m???nh";
            break;
        case "zin":
            return "Zin";
            break;
        case "Co":
            return "C??";
            break;
        case "Khong":
            return "Kh??ng";
            break;
        case "Khong":
            return "Kh??ng";
            break;
        case "nro1sao":
            return "B??? ng???c r???ng 1 sao";
            break;
        case "ao":
            return "??o";
            break;
        case "quan":
            return "Qu???n";
            break;
        case "gang":
            return "G??ng";
            break;
        case "giay":
            return "Gi??y";
            break;
        case "rada":
            return "Rada";
            break;
        case "setdo":
            return "S??t ?????";
            break;
        default:
            return "Unknown";
    }
}
function load_info5($data)
{
    switch ($data) {
        case "sucdanh":
            return "S???c ????nh";
            break;
        case "hp":
            return "T??ng HP";
            break;
        case "ki":
            return "T??ng KI";
            break;
        case "hutmau":
            return "H??t m??u";
            break;
        case "tnsm":
            return "Ti???m n??ng s???c m???nh";
            break;
        default:
            return "Unknown";
    }
}
function load_info6($data)
{
    switch ($data) {
        case "chua":
            return "Ch??a Rank";
            break;
        case "dong_v":
            return "?????ng V";
            break;
        case "dong_iv":
            return "?????ng IV";
            break;
        case "dong_iii":
            return "?????ng III";
            break;
        case "dong_ii":
            return "?????ng II";
            break;
        case "dong_i":
            return "?????ng I";
            break;
        case "bac_v":
            return "B???c V";
            break;
        case "bac_iv":
            return "B???c IV";
            break;
        case "bac_iii":
            return "B???c III";
            break;
        case "bac_ii":
            return "B???c II";
            break;
        case "bac_i":
            return "B???c I";
            break;
        case "vang_v":
            return "V??ng V";
            break;
        case "vang_iv":
            return "V??ng IV";
            break;
        case "vang_iii":
            return "V??ng III";
            break;
        case "vang_ii":
            return "V??ng II";
            break;
        case "vang_i":
            return "V??ng I";
            break;
        case "bachkim_v":
            return "B???ch kim V";
            break;
        case "bachkim_iv":
            return "B???ch kim IV";
            break;
        case "bachkim_iii":
            return "B???ch kim III";
            break;
        case "bachkim_ii":
            return "B???ch kim II";
            break;
        case "bachkim_i":
            return "B???ch kim I";
            break;
        case "kimcuong_v":
            return "Kim c????ng V";
            break;
        case "kimcuong_iv":
            return "Kim c????ng IV";
            break;
        case "kimcuong_iii":
            return "Kim c????ng III";
            break;
        case "kimcuong_ii":
            return "Kim c????ng II";
            break;
        case "kimcuong_i":
            return "Kim c????ng I";
            break;
        case "tinhanh_i":
            return "Tinh Anh I";
            break;
        case "tinhanh_ii":
            return "Tinh Anh II";
            break;
        case "tinhanh_iii":
            return "Tinh Anh III";
            break;
        case "tinhanh_iv":
            return "Tinh Anh IV";
            break;
        case "tinhanh_v":
            return "Tinh Anh V";
            break;
        case "caothu":
            return "Cao th???";
            break;
        case "thachdau":
            return "Th??ch ?????u";
            break;
        default:
            return "Unknown";
    }
}



// Register Recharge Service
$rechargeApiSetting = json_decode(setting('api_napthe'), true) ?? [];
$rechargeCard = new \PAM\RechargeCard($rechargeApiSetting['service'], $rechargeApiSetting['id'], $rechargeApiSetting['secret']);

$rechargeService = null;

if ($rechargeCard->service($rechargeApiSetting['service'])) {
    $rechargeService = $rechargeCard->service($rechargeApiSetting['service']);
}