<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
if($arResult["NavPageCount"]>1):
?>
<div class="pages">
	<?
	$i = $arResult["nStartPage"];
	while($i <= $arResult["nEndPage"]):?>
		<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$i?>" class="pages-link <?=($i==$arResult["NavPageNomer"]?'years-link__active':"")?>"><?=$i?></a>
	<?
	$i++;
	endwhile;?>
</div>
<?endif;?>