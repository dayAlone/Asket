<?
	foreach ($arResult['ITEMS'] as &$item):
		$item["PROPS"] = array();
		$props = &$item["PROPS"];
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
	
?>