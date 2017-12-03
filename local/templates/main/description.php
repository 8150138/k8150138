<?php
/**
 * Created by PhpStorm.
 * User: Anna
 * Date: 26.09.2017
 * Time: 1:18
 */
?>
<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die(); ?>
<?use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);
$arTemplate = Array(
    "NAME" => Loc::getMessage("TEMPLATE_DESCRIPTION_NAME"),
    "DESCRIPTION" => Loc::getMessage("TEMPLATE_DESCRIPTION_DESC")
);
?>