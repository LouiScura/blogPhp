<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'blog_master';

$db = mysqli_connect($host, $user, $password, $database);
mysqli_query($db, "SET NAMES 'utf-8'");

session_start();
?>
