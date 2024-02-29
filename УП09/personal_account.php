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

// Проверка, вошел ли пользователь
if (!isset($_SESSION['user_id'])) {
    // Если пользователь не вошел, перенаправляем на страницу входа
    header('Location: login.php');
    exit;
}

// Получаем пользователя из базы данных
$stmt = $db->prepare('SELECT * FROM users WHERE id = :id');
$stmt->execute(['id' => $_SESSION['user_id']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Проверка роли пользователя и перенаправление
if ($user && $user['role'] === 'admin') {
    // Если пользователь является администратором, перенаправляем на admin_panel.php
    header('Location: admin_panel.php');
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
    <title>Bapst - Личный кабинет</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        header {
            background-color: #6B65C3;
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
            overflow: hidden; /* Убираем скроллбар */
       

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
        .content img {
            max-width: 40%;
            height: auto;
            display: block;
            margin: 50px auto;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
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
           .logout-button {
            background-color: #a10b0b; /* Красный цвет фона */
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

        .logout-button:hover {
            background-color: #da190b; /* Темно-красный цвет фона при наведении */

        }
        .account-section {
            background-color: #6b65c3;
            padding: 20px;
            margin-bottom: 200px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 300px;
            height: 700px;
        }

        .avatar-image {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 20px;
        }

        .background-image {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        main {
            display: ;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            text-align: center;
        }

        .welcome-message {
            color: white; /* Изменение цвета текста */
        }
        form {
  
  grid-template-columns: auto auto;
  gap: 10px; /* Отступ между элементами */
}

label {
  text-align: right; /* Выравнивание текста по правому краю */
}

input {
  width: 100%; /* Ширина поля ввода */
  padding: 5px; /* Внутренние отступы */
  border-radius: 5px; /* Скругление углов */
  border: 1px solid #ddd; /* Граница */
  box-sizing: border-box; /* Учитывать границу в ширине */
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
    <main>
        
   

    <div class="account-section" id="login-section">
            <!-- Добавление аватара -->
        <img src="png/avatar.png" alt="Аватар пользователя" class="avatar-image">

        
        <!-- Вывод сообщения внутри тела HTML -->
        <div class="welcome-message">
            <?php echo $welcomeMessage; ?>
       
        
        <!-- Форма для смены пароля -->
      
        <h2 >Сменить пароль</h2>
        <form action="change_password.php" method="post">
            <label for="old_password">Старый пароль:</label>
            <input type="password" id="old_password" name="old_password" required><br>
            <label for="new_password">Новый пароль:</label>
            <input type="password" id="new_password" name="new_password" required><br>
            <label for="confirm_password">Подтвердите пароль:</label>
            <input type="password" id="confirm_password" name="confirm_password" required><br>
            <button type="submit" name="change_password" class="change-button">Сменить пароль</button>
        </form>
 </div>
        <!-- Форма для выхода из аккаунта -->
        <form action="logout.php" method="post">
            <button type="submit" name="logout" class="logout-button">Выйти из аккаунта</button>
        </form>
            </form>
            <div class="switch-form">
            </div>
        </div>
        
    </main>
    <!-- Добавление фона -->
    <img src="png/5.png" alt="Фон" class="background-image">
    <footer>
        <p>&copy; 2024 Мобильные устройства. Все права защищены.</p>
    </footer>
</body>
</html>