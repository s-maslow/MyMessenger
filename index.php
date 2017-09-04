<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("redBird");
?>
<h2>Hello, it's a RedBird</h2>

<?   $APPLICATION->IncludeComponent(
    "messenger:autorize",
    "",
    Array()
);
?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>