<?php ob_start(); $cfg = require APP_ROOT.'/config/config.php'; ?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8"><title>تسجيل الدخول - <?= $cfg['APP_NAME'] ?></title>
<style>
body {font-family:Tahoma;background:#f6f8fa;display:flex;align-items:center;justify-content:center;height:100vh;}
form {background:white;padding:30px;border-radius:12px;box-shadow:0 0 10px rgba(0,0,0,.1);width:300px;}
input {width:100%;margin-bottom:10px;padding:8px;}
button {width:100%;padding:8px;background:#007bff;color:white;border:none;border-radius:6px;}
.error{color:red;font-size:14px;margin-bottom:10px;}
</style>
</head>
<body>
<form method="post" action="">
<h2 style="text-align:center">تسجيل الدخول</h2>
<?php if(!empty($error)): ?><p class="error"><?= Utils::h($error) ?></p><?php endif; ?>
<label>اسم المستخدم</label>
<input name="username" required>
<label>كلمة المرور</label>
<input name="password" type="password" required>
<button type="submit">دخول</button>
</form>
</body>
</html>
<?php ob_end_flush(); ?>
