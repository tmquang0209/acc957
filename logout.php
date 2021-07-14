<?php
require('system/function.php');

if($_SESSION['username'] != null){
    unset($_SESSION['username']);
    header('Location: /');
}