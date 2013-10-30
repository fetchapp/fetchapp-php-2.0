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


class FetchApp_OrderStatus extends FetchApp_EnumEmulator
{

//    private static $className = "FetchApp\\API\\OrderStatus";
    private static $className = "FetchApp_OrderStatus";

    const Open = 0;
    const Expired = 1;
    const All = 2;
	
	/**
     * @return mixed
     */
    public static function getName($const, $className='FetchApp_OrderStatus')
    {
        return parent::getName($const, OrderStatus::$className);
    }
	
	/**
     * @return array
     */
    public static function getOptions($className='FetchApp_OrderStatus')
    {
        return parent::getOptions(OrderStatus::$className);
    }
	
	/**
     * @return mixed
     */
    public static function getValue($name, $className='FetchApp_OrderStatus')
    {
        return parent::getValue($name, OrderStatus::$className);
    }
}