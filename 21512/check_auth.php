<?php
session_start(); // 啟動 Session
require_once('db_config.php');

if (!isset($_POST['username'], $_POST['password'])) {
    exit('?沒輸密碼就要進來我操你媽');
}

$userid = $_POST['username'];
$userpwd = $_POST['password'];

$stmt = $conn->prepare("SELECT * FROM users WHERE username = ? and password =?");
$stmt->bind_param("ss", $userid,$userpwd);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
        $_SESSION['username'] = $userid;
        header("Location: index.php");
        exit();
    }
else{
    echo "<script>alert('帳號或密碼錯誤'); location.href='login.php';</script>";
}
?>
