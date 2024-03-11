<?php
// Подключение к базе данных
$db = new mysqli('localhost', 'root', '', 'shop');

// Проверка соединения
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Получение ID товара из GET-параметра
$productId = $_GET['id'] ?? null;

// Получение данных товара
$query = "SELECT * FROM products WHERE id = ?";
$stmt = $db->prepare($query);
$stmt->bind_param("i", $productId);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();

$db->close();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Страница товара</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h1><?php echo $product['name']; ?></h1>
                <p><?php echo $product['description']; ?></p>
                <p>Цена: <?php echo $product['price']; ?> руб.</p>
                <div class="form-group">
                    <label for="colorSelect">Выберите цвет:</label>
                    <select class="form-control" id="colorSelect">
                        <option>Белый</option>
                        <option>Черный</option>
                        <option>Золотой</option>
                        <!-- Добавьте другие цвета по необходимости -->
                    </select>
                </div> 
                <a href="main.php" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Вернуться</a>
               
            </div>
        </div>
        <div class="row mt-4">
    <div class="col">
        <a href="404.html" class="btn btn-secondary btn-block"><i class="fas fa-info-circle"></i> Подробнее о товаре</a>
    </div>
    <div class="col">
        <a href="404.html" class="btn btn-secondary btn-block"><i class="fas fa-truck"></i> Доставка и оплата</a>
    </div>
    <div class="col">
        <a href="404.html" class="btn btn-secondary btn-block"><i class="fas fa-shield-alt"></i> Гарантия</a>
    </div>
    <div class="col">
        <a href="404.html" class="btn btn-secondary btn-block"><i class="fas fa-sync-alt"></i> Обмен и возврат</a>
    </div>
</div>
           
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>