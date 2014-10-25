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
      <div class="col-md-3 col-xs-3"><?=COption::GetOptionString("grain.customsettings","footer_seo")?>
      <div id="bx-composite-banner"></div>
      </div>
    </div>
  </div>
</footer>
<div id="callBack" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <a data-dismiss="modal" href="#" class="close"><img src="/layout/images/close.jpg" alt=""></a>
      <div class="success">
        <h3 class="center">Ваше сообщение успешно отправлено. </h3>
        <p class="center">В ближайшее время представители нашей компании свяжутся с вами.<br> Благодарим за обращение.</p>
      </div>
      <form class="form"  data-parsley-validate>
        <h3>Заявка на обратный звонок</h3>
        <input type="hidden" name="group_id" value="5">
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
            <input type="text" name="phone" required data-parsley-pattern="/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}/" data-parsley-trigger="change">
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            <label>Эл. почта</label>
          </div>
          <div class="col-md-9">
            <input type="email" name="email" data-parsley-trigger="change">
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
              <?
                include_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/classes/general/captcha.php");
                $cpt = new CCaptcha();
                $cpt->SetCodeLength(4);
                $cpt->SetCode();
                $code=$cpt->GetSID();
              ?>
              <input type="hidden" name="captcha_code" value="<?=$code?>">
              <div class="col-md-5"><img src="/include/captcha.php?captcha_sid=<?=$code?>" class="captcha"></div>
              <div class="col-md-2"><a href="#" class="refresh"><img src="/layout/images/refresh.png"></a></div>
              <div class="col-md-1"><span class="here">сюда</span></div>
              <div class="col-md-4">
                <input name="captcha_word" type="text" required>
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
      <a data-dismiss="modal" href="#" class="close"><img src="/layout/images/close.jpg" alt=""></a>
      <div class="success">
        <h3 class="center">Ваш вопрос успешно отправлен. </h3>
        <p class="center">В ближайшее время мы постараемся на него ответить. <br>Благодарим за обращение.</p>
      </div>
      <form class="form"  data-parsley-validate>
        <h3>Задайте свой вопрос о технике</h3>
        <input type="hidden" name="group_id" value="6">
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
            <input type="text" name="phone" required data-parsley-pattern="/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}/" data-parsley-trigger="change">
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            <label>Эл. почта</label>
          </div>
          <div class="col-md-9">
            <input type="email" name="email" data-parsley-trigger="change">
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
              <?
                include_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/classes/general/captcha.php");
                $cpt = new CCaptcha();
                $cpt->SetCodeLength(4);
                $cpt->SetCode();
                $code=$cpt->GetSID();
              ?>
              <input type="hidden" name="captcha_code" value="<?=$code?>">
              <div class="col-md-5"><img src="/include/captcha.php?captcha_sid=<?=$code?>" class="captcha"></div>
              <div class="col-md-2"><a href="#" class="refresh"><img src="/layout/images/refresh.png"></a></div>
              <div class="col-md-1"><span class="here">сюда</span></div>
              <div class="col-md-4">
                <input name="captcha_word" type="text" required>
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