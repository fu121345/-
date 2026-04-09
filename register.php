<?php
require_once('db_config.php');

if (!isset($_POST['username'], $_POST['password'])) {
    exit('?沒輸密碼就要進來我操你媽');
}

$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->fetch_assoc()) {
    echo "<script>alert('帳號已存在'); location.href='register.html';</script>";
    exit();
}

$hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $hash);

if ($stmt->execute()) {
    echo "<script>alert('註冊成功！請登入'); location.href='login.php';</script>";
} else {
    echo "<script>alert('註冊失敗'); location.href='register.html';</script>";
}
?>
