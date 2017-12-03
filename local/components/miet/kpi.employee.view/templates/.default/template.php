<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<?if($arResult['OK']):?>
    <?ShowMessage(array('TYPE' => 'OK','MESSAGE' =>
        $arResult['OK']));?>
<?endif;?>
<?if($arResult['ERROR']):?>
    <?ShowMessage(array('TYPE' => 'ERROR','MESSAGE' =>
        $arResult['ERROR']));?>
<?endif;?>

<?php
// подключаем пространство имен класса HighloadBlockTable и даём ему псевдоним Highloadblock для удобной работы
use Bitrix\Highloadblock\HighloadBlockTable as Highloadblock;
// id highload-инфоблока
const MY_HL_BLOCK_ID = 11;
//подключение модуля highloadblock
CModule::IncludeModule('highloadblock');
//Функция получения экземпляра класса:
function GetEntityDataClass($HlBlockId) {
    if (empty($HlBlockId) || $HlBlockId < 1)
    {
        return false;
    }
    $hlblock = Highloadblock::getById($HlBlockId)->fetch();
    $entity = Highloadblock::compileEntity($hlblock);
    $entity_data_class = $entity->getDataClass();
    return $entity_data_class;
}
?>

<?php
$date = $_GET["date"];
CModule::IncludeModule('highloadblock');
$entity_data_class = GetEntityDataClass(1);
$arFilter = Array(
        Array(
            "UF_PERIOD"=>$date
        )
);
$rsData = $entity_data_class::getList(array(
    'select' => array('ID','UF_KPI', 'UF_VALUE', 'UF_DEPARTMENT', 'UF_CREATED', 'UF_PERIOD'),
    'filter' => $arFilter
));
while($el = $rsData->fetch()){
    $arr[0] = $el[ID];
    $arr[1] = $el[UF_KPI];
    $arr[2] = $el[UF_VALUE];
    $arr[3] = $el[UF_DEPARTMENT];
    $arr[4] = $el[UF_CREATED];
    $arr[5] = $el[UF_PERIOD];
}
$i = 0;
$arItem['SELECTED'] = $arr[5];
?>

<form action="<?=GET_FORM_ACTION_URI?>" method="GET">
    <select name="UF_PERIOD" id='select' onchange="window.location.replace('/kpi/view2/index.php?date='+ document.getElementById('select').options[document.getElementById('select').selectedIndex].text);">
        <?foreach($arResult['PERIOD_ITEMS'] as $arItem):?>
            <option <? if($arItem['VALUE'] == $date):?>selected<? endif; ?>
                    value="<?=$arItem['VALUE'];?>"><?=$arItem['VALUE'];?></option>
        <?endforeach;?>
    </select>
    <table style="border-width: 0px; border-spacing: 10px;">
        <tbody>
        <?foreach($arResult["ITEMS"] as $arItem):?>
            <tr>
                <td><?=$arItem['NAME'];?></td>
                <td><input type="text" name="KPI[<?=$arItem['ID']?>]"
                           value="<?=$arr[$i]?>"></td>
                <? $i++ ?>
            </tr>
        <?endforeach;?>
        </tbody>
    </table>
</form>