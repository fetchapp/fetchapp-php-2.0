<?php
/**
 * Created by JetBrains PhpStorm.
 * Updated by SublimeText 2.
 * Creator: Brendon Dugan <wishingforayer@gmail.com>
 * Last Updated: Patrick Conant <conantp@gmai.com>
 * User: Patrick Conant <conantp@gmai.com>
 * Date: 8/7/13
 * Time: 8:00 PM
 */

//namespace FetchApp\API;


class FetchApp_ProductStatistic
{
    /**
     * @var $ProductID String
     */
    private $ProductID;

    /**
     * @var $SKU String
     */
    private $SKU;

    /**
     * @var $DownloadCount int
     */
    private $DownloadCount;

    /**
     * @var $OrderCount int
     */
    private $OrderCount;

    /**
     * @var $Price float
     */
    private $Price;

    /**
     * @var int FetchApp_Currency
     */
    private $FetchApp_Currency;

    /**
     * @param int $FetchApp_Currency
     */
    public function setFetchApp_Currency($FetchApp_Currency)
    {
        $this->FetchApp_Currency = $FetchApp_Currency;
    }

    /**
     * @return int
     */
    public function getFetchApp_Currency()
    {
        return $this->FetchApp_Currency;
    }

    /**
     * @param int $DownloadCount
     */
    public function setDownloadCount($DownloadCount)
    {
        $this->DownloadCount = $DownloadCount;
    }

    /**
     * @return int
     */
    public function getDownloadCount()
    {
        return $this->DownloadCount;
    }

    /**
     * @param String $ProductID
     */
    public function setProductID($ProductID)
    {
        $this->ProductID = $ProductID;
    }

    /**
     * @return String
     */
    public function getProductID()
    {
        return $this->ProductID;
    }

    /**
     * @param float $price
     */
    public function setPrice($Price)
    {
        $this->Price = $Price;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->Price;
    }

    /**
     * @param int $ProductCount
     */
    public function setOrderCount($OrderCount)
    {
        $this->OrderCount = $OrderCount;
    }

    /**
     * @return int
     */
    public function getOrderCount()
    {
        return $this->OrderCount;
    }

    /**
     * @param String $SKU
     */
    public function setSKU($SKU)
    {
        $this->SKU = $SKU;
    }

    /**
     * @return String
     */
    public function getSKU()
    {
        return $this->SKU;
    }
}