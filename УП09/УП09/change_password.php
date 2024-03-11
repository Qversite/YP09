```php
<?php
// Подключение к базе данных
$db = new PDO('mysql:host=localhost;dbname=shop', 'root', '');

// Начало сессии
session_start();

// Проверка, была ли отправлена форма смены пароля
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['change_password'])) {
    // Получение данных из формы
    $oldPassword = $_POST['old_password'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    // Проверка, что новый пароль совпадает с подтверждением
    if ($newPassword !== $confirmPassword) {
        $_SESSION['message'] = "Новый пароль и подтверждение не совпадают.";
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }

    // Получение текущего пароля пользователя из базы данных
    $userId = $_SESSION['user_id']; // Предполагаем, что в сессии хранится идентификатор пользователя
    $stmt = $db->prepare("SELECT password FROM users WHERE id = :id");
    $stmt->execute(['id' => $userId]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Проверка, что старый пароль верный
    if (!password_verify($oldPassword, $user['password'])) {
        $_SESSION['message'] = "Старый пароль неверен.";
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }

    // Хеширование нового пароля
    $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);

    // Обновление пароля в базе данных
    $stmt = $db->prepare("UPDATE users SET password = :password WHERE id = :id");
    $stmt->execute(['password' => $newPasswordHash, 'id' => $userId]);

    // Установка сообщения об успешной смене пароля
    $_SESSION['message'] = "Пароль успешно изменен.";
    // Вывод сообщения
    echo '<script>alert("Пароль успешно изменен. 😊"); window.location.href = "personal_account.php";</script>';
}

// Проверка наличия сообщения в сессии
if (isset($_SESSION['message'])) {
    // Вывод сообщения
    echo $_SESSION['message'];
    // Удаление сообщения из сессии после его отображения
    unset($_SESSION['message']);
}
?>
```