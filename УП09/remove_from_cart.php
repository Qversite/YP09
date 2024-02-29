<?php
// Подключаем файл db.php
require_once 'db.php';

// Проверяем, был ли отправлен POST-запрос
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Проверяем, существует ли параметр product_id
    if (isset($_POST['product_id'])) {
        // Получаем ID товара из POST-запроса
        $product_id = $_POST['product_id'];

        // Получаем ID пользователя из сессии
        session_start();
        $user_id = $_SESSION['user_id'];

        // Удаляем товар из корзины
        $stmt = $pdo->prepare('DELETE FROM cart WHERE product_id = :product_id AND user_id = :user_id');
        $stmt->execute(['product_id' => $product_id, 'user_id' => $user_id]);

        // Перенаправляем пользователя на страницу корзины
        header('Location: cart.php');
        exit;
    }
}
?>
