<?php
// Подключение к базе данных
$db = new PDO('mysql:host=localhost;dbname=shop', 'root', '');

// Начало сессии
session_start();
if (isset($_SESSION['message'])) {
    // Вывод сообщения с помощью JavaScript и обработка нажатия кнопки "ОК"
    echo '<script>
        var message = "' . htmlspecialchars($_SESSION['message'], ENT_QUOTES, 'UTF-8') . '";
        alert(message);
        // Обработка нажатия кнопки "ОК"
        window.location.href = "account.php";
    </script>';
    // Удаление сообщения из сессии после его отображения
    unset($_SESSION['message']);
}

// Проверка роли пользователя и создание сессии для администратора
if ($existingUser && $existingUser['role'] === 'admin') {
    // Создание сессии для администратора
    $_SESSION['admin'] = $existingUser['id']; // Идентификатор администратора
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Проверяем наличие всех обязательных полей
    if (!isset($_POST['email'], $_POST['password'], $_POST['username'], $_POST['lastname'])) {
        $_SESSION['message'] = "Необходимо заполнить все поля.";
        header('Location: ' . $_SERVER['PHP_SELF'] . '?redirect=true');
        exit;
    }

    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $username = htmlspecialchars($_POST['username']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Хеширование пароля

    if ($email === false) {
        $_SESSION['message'] = "Некорректный формат email.";
        header('Location: ' . $_SERVER['PHP_SELF'] . '?redirect=true');
        exit;
    }

    // Проверка на существующего пользователя
    $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($existingUser) {
        // Установка сообщения в сессию
        $_SESSION['message'] = "Пользователь с такой почтой уже существует.";
    } else {
        // Добавление нового пользователя
        $role = $_POST['role']; // Получаем роль из формы
        if (isset($_POST['role'])) {
            $role = $_POST['role']; // Получаем роль из формы
        } else {
            $role = ''; // Установка значения по умолчанию, если роль не передана
        }
        

        $stmt = $db->prepare('INSERT INTO users (username, email, password, role) VALUES (:username, :email, :password, :role)');
        $stmt->execute(['username' => $username, 'email' => $email, 'password' => $password, 'role' => $role]);

        // Установка сообщения в сессию
        $_SESSION['message'] = "Регистрация успешно завершена!😎";
    }

    // Перенаправление на страницу скрипта, который будет обрабатывать перенаправление после закрытия alert
    header('Location: ' . $_SERVER['PHP_SELF'] . '?redirect=true');
    exit;
}

// Проверка наличия сообщения в сессии
if (isset($_SESSION['message'])) {
    // Вывод сообщения с помощью JavaScript и обработка нажатия кнопки "ОК"
    echo '<script>
        var message = "' . htmlspecialchars($_SESSION['message'], ENT_QUOTES, 'UTF-8') . '";
        alert(message);
        // Обработка нажатия кнопки "ОК"
        window.location.href = "account.php";
    </script>';
    // Удаление сообщения из сессии после его отображения
    unset($_SESSION['message']);
}
?>
