<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
?>
<!DOCTYPE html>
<head>
    <?$APPLICATION->ShowHead();?>
    <title><?$APPLICATION->ShowTitle()?></title>
    <link rel="stylesheet" href="<?=CUtil::GetAdditionalFileURL(SITE_TEMPLATE_PATH.'/style.css');?>">
</head>

<body>
    <?$APPLICATION->ShowPanel()?>
    <div class="wrapper">
        <header class="header">
            <ul>
                <il><a class="navA" href="/index.php"><div class="nav"><h2>Главная</h2></div></a></il>  
            </ul>
        </header>
