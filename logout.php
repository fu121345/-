<?php
session_start();
session_destroy(); // ⑧
header("Location: login.php"); // ⑨回到登入頁
exit();
?>
