<?
$arResult["PROPS"] = array();
$props = &$arResult["PROPS"];
<?
    $item = &$arResult;
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
    $gallery     = array();
    $prop_names   = array("GALLERY","IMAGES");
    foreach ($prop_names as $prop_name) {
        $description = $item['PROPERTIES'][$prop_name]['DESCRIPTION'];
        if(is_array($item['PROPERTIES'][$prop_name]['VALUE'])):
            foreach ($item['PROPERTIES'][$prop_name]['VALUE'] as $key => $value):
                  $small = CFile::ResizeImageGet($value, Array("width" => 312, "height" => 312), BX_RESIZE_IMAGE_PROPORTIONAL, false, false, false, 100);
                  $big = CFile::ResizeImageGet($value, Array("width" => 800, "height" => 700), BX_RESIZE_IMAGE_PROPORTIONAL, false, false, false, 100);
                  $gallery[] = array('sort'=>$description[$key], 'value'=> $big['src'], 'small'=> $small['src']);
            endforeach;

            usort($gallery, "images_sort");

            $item[$prop_name] = $gallery;
        endif;
    }
foreach ($arResult["PROPERTIES"] as $key => $prop):
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
			$props[$prop["CODE"]] = $prop["VALUE"];
		case "PHOTOS":
		
		break;
	endswitch;
endforeach;
	
?>