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

class FetchApp_Currency extends FetchApp_EnumEmulator
{
    //private static $className = "FetchApp\\API\\FetchApp_Currency";
    private static $className = "FetchApp_Currency";
    /**
     * Australian Dollar
     */
    const AUD = 0;
    /**
     * United States Dollar
     */
    const USD = 1;
    /**
     * Euro
     */
    const EUR = 2;
    /**
     * Pound Sterling
     */
    const GBP = 3;
    /**
     * Danish Krone
     */
    const DKK = 4;
    /**
     * Chinese Yuan
     */
    const CNY = 5;
    /**
     * Norwegian Krone
     */
    const NOK = 6;
    /**
     * New Zealand Dollar
     */
    const NZD = 7;
    /**
     * Russian Rouble
     */
    const RUB = 8;
    /**
     * East Caribbean Dollar
     */
    const XCD = 9;
	
	/**
     * @return mixed
     */
    public static function getName($const, $className='FetchApp_Currency')
    {
        return parent::getName($const, FetchApp_Currency::$className);
    }
	
	/**
     * @return array
     */
    public static function getOptions($className='FetchApp_Currency')
    {
        return parent::getOptions(FetchApp_Currency::$className);
    }
	
	/**
     * @return mixed
     */
    public static function getValue($name, $className='FetchApp_Currency')
    {
        return parent::getValue($name, FetchApp_Currency::$className);
    }
}