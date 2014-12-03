<?
	if(isset($_POST['SORT_BY1']))
		$_SESSION[$_REQUEST['ELEMENT_CODE'].'_SORT_BY1'] = $_POST['SORT_BY1'];
	if(isset($_POST['SORT_ORDER1']))
		$_SESSION[$_REQUEST['ELEMENT_CODE'].'_SORT_ORDER1'] = $_POST['SORT_ORDER1'];
	$obCache       = new CPHPCache();
	$cacheLifetime = 86400; 
	$cacheID       = 'catalog_'.$_REQUEST['ELEMENT_CODE']; 
	$cachePath     = '/'.$cacheID;

	if( $obCache->InitCache($cacheLifetime, $cacheID, $cachePath) ):

	   $vars = $obCache->GetVars();
	   $_GLOBALS['currentCatalogSection'] = $vars['current'];
	   $_GLOBALS['currentCatalogInnerSection'] = $vars['inner'];

	elseif( $obCache->StartDataCache() ):

		CModule::IncludeModule("iblock");
		
		$Sections   = array();
		$arSort     = array("DEPTH_LEVEL" => "ASC");
		$arFilter   = array("IBLOCK_ID" => 1);
		$rsSections = CIBlockSection::GetList($arSort, $arFilter, false, array('UF_PHONE', 'UF_TITLE'));
		
		while ($s = $rsSections->Fetch()) {
			if($s['DEPTH_LEVEL']==1)
				$Sections[] = $s['ID'];
			if(strlen($_REQUEST['ELEMENT_CODE'])>0):
				if($s['CODE']==$_REQUEST['ELEMENT_CODE']) {
					if($s['DEPTH_LEVEL']==1) {
						$Current = $s['ID'];
					}
					elseif($s['DEPTH_LEVEL']==2) {
						$Current = $s['IBLOCK_SECTION_ID'];
						$arFilter = Array(
					        "IBLOCK_ID"  => 1,
					        "SECTION_ID" => $s["ID"]
					    );
						$counter = CIBlockSection::GetCount($arFilter);
						if($counter>0):
							$Inner = $s['ID'];
						else:
					    	$Inner = array(
								'ID'   => $s['ID'],
								'NAME' => $s['NAME'],
								'PHONE' => $s['UF_PHONE']
							);
						endif;
					}
					else {
						$raw = CIBlockSection::GetByID($s['IBLOCK_SECTION_ID']);
						$parent = $raw->Fetch();
						$Current = $parent['IBLOCK_SECTION_ID'];
						$Inner = array(
							'ID'   => $s['ID'],
							'NAME' => ($s['UF_TITLE']?$s['UF_TITLE']:$s['NAME']),
							'PHONE' => $s['UF_PHONE']
						);
					}
				}	
			endif;
		}

		if(strlen($_REQUEST['ELEMENT_CODE'])==0)
			$Current = $Sections[0];

		$_GLOBALS['currentCatalogSection'] = $Current;
		$_GLOBALS['currentCatalogInnerSection'] = $Inner;
		
		$obCache->EndDataCache(array('current' => $Current, 'inner'=> $_GLOBALS['currentCatalogInnerSection']));
	endif;
?>