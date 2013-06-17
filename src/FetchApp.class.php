<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Brendon Dugan <wishingforayer@gmail.com>
 * Date: 6/1/13
 * Time: 1:11 PM
 */

namespace FetchApp\API;


class FetchApp
{

    /**
     * @var $AuthenticationKey String
     */
    private $AuthenticationKey;

    /**
     * @var $AuthenticationToken String
     */
    private $AuthenticationToken;

    function __construct()
    {
    }

    /**
     * @param String $AuthenticationKey
     */
    public function setAuthenticationKey($AuthenticationKey)
    {
        $this->AuthenticationKey = $AuthenticationKey;
        APIWrapper::setAuthenticationKey($AuthenticationKey);
    }

    /**
     * @return String
     */
    public function getAuthenticationKey()
    {
        return $this->AuthenticationKey;
    }

    /**
     * @param String $AuthenticationToken
     */
    public function setAuthenticationToken($AuthenticationToken)
    {
        $this->AuthenticationToken = $AuthenticationToken;
        APIWrapper::setAuthenticationToken($AuthenticationToken);
    }

    /**
     * @return String
     */
    public function getAuthenticationToken()
    {
        return $this->AuthenticationToken;
    }

    /**
     * @return AccountDetail
     */
    public function getAccountDetails()
    {
        $this->verifyReadiness();
        $detail = new AccountDetail();
        $results = APIWrapper::makeRequest("https://app.fetchapp.com/api/v2/account", "GET");
        if (is_a($results, "SimpleXMLElement")) {
            $detail->setAccountID($results->id);
            $detail->setAccountName($results->name);
            $detail->setEmailAddress($results->email);
            $detail->setURL($results->url);
            $detail->setBillingEmail($results->billing_email);
            if (!isset($results->order_expiration_in_hours['nil'])) {
                $detail->setOrderExpirationInHours($results->order_expiration_in_hours);
            } else {
                $detail->setOrderExpirationInHours(-1);
            }
            $detail->setItemDownloadLimit($results->download_limit_per_item);
            $detail->setCurrency(Currency::getValue($results->currency));
            $detail->setCreationDate(new \DateTime($results->created_at));
            $detail->setAPIKey($results->api_key);
            $detail->setAPIToken($results->api_token);
        }
        return $detail;
    }

    /**
     * @param int $status
     * @param $itemsPerPage
     * @param $pageNumber
     * @return Order[]
     */
    public function getOrders($status = OrderStatus::All, $itemsPerPage = -1, $pageNumber = -1)
    {
        $orders = array();

        return $orders;
    }

    /**
     * @return OrderDownload[]
     */
    public function getDownloads()
    {
        $downloads = array();

        return $downloads;
    }

    /**
     * @return bool True on success, otherwise False.
     */
    public function getNewToken()
    {
        $success = false;
        $result = APIWrapper::makeRequest("https://app.fetchapp.com/api/v2/new_token", "GET");
        $this->setAuthenticationToken($result[0]);
        $success = true;
        return $success;
    }

    /**
     * @throws \Exception
     */
    private function verifyReadiness()
    {
        if (empty($this->AuthenticationKey) || empty($this->AuthenticationToken)) {
            throw new \Exception("You must configure an Authentication Key and an Authentication Token before you can connect to FetchApp.");
        }
    }


}