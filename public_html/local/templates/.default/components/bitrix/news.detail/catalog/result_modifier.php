<?
$arResult["PROPS"] = array();
$props = &$arResult["PROPS"];
function images_sort($a, $b)
{
    if($a['sort']=='' && $b['sort']>0) 
        return 1;

    if($b['sort']=='' && $a['sort']>0) 
        return -1;

    if($a['sort']=='' && $b['sort']=='')
        return ($a['value'] < $b['value']) ? -1 : 1;

    if ($a['sort'] == $b['sort'])
        return 0;

    return ($a['sort'] < $b['sort']) ? -1 : 1;
}
foreach ($arResult["PROPERTIES"] as $key => $prop):
	switch ($prop['CODE']):
		case "YEAR":
		case "PLACE":
		case "AVAILABILITY":
		case "STATUS":
		case "TYPE":
		case "PRICE":
		case "PRICE_SALE":
		case "WORK":
			if(strlen($prop["VALUE"])>0)
				$props[$prop["CODE"]] = $prop["VALUE"];
		break;
		case "PROTECTOR":
			if(count($prop["VALUE"])>0)
					if(strlen($prop["VALUE"][0]['i1'])>0)
						$props[$prop["CODE"]] = $prop["VALUE"];
		break;
		case "BODY":
		case "MASS":
		case "ENGINE":
		case "TRANSMISSION":
		case "CHASSIS":
		case "CABINE":
			if(count($prop["VALUE"])>0)
				if(strlen($prop["VALUE"][0]['property_name'])>0)
					$props[$prop["CODE"]] = $prop["VALUE"];
		break;
		case "DEPRECIATION":
		case "COMPLECT":
			$props[$prop["CODE"]] = html_entity_decode($prop["VALUE"]['TEXT']);
		break;	
		case "PRICE_ORDER":
			$props[$prop["CODE"]] = $prop["VALUE_XML_ID"];
		break;
		case "PHOTOS":
			$gallery     = array();
			$description = $prop['DESCRIPTION'];
	        if(is_array($prop['VALUE'])):
	            foreach ($prop['VALUE'] as $key => $value):
	                  $small = CFile::ResizeImageGet($value, Array("width" => 312, "height" => 312), BX_RESIZE_IMAGE_PROPORTIONAL, false, false, false, 100);
	                  $big = CFile::ResizeImageGet($value, Array("width" => 800, "height" => 700), BX_RESIZE_IMAGE_PROPORTIONAL, false, false, false, 100);
	                  $gallery[] = array('sort'=>$description[$key], 'value'=> $big['src'], 'small'=> $small['src']);
	            endforeach;
	            usort($gallery, "images_sort");
	            $props[$prop["CODE"]] = $gallery;
	        endif;
		break;	
	endswitch;
endforeach;
?>