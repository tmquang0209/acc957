<?php

require('../system/function.php');

if (isset($_GET)) {
    $server = (int)$_GET['ServerID'];
    $money = (int)$_GET['Money'];
    $type = (int)$_GET['type'];

    if ($type == 1) { //gold
        if(setting('gold_cash_min') > $money){
            $zMoney = 0;
            $ExchangeRate = 0;
        }else{
        $zMoney = setting("gold_server_$server") * $money;
        $ExchangeRate = setting("gold_server_$server");
        }
    } elseif ($type == 2) {
        if(setting('gem_cash_min') > $money){
            $zMoney = 0;
            $ExchangeRate = 0;
        }else{
        $zMoney = setting("gem_server_$server") * $money;
        $ExchangeRate = setting("gem_server_$server");
        }
    }
}
$data = array('Money' => $zMoney, 'ExchangeRate' => $ExchangeRate, 'Messeger' => 'test loi');
die(json_encode($data));
