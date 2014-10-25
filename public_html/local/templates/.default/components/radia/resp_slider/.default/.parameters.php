<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
CJSCore::Init( 'jquery' );
$arTemplateParameters = array(
 'MY_DATA' => array(
  'NAME' => '',
  'TYPE' => 'CUSTOM',
  // свой подключаемый скрипт
  'JS_FILE' => '/bitrix/components/radia/resp_slider/layout/js/form.js',
  // функция из подключенного скрипта JS_FILE, вызывается при отрисовке окна настроек
  'JS_EVENT' => 'OnMySettingsEdit',
  // доп. данные, передаются в функцию из JS_EVENT
  'JS_DATA' => json_encode(array('set' => GetMessage('MY_PARAM_SET'))),
  'DEFAULT' => null,
  'PARENT' => 'BASE',
 ),
);
?>
