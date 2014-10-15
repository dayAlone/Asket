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
				);

				 $APPLICATION->IncludeComponent("bitrix:news.list", "banners", 
					array(
					  "IBLOCK_ID"   => 8,
					  "NEWS_COUNT"  => "99",
					  "SORT_BY1"    => "SORT",
					  "SORT_ORDER1" => "ASC",
					  "DETAIL_URL"  => "/",
					  "PROPERTY_CODE"  => array("LINK"),
					  "CACHE_TYPE"  => "A",
					  "SET_TITLE"   => "N"
					   ),
					   false
				);
				?>
			</div>
		</div>
	</div>
</div>
<? require_once($_SERVER['DOCUMENT_ROOT'].'/include/footer.php') ?>