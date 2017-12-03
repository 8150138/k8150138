<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>
<? if ($arResult['OK']): ?>
    <? ShowMessage(array('TYPE' => 'OK', 'MESSAGE' =>
        $arResult['OK'])); ?>
<? endif; ?>
<? if ($arResult['ERROR']): ?>
    <? ShowMessage(array('TYPE' => 'ERROR', 'MESSAGE' =>

        $arResult['ERROR'])); ?>
<? endif; ?>
<form action="<?= POST_FORM_ACTION_URI ?>" method="POST" name="kpiform">
    <select name="UF_PERIOD" onchange="kpiform.submit();">
        <? foreach ($arResult['PERIOD_ITEMS'] as $arItem): ?>
            <option <?= $arItem['SELECTED']; ?>
                value="<?= $arItem['VALUE']; ?>"><?= $arItem['VALUE']; ?></option>
        <? endforeach; ?>
    </select>
    <table style="border-width: 0px; border-spacing: 10px;">
        <tbody>
        <? foreach ($arResult["ITEMS"] as $arItem): ?>
            <tr>
                <td><?= $arItem['NAME']; ?></td>
                <td><?=$arItem["KPI_VALUE"]?></td>
                <td>
                    <? foreach ($arItem['PROPERTY_REGULATIONS_VALUE']
                                as $fileRegulation): ?>
                        <a href="<?= $fileRegulation['SRC']; ?>"
                           target="_blank"><?= $fileRegulation['ORIGINAL_NAME']; ?></a><br>
                    <? endforeach; ?>
                </td>
            </tr>
        <? endforeach; ?>
        </tbody>
    </table>
</form>