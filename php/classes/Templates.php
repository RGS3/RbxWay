<?php
    class Templates{
        public static function setHead(string $title="Welcome to RbxWay")
        {?>
            <head>
                <meta charset="UTF-8">
                <meta name="viewport"
                      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <title><? echo $title ?></title>
                <link rel="stylesheet" href="/styles/css/style.css">
                <link href="https://fonts.googleapis.com/css?family=Farro:500|Montserrat&display=swap&subset=cyrillic" rel="stylesheet">
                <script src="/js/async.js"></script>
                <script src="/js/main.js"></script>
                <meta name="keywords" content="Купить дешевые робуксы робаксы robux rbxway rbxway.ru">
                <meta name="description" content="Купить дешевые робаксы (робуксы) можно у нас на сайте rbxway.ru !">
                <link rel="shortcut icon" href="/media/images/tmp.svg" type="image/png">
            </head>
        <?}
        public static function setHeader(string $name="header")
        {
            include "./templates/headers/".$name.".php";
        }
        public static function setFooter(string $name="footer")
        {
            include "./templates/footers/".$name.".php";
        }
    }
?>