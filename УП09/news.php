<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bapst - Новости</title>
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
            max-width:600px;
            margin: 0 auto;
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
            width: 250px;
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

        h4{
            margin: 0;
            margin-bottom: 5px;
        }

        .news-container{
            width: 100%;
            height: 100%;
            width: 250px;
            min-height: 250px;
        }
        .site-title-link {
    color: white; 
    text-decoration: none; 
}

.site-title-link:hover {
    text-decoration: underline;
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
    <h1>Новости</h1>
    <div class="event-container">
        <div class="event-card">
            <a class="news-container" href="news1.php">
                <img class="img" src="png/phone1.png" alt="Event 1">
                <h4>7 февраля 2024</h4>
                <p>Популярность версий<br> iOS и iPadOS:<br> данные на начало<br> 2024 года</p>
            </a>
        </div>
        <div class="event-card">
            <a href="news2.php">
                <img src="png/phone2.png" alt="Event 2">
                <h4>1 февраля 2024</h4>
                <p>Победители премии <br>«Лучший гаджет 2023»:<br> iPhone 15 Pro Max <br>  Apple AirPods Pro 2</p>
            </a>
        </div>
        <div class="event-card">
            <a href="news3.php">
                <img src="png/news5.png" alt="Event 2">
                <h4>16 февраля 2024</h4>
                <p>Гарнитура Apple Vision Pro<br> в марте может получить русский<br> язык Об этом сообщает "BAPST".</p>
            </a>
        </div>
        <div class="event-card">
            <a href="news4.php">
                <img src="png/phone5.png" alt="Event 2">
                <h4>15 февраля 2024</h4>
                <p>Apple создала ИИ для превращения <br>изображений в видео Об этом сообщает <br>"BAPST".</p>
            </a>
        </div>
    </div>
    </main>

    <footer>
        <p>&copy; 2024 Мобильные устройства. Все права защищены.</p>
    </footer>
</body>
</html>