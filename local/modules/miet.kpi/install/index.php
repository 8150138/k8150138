<?php
/**
 * Created by PhpStorm.
 * User: Anna
 * Date: 19.11.2017
 * Time: 23:40
 */
?>
<?
/*Подлкючение языкового файла модуля*/
IncludeModuleLangFile(__FILE__);
/*Создание класса с описанием и поведением модуля в системе
*Имя класса должно совпадать с ID модуля, вместо точки между именем
парнера и именем модуля знак подчеркивания
*Класс модуля должен быть наследником системного класса модулей
Битрикс CModule*/
Class miet_kpi extends CModule {
    /*Обязательные свойства объекта модуля*/
    const MODULE_ID = "miet.kpi";
    var $MODULE_ID = "miet.kpi";
    var $MODULE_VERSION;
    var $MODULE_VERSION_DATE;
    var $MODULE_NAME;
    var $MODULE_DESCRIPTION;
    /*Конструктор класса*/
    /*ОБЯЗАТЕЛЬНЫЙ ДЛЯ РЕАЛИЗАЦИИ МЕТОД*/
    function __construct()
    {
        $arModuleVersion = array();
        include(__DIR__ . "/version.php");
        $this->MODULE_VERSION = $arModuleVersion["VERSION"];
        $this->MODULE_VERSION_DATE =
            $arModuleVersion["VERSION_DATE"];
        $this->MODULE_NAME = GetMessage("miet.kpi_MODULE_NAME");
        $this->MODULE_DESCRIPTION =
            GetMessage("miet.kpi_MODULE_DESC");
        $this->PARTNER_NAME = GetMessage("miet.kpi_PARTNER_NAME");
        $this->PARTNER_URI = GetMessage("miet.kpi_PARTNER_URI");
    }
    /*Метод регистрации событий модуля и их обработчиков*/
    function InstallEvents()
    {
        /* Пример
        $em = \Bitrix\Main\EventManager::getInstance();
        $em->registerEventHandler('sale', 'OnBasketAdd',
       self::MODULE_ID, '\CompanyNamespace\Promotions\Connector',
       'OnBasketAdd');
        $em->registerEventHandler('sale', 'OnBasketUpdate',
       self::MODULE_ID, '\CompanyNamespace\Promotions\Connector',
       20
       'OnBasketUpdate');
        */
        return true;
    }
    /*Метод удаления событий модуля и их обработчиков*/
    function UnInstallEvents()
    {
        /* Пример
        $em = \Bitrix\Main\EventManager::getInstance();
        $em->unRegisterEventHandler('sale', 'OnBasketAdd',
       self::MODULE_ID, '\CompanyNamespace\Promotions\Connector',
       'OnBasketAdd');
        $em->unRegisterEventHandler('sale', 'OnBasketUpdate',
       self::MODULE_ID, '\CompanyNamespace\Promotions\Connector',
       'OnBasketUpdate');
        */
        return true;
    }
    /*Метод установки (копирования файлов в ядро Битрикса) файлов
   модуля*/
    function InstallFiles($arParams = array())
    {
        /*Добавляем административные скрипты*/
        if (is_dir($p = $_SERVER["DOCUMENT_ROOT"] . "/local/modules/"
            . self::MODULE_ID . "/admin"))
        {
            if ($dir = opendir($p))
            {
                while (false !== $item = readdir($dir))
                {
                    if ($item == ".." || $item == "." || $item ==
                        "menu.php")
                    {
                        continue;
                    }
                    file_put_contents($file =
                        $_SERVER["DOCUMENT_ROOT"] . "/bitrix/admin/" . self::MODULE_ID . "_"
                        . $item, '<' . '? require($_SERVER["DOCUMENT_ROOT"]."/local/modules/'
                        . self::MODULE_ID . '/admin/' . $item . '");?' . '>');
                }
                closedir($dir);
            }
        }
        /*Добавляем файлы JS*/
        if (is_dir($p = $_SERVER["DOCUMENT_ROOT"] . "/local/modules/"
            . self::MODULE_ID . "/install/js"))
        {
            CheckDirPath($_SERVER["DOCUMENT_ROOT"] . "/bitrix/js/" .
                self::MODULE_ID);
            CopyDirFiles($p, $_SERVER["DOCUMENT_ROOT"] .
                "/bitrix/js/" . self::MODULE_ID, true, true);
        }
        /*Добавляем файлы CSS*/
        if (is_dir($p = $_SERVER["DOCUMENT_ROOT"] . "/local/modules/"
            . self::MODULE_ID . "/install/themes"))
        {
            CopyDirFiles($p, $_SERVER["DOCUMENT_ROOT"]."/bitrix/themes", true, true);
 }
        /*Добавляем папки с компонентами модуля*/
        if (is_dir($p = $_SERVER['DOCUMENT_ROOT'] . '/local/modules/'
            . self::MODULE_ID . '/install/components'))
        {
            if ($dir = opendir($p))
            {
                while (false !== $item = readdir($dir))
                {
                    if ($item == '..' || $item == '.')
                    {
                        continue;
                    }
                    CopyDirFiles($p . '/' . $item,
                        $_SERVER['DOCUMENT_ROOT'] . '/bitrix/components/' . $item, $ReWrite =
                            true, $Recursive = true);
                }
                closedir($dir);
            }
        }
        return true;
    }
    /*Метод удаления (удаления файлов из ядра Битрикса) файлов
   модуля*/
    function UnInstallFiles()
    {
        /*Добавляем административные скрипты*/
        if (is_dir($p = $_SERVER["DOCUMENT_ROOT"] . "/local/modules/"
            . self::MODULE_ID . "/admin"))
        {
            if ($dir = opendir($p))
            {
                while (false !== $item = readdir($dir))
                {
                    if ($item == ".." || $item == ".")
                    {
                        continue;
                    }
                    unlink($_SERVER["DOCUMENT_ROOT"] .
                        "/bitrix/admin/" . self::MODULE_ID . "_" . $item);
                }
                closedir($dir);
            }
        }
        /*Удаляем файлы JS*/
        if (is_dir($p = $_SERVER["DOCUMENT_ROOT"] . "/bitrix/js/" .
            self::MODULE_ID))
        {
            DeleteDirFilesEx($p);
        }
        /*Удаляем файлы CSS*/

        DeleteDirFiles($_SERVER["DOCUMENT_ROOT"]."/local/modules/".$this->MODULE_ID."/install/themes/.default/",
        $_SERVER["DOCUMENT_ROOT"]."/bitrix/themes/.default");
 /*Удаляем папки с компонентами модуля*/
 if (is_dir($p = $_SERVER['DOCUMENT_ROOT'] . '/local/modules/'
     . self::MODULE_ID . '/install/components'))
 {
     if ($dir = opendir($p))
     {
         while (false !== $item = readdir($dir))
         {
             if ($item == '..' || $item == '.' || !is_dir($p0
                     = $p . '/' . $item))
             {
                 continue;
             }
             $dir0 = opendir($p0);
             while (false !== $item0 = readdir($dir0))
             {
                 if ($item0 == '..' || $item0 == '.')
                 {
                     continue;
                 }
                 DeleteDirFilesEx($_SERVER['DOCUMENT_ROOT'] .
                     '/bitrix/components/' . $item . '/' . $item0);
             }
             closedir($dir0);
         }
         closedir($dir);
     }
 }
 return true;
 }
    /*Запускается при нажатии кнопки Удалить на странице Модули
   административного раздела, осуществляет деинсталляцию модуля*/
    /*ОБЯЗАТЕЛЬНЫЙ ДЛЯ РЕАЛИЗАЦИИ МЕТОД*/
    function DoInstall()
    {
        global $APPLICATION;
        $this->InstallFiles();
        $this->InstallDB();
        $this->InstallEvents();
        RegisterModule(self::MODULE_ID);
    }
    /*Метод запускается при нажатии кнопки Установить на странице
   Модули административного раздела, осуществляет инсталляцию модуля*/
    /*ОБЯЗАТЕЛЬНЫЙ ДЛЯ РЕАЛИЗАЦИИ МЕТОД*/
    function DoUninstall()
    {
        global $APPLICATION;
        UnRegisterModule(self::MODULE_ID);
        $this->UnInstallEvents();
        $this->UnInstallDB();
        $this->UnInstallFiles();
    }
    /*Метод запуска файлов SQL, которые содержат запросы на создание
   таблиц в БД для работы модуля*/
    function InstallDB()
    {
        global $DB, $DBType;
        $DB->RunSQLBatch($_SERVER["DOCUMENT_ROOT"]."/local/modules/".self::MODULE_ID."/install/db/".strtolower($DBType)."/install.sql");
 return true;
 }
}

