
 <script src="../js/dictionary.js">
 </script>
<link rel="stylesheet" href="../css/dictionary.css">
<title>Словарь</title>
<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Преподаватель</a></li>
    <li><a href="#tabs-2">Предмет</a></li>
    <li><a href="#tabs-3">Группа</a></li>
  </ul>

  <div id="tabs-1">
    <table>
        <tr>
          <td id ="selectableTd1">
            <ol id="selectable1">
              
            </ol>
          </td>
          
          <td class ="but1">
            <a href="#" class="button cross" id = "buttonDelete1"></a>
          </td>
        </tr>
    </table>

    <div id="dialog-confirm1" title="Удалить выбранных преподавателей?">
      <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;visibility: hidden; "></span>Эти преподаватели и их пожелания будут удалены 
      без возможности возвращения, вы уверены?</p>
    </div>

    
  </div>
  <div id="tabs-2">
    <table>
        <tr>
          <td id ="selectableTd2">
            <ol id="selectable2">
              
            </ol>
          </td>
          <td class ="but1">
            <a href="#" class="button  plus" id = "buttonPlus2"></a>
          </td>
          <td class ="but1">
            <a href="#" class="button cross" id = "buttonDelete2"></a>
          </td>
        </tr>
    </table>

    <div id="dialog-confirm2" title="Удалить выбранные предметы?">
      <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;visibility: hidden; "></span>Эти предметы будут удалены 
      без возможности возвращения, вы уверены?</p>
    </div>
    <div id="dialog-form2" title="Добавить предмет">
          <p class="validateTips">Введите название предмета.</p>
         
          <form>
            <fieldset>
              <label for="name">Название</label>
              <input type="text" name="name" id="name1" value="Матанализ" class="text ui-widget-content ui-corner-all">
              
              
         
              <!-- Allow form submission with keyboard without duplicating the dialog button -->
              <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
            </fieldset>
          </form>
    </div>

  </div>
  <div id="tabs-3">
 <table>
        <tr>
          <td id ="selectableTd3">
            <ol id="selectable3">
              
            </ol>
          </td>
          <td class ="but1">
            <a href="#" class="button  plus" id = "buttonPlus3"></a>
          </td>
          <td class ="but1">
            <a href="#" class="button cross" id = "buttonDelete3"></a>
          </td>
        </tr>
    </table>

    <div id="dialog-confirm3" title="Удалить выбранные группы?">
      <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;visibility: hidden; "></span>Эти группы будут удалены 
      без возможности возвращения, вы уверены?</p>
    </div>
    <div id="dialog-form3" title="Добавить новую группу?">
          <p class="validateTips">Введите название группы.</p>
         
          <form>
            <fieldset>
              <label for="name">Название</label>
              <input type="text" name="name" id="name2" value="41kpm" class="text ui-widget-content ui-corner-all">
              
         
              <!-- Allow form submission with keyboard without duplicating the dialog button -->
              <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
            </fieldset>
          </form>
    </div>

  </div>
</div>