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
    if (data_user('id') == null) {
        if (strpos($url, '/Home/Deposit')) {
            header('Location: /');
        }
        if (strpos($url, '/thong-tin-tai-khoan')) {
            header('Location: /');
        }
        if (strpos($url, '/Home/BuyNickLog')) {
            header('Location: /');
        }
    }
}
exit_admin();

function thongke($loai, $status)
{
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

//Phân trang
function phantrang($url, $start, $total, $kmess)
{
    $out[] = '<div class="row"><center><ul class="pagination">';
    $neighbors = 2;
    if ($start >= $total) $start = max(0, $total - (($total % $kmess) == 0 ? $kmess : ($total % $kmess)));
    else $start = max(0, (int)$start - ((int)$start % (int)$kmess));
    $base_link = '<li><a class="pagenav" href="' . strtr($url, array(
        '%' => '%%'
    )) . 'page=%d' . '">%s</a></li>';
    $out[] = $start == 0 ? '' : sprintf($base_link, $start / $kmess, '«');
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
        $out[] = sprintf($base_link, $display_page, '»');
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
            return "Trái Đất";
            break;
        case "XD":
            return "Xayda";
            break;
        case "NM":
            return "Na mek";
            break;
        case "1":
            return "Có";
            break;
        case "2":
            return "Không";
            break;
        default:
            return "Unknown";
    }
}
function load_info3($data)
{
    switch ($data) {
        case "Ao":
            return "Ảo";
            break;
        case "That":
            return "Thật";
            break;
        case "1":
            return "Có";
            break;
        case "2":
            return "Không";
            break;
        default:
            return "Unknown";
    }
}
function load_info4($data)
{
    switch ($data) {
        case "sosinh":
            return "Sơ sinh";
            break;
        case "win":
            return "Win doanh trại";
            break;
        case "p200":
            return "200Tr sức mạnh";
            break;
        case "zin":
            return "Zin";
            break;
        case "Co":
            return "Có";
            break;
        case "Khong":
            return "Không";
            break;
        case "Khong":
            return "Không";
            break;
        case "nro1sao":
            return "Bộ ngọc rồng 1 sao";
            break;
        case "ao":
            return "Áo";
            break;
        case "quan":
            return "Quần";
            break;
        case "gang":
            return "Găng";
            break;
        case "giay":
            return "Giày";
            break;
        case "rada":
            return "Rada";
            break;
        case "setdo":
            return "Sét đồ";
            break;
        default:
            return "Unknown";
    }
}
function load_info5($data)
{
    switch ($data) {
        case "sucdanh":
            return "Sức đánh";
            break;
        case "hp":
            return "Tăng HP";
            break;
        case "ki":
            return "Tăng KI";
            break;
        case "hutmau":
            return "Hút máu";
            break;
        case "tnsm":
            return "Tiềm năng sức mạnh";
            break;
        default:
            return "Unknown";
    }
}
function load_info6($data)
{
    switch ($data) {
        case "chua":
            return "Chưa Rank";
            break;
        case "dong_v":
            return "Đồng V";
            break;
        case "dong_iv":
            return "Đồng IV";
            break;
        case "dong_iii":
            return "Đồng III";
            break;
        case "dong_ii":
            return "Đồng II";
            break;
        case "dong_i":
            return "Đồng I";
            break;
        case "bac_v":
            return "Bạc V";
            break;
        case "bac_iv":
            return "Bạc IV";
            break;
        case "bac_iii":
            return "Bạc III";
            break;
        case "bac_ii":
            return "Bạc II";
            break;
        case "bac_i":
            return "Bạc I";
            break;
        case "vang_v":
            return "Vàng V";
            break;
        case "vang_iv":
            return "Vàng IV";
            break;
        case "vang_iii":
            return "Vàng III";
            break;
        case "vang_ii":
            return "Vàng II";
            break;
        case "vang_i":
            return "Vàng I";
            break;
        case "bachkim_v":
            return "Bạch kim V";
            break;
        case "bachkim_iv":
            return "Bạch kim IV";
            break;
        case "bachkim_iii":
            return "Bạch kim III";
            break;
        case "bachkim_ii":
            return "Bạch kim II";
            break;
        case "bachkim_i":
            return "Bạch kim I";
            break;
        case "kimcuong_v":
            return "Kim cương V";
            break;
        case "kimcuong_iv":
            return "Kim cương IV";
            break;
        case "kimcuong_iii":
            return "Kim cương III";
            break;
        case "kimcuong_ii":
            return "Kim cương II";
            break;
        case "kimcuong_i":
            return "Kim cương I";
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
            return "Cao thủ";
            break;
        case "thachdau":
            return "Thách đấu";
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
