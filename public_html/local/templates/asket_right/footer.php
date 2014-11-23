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

				$path     = preg_split('/\//', $APPLICATION->GetCurDir(), false, PREG_SPLIT_NO_EMPTY);
				$urls     = array();

				for ($i=0; $i < count($path); $i++)
				$urls[] = (isset($urls[$i-1])?$urls[$i-1]:"/").$path[$i].'/';

				$urls[]="/";
				global $banner;
				$banner = array("PROPERTY_PAGES" => $urls)

				$APPLICATION->IncludeComponent("bitrix:news.list", "banners", 
				array(
				"IBLOCK_ID"     => 8,
				"NEWS_COUNT"    => "99",
				"FILTER_NAME"   => "banner",
				"SORT_BY1"      => "SORT",
				"SORT_ORDER1"   => "ASC",
				"DETAIL_URL"    => "/",
				"PROPERTY_CODE" => array("LINK", "TARGET", "ALL", "PAGES"),
				"CACHE_TYPE"    => "A",
				"CACHE_FILTER"  => "Y",
				"SET_TITLE"     => "N"

				 ),
				 false
				);?>
			</div>
		</div>
	</div>
</div>
<? require_once($_SERVER['DOCUMENT_ROOT'].'/include/footer.php') ?>