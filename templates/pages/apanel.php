<?php
const login = "adminRbxWay";
const password = "HHZBFxBmdDcDiTO";

if($_COOKIE['login'] !== login || $_COOKIE['token'] !== password) {
    header('Location: /');
}
?>

<?require_once "php/classes/Templates.php";?>
<html>
    <? Templates::setHead("Админ-Панель | RbxWay");?>
    <body>
        <? Templates::setHeader(); ?>
        <main class="frame inner_centred apanel">
            <div class="apanel__wrapper">
                <div class="apanel__block apanel__roblox-account">
                    <form class="form full-form apanel__roblox-account-form">
                        <h2>Введите данные от аккаунта Roblox</h2>
                        <input name="login" type="text" placeholder="Логин">
                        <input name="password" type="password" placeholder="Пароль">
                        <div class="line">
                            <button type="submit">Ок</button>
                        </div>
                    </form>
                </div>
                <div class="apanel__block apanel__groupId-block form">
                    <label for="groupId">Введите айди группы</label>
                    <div class="flex-container">
                        <input type="number" name="groupId" id="groupId">
                        <button>OK</button>
                    </div>
                </div>
                <div class="apanel__block apanel__course-block form">
                    <label for="groupId">Введите курс робаксов (Робаксы за рубль)</label>
                    <div class="flex-container">
                        <input type="number" name="course" id="course">
                        <button>OK</button>
                    </div>
                </div>
            </div>
        </main>
        <script src="/js/pages/apanel.js"></script>
        <script>
            let groupIdObject = {
                    input:document.querySelector(".apanel__groupId-block").querySelector("input"),
                    button:document.querySelector(".apanel__groupId-block").querySelector("button")
                }
            let courseObject = {
                input:document.querySelector(".apanel__course-block").querySelector("input"),
                button:document.querySelector(".apanel__course-block").querySelector("button")
                }
            let robloxAccForm = document.querySelector(".apanel__roblox-account-form");
            let apanel = new Apanel(groupIdObject,courseObject,robloxAccForm);
        </script>
        <? Templates::setFooter("admin-footer"); ?>
    </body>
</html>
