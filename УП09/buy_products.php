<?php
session_start();

// Подключение к базе данных
$dsn = 'mysql:host=localhost;dbname=shop;charset=utf8mb4';
$username = 'root';
$password = '';

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo 'Подключение не удалось: ' . $e->getMessage();
    exit;
}

// Проверка, что запрос POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получение данных из запроса
    $productId = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $userId = $_SESSION['user_id']; // Предполагается, что в сессии хранится идентификатор пользователя

    // Проверка доступности товара и баланса пользователя
    // ... (логика проверки)

    // Обновление баланса пользователя
    // ... (логика обновления баланса)

    // Запись покупки в историю
    $query = "INSERT INTO purchases (user_id, product_id, quantity) VALUES (:user_id, :product_id, :quantity)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':user_id', $userId);
    $stmt->bindParam(':product_id', $productId);
    $stmt->bindParam(':quantity', $quantity);
    $stmt->execute();

    // Отправка ответа клиенту
    echo json_encode(['success' => true, 'message' => 'Покупка совершена успешно!']);
} else {
    // Если запрос не POST, возвращаем ошибку
    echo json_encode(['success' => false, 'message' => 'Неверный запрос!']);
}
?>