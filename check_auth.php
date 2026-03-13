<?php
session_start(); // 啟動 Session
require_once('db_config.php');

$userid = $_POST['username'];
$userpwd = $_POST['password'];

$query = "SELECT * FROM users WHERE username = '$userid' AND password = '$userpwd'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    // ③
    $_SESSION['username'] = $userid;
    // ④
    header("Location: index.php");
    exit();
} else {
    echo "<script>alert('帳號或密碼錯誤'); location.href='login.php';</script>";
}
?>
