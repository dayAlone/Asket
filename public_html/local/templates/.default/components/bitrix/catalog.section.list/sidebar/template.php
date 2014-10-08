<div class="catalog-sections__side">
    <?
    $s = 0;
    foreach ($arResult['SECTIONS'] as $key => $item):?>
      <?
        switch ($item['DEPTH_LEVEL']):
          case '1':?>
                <a href="<?=SITE_URL?><?=$item['SECTION_PAGE_URL']?>" class="catalog-sections__side-title"><?=$item['NAME']?></a>
            <?
            break;
          case '2':
           ?>
            <a href="<?=SITE_URL?><?=$item['SECTION_PAGE_URL']?>" class="catalog-sections__side-item">
              <div class="catalog-sections__side-item_icon"><?=file_get_contents($_SERVER['DOCUMENT_ROOT'].CFile::GetPath($item['UF_SVG']))?></div>
              <div class="catalog-sections__side-item_text"><?=$item['NAME']?></div>
            </a>
           <?
          break;
        endswitch;
      ?>
    <?endforeach;?>
</div>