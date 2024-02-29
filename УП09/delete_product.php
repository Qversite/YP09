<?php
// delete_product.php
session_start();

// Подключение к базе данных
$dsn = 'mysql:host=localhost;dbname=shop';
$username = 'root';
$password = '';

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo 'Подключение не удалось: ' . $e->getMessage();
}

// Обработка удаления товара
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_product'])) {
    $productId = $_POST['product_id'];

    // Удаление товара из базы данных
    $stmt = $db->prepare("DELETE FROM products WHERE id = :id");
    $stmt->execute(['id' => $productId]);

    // Проверка, был ли товар удален
    if ($stmt->rowCount() > 0) {
        // Установка сообщения об успешном удалении
        $_SESSION['message'] = "Товар с ID $productId успешно удален.";
    } else {
        // Установка сообщения об ошибке, если товар не был найден или не удален
        $_SESSION['message'] = "Товар с ID $productId не найден или не удален.";
    }

    // Перенаправление на страницу админ-панели или на ту же страницу, с которой был выполнен запрос
    header('Location: admin_panel.php');
    exit;
}
?>