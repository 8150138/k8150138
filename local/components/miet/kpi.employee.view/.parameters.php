<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$arComponentParameters = array(
    "PARAMETERS" => array(
        "USER_ID" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("USER"),
            "TYPE" => "STRING",
            "DEFAULT" => '$_REQUEST["USER_ID"]',
        ),
        "ACTIVE_DATE_FORMAT" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("ACTIVE_DATE_FORMAT"),
            "TYPE" => "STRING",
            "DEFAULT" => 'd.m.Y',
        ),
        "SET_STATUS_404" => array(
            "PARENT" => "ADDITIONAL_SETTINGS",
            "NAME" => GetMessage("CP_BNL_SET_STATUS_404"),
            "TYPE" => "CHECKBOX",
            "DEFAULT" => "N",
        ),
        "CACHE_TIME" => array("DEFAULT"=>36000000),
        "CACHE_FILTER" => array(
            "PARENT" => "CACHE_SETTINGS",
            "NAME" => GetMessage("IBLOCK_CACHE_FILTER"),
            "TYPE" => "CHECKBOX",
            "DEFAULT" => "N",
        ),
        "CACHE_GROUPS" => array(
            "PARENT" => "CACHE_SETTINGS",
            "NAME" => GetMessage("CP_BNL_CACHE_GROUPS"),
            "TYPE" => "CHECKBOX",
            "DEFAULT" => "Y",
        )
    ),
);
?>