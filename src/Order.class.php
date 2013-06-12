<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Brendon Dugan <wishingforayer@gmail.com>
 * Date: 6/1/13
 * Time: 1:24 PM
 */

namespace FetchApp\API;


class Order
{

    /**
     * @var $OrderID int
     */
    private $OrderID;
    /**
     * @var $VendorID int
     */
    private $VendorID;
    /**
     * @var $FirstName String
     */
    private $FirstName;
    /**
     * @var $LastName String
     */
    private $LastName;
    /**
     * @var $EmailAddress String
     */
    private $EmailAddress;
    /**
     * @var $Total float
     */
    private $Total;
    /**
     * @var $Currency int
     */
    private $Currency;
    /**
     * @var $Status int
     */
    private $Status;
    /**
     * @var $ProductCount int
     */
    private $ProductCount;
    /**
     * @var $DownloadCount int
     */
    private $DownloadCount;
    /**
     * @var $ExpirationDate \DateTime
     */
    private $ExpirationDate;
    /**
     * @var $DownloadLimit int
     */
    private $DownloadLimit;
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

    /**
     * @param \DateTime $CreationDate
     */
    public function setCreationDate($CreationDate)
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
     * @param int $Currency
     */
    public function setCurrency($Currency)
    {
        $this->Currency = $Currency;
    }

    /**
     * @return int
     */
    public function getCurrency()
    {
        return $this->Currency;
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
     * @param int $DownloadLimit
     */
    public function setDownloadLimit($DownloadLimit)
    {
        $this->DownloadLimit = $DownloadLimit;
    }

    /**
     * @return int
     */
    public function getDownloadLimit()
    {
        return $this->DownloadLimit;
    }

    /**
     * @param String $EmailAddress
     */
    public function setEmailAddress($EmailAddress)
    {
        $this->EmailAddress = $EmailAddress;
    }

    /**
     * @return String
     */
    public function getEmailAddress()
    {
        return $this->EmailAddress;
    }

    /**
     * @param \DateTime $ExpirationDate
     */
    public function setExpirationDate($ExpirationDate)
    {
        $this->ExpirationDate = $ExpirationDate;
    }

    /**
     * @return \DateTime
     */
    public function getExpirationDate()
    {
        return $this->ExpirationDate;
    }

    /**
     * @param String $FirstName
     */
    public function setFirstName($FirstName)
    {
        $this->FirstName = $FirstName;
    }

    /**
     * @return String
     */
    public function getFirstName()
    {
        return $this->FirstName;
    }

    /**
     * @param String $LastName
     */
    public function setLastName($LastName)
    {
        $this->LastName = $LastName;
    }

    /**
     * @return String
     */
    public function getLastName()
    {
        return $this->LastName;
    }

    /**
     * @param int $OrderID
     */
    public function setOrderID($OrderID)
    {
        $this->OrderID = $OrderID;
    }

    /**
     * @return int
     */
    public function getOrderID()
    {
        return $this->OrderID;
    }

    /**
     * @param int $ProductCount
     */
    public function setProductCount($ProductCount)
    {
        $this->ProductCount = $ProductCount;
    }

    /**
     * @return int
     */
    public function getProductCount()
    {
        return $this->ProductCount;
    }

    /**
     * @param int $Status
     */
    public function setStatus($Status)
    {
        $this->Status = $Status;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->Status;
    }

    /**
     * @param float $Total
     */
    public function setTotal($Total)
    {
        $this->Total = $Total;
    }

    /**
     * @return float
     */
    public function getTotal()
    {
        return $this->Total;
    }

    /**
     * @param int $VendorID
     */
    public function setVendorID($VendorID)
    {
        $this->VendorID = $VendorID;
    }

    /**
     * @return int
     */
    public function getVendorID()
    {
        return $this->VendorID;
    }

    /**
     * @param OrderItem[] $items
     */
    public function create(array $items)
    {

    }

    /**
     *
     */
    public function expire($resetExpiration = false, \DateTime $expirationDate = null, $downloadLimit = -1)
    {

    }

    public function sendDownloadEmail()
    {

    }

    /**
     * @return OrderDownload[] $downloads
     */
    public function getDownloads()
    {

    }

    /**
     * @return OrderStatistic[] $statistics
     */
    public function getStatistics()
    {

    }

    /**
     * @return OrderItem[] $items
     */
    public function getItems()
    {

    }
}