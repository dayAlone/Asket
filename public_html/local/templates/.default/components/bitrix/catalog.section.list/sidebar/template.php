<?$this->setFrameMode(true);
foreach ($arResult['SECTIONS'] as $key => $item):
  if($_REQUEST['ELEMENT_CODE']==$item['CODE']):
    $parent = $item['IBLOCK_SECTION_ID'];
  endif;
endforeach;?>
<div class="catalog-sections__side">
    <?
    $s = 0;
    foreach ($arResult['SECTIONS'] as $key => $item):?>
      <?
        if($_REQUEST['ELEMENT_CODE']==$item['CODE'])
          $text = $item['~DESCRIPTION'];
        switch ($item['DEPTH_LEVEL']):
          case '1':?>
                <a href="<?=SITE_URL?><?=$item['SECTION_PAGE_URL']?>" class="catalog-sections__side-title"><?=$item['NAME']?></a>
            <?
            break;
          case '2':
            if(($_REQUEST['ELEMENT_CODE']==$item['CODE']||$parent==$item['ID'])&&$arResult['SECTIONS'][$key+1]['DEPTH_LEVEL']>$item['DEPTH_LEVEL']):
              $parent = $item['ID'];
            ?>
              <div class="catalog-sections__side-item catalog-sections__side-item__active catalog-sections__side-item__height?>">
                <a href="<?=SITE_URL?><?=$item['SECTION_PAGE_URL']?>">
                  <div class="catalog-sections__side-item_icon">
                    <?if($item['UF_ICON']):?>
                      <img src="<?=CFile::GetPath($item['UF_ICON'])?>" alt="" class="first">
                      <img src="<?=CFile::GetPath($item['UF_ICON_HOVER'])?>" alt="" class="last">
                    <?else:?>
                    <?=file_get_contents($_SERVER['DOCUMENT_ROOT'].CFile::GetPath($item['UF_SVG']))?>
                    <?endif;?>
                  </div>
                <div class="catalog-sections__side-item_text"><?=$item['NAME']?></div></a>
                <ul>
            <?else:
           ?>
            <a href="<?=SITE_URL?><?=$item['SECTION_PAGE_URL']?>" class="catalog-sections__side-item <?=($_REQUEST['ELEMENT_CODE']==$item['CODE']?"catalog-sections__side-item__active":"")?>">
              <div class="catalog-sections__side-item_icon">
                <?if($item['UF_ICON']):?>
                  <img src="<?=CFile::GetPath($item['UF_ICON'])?>" alt="" class="first">
                  <img src="<?=CFile::GetPath($item['UF_ICON_HOVER'])?>" alt="" class="last">
                <?else:?>
                <?=file_get_contents($_SERVER['DOCUMENT_ROOT'].CFile::GetPath($item['UF_SVG']))?>
                <?endif;?>
              </div>
              <div class="catalog-sections__side-item_text"><?=$item['NAME']?></div>
            </a>
           <?
           endif;
          break;
          case '3':
            if($item['IBLOCK_SECTION_ID']==$parent):
             ?>
              <li><span>—</span> <a href="<?=SITE_URL?><?=$item['SECTION_PAGE_URL']?>" class="<?=($_REQUEST['ELEMENT_CODE']==$item['CODE']?"active":"")?>">
                <div class="catalog-sections__side-item_text"><?=$item['NAME']?></div>
              </a></li>
             <?
            if($arResult['SECTIONS'][$key+1]['DEPTH_LEVEL']<$item['DEPTH_LEVEL']) echo "</ul></div>";
           endif;
          break;
        endswitch;
      ?>
    <?
    endforeach;
    if(strlen($text)==0):
      $res = CIBlockSection::GetByID($arParams['SECTION_ID']);
      if($ar_res = $res->GetNext())
        $text = $ar_res['~DESCRIPTION'];
    endif;
    ?>
</div>
<?
$this->SetViewTarget('sidebar');
echo $text;
$this->EndViewTarget();
?> 