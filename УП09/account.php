<?php
session_start();

// Проверяем, есть ли сессия
if (isset($_SESSION['user_id'])) {
    // Если сессия есть, перенаправляем пользователя на страницу личного кабинета
    header('Location: personal_account.php');
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
            overflow: hidden;
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
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }
        .account-section {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 200px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 300px;
        }

        .account-section h2 {
            color: #333;
        }

        .account-section form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .account-section label {
            margin-bottom: 5px;
            color: #666;
        }
        .account-section input[type="text"],
        .account-section input[type="email"],
        .account-section input[type="password"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 100%;
        }
        .account-section button {
            padding: 10px;
            background-color: #050505;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        .account-section button {
            /* ... (предыдущие стили для кнопки) ... */
            transition: transform 0.3s ease-in-out; /* Добавляем плавную анимацию */
        }
        .account-section button:active {
            transform: scale(0.95) translateY(-5px); /* Уменьшаем размер и смещаем вверх */
        }
        .account-section button:hover {
            background-color: ;
        }
        .hidden {
            display: none;
        }
        .switch-form {
            margin-top: 10px;
            color: #666;
        }
        .switch-form button {
            background: none;
            border: none;
            color: #050505;
            cursor: pointer;
            padding: 0;
        }
        .switch-form button:hover {
            color: #0056b3;
        }
        .switch-form button:disabled {
            color: #ccc;
            cursor: not-allowed;
        }
        .site-title-link {
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
    </script>
    <main>
        <!-- Форма авторизации -->
        <div class="account-section" id="login-section">
        <?php
    if (isset($_SESSION['message'])) {
        echo "<p>{$_SESSION['message']}</p>";
        unset($_SESSION['message']);
    }
    ?>
            <h2>Авторизация</h2>
            <form action="login.php" method="post">
                <label for="auth-email">Email:</label>
                <input type="email" id="auth-email" name="email" required>
                <label for="auth-password">Пароль:</label>
                <input type="password" id="auth-password" name="password" required>
                <button type="submit">Войти</button>
                
            </form>
            <div class="switch-form">
                <button id="register-btn">Нет аккаунта? Зарегистрироваться</button>
            </div>
            
        </div>
        <script>
        function validateForm() {
            var firstName = document.forms["registrationForm"]["username"].value;
            var lastName = document.forms["registrationForm"]["lastname"].value;
            var password = document.forms["registrationForm"]["password"].value;

            // Проверка пароля на минимальную длину
            if (password.length < 8) {
                alert("Пароль должен содержать не менее 8 символов.");
                return false;
            }

            // Проверка имени и фамилии на заглавные буквы и отсутствие цифр
            var namePattern = /^[A-ZА-Я][a-zа-я]*$/;
            if (!namePattern.test(firstName) || !namePattern.test(lastName)) {
                alert("Имя и фамилия должны начинаться с заглавной буквы и не должны содержать цифр.");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <div class="account-section hidden" id="register-section">
        <h2>Регистрация</h2>
        <form action="register.php" name="registrationForm" onsubmit="return validateForm()" method="post">
            <label for="reg-email">Email:</label>
            <input type="email" id="reg-email" name="email" required>
            <label for="reg-username">Имя:</label>
            <input type="text" id="reg-username" name="username" required>
            <label for="reg-lastname">Фамилия:</label>
            <input type="text" id="reg-lastname" name="lastname" required>
            <label for="reg-password">Пароль:</label>
            <input type="password" id="reg-password" name="password" required><br>
            <button type="submit" name="go">Зарегистрироваться</button>
        </form>
            <div class="switch-form">
                <button id="login-btn">Уже есть аккаунт? Войти</button>
            </div>
        </div>
    </main>
 
</form>
    <script>
        // Скрипт для переключения между формами
        document.getElementById('register-btn').addEventListener('click', function() {
            document.getElementById('login-section').classList.add('hidden');
            document.getElementById('register-section').classList.remove('hidden');
        });

        document.getElementById('login-btn').addEventListener('click', function() {
            document.getElementById('register-section').classList.add('hidden');
            document.getElementById('login-section').classList.remove('hidden');
        });
    </script>
    <footer>
        <p>&copy; 2024 Мобильные устройства. Все права защищены.</p>
    </footer>
</body>

</html>