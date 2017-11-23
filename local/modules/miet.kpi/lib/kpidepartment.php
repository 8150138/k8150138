<?php
/**
 * Created by PhpStorm.
 * User: Anna
 * Date: 19.11.2017
 * Time: 23:45
 */
?>
<?php
namespace MIET\KPI;
use Bitrix\Main\Application;
use Bitrix\Main\Entity;
use Bitrix\Main\Entity\Event;
use Bitrix\Main\Localization\Loc;
use Bitrix\Iblock\ElementTable;
use Bitrix\Main\UserTable;
Loc::loadMessages(__FILE__);
class KPIManager {
    const IBLOCK_CODE_KPI = 'kpi';
    const IBLOCK_CODE_DEPARTMENTS = 'departments';
    public static function GetKPI(
        $arOrder = array('SORT' => 'ASC'),
        $arFilter = array(),
        $arGroupBy = false,
        $arNavStartParams = false,
        $arSelectFields = array('ID', 'NAME')
    ) {
        $elements = array();
        //Получаем ID инфоблока KPI по его символьному коду
        $rsIblock = \CIBlock::GetList(
            array(),
            array('CODE' => self::IBLOCK_CODE_KPI, 'SITE_ID' =>
                SITE_ID)
        );
        $arIblock = $rsIblock->GetNext();
        $arFilter['IBLOCK_ID'] = $arIblock['ID'];
        $rsElements = \CIBlockElement::GetList(
            $arOrder, //массив полей сортировки элементов и еёнаправления
 $arFilter, //массив полей фильтра элементов и их значений
 $arGroupBy, //массив полей для группировки элементов
 $arNavStartParams, //параметры для постраничной навигациии ограничения количества выводимых элементов
 $arSelectFields //массив возвращаемых полей элементов
 );
 while($arElements = $rsElements->Fetch()) {
     //Получение информации о файле с регламентом расчетапоказателя: ссылка на файл на сервере, название файла и т.д.
 foreach($arElements['PROPERTY_REGULATIONS_VALUE'] as $key
=> $idFileRegulation) {
         $arElements['PROPERTY_REGULATIONS_VALUE'][$key] =
             \CFile::GetFileArray($idFileRegulation);
     }
 $elements[] = $arElements;
 }
 return $elements;
 }
    public static function GetKPIEmployee($idEmployee) {
        if(!$idEmployee) {
            return array();
        }
        //Получаем список всех подразделений сотрудника
        $arDepartmentsUser = UserTable::getList(array(
            'select' => array(
                'UF_DEPARTMENT'
            ),
            'filter' => array(
                'ID' => $idEmployee
            )
        ))->fetch();
        //Получаем список всех KPI данных подразделений
        return self::GetKPI(
            array('NAME' => 'asc'),
            array('PROPERTY_DEPARTMENT.ID' => $arDepartmentsUser),
            false,
            false,
            array('ID', 'NAME', 'PROPERTY_INDICATOR_TYPE',
                'PROPERTY_WEIGHT', 'PROPERTY_REGULATIONS')
        );
    }
    public static function SetKPIEmployee($idEmployee, $period,
                                          $arKPIValues) {
        if(!$idEmployee || !is_array($arKPIValues) ||
            !count($arKPIValues)) {
            return array();
        }
        global $USER;
        //Получаем объект подключения к БД
        $db = Application::getConnection();
        //Начинаем транзакцию
        $db->startTransaction();

        foreach($arKPIValues as $KPI => $KPIValue) {
            $arValue = array(
 'UF_VALUE' => $KPIValue,
 'UF_KPI' => $KPI,
 'UF_EMPLOYEE' => $idEmployee,
 'UF_CREATED_BY' => $USER->GetID(),
 'UF_CREATED' => new
            \Bitrix\Main\Type\DateTime(date('d.m.Y') . ' 00:00:00'),
 'UF_PERIOD' => new
            \Bitrix\Main\Type\DateTime($period. ' 00:00:00')
 );
 $result = KPIEmployeeTable::add($arValue);
 if (!$result->isSuccess()) {
     $db->rollbackTransaction();
     return false;
 }
 }
        if ($result->isSuccess()) {
            $db->commitTransaction();
            return true;
        }
    }
}