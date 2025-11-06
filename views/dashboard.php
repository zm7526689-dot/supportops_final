<?php
$user = Auth::user();
if(!$user) header('Location: login.php');
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8"><title>لوحة التحكم</title>
<style>
body{font-family:Tajawal,Arial;background:#f8f9fa;margin:0;padding:20px;}
a{display:inline-block;margin:10px;padding:10px 15px;background:#007bff;color:white;border-radius:6px;text-decoration:none;}
</style>
</head>
<body>
<h2>مرحباً <?= Utils::h($user['username']) ?></h2>
<p>اختر القسم:</p>
<a href="customers">العملاء</a>
<a href="engineers">المهندسون</a>
<a href="users">المستخدمون</a>
<a href="logout">تسجيل الخروج</a>
</body>
</html>
