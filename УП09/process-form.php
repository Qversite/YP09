<?php

// 1a
session_start();
$captcha = $_SESSION['captcha'];
unset($_SESSION['captcha']);
session_write_close();
// 1b
//$captcha = $_COOKIE['captcha'];
//unset($_COOKIE['captcha']);
//setcookie('captcha', '', time() - 3600, '/', 'test.ru', false, true);

$result = ['success' => false];
$code = $_POST['captcha'];


echo json_encode($result);
?>
<form action="process-form.php" method="post">
  <!-- Другие поля формы -->

  <!-- Поле для капчи -->
  <label for="captcha">Капча:</label>
  <input type="text" id="captcha" name="captcha" required>

  <!-- Кнопка отправки -->
  <button type="submit">Отправить</button>
</form>