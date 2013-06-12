<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Brendon Dugan <wishingforayer@gmail.com>
 * Date: 6/1/13
 * Time: 1:24 PM
 */

namespace FetchApp\API;


class OrderItem
{
    /**
     * @var $ItemID int
     */
    private $ItemID;

    /**
     * @var $SKU String
     */
    private $SKU;

    /**
     * @var $OrderID String
     */
    private $OrderID;

    /**
     * @var $ProductName String
     */
    private $ProductName;

    /**
     * @var $Price float
     */
    private $Price;

    /**
     * @var $DownloadCount int
     */
    private $DownloadCount;

    /**
     * @var $DownloadsRemaining int
     */
    private $DownloadsRemaining;

    /**
     * @var $Custom1 String
     */
    private $Custom1;

    /**
     * @var $Custom2 String
     */
    private $Custom2;

    /**
     * @var $Custom3 String
     */
    private $Custom3;

    /**
     * @var $CreationDate \DateTime
     */
    private $CreationDate;

    function __construct()
    {
        $this->CreationDate = null;
    }

    /**
     * @param \DateTime $CreationDate
     */
    public function setCreationDate(\DateTime $CreationDate)
    {
        $this->CreationDate = $CreationDate;
    }

    /**
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->CreationDate;
    }

    /**
     * @param String $Custom1
     */
    public function setCustom1($Custom1)
    {
        $this->Custom1 = $Custom1;
    }

    /**
     * @return String
     */
    public function getCustom1()
    {
        return $this->Custom1;
    }

    /**
     * @param String $Custom2
     */
    public function setCustom2($Custom2)
    {
        $this->Custom2 = $Custom2;
    }

    /**
     * @return String
     */
    public function getCustom2()
    {
        return $this->Custom2;
    }

    /**
     * @param String $Custom3
     */
    public function setCustom3($Custom3)
    {
        $this->Custom3 = $Custom3;
    }

    /**
     * @return String
     */
    public function getCustom3()
    {
        return $this->Custom3;
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
     * @param int $DownloadsRemaining
     */
    public function setDownloadsRemaining($DownloadsRemaining)
    {
        $this->DownloadsRemaining = $DownloadsRemaining;
    }

    /**
     * @return int
     */
    public function getDownloadsRemaining()
    {
        return $this->DownloadsRemaining;
    }

    /**
     * @param int $ItemID
     */
    public function setItemID($ItemID)
    {
        $this->ItemID = $ItemID;
    }

    /**
     * @return int
     */
    public function getItemID()
    {
        return $this->ItemID;
    }

    /**
     * @param String $OrderID
     */
    public function setOrderID($OrderID)
    {
        $this->OrderID = $OrderID;
    }

    /**
     * @return String
     */
    public function getOrderID()
    {
        return $this->OrderID;
    }

    /**
     * @param float $Price
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
     * @param String $ProductName
     */
    public function setProductName($ProductName)
    {
        $this->ProductName = $ProductName;
    }

    /**
     * @return String
     */
    public function getProductName()
    {
        return $this->ProductName;
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