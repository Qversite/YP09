<?php

// Параметры для подключения к базе данных
$host = 'localhost';
$dbname = 'shop';
$username = 'root';
$password = '';

// Создаем соединение с базой данных
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Устанавливаем режим ошибок PDO в исключение
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}

// Генерация случайного числа для капчи
$captchaValue = mt_rand(1000, 9999);

// Определение времени жизни капчи (например, 5 минут)
$expiration = date('Y-m-d H:i:s', strtotime('+5 minutes'));

// Запись капчи в базу данных
$stmt = $pdo->prepare("INSERT INTO captcha (value, expiration) VALUES (?, ?)");
$stmt->execute([$captchaValue, $expiration]);

// Отправка сгенерированного значения капчи клиенту
echo $captchaValue;

// Получение значения капчи из базы данных
$stmt = $pdo->query("SELECT value FROM captcha ORDER BY id DESC LIMIT 1");
$captcha = $stmt->fetch(PDO::FETCH_ASSOC);

// Отображение капчи на странице
if ($captcha) {
    echo '<img src="captcha_image.php" alt="Captcha Image">';
}
?>