<?php require_once "./php/classes/Templates.php"; ?>
<!doctype html>
<html lang="ru">
<? Templates::setHead("Добро пожаловать | RbxWay"); ?>
<body>
    <? Templates::setHeader(); ?>
    <div id="main_slider" class="large_slider">
        <div class="slides_wrapper">
            <div class="slide" style="background-image: url('/media/images/main slide.png')"></div>
            <div class="slide" style="background-image: url('/media/images/giveaway.png')"></div>
        </div>
        <div class="slide_nav">
        </div>
    </div>
    <div class="frame inner_centred">
        <div class="main_pay_from">
            <div class="float_image"></div>
            <form class="column form large">
                <p style="align-self: start;margin-left: 25px"><b>1)</b> Вступите в <a class="form__link" target="_blank" href="https://www.roblox.com/groups/">группу</a></p>
                <p style="align-self: start;margin-left: 25px"><b>2)</b> Заполните форму</p>
                <input autocomplete="off" name="name" type="text" id="form_name" placeholder="Ваш игровой ник">
                <div class="flex-container" style="width: 85%">
                    <div class="value">
                        <label for="form_count">Робаксы</label>
                        <input value="0" autocomplete="off" name="summ" type="number" id="form_count">
                    </div>
                    <div class="value">
                        <label for="form_rubles">Рубли</label>
                        <input value="0" autocomplete="off" name="rubles" type="number" id="form_rubles">
                    </div>

                </div>
                <button disabled id="pay_button" class="unselected">Заполните поля выше</button>
                <hr>
                <div style="align-items: flex-start;text-align: start;width: 100%;margin-left: 50px">
                    <p style="margin: 0"><b>Курс: </b><span id="course">1Р =  R</span></p>
                    <p style="margin: 0;"><b>Доступно: </b><span id="r_available">0 R</span></p>
                </div>
                <div id="error_wrapper">

                </div>
            </form>
        </div>
    </div>
    <? Templates::setFooter()?>
    <script src="/js/pages/index.js"></script>
    <script>
        main_slider = new slider(document.getElementById("main_slider"),
            ["images/main slide.png","images/giveaway.png"],
            5000
        );
        let form = document.querySelector(".main_pay_from").querySelector(".form");
        let robuxAviable = form.querySelector("#r_available");
        let groupLink = form.querySelector(".form__link");
        let robuxCourseText = form.querySelector("#course");
        let robuxText = form.querySelector("#form_count");
        let rublesText = form.querySelector("#form_rubles");
        let payBtn = form.querySelector("#pay_button");
        let mainForm = new MainForm(form,robuxAviable,groupLink,robuxCourseText,robuxText,rublesText,payBtn);
    </script>
</body>
</html>
