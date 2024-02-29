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
<style>
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
    </style>
<div class="delete-product-form">
    <h3>Удаление товара</h3>
    <form action="delete_product.php" method="post">
    <label for="product_id">Введите идентификатор товара:</label>
    <input type="text" id="product_id" name="product_id" required>
    <input type="submit" name="delete_product" value="Удалить продукт">
    </div>
</form>
<div class="product-list">
    <h3>Список продуктов</h3>
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="background-color: #f2f2f2;">
                <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">ID</th>
                <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Название</th>
                <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Описание</th>
                <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Цена</th>
                <!-- Дополнительные столбцы, если они есть -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr style="border: 1px solid #ddd;">
                    <td style="border: 1px solid #ddd; padding: 8px;"><?php echo $product['id']; ?></td>
                    <td style="border: 1px solid #ddd; padding: 8px;"><?php echo $product['name']; ?></td>
                    <td style="border: 1px solid #ddd; padding: 8px;"><?php echo $product['description']; ?></td>
                    <td style="border: 1px solid #ddd; padding: 8px;"><?php echo $product['price']; ?></td>
                    <!-- Дополнительные столбцы, если они есть -->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

    <div class="add-button">
    <a href="admin_panel.php">Назад</a>
    </div><br>