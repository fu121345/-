<?php
require_once('db_config.php');

// ① 防止直接進入
if (!isset($_POST['username'], $_POST['password'])) {
    exit('請透過註冊表單提交資料');
}

// ② 取得使用者輸入
$username = $_POST['username'];
$password = $_POST['password'];

// ③ 檢查帳號是否已存在
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->fetch_assoc()) {
    echo "<script>alert('帳號已存在'); location.href='register.html';</script>";
    exit();
}

// ④ 密碼加密（🔥重點）
$hash = password_hash($password, PASSWORD_DEFAULT);

// ⑤ 存入資料庫
$stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $hash);

if ($stmt->execute()) {
    echo "<script>alert('註冊成功！請登入'); location.href='login.php';</script>";
} else {
    echo "<script>alert('註冊失敗'); location.href='register.html';</script>";
}
?>
