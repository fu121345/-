<?php
session_start(); // 啟動 Session
require_once('db_config.php');

$userid = $_POST['username'];
$userpwd = $_POST['password'];

$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $userid);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    if (password_verify($userpwd, $row['password'])) {
        $_SESSION['username'] = $userid;
        header("Location: index.php");
        exit();
} else {
    echo "<script>alert('帳號或密碼錯誤'); location.href='login.php';</script>";
}
?>
