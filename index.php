<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link href="styles/site.css" rel="stylesheet">
    <script src="scripts/jquery.js"></script>
    <script src="scripts/site.js"></script>
    <title>Online Notes</title>
</head>
<body>
<header>
    <div id="headerInside">
        <div id="logo"></div>
        <div id="companyName">Online Notes</div>
        <div id="navWrap">
            <a href="#">
                +
            </a>
        </div>
    </div>
</header>

<div id="content">
    <?php
        define('host', 'localhost');
        define('user', 'root');
        define('password', 'nostroguardian');
        define('db', 'nostro');

        $connection = mysqli_connect(host, user, password, db) or die("Unable to connect with mysql");

        $query = "SELECT * FROM products";
        if($result = mysqli_query($connection, $query)){

            $rowsCount = mysqli_num_rows($result); // количество полученных строк
            echo "<p>Получено объектов: $rowsCount</p>";
            echo "<table><tr><th>ID</th><th>Название смартфона</th><th>Описание смартфона</th><th>Цена</th></tr>";
            foreach($result as $row){
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["product_name"] . "</td>";
                echo "<td>" . $row["product_desc"] . "</td>";
                echo "<td>" . $row["product_price"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            mysqli_free_result($result);
        } else{
            echo "Ошибка: " . mysqli_error($connection);
        }
        mysqli_close($connection);
    ?>
</div>

<!-- <footer>
    <div id="footerInside">

        <div id="contacts">
            <div class="contactWrap">
                <img src="images/envelope.svg" class="contactIcon">
                info@brandshop.ru
            </div>
            <div class="contactWrap">
                <img src="images/phone-call.svg" class="contactIcon">
                8 800 555 00 00
            </div>
            <div class="contactWrap">
                <img src="images/placeholder.svg" class="contactIcon">
                Москва, пр-т Ленина, д. 1 офис 304
            </div>
        </div>

        <div id="footerNav">
            <a href="#">Главная</a>
            <a href="#">Магазин</a>
        </div>

        <div id="social">
            <img class="socialItem" src="images/vk-social-logotype.svg">
            <img class="socialItem" src="images/google-plus-social-logotype.svg">
            <img class="socialItem" src="images/facebook-logo.svg">
        </div>

        <div id="copyrights">&copy; Brandshop</div>
    </div>
</footer> --!>

</body>
</html>