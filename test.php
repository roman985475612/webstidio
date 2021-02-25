<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetPageProperty("title", "Тестовая страница");
$APPLICATION->SetTitle('Тест');
?>

<?php
global $APPLICATION; 

CModule::IncludeModule("iblock");

$iblockId = getIBlockIdByCode('services');

$arOrder = ['SORT' => 'ASC'];
$arSelect = ["ID", "NAME", "IBLOCK_ID", "DETAIL_PAGE_URL"];
$arFilter = ["IBLOCK_ID" => $iblockId, "ACTIVE" =>"Y"];

$res = CIBlockElement::GetList($arOrder, $arFilter, false, false, $arSelect);

$aMenuLinksExt = [];

while ($ob = $res->GetNextElement()) {
	$arFields = $ob->GetFields();
	
	$aMenuLinksExt[] = [
		$arFields['NAME'],
		$arFields['DETAIL_PAGE_URL'],
		[],
		[],
		''
	];
}  

dd($aMenuLinksExt);
?>


<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");