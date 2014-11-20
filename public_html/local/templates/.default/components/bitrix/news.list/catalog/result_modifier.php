<?
	foreach ($arResult['ITEMS'] as &$item):
		$item["PROPS"] = array();
		$props = &$item["PROPS"];
		$small = CFile::ResizeImageGet($item['PREVIEW_PICTURE'], Array("width" => 300, "height" => 300), BX_RESIZE_IMAGE_PROPORTIONAL, false, false, false, 80);
		$item['PREVIEW_PICTURE']['SRC'] = $small['src'];
		foreach ($item["PROPERTIES"] as $key => $prop):
			switch ($prop['CODE']):
				case "YEAR":
				case "ENGINE":
				case "CABINE":
				case "COMPLECT":
				case "BODY":
				case "MASS":
				case "PLACE":
				case "AVAILABILITY":
				case "STATUS":
				case "TYPE":
				case "TRANSMISSION":
				case "PRICE":
				case "PRICE_SALE":
				case "CHASSIS":
				case "DEPRECIATION":
					$props[$prop["CODE"]] = $prop["VALUE"];
				break;
				case "PRICE_ORDER":
					$props[$prop["CODE"]] = $prop["VALUE_XML_ID"];
				break;
			endswitch;
		endforeach;

	endforeach;
	if(isset($arParams['INDEX']))
	{
		$items = array();
		foreach ($arParams['INDEX'] as $id)
			foreach ($arResult['ITEMS'] as &$item)
				if($item['ID'] == $id)
					$items[] = $item;
				
		$arResult['ITEMS'] = $items;
	}
	
?>