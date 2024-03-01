<?php
// personal_account.php
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
// Получение списка пользователей из базы данных
$stmt = $db->query("SELECT id, email FROM users");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Предположим, что у вас есть подключение к базе данных и переменная $db
$stmt = $db->query("SELECT id, name, description, price FROM products");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Получение списка пользователей из базы данных
$stmt = $db->query("SELECT id, email, created_at FROM users");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Обработка удаления пользователя
if (isset($_POST['delete_user'])) {
    $userId = $_POST['user_id'];

    // Удаление пользователя из базы данных
    $stmt = $db->prepare("DELETE FROM users WHERE id = :id");
    $stmt->execute(['id' => $userId]);

    // Установка сообщения об успешном удалении
    $_SESSION['message'] = "Пользователь с ID $userId успешно удален.";
    // Перенаправление на страницу админ-панели
    header('Location: admin_panel.php');
    exit;

}
// Проверка, вошел ли пользователь
if (!isset($_SESSION['user_id'])) {
    // Если пользователь не вошел, перенаправляем на страницу входа
    header('Location: login.php');
    exit;
}

// Отображение личного кабинета пользователя
$welcomeMessage = "Добро пожаловать, " . $_SESSION['username'] . "! Это ваш личный кабинет.";
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['change_password'])) {
    // Получение данных из формы
    $oldPassword = $_POST['old_password'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    // Проверка, совпадает ли старый пароль с текущим паролем пользователя
    if (password_verify($oldPassword, $_SESSION['password'])) {
        // Проверка, совпадают ли новый пароль и подтверждение пароля
        if ($newPassword === $confirmPassword) {
            // Хеширование нового пароля
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            // Обновление пароля в базе данных
            $stmt = $db->prepare("UPDATE users SET password = :password WHERE id = :id");
            $stmt->execute(['password' => $hashedPassword, 'id' => $_SESSION['user_id']]);

            // Обновление даты изменения пароля в базе данных
            $stmt = $db->prepare("UPDATE users SET password_change_date = NOW() WHERE id = :id");
            $stmt->execute(['id' => $_SESSION['user_id']]);

            // Обновление пароля в сессии
            $_SESSION['password'] = $hashedPassword;

            // Установка сообщения в сессию
            $_SESSION['message'] = "Пароль успешно изменен!";
        } else {
            // Установка сообщения в сессию
            $_SESSION['message'] = "Новый пароль и подтверждение пароля не совпадают.";
        }
    } else {
        // Установка сообщения в сессию
        $_SESSION['message'] = "Старый пароль введен неверно.";
        
    }// Проверка, совпадает ли старый пароль с текущим паролем пользователя
    if (password_verify($oldPassword, $_SESSION['password'])) {
        // Проверка, совпадают ли новый пароль и подтверждение пароля
        if ($newPassword === $confirmPassword) {
            // Хеширование нового пароля
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            // Обновление пароля в базе данных
            $stmt = $db->prepare("UPDATE users SET password = :password WHERE id = :id");
            $stmt->execute(['password' => $hashedPassword, 'id' => $_SESSION['user_id']]);

            // Обновление даты изменения пароля в базе данных
            $stmt = $db->prepare("UPDATE users SET password_change_date = NOW() WHERE id = :id");
            $stmt->execute(['id' => $_SESSION['user_id']]);

            // Обновление пароля в сессии
            $_SESSION['password'] = $hashedPassword;

            // Установка сообщения в сессию
            $_SESSION['message'] = "Пароль успешно изменен!";
        } else {
            // Установка сообщения в сессию
            $_SESSION['message'] = "Новый пароль и подтверждение пароля не совпадают.";
        }
    } else {
        // Установка сообщения в сессию
        $_SESSION['message'] = "Старый пароль введен неверно.";
        
    }
    // Перенаправление на страницу личного кабинета
    header('Location: account.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bapst - Админ панель</title>
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
            bottom: 0;
            width: 100%;
            position:fixed;
        }
        .logo {
            width: 100px;
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
            background-color: #ffffff;
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
            margin-right: 20px; /* Отступ от логотипа до названия */
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
            padding: 2  0px;
           
        }
        .event-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }
        .event-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            transition: transform 0.3s ease;
        }
        .event-card:hover {
            transform: translateY(-5px);
        }
        .event-card img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            cursor: pointer;
            width: 200px; /* Фиксированная ширина */
            height: auto; /* Высота автоматически подстраивается */
        }
        .event-card h2 {
            margin-top: 10px;
        }
        .event-card p {
            margin-bottom: 0;
        }
        h1 {
            text-align: center;
        }
        .event-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }
        .event-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            transition: transform 0.3s ease;
            width: 250px;
        }
        .event-card:hover {
            transform: translateY(-5px);
        }
        .event-card img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            cursor: pointer;
            width: 200px;
            height: auto;
        }
        .event-card h4 {
            margin-top: 10px;
            font-size: 1.2em;
            color: #333;
        }
        .event-card p {
            margin-bottom: 0;
            font-size: 0.9em;
            color: #666;
        }
        .event-card a {
            text-decoration: none;
            color: #007BFF;
        }
        .event-card a:hover {
            text-decoration: underline;
        }
        .content {
            padding: 20px;
            background: #ffffff;
            margin-top: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .content p {
            line-height: 1.6;
            color: #333;
        }
        .content table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .content table th,
        .content table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .content table th {
            background-color: #f4f4f4;
        }
        .logout-button {
    background-color: #a10b0b;
    color: white;
    padding: 10px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}
.welcome-block {
            background-color: #ebebeb;
            padding: 10px;
            margin-bottom: 10px;
        }
       
        .change-password-block {
            background-color: #ffffff;
            padding: 10px;
            max-width:250px;
            margin:0 auto;
        }
        .change-button{
            background-color: #000; 
            color: white; /* Белый текст */
            padding: 10px 20px; /* Внутренние отступы */
            text-align: center; /* Выравнивание текста по центру */
            text-decoration: none; /* Удаление подчеркивания */
            display: inline-block; /* Отображение кнопки в строке с другими элементами */
            font-size: 16px; /* Размер шрифта */
            margin: 4px 2px; /* Внешние отступы */
            cursor: pointer; /* Изменение курсора при наведении */
            border: none; /* Удаление границ */
            border-radius: 5px; /* Скругление углов */
            transition: background-color 0.3s ease; /* Плавное изменение цвета фона */
        }
        body {
            font-family: Arial, sans-serif;
        }
        .welcome-block {
            background-color: #d1cfe7;
            padding: 10px;
            margin-bottom: 10px;
        }
        .logout-block {
            background-color: #e0e0e0;
            padding: 10px;
            margin-bottom: 10px;
        }
        .delete-user-block {
            background-color: #d0d0d0;
            padding: 10px;
        }
        .user-list {
            margin-top: 20px;
        }
        .user-list table {
            width: 100%;
            border-collapse: collapse;
        }
        .user-list th,
        .user-list td {
            border: 1px solid #000;
            padding: 5px;
            text-align: left;
        }
        .add-button {
            display: inline-block;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .add-button a {
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .add-button a:hover {
            background-color: #0056b3;
        }
        .delete-user-form {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .delete-user-form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .delete-user-form input[type="text"] {
          
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .delete-user-form input[type="submit"] {
            background-color: #dc3545;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .delete-user-form input[type="submit"]:hover {
            background-color: #c82333;
        }
        .site-title-link {
    color: white; /* Change the color to white */
    text-decoration: none; /* Remove the underline */
}

.site-title-link:hover {
    text-decoration: underline; /* Add underline on hover */
}
.delete-product-form {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .delete-product-form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .delete-product-form input[type="text"] {
          
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .delete-product-form input[type="submit"] {
            background-color: #dc3545;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .delete-product-form input[type="submit"]:hover {
            background-color: #c82333;
        }
    </style>
    
</head>
<body>
    <header>
        <img class="logo" src="png/logo.png" alt="Логотип компании">
        <h1 class="site-title">
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
    <main>
    <div class="welcome-block">
        <h2>Добро пожаловать, <?php echo $_SESSION['username']; ?>!</h2>
        <p>Вы вошли как администратор.</p>
        <div class="welcome-block">
    <h2 >Сменить пароль</h2>
        <form action="change_password.php" method="post">
            <label for="old_password">Старый пароль:</label><br>
            <input type="password" id="old_password" name="old_password" required><br>
            <label for="new_password">Новый пароль:</label><br>
            <input type="password" id="new_password" name="new_password" required><br>
            <label for="confirm_password">Подтвердите пароль:</label><br>   
            <input type="password" id="confirm_password" name="confirm_password" required><br>
            <button type="submit" name="change_password" class="change-button">Сменить пароль</button>
             </form>
            <form action="logout.php" method="post"><br>
            <button type="submit" name="logout" class="logout-button">Выйти из аккаунта</button>
       
        </form>
    </div>
    </div>
    
    </div>

    

    <div class="add-button">
    <a href="delete_product1.php">Перейти к удолению продукта</a>
    </div>

    <div class="add-button">
    <a href="delete_user.php">Перейти к удолению пользователю</a>
    </div><br>
    
    <div class="add-button">
    <a href="add_main.php">Перейти к добавлению</a>
    </div>



   
    </main>
  

    <footer>
        <p>&copy; 2024 Мобильные устройства. Все права защищены.</p>
    </footer>
</body>
</html>