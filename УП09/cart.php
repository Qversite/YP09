<?php
// Подключаем файл db.php
require_once 'db.php';

// Получаем ID пользователя из сессии
session_start();
// Проверяем, существует ли ключ 'user_id' в массиве $_SESSION
if (isset($_SESSION['user_id'])) {
    // Если ключ существует, то присваиваем его значение переменной $user_id
    $user_id = $_SESSION['user_id'];

    // Получаем данные из таблицы cart для текущего пользователя
    $stmt = $pdo->prepare('SELECT products.id, products.name, products.description, products.price FROM cart INNER JOIN products ON cart.product_id = products.id WHERE cart.user_id = :user_id');
    $stmt->execute(['user_id' => $user_id]);
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Проверяем, был ли отправлен POST-запрос
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Проверяем, существует ли параметр product_id
        if (isset($_POST['product_id'])) {
            // Получаем ID товара из POST-запроса
            $product_id = $_POST['product_id'];

            // Добавляем товар в корзину
            $stmt = $pdo->prepare('INSERT INTO cart (product_id, user_id) VALUES (:product_id, :user_id)');
            $stmt->execute(['product_id' => $product_id, 'user_id' => $user_id]);

            // Перенаправляем пользователя на страницу корзины
            header('Location: cart.php');
            exit;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bapst - Корзина</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        header {
            background-color: #333;
            color: white;
            padding: 10px 0;
            text-align: center;
        }
        nav ul {
            list-style-type: none;
            padding: 0;
        }
        nav ul li {
            display: inline;
            margin: 0 10px;
        }
        nav ul li a {
            color: white;
            text-decoration: none;
        }
        main {
            padding: 20px;
        }
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        .logo {
            width: 100px;
            height: auto;
        }
        .training-item {
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .training-item h3 {
            margin-top: 0;
            color: #333;
        }
        .training-item p {
            margin: 5px 0;
            color: #666;
        }
        .training-item strong {
            color: #000;
        }
        .training-item button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
        }
        .training-item button:hover {
            background-color: #0056b3;
        }
        .training-item img {
            max-width: 20%;
            height: auto;
        }
        .site-title {
            font-size: 2em;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin: 0;
            padding: 10px 0;
        }
        header {
            display: flex;
            align-items: center;
        }

        .logo {
            margin-right: 10px; /* Добавляем отступ между логотипом и названием сайта */
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            
        }
        header {
            background-color: #6B65C3;
            color: white;
            padding: 10px 20px;
            display: flex;
            align-items: center;
        }
        .logo {
            height: 50px;
            margin-right: 20px; /* Отступ от логотипа

 до названия */
            max-width:60px
        }
        .site-title {
            font-size: 2em;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin: 0;
        }
        nav {
            margin-left: auto; /* Отступ от навигации до правого края */
        }
        nav ul {
            list-style-type: none;
            padding: 0;
            display: flex;
        }
        nav ul li {
            margin-left: 10px;
        }
        nav ul li a {
            color: white;
            text-decoration: none;
        }
        main {
            padding: 20px;
           
        }
        .empty-cart {
            text-align: center;
            font-size: 2em;
            color: #888;
            padding: 100px;
        }
        .empty-cart {
            text-align: center;
            font-size: 2em;
            color: #888}
        .product-img{
            max-width:300px
        }
        .product-item {
    border: 1px solid #ddd;
    padding: 10px;
    margin-bottom: 20px;
    background-color: #fff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    display: flex;
    align-items: center;
    flex-wrap: wrap;
}

.product-item h3 {
    margin-top: 0;
    color: #333;
    flex: 1;
}

.product-item p {
    margin: 5px 0;
    color: #666;
    flex: 1;
}

.product-item strong {
    color: #000;
    flex: 1;
}

.product-item button {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 5px;
    flex: 1;
}

.product-item button:hover {
    background-color: #0056b3;
}
.modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 10%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }   .site-title-link {
    color: white; /* Change the color to white */
    text-decoration: none; /* Remove the underline */
}

.site-title-link:hover {
    text-decoration: underline; /* Add underline on hover */
}


    </style>
</head>
<body>
    <header>
        <img class="logo" src="png/logo.png" alt="Логотип компании">
        <h1 class="site-title">
    <a class="site-title-link" href="main.php">Bapst</a>
</h1>
        <nav>
            <ul>
            <li><a href="main.php">Главная</a></li>
                <li><a href="news.php">Новости</a></li>
                <li><a href="product.php">О компании</a></li>
                <li><a href="partners.php">Партнеры, агенты</a></li>
                <li><a href="contacts.php">Контакты</a></li>
                <li><a href="cart.php">Корзина</a></li>
                <li><a href="account.php">Личный кабинет</a></li>
            </ul>
        </nav>
    </header>
    <script>
        // Пример добавления товара в корзину
        function addToCart(item) {
            cart.addItem(item);
            displayCart();
        }

        // Пример удаления товара из корзины
        function removeFromCart(itemId) {
            cart.removeItem(itemId);
            displayCart();
        }

        // Инициализация корзины при загрузке страницы
        window.onload = displayCart;
     
    </script>
    <?php if (empty($products)): ?>
        <div class="empty-cart">
            Нету товаров? Пора добавить! <span class="smiley">&#128542;</span><br>
            <a href="main.php">Перейти</a>
        </div>
    <?php else: ?>
        <?php foreach ($products as $product): ?>
            <h3 align="center">Ваша корзина</h3>
            <div class="product-item">
                
                <h3><?php echo $product['name']; ?></h3>
                <p><?php echo $product['description']; ?></p>
                <strong>Цена: <?php echo $product['price']; ?> руб.</strong>
                <form action="cart.php" method="post">
                   
                <button onclick="openModal()">Купить</button>

<!-- Модальное окно -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <form action="cart.php" method="post" onsubmit="return validateForm()">
            <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
            <div class="form-group">
                <label for="phone">Телефон</label>
                <input type="tel" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="card">Номер карты</label>
                <input type="text" class="form-control" id="card" name="card" required>
            </div>
            <div class="form-group">
                <label for="pin">Пин-код</label>
                <input type="password" class="form-control" id="pin" name="pin" required>
            </div>
            <div class="form-group">
                <label for="address">Адрес доставки</label>
                <textarea class="form-control" id="address" name="address" required></textarea>
            </div>
            <button onclick="buyProducts()">Купить</button>

            
        </form>
    </div>
</div>

<script>
    // Функция для открытия модального окна
    function openModal() {
        document.getElementById('myModal').style.display = 'block';
    }
    // Функция для закрытия модального окна
    function closeModal() {
        document.getElementById('myModal').style.display = 'none';
    }

    // Функция для валидации формы
    function validateForm() {
        var phone = document.getElementById('phone').value;
        var card = document.getElementById('card').value;
        var pin = document.getElementById('pin').value;
        var address = document.getElementById('address').value;

        if (phone == '' || card == '' || pin == '' || address == '') {
            alert('Пожалуйста, заполните все поля.');
            return false;
        }

        return true;
    }
</script>


                </form>
                <form action="remove_from_cart.php" method="post">
                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                    <button type="submit">Убрать</button>
                </form>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>
</body>
</html>

    <footer>
        <p>&copy; 2024 Мобильные устройства. Все права защищены.</p>
    </footer>
</body>
</html>