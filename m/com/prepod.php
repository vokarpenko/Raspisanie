<title>Меню преподавателя</title>
<script  src="/m/js/menuPrepod.js"></script>
<script src="/m/js/jquery.maskedinput.min.js"></script>
<script src="/m/js/inPhone.js"></script>
<script src="/m/js/submitWish.js"></script>
<script src="/m/js/serboxPrepod.js"></script>
<link rel="stylesheet" type="text/css" href="/m/css/prepod.css">	
<div class="tabs_box">
        <ul class="tabs_menu">
            <li><a href="#tab1" class="active">Расписание</a></li>
            <li><a href="#tab2">Пожелания</a></li>
        </ul>
        <div class="tab" id="tab1">
            <p>Контент первой вкладки...</p>
        </div>
        <div class="tab" id="tab2">
            <form method="POST" id="formx" action="javascript:void(null);" onsubmit="call()">
                <div class="row">
                      <label for="exampleEmailInput">ФИО</label>
                      <input class="u-full-width" type="text" placeholder="Иванов Иван Иванович" name="nam_prepod"></input> 
                </div>

                <div class="row">
                      <label for="exampleEmailInput">Кафедра</label>
                      <input class="u-full-width" type="text" list="results1" id="nam_kafedra" placeholder="Кафедра математического моделирования" name="nam_kafedra" />
                      <datalist id="results1"></datalist>
                      <!-- <input class="u-full-width" type="text" placeholder="Кафедра математического моделирования" name="nam_kafedra"></input>  -->
                </div>
                <div class="row">
                    <label for="exampleMessage">Пожелание</label>
                    <textarea class="u-full-width" placeholder="Прошу не ставить первую пару..." name="exampleMessage"></textarea>
                </div>
                <div class="row">
                    <label for="">Ваш номер телефона</label>
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="+7 (999) 999 99 99"></input> 
                </div>
                <div class="row">
                    <input class="button-primary" type="submit" value="Отправить"></input> 
                </div>
            </form>
        <div id="results">вывод</div>
        </div>
</div>