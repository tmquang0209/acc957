<?php
//code by TmQ
ob_start();
session_start();
error_reporting(1);
date_default_timezone_set("Asia/Ho_Chi_Minh");
// Set options
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);
// Create a new PDO instanace
try {
    $db = new PDO("mysql:host=localhost;dbname=shopnick", "root", "", $options);
} // Catch any errors
catch (PDOException $e) {
    echo $e->getMessage();
    exit();
}
