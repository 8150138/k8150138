<?php
/**
 * Created by PhpStorm.
 * User: Anna
 * Date: 23.11.2017
 * Time: 17:23
 */
?>
<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<?if($arResult['OK']):?>
    <?ShowMessage(array('TYPE' => 'OK','MESSAGE' =>
        $arResult['OK']));?>
<?endif;?>
<?if($arResult['ERROR']):?>
    <?ShowMessage(array('TYPE' => 'ERROR','MESSAGE' => $arResult['ERROR']));?>
<?endif;?>
<form action="<?=POST_FORM_ACTION_URI?>" method="POST">
    <select name="UF_PERIOD">
        <?foreach($arResult['PERIOD_ITEMS'] as $arItem):?>
            <option <?=$arItem['SELECTED'];?>
                value="<?=$arItem['VALUE'];?>"><?=$arItem['VALUE'];?></option>
        <?endforeach;?>
    </select>
    <table style="border-width: 0px; border-spacing: 10px;">
        <tbody>
        <?foreach($arResult["ITEMS"] as $arItem):?>
            <tr>
                <td><?=$arItem['NAME'];?></td>
                <td><input type="text" name="KPI[<?=$arItem['ID']?>]"
                           value="<?=$_REQUEST['kpi-'.$arItem['ID']];?>"></td>
                <td>
                    <?foreach($arItem['PROPERTY_REGULATIONS_VALUE']
                              as $fileRegulation):?>
                        <a href="<?=$fileRegulation['SRC'];?>"
                           target="_blank"><?=$fileRegulation['ORIGINAL_NAME'];?></a><br>
                    <?endforeach;?>
                </td>
            </tr>
        <?endforeach;?>
        <tr>
            <td colspan="3">
                <input type="submit" name="saveKPI"
                       value="Сохранить">
                <input type="cancel" value="Очистить">
            </td>
        </tr>
        </tbody>
    </table>
</form>