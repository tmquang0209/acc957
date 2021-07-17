<?php
require('../system/function.php');
require('../public/head.php');
require('menu.php');
?>
<div class="c-layout-sidebar-content ">


<div class="c-content-title-1">
<h3 class="c-font-uppercase c-font-bold">Lịch sử mua nick</h3>
<div class="c-line-left"></div>
</div>
<form class="form-horizontal form-find m-b-20" role="form" method="POST">
<div class="row">
<div class="col-md-4">
<div class="input-group m-b-10 c-square">
<div class="input-group date date-picker" data-date-format="dd-mm-yyyy" data-rtl="false">
<span class="input-group-btn">
<button class="btn default c-btn-square p-l-10 p-r-10" type="button"><i class="fa fa-calendar"></i></button>
</span>
<input type="text" class="form-control c-square c-theme" name="started_at" autocomplete="off" placeholder="Từ ngày" value="<?=$_POST['started_at']; ?>">
</div>
</div>
</div>
<div class="col-md-4">
<div class="input-group m-b-10 c-square">
<div class="input-group date date-picker" data-date-format="dd-mm-yyyy" data-rtl="false">
<span class="input-group-btn">
<button class="btn default c-btn-square p-l-10 p-r-10" type="button"><i class="fa fa-calendar"></i></button>
</span>
<input type="text" class="form-control c-square c-theme" name="ended_at" autocomplete="off" placeholder="Đến ngày" value="<?=$_POST['ended_at']; ?>">
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-4">
<input type="submit" class="btn c-theme-btn c-btn-square m-b-10" name="submit" value="Tìm kiếm">
<a class="btn c-btn-square m-b-10 btn-danger" href="/profile/history">Tất cả</a>
</div>
</div>
</form>
<table class="table table-hover table-custom-res">
<tbody>
<tr>
<th>Thời gian</th>
<th>ID</th>
<th>Thông tin tài khoản</th>
<th>Loại nick</th>
<th>Số tiền</th>

</tr>
</tbody>
<tbody>
<?php
$limit = 10;
if (isset($_GET["page"]))
{
    $page = $_GET["page"];
    settype($page, "int");
}
else
{
    $page = 1;
}
$from = ($page - 1) * $limit;
if (isset($_POST['submit']))
{
    $started_at = xss($_POST['started_at']);
    $ended_at = xss($_POST['ended_at']);
    if ($started_at > 0)
    {
        $started = "AND `date` >= '" . strtotime($started_at) . "'";
    }
    if ($ended_at > 0)
    {
        $ended = "AND `date` <= '" . strtotime($ended_at) . "'";
    }
    $data = $db->query("SELECT * FROM `muanick` WHERE `username` = '" . data_user('username') . "' $started $ended LIMIT $from,$limit");
}
else
{
    $data = $db->query("SELECT * FROM `muanick` WHERE `username` = '" . data_user('username') . "' LIMIT $from,$limit");
}
foreach ($data as $row)
{
    $data_account = $db->query("SELECT * FROM `nick` WHERE `id` = '".$row['id_acc']."'")->fetch();
    $loainick = array("Sơ Sinh","Tầm Trung","Vật Phẩm","FreeFire","Liên Quân Mobile");
?>
    <tr>
        <td><?=date("H:i:s d-m-Y", $row['date']); ?></td>
        <td><?=$row['id']; ?></td>
        <td><?=$data_account['account'].'/'.$data_account['password'];?></td>
        <td><?=$loainick[$data_account['loainick']]; ?></td>
        <td><?=number_format($row['cash']); ?><sup>đ</sup></td>
        
        
    </tr>
    <?php
}
?>
</tbody>
</table>

<div class="data_paginate paging_bootstrap paginations_custom" style="text-align: center">
<?php
$tong = $db->query("SELECT `id` FROM `muanick` WHERE `username` = '" . data_user('username') . "'")
    ->rowcount();
if ($tong > $sotin1trang)
{
    echo '<center>' . phantrang('/profile/history?', $from, $tong, $limit) . '</center>';
} ?>
</div>
</div>
</section>
</div>
</div>
</div>
</div>
<!-- END: PAGE CONTENT -->
</div>
</body>
<?php
require('../public/foot.php');
?>