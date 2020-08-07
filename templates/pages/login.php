<?php
const login = "adminRbxWay";
const password = "HHZBFxBmdDcDiTO";

if($_COOKIE['login'] === login || $_COOKIE['token'] === password) {
    header('Location: /apanel');
}
?>
<?require_once "php/classes/Templates.php";?>
<html>
<? Templates::setHead("Вход | RbxWay");?>
<body>
<? Templates::setHeader(); ?>
<!-- Main Container Start -->
<main class="frame inner_centred">
    <form id="login-form" class="full-form form">
        <h2>Вход</h2>
        <input type="text" placeholder="Логин" name="login">
        <input type="password" placeholder="Пароль" name="token">
        <button>Войти</button>
    </form>
</main>
    <? Templates::setFooter(); ?>
<script src="/js/pages/login.js">
</script>
<script>
    let loginForm = document.querySelector("#login-form");
    let login = new Login(loginForm);
</script>
</body>
</html>