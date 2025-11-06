<?php ob_start(); $cfg = require __DIR__ . '/../../config/config.php'; ?>
<h1>المهندسون</h1>

<div class="card">
  <a class="btn" href="<?= $cfg['APP_URL'] ?>/engineers/create">إضافة مهندس</a>
</div>

<table class="table" style="margin-top:10px">
  <thead><tr><th>#</th><th>الاسم</th><th>الهاتف</th><th>التخصص</th><th>إدارة</th></tr></thead>
  <tbody>
  <?php $i=1; foreach($engineers as $e): ?>
    <tr>
      <td><?= $i++ ?></td>
      <td><?= Utils::h($e['name']) ?></td>
      <td><?= Utils::h($e['phone']) ?></td>
      <td><?= Utils::h($e['specialty'] ?? '-') ?></td>
      <td>
        <a class="btn outline" href="<?= $cfg['APP_URL'] ?>/engineers/edit?id=<?= $e['id'] ?>">تعديل</a>
        <form style="display:inline" method="post" action="<?= $cfg['APP_URL'] ?>/engineers/delete" onsubmit="return confirm('تأكيد الحذف؟')">
          <input type="hidden" name="csrf" value="<?= Utils::csrfToken() ?>">
          <input type="hidden" name="id" value="<?= $e['id'] ?>">
          <button class="btn danger" type="submit">حذف</button>
        </form>
      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>

<?php $content = ob_get_clean(); include __DIR__ . '/../layout.php'; ?>
