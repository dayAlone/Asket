</div>
<?php
  $APPLICATION->IncludeComponent("bitrix:menu", "footer", array(
  "ROOT_MENU_TYPE"     => "footer",
  "MENU_CACHE_TYPE"    => "A",
  "MENU_CACHE_TIME"    => "3600",
  "MAX_LEVEL"          => "2",
  "CHILD_MENU_TYPE"    => "top",
  "USE_EXT"            => "Y",
  "DELAY"              => "N",
  "ALLOW_MULTI_SELECT" => "Y"
	),
	false
);
?>
<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-xs-3">© 1993—<?=date("Y")?> ООО Аскет Авто» <br> Все права защищены</div>
      <div class="col-md-5 col-xs-5"><?=COption::GetOptionString("grain.customsettings","footer_contacts")?></div>
      <div class="col-md-3 col-xs-3"><?=COption::GetOptionString("grain.customsettings","footer_seo")?> </div>
    </div>
  </div>
</footer>
<div id="callBack" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <h3>Заявка на обратный звонок</h3>
      <form>
        <div class="row">
          <div class="col-md-3">
            <label>Контактное лицо *</label>
          </div>
          <div class="col-md-9">
            <input type="text" name="name" required>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            <label>Телефон *</label>
          </div>
          <div class="col-md-9">
            <input type="text" name="phone" required>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            <label>Эл. почта</label>
          </div>
          <div class="col-md-9">
            <input type="email" name="email">
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            <label><span>Сообщение</span></label>
          </div>
          <div class="col-md-9">
            <textarea name="message"></textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3"><small>Поля, отмеченные * - обязательны<br> для заполнения.</small></div>
          <div class="col-md-9">
            <p>Введите код с картинки</p>
            <div class="row">
              <div class="col-md-5"><img src="/layout/images/captcha.png" class="captcha"></div>
              <div class="col-md-2"><a href="#" class="refresh"><img src="/layout/images/refresh.png"></a></div>
              <div class="col-md-1"><span class="here">сюда</span></div>
              <div class="col-md-4">
                <input name="captcha" type="text">
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-offset-3 col-md-8">
            <input type="submit" value="Отправить">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<div id="sendFaq" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <h3>Задайте свой вопрос о технике</h3>
      <form>
        <div class="row">
          <div class="col-md-3">
            <label>Контактное лицо *</label>
          </div>
          <div class="col-md-9">
            <input type="text" name="name" required>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            <label>Телефон</label>
          </div>
          <div class="col-md-9">
            <input type="text" name="phone">
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            <label>Эл. почта *</label>
          </div>
          <div class="col-md-9">
            <input type="email" name="email" required>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            <label><span>Сообщение</span></label>
          </div>
          <div class="col-md-9">
            <textarea name="message" required></textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3"><small>Поля, отмеченные * - обязательны<br> для заполнения.</small></div>
          <div class="col-md-9">
            <p>Введите код с картинки</p>
            <div class="row">
              <div class="col-md-5"><img src="/layout/images/captcha.png" class="captcha"></div>
              <div class="col-md-2"><a href="#" class="refresh"><img src="/layout/images/refresh.png"></a></div>
              <div class="col-md-1"><span class="here">сюда</span></div>
              <div class="col-md-4">
                <input name="captcha" type="text">
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-offset-3 col-md-8">
            <input type="submit" value="Отправить">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="bg-fade"></div>
</body>
</html>