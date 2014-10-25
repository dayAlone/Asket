<?$this->setFrameMode(true);?>
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
           ?>
            <a href="<?=SITE_URL?><?=$item['SECTION_PAGE_URL']?>" class="catalog-sections__side-item <?=($_REQUEST['ELEMENT_CODE']==$item['CODE']?"catalog-sections__side-item__active":"")?>">
              <div class="catalog-sections__side-item_icon"><?=file_get_contents($_SERVER['DOCUMENT_ROOT'].CFile::GetPath($item['UF_SVG']))?></div>
              <div class="catalog-sections__side-item_text"><?=$item['NAME']?></div>
            </a>
           <?
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