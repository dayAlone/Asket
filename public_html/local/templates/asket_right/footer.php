			</div>
			<div class="col-xs-3 col-md-3 sidebar">
				<?
				    $APPLICATION->IncludeComponent("bitrix:catalog.section.list", "sidebar", array(
				        "IBLOCK_TYPE"  => "content",
				        "IBLOCK_ID"    => "1",
				        "SECTION_ID"   => "",
				        "SECTION_CODE" => "",
				        "TOP_DEPTH"    => "2",
				        "CACHE_TYPE"   => "A",
				        "CACHE_TIME"   => "3600",
				        "SECTION_USER_FIELDS" => array("UF_SVG"),
				    ),
				    false
				);?>
			</div>
		</div>
	</div>
</div>
<? require_once($_SERVER['DOCUMENT_ROOT'].'/include/footer.php') ?>