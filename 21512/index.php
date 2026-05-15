<?php
// ⑤
session_start();
// ⑥
if (!isset($_SESSION['username'])) {
    // ⑦
    header("Location: login.php");
    exit();
}
?>

<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <title>系統首頁</title>
</head>
<body>
    <h1>歡迎回來，<?php echo $_SESSION['username']; ?>！</h1>
     <hr>
    <a href="logout.php">登出系統</a>
</body>
</html>
