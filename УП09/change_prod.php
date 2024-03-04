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

// Если форма отправлена, обновить данные товара
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $description = $_POST['description'] ?? '';
    $price = $_POST['price'] ?? 0;
    $image = $_POST['image'] ?? '';

    // Обновление данных товара в базе данных
    $query = "UPDATE products SET name = ?, description = ?, price = ?, image = ? WHERE id = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("ssdsi", $name, $description, $price, $image, $productId);
    $stmt->execute();

    // Перенаправление на страницу товара после обновления
    header('Location:change_prod.php');
    exit;
}

// Получение списка всех товаров
$query = "SELECT id, name FROM products";
$result = $db->query($query);

$db->close();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Редактирование товара</title>
</head>
<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        ul li {
            margin-bottom: 5px;
        }
        ul li a {
            text-decoration: none;
            color: #333;
        }
        ul li a:hover {
            text-decoration: underline;
        }
    </style>
<body>
<div class="container">
    <h1>Редактирование товара</h1>
    <form method="post" action="change_prod.php?id=<?php echo $productId; ?>">
        <label for="name">Название:</label>
        <input type="text" id="name" name="name" value="<?php echo $product['name']; ?>" required><br>

        <label for="description">Описание:</label>
        <textarea id="description" name="description" required><?php echo $product['description']; ?></textarea><br>

        <label for="price">Цена:</label>
        <input type="number" id="price" name="price" step="0.01" value="<?php echo $product['price']; ?>" required><br>

        <label for="image">Изображение (URL):</label>
        <input type="text" id="image" name="image" value="<?php echo $product['image']; ?>"><br>

        <input type="submit" value="Сохранить изменения">
    </form>
    </div>
    <div class="container">
    <h2>Список товаров:</h2>
    <ul>
        <?php while ($row = $result->fetch_assoc()) : ?>
            <li><a href="change_prod.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></li>
        <?php endwhile; ?>
    </ul> <a href="admin_panel.php">Вернуться</a>
        </div>
       
</body>
</html>