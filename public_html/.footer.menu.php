<?
global $APPLICATION;
$aMenuLinks = $APPLICATION->IncludeComponent("bitrix:menu.sections","",Array(
        "IS_SEF" => "Y", 
        "SEF_BASE_URL" => "/catalog/", 
        "SECTION_PAGE_URL" => "#SECTION_CODE#/", 
        "DETAIL_PAGE_URL" => "#SECTION_CODE#/#ELEMENT_CODE#/", 
        "IBLOCK_TYPE" => "news", 
        "IBLOCK_ID" => "1", 
        "DEPTH_LEVEL" => "2", 
        "CACHE_TYPE" => "A", 
        "CACHE_TIME" => "3600" 
    )
);

$aMenuLinks[] = Array(
	"Аскет-Авто", 
	"/", 
	Array(), 
	Array(), 
	"" 
);
/*
global $APPLICATION;
$obMenu = $APPLICATION->GetMenu("top");
foreach ($obMenu->arMenu as $key => $value) {
	$aMenuLinks[] = Array(
			$value[0], 
			$value[1], 
			Array(), 
			Array("FROM_IBLOCK"=>true, "IS_PARENT"=>"0", "DEPTH_LEVEL"=>"2"),
			"" 
	);
}*/
?>