
<?php
// Подключаем файл db.php
require_once 'db.php';

// Проверяем, был ли отправлен POST-запрос
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Проверяем, существует ли параметр product_id
    if (isset($_POST['product_id'])) {
        // Получаем ID товара из POST-запроса
        $product_id = $_POST['product_id'];

        // Проверяем, существует ли сессия пользователя
        session_start();
        if (!isset($_SESSION['user_id'])) {
            // Если сессия не существует, выводим сообщение об ошибке
            echo '<script>alert("Для добавления товара в корзину необходимо войти в аккаунт.😉"); window.location.href = "account.php";</script>';
            exit;
        }

        // Получаем ID пользователя из сессии
        $user_id = $_SESSION['user_id'];

        // Получаем количество товара из POST-запроса
        $quantity = $_POST['quantity'];

        // Получаем цену товара из POST-запроса
        $price = $_POST['price'];

        // Добавляем товар в корзину
        $stmt = $pdo->prepare('INSERT INTO cart (product_id, user_id, quantity, price) VALUES (:product_id, :user_id, :quantity, :price)');
        $stmt->execute(['product_id' => $product_id, 'user_id' => $user_id, 'quantity' => $quantity, 'price' => $price]);

        // Перенаправляем пользователя на страницу корзины
        header('Location: cart.php');
        exit;
    }
}
?>
