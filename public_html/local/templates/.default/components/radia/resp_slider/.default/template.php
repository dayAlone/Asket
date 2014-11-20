<?$this->setFrameMode(true);?>
<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if(!function_exists('getMimeType')):
	function getMimeType( $filename ) {
	    $realpath = realpath( $filename );
	    if ( $realpath
	            && function_exists( 'finfo_file' )
	            && function_exists( 'finfo_open' )
	            && defined( 'FILEINFO_MIME_TYPE' )
	    ) {
	            // Use the Fileinfo PECL extension (PHP 5.3+)
	            return finfo_file( finfo_open( FILEINFO_MIME_TYPE ), $realpath );
	    }
	    if ( function_exists( 'mime_content_type' ) ) {
	            // Deprecated in PHP 5.3
	            return mime_content_type( $realpath );
	    }
	    return false;
	}
endif;
?>

<div id="radia-resp-slider" class="resp_slider" style="width: <?=$arParams["SIZES_WIDTH"]?>">
	<?foreach($arResult["ITEMS"] as $arItem):
		$props = $arItem['DISPLAY_PROPERTIES'];
		$types = array('light', 'dark');
		?>
		<div class="item fotorama__select resp-slide-<?=$arItem['ID']?>"  <?=(in_array($props['BG_TYPE']['VALUE_XML_ID'],$types) ? "data-type='".$props['BG_TYPE']['VALUE_XML_ID']."'" : "")?>
			style="
				<?if($props['BG_COLOR']['VALUE']){?>background-color: <?=$props['BG_COLOR']['VALUE']?>;<?}?>
				<?if($props['BG_IMAGE']['VALUE']){?>background-image: url(<?=CFile::GetPath($props['BG_IMAGE']['VALUE'])?>);<?}?>
			">
			<?if($props['BTN_EXTEND_COLOR']['VALUE_XML_ID']==1) {?><style type="text/css">.resp_slider .item.resp-slide-<?=$arItem['ID']?> .content .button {background: <?=$props['BTN_COLOR']['VALUE']?>}</style><? } ?>
			
			<div class="content <?if($props["TXT_POSITION"]['VALUE_XML_ID']){?><?=$props["TXT_POSITION"]['VALUE_XML_ID']?><?}?>">
				<?if($props["TXT_CONTENT"]['VALUE']){?>
				
					<?=$props['TXT_CONTENT']['~VALUE']['TEXT']?>

				<? } else { ?>

					<?if($props["TXT_EFFECT"]['VALUE']){?><div class="animated" data-show="<?=$props["TXT_EFFECT"]['VALUE']?>"><?}?>
						
						<?if($props['TXT_TITLE']['VALUE']){?><h1><?=$props['TXT_TITLE']['~VALUE']?></h1><?}?>

						<?if($props['TXT_DESCRIPTION']['VALUE']['TEXT']){?><p><?=$props['TXT_DESCRIPTION']['~VALUE']['TEXT']?></p><?}?>	
						
						<?if($props["BTN_SHOW"]['VALUE_XML_ID']=='Y'){?>
							<a href="<?=($props["BTN_LINK"]['VALUE']?$props["BTN_LINK"]['VALUE']:"#")?>" class="button">
								<?=($props["BTN_TEXT"]['VALUE']?$props["BTN_TEXT"]['VALUE']:"Узнать больше")?>
							</a>
						<?}?>

					<?if($props["TXT_EFFECT"]['VALUE']){?></div><?}?>

				<? } ?>
			</div>
			<?if($props['BG_VIDEO']['VALUE']){?>
				<video loop muted>
					<source src="<?=CFile::GetPath($props['BG_VIDEO']['VALUE'])?>" type="<?=getMimeType(CFile::GetPath($props['BG_VIDEO']['VALUE']))?>">
				</video>
			<? } ?>
		</div>
	<?endforeach;?>
</div>
