<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

global $APPLICATION;
if($arParams["ENABLE_JQUERY"]=="Y")
	CJSCore::Init( 'jquery' );
$APPLICATION->AddHeadScript("/bitrix/components/radia/resp_slider/layout/js/sources.js");
$APPLICATION->AddHeadScript("/bitrix/components/radia/resp_slider/layout/js/slider.js");
$APPLICATION->SetAdditionalCSS("/bitrix/components/radia/resp_slider/layout/css/sources.css");
$APPLICATION->SetAdditionalCSS("/bitrix/components/radia/resp_slider/layout/css/slider.css");
?>
<style type="text/css">


	<? if($arParams["DARK_COLOR"]) {?>
	.resp_slider .item .content, .resp_slider.background--dark .preview .text {
		color: <?=$arParams["DARK_COLOR"]?>;
	}
	.resp_slider .nav i:after, .resp_slider.background--light .nav i:after {
		border-color: <?=$arParams["DARK_COLOR"]?>;
	}
	.resp_slider .nav i.active:after, .resp_slider .preview, .resp_slider.background--light .nav i.active:after
	{
		background-color: <?=$arParams["DARK_COLOR"]?>;
	}
	.resp_slider.background--dark .preview .icon svg .arrow, .resp_slider.background--dark .preview .icon svg .arrow {
		fill: <?=$arParams["DARK_COLOR"]?>;
	}
	<? } ?>

	<? if($arParams["BRIGHT_COLOR"]) {?>
	.resp_slider .item .content .button, .resp_slider .preview .text, .resp_slider.background--dark .content{
		color: <?=$arParams["BRIGHT_COLOR"]?>;
	}
	.resp_slider.background--dark .preview, .resp_slider.background--dark .nav i.active:after {
		background-color: <?=$arParams["BRIGHT_COLOR"]?>;
	}
	.resp_slider.background--dark .fotorama__arr .el svg .arrow {
		fill: <?=$arParams["BRIGHT_COLOR"]?>;
	}
	.resp_slider.background--dark .nav i:after {
		border-color: <?=$arParams["BRIGHT_COLOR"]?>;
	}
	<? } ?>

	<? if($arParams["BACKGROUND_COLOR"]) {?>
	.resp_slider {
		background: <?=$arParams["BACKGROUND_COLOR"]?>;
	}
	<? } ?>
	<? if($arParams["BUTTON_COLOR"]) {?>
	.resp_slider .item .content .button {
		background-color: <?=$arParams["BUTTON_COLOR"]?>;
	}
	<? } ?>
</style>
<script type="text/javascript">
	$(function(){
		var settings = {
			nav       : {
						<? if($arParams["DOTS_SHOW"]) { ?> show : '<?=(count($arResult['ELEMENTS'])>1?$arParams["DOTS_SHOW"]:"N")?>',<? } ?>
						<? if($arParams["DOTS_POSITION"]) { ?> position : '<?=$arParams["DOTS_POSITION"]?>',<? } ?>
						<? if($arParams["DOTS_TYPE"]) { ?> type : '<?=$arParams["DOTS_TYPE"]?>',<? } ?>
					},
			arrows    : { 
						<? if($arParams["ARROWS_SHOW"]) { ?> show : '<?=$arParams["ARROWS_SHOW"]?>',<? } ?>
						<? if($arParams["ARROWS_TYPE"]) { ?> type : '<?=$arParams["ARROWS_TYPE"]?>',<? } ?>
						<? if($arParams["ARROWS_PREVIEW_SHOW"]) { ?> preview : '<?=$arParams["ARROWS_PREVIEW_SHOW"]?>',<? } ?>
					},
			fotorama  : {
						<? if($arParams["SIZES_HEIGHT"]) { ?> height   : '<?=$arParams["SIZES_HEIGHT"]?>',<? } ?>
						<? 
							/*if($arParams["SIZES_WIDTH"]) { ?> width   : '<?=$arParams["SIZES_WIDTH"]?>',<? } */
						?>
						<? if($arParams["EFFECT_SPEED"]) { ?> transitionduration  : '<?=$arParams["EFFECT_SPEED"]?>',<? } ?>
						<? if($arParams["SLIDE_AUTOPLAY"]=='Y'&&count($arResult['ELEMENTS'])>1) { ?> 
								<? if($arParams["SLIDE_SPEED"]) {?> autoplay : '<?=$arParams["SLIDE_SPEED"]*1000?>', <? } ?>
						<? } else { ?>
								<? if($arParams["SLIDE_SPEED"]) {?> autoplay : false, <? } ?>
						<? } ?>
						<? if($arParams["EFFECT_TYPE"]) { ?> transition  : '<?=$arParams["EFFECT_TYPE"]?>',<? } ?>
					}
		}
		$('.resp_slider').respSlider(settings);
	})
</script>
