<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
//Для экономии времени при выполнении тестового задания
$APPLICATION->SetTitle('Ваш IP адрес: ' . Bitrix\Main\Service\GeoIp\Manager::getRealIp());
?><?$APPLICATION->IncludeComponent(
    "felemixx.common:geoip.form",
    "",
    Array()
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
