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
?>
