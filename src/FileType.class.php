<?php
/**
 * Created by JetBrains PhpStorm.
 * Updated by SublimeText 2.
 * Creator: Brendon Dugan <wishingforayer@gmail.com>
 * Last Updated: Patrick Conant <conantp@gmail.com>
 * User: Patrick Conant <conantp@gmail.com>
 * Date: 8/7/13
 * Time: 8:00 PM
 */

//namespace FetchApp\API;
include_once "FetchApp_EnumEmulator.class.php";


class FetchApp_FileType extends FetchApp_EnumEmulator
{
    const Download = 0;
    const Link = 1;

    private static $className = "FetchApp\\API\\FetchApp_FileType";
	
	/**
     * @return mixed
     */
    public static function getName($const)
    {
        return parent::getName($const, FetchApp_FileType::$className);
    }
	
	/**
     * @return array
     */
    public static function getOptions()
    {
        return parent::getOptions(FetchApp_FileType::$className);
    }
	
	/**
     * @return mixed
     */
    public static function getValue($name)
    {
        return parent::getValue($name, FetchApp_FileType::$className);
    }
}