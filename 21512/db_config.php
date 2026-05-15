<?php
$host = "localhost";
$username = "test";
$password = "123456";
$database = "menagerie";
// ①
$conn = mysqli_connect($host, $username, $password, $database);
// 檢查連線是否成功
if (!$conn) {
    die("連線失敗：" . mysqli_connect_error());
}
// ②
mysqli_set_charset($conn, "utf8");
?>
