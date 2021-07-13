<?php
if(isset($_GET)){
    $money = $_GET['Money'];
}
$data = array('Money' => 10000 , 'ExchangeRate' => 0.006);
die(json_encode($data));
