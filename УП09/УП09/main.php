
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bapst - Мобильные устройства</title>
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
            padding: 10px 20px;
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
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .container-map{
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            border-top: 1px solid #000;
        }
        .product-item {
            margin-bottom: 20px;
        }
        .product-item img {
            max-width: 100%;
            height: auto;
        }
        .product-item h3 {
            margin-top: 0;
            color: #333;
        }
        .product-item p {
            margin: 5px 0;
            color: #666;
        }
        .product-item strong {
            color: #000;
        }
        .product-item button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 7px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
        }
        .product-item button:hover {
            background-color: #0056b3;
        }
        .iframe-container {
            display: flex;
            justify-content: center;
            align-items: center;
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
   



    <main class="container">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="png/slider.png" class="d-block w-100" alt="Телефон 1">
                </div>
                <div class="carousel-item">
                    <img src="png/phone1.png" class="d-block w-100" alt="Телефон 2">
                </div>
                <div class="carousel-item">
                    <img src="png/phone2.png" class="d-block w-100" alt="Телефон 3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        
        <main class="container">
            
        <h1 class="text-center my-5">Мобильная техника</h1>
        <?php
// Подключаем файл db.php
require_once 'db.php';

// Выполняем запрос к базе данных для получения данных о товарах
$stmt = $pdo->query('SELECT * FROM products');

// Отображаем товары на странице
$count = 0;
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    // Если счетчик равен 0, начинаем новый ряд
    if ($count == 0) {
        echo '<div class="row">';
    }

    echo '<div class="col-md-3 mb-4">';
    echo '<div class="product-item">';
    echo '<img src="' . $row['image'] . '" alt="' . $row['name'] . '">';
    echo '<h3>' . $row['name'] . '</h3>';
    echo '<p>' . $row['description'] . '</p>';
    echo '<strong>Цена: ' . $row['price'] . ' руб.</strong>';
    echo '<form action="add_to_cart.php" method="post">';
    echo '<input type="hidden" name="product_id" value="' . $row['id'] . '">';
    echo '<button type="submit" class="btn btn-primary" name="add_to_cart">В корзину</button>';
    echo '<a href="peper.php?id=' . $row['id'] . '" class="btn btn-primary">О товаре</a>';
    echo '</form>';
    echo '</div>';
    echo '</div>';
    

    //счетчик
    $count++;

    //Если счетчик равен 4, закрываем текущий ряд и сбрасываем счетчик
    if ($count == 4) {
        echo '</div>';
        $count = 0;
    }
}

//Если счетчик не равен 0, закрываем последний ряд
if ($count != 0) {
    echo '</div>';
}
?>





        <div class="container-map">
             <br>   <h3 align="center">Мы находимся здесь</h3>
             <div class="iframe-container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2286.795154658112!2d36.38877557729758!3d55.029282272825014!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46cad57996c3522f%3A0x6d3aaaef8db6fa8!2z0JLQviDQn9GD0YjQutC40L3QsCDQtNC-0Lwg0LrQvtC70L7RgtGD0YjQutC40L3QsA!5e0!3m2!1sru!2sru!4v1708070851128!5m2!1sru!2sru" width="11000" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
        </div>
    </main>
     
    <footer>
        <p>&copy; 2024 Мобильные устройства. Все права защищены.</p>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>