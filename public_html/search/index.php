<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetPageProperty('body_class', "search");
$APPLICATION->SetTitle('Поиск');
$APPLICATION->IncludeComponent(
	"bitrix:search.page", 
	".default", 
	array(
		"TAGS_SORT" => "NAME",
		"TAGS_PAGE_ELEMENTS" => "150",
		"TAGS_PERIOD" => "30",
		"TAGS_URL_SEARCH" => "/search/index.php",
		"TAGS_INHERIT" => "Y",
		"FONT_MAX" => "50",
		"FONT_MIN" => "10",
		"COLOR_NEW" => "000000",
		"COLOR_OLD" => "C8C8C8",
		"PERIOD_NEW_TAGS" => "",
		"SHOW_CHAIN" => "Y",
		"COLOR_TYPE" => "Y",
		"WIDTH" => "100%",
		"USE_SUGGEST" => "N",
		"SHOW_RATING" => "N",
		"PATH_TO_USER_PROFILE" => "",
		"AJAX_MODE" => "N",
		"RESTART" => "Y",
		"NO_WORD_LOGIC" => "N",
		"USE_LANGUAGE_GUESS" => "Y",
		"CHECK_DATES" => "N",
		"USE_TITLE_RANK" => "Y",
		"DEFAULT_SORT" => "rank",
		"FILTER_NAME" => "",
		"arrFILTER" => array(
			0 => "no",
		),
		"SHOW_WHERE" => "N",
		"arrWHERE" => "",
		"SHOW_WHEN" => "N",
		"PAGE_RESULT_COUNT" => "50",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Результаты поиска",
		"PAGER_SHOW_ALWAYS" => "Y",
		"PAGER_TEMPLATE" => ".default",
		"AJAX_OPTION_SHADOW" => "Y",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>