
<?php
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

// Получение данных из формы
$email = $_POST['email'];
$userPassword = $_POST['password'];

// Получаем пользователя из базы данных
$stmt = $db->prepare('SELECT * FROM users WHERE email = :email');
$stmt->execute(['email' => $email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
if ($user && password_verify($userPassword, $user['password'])) {
    // Проверяем роль пользователя
    if ($user['role'] === 'admin') {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['email'];
        $_SESSION['role']=$user['admin'];
        header('Location: admin_panel.php');
        exit;
        
    } else {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['email'];
        // Перенаправление пользователя на личный кабинет
        header('Location: personal_account.php');
        exit;
    }
} else {
    // Пароль неверный или пользователь не найден
    // Выводим сообщение об ошибке  
    $_SESSION['message'] = "Неверный email или пароль";
    // Перенаправление на страницу входа
    header('Location: account.php');
    exit;
}

?>
