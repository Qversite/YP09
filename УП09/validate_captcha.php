<?php
// Подключение к базе данных

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

// Получение значения капчи из базы данных
$stmt = $pdo->query("SELECT value, expiration FROM captcha ORDER BY id DESC LIMIT 1");
$captcha = $stmt->fetch(PDO::FETCH_ASSOC);

// Проверка введенного значения капчи
if ($captcha && isset($_POST['captcha']) && $_POST['captcha'] == $captcha['value']) {
    // Проверка времени жизни капчи
    $expiration = strtotime($captcha['expiration']);
    if ($expiration > time()) {
        // Капча верна и не истекла
        echo "Captcha is valid!";
    } else {
        // Капча истекла
        echo "Captcha has expired!";
    }
} else {
    // Неверное значение капчи
    echo "Invalid captcha!";
}
?>