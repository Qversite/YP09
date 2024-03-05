<?php
session_start();

// Функция для подключения к базе данных
function connectToDatabase() {
    $host = 'localhost';
    $db   = 'shop';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
        $pdo = new PDO($dsn, $user, $pass, $options);
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }

    return $pdo;
}

// Функция для получения текущего пользователя
function getCurrentUser() {
    // Предполагается, что в сессии хранится идентификатор пользователя
    return $_SESSION['user_id'];
}

// Подключение к базе данных
$db = connectToDatabase();

// Получение текущего пользователя
$userId = getCurrentUser();

// Получение истории покупок пользователя
$query = "SELECT p.id, p.product_id, p.quantity, p.purchase_date, pr.name, pr.price
          FROM purchases p
          INNER JOIN products pr ON p.product_id = pr.id
          WHERE p.user_id = :user_id";
$stmt = $db->prepare($query);
$stmt->bindParam(':user_id', $userId);
$stmt->execute();

$purchases = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>История покупок</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1>История покупок</h1>
    <?php if ($purchases): ?>
        <ul class="list-group">
            <?php foreach ($purchases as $purchase): ?>
                <li class="list-group-item">
                    <strong>Покупка №<?php echo $purchase['id']; ?></strong><br>
                    Товар: <?php echo $purchase['name']; ?><br>
                    Количество: <?php echo $purchase['quantity']; ?><br>
                    Дата: <?php echo $purchase['purchase_date']; ?><br>
                    Стоимость: <?php echo $purchase['price'] * $purchase['quantity']; ?> руб.
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>У вас нет покупок.</p>
    <?php endif; ?>
    <div class="add-button">
    <a href="personal_account.php">Назад</a>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>