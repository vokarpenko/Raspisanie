<title>Меню преподавателя</title>
<script  src="/m/js/menuPrepod.js"></script>
<script src="/m/js/jquery.maskedinput.min.js"></script>
<script src="/m/js/inPhone.js"></script>
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
        <form>
          <div class="row">
              <label for="exampleEmailInput">ФИО</label>
              <input class="u-full-width" type="text" placeholder="Иванов Иван Иванович" id="nam_prepod"></input> 
          </div>

          <div class="row">
              <label for="exampleEmailInput">Кафедра</label>
              <input class="u-full-width" type="text" placeholder="Кафедра математического моделирования" id="nam_kafedra"></input> 
          </div>
          <div class="row">
            <label for="exampleMessage">Пожелание</label>
            <textarea class="u-full-width" placeholder="Прошу не ставить первую пару..." id="exampleMessage"></textarea>
        </div>
        <div class="row">
            <label for="">Ваш номер телефона</label>
            <input type="tel" class="form-control" id="phone" name="phone" placeholder="+7 (999) 999 99 99">
        </div>
        <div class="row">
        <input class="button-primary" type="submit" value="Отправить">
         </div>
    </form>
    <br>
</div>
</div>