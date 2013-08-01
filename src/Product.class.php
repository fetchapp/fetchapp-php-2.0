<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Brendon Dugan <wishingforayer@gmail.com>
 * Date: 6/1/13
 * Time: 1:24 PM
 */

namespace FetchApp\API;


class Product
{

    /**
     * @var $ProductID int
     */
    private $ProductID;
    /**
     * @var $SKU int
     */
    private $SKU;
   	private $Name;
   	private $Price;
   	private $OrderCount;
   	private $DownloadCount;
   	private $PaypalAddToCartLink;
   	private $PaypalBuyNowLink;
   	private $PaypalViewCartLink;


	/**
     * @var $CreationDate \DateTime
     */
    private $CreationDate;
    
   	private $FilesUri;
   	private $DownloadsUri;
   	private $files;
   	

    function __construct()
    {
		$this->files = array();
    }
    
    public function getProductID(){ return $this->ProductID; }
    public function setProductID($ProductID){ $this->ProductID = $ProductID; }

    public function getSKU(){ return $this->SKU; }
    public function setSKU($SKU){ $this->SKU = $SKU; }

    public function getName(){ return $this->Name; }
    public function setName($Name){ $this->Name = $Name; }

    public function getPrice(){ return $this->Price; }
    public function setPrice($Price){ $this->Price = $Price; }

    public function getOrderCount(){ return $this->OrderCount; }
    public function setOrderCount($OrderCount){ $this->OrderCount = $OrderCount; }

    public function getDownloadCount(){ return $this->DownloadCount; }
    public function setDownloadCount($DownloadCount){ $this->DownloadCount = $DownloadCount; }

    public function getPaypalAddToCartLink(){ return $this->PaypalAddToCartLink; }
    public function setPaypalAddToCartLink($PaypalAddToCartLink){ $this->PaypalAddToCartLink = $PaypalAddToCartLink; }

    public function getPaypalBuyNowLink(){ return $this->PaypalBuyNowLink; }
    public function setPaypalBuyNowLink($PaypalBuyNowLink){ $this->PaypalBuyNowLink = $PaypalBuyNowLink; }

    public function getPaypalViewCartLink(){ return $this->PaypalViewCartLink; }
    public function setPaypalViewCartLink($PaypalViewCartLink){ $this->PaypalViewCartLink = $PaypalViewCartLink; }

    public function getFilesUri()){ return $this->FilesUri; }
    public function setFilesUri($FilesUri){ $this->FilesUri = $FilesUri; }

    public function getDownloadsUri(){ return $this->DownloadsUri; }
    public function setDownloadsUri($DownloadsUri){ $this->DownloadsUri = $DownloadsUri; }


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
     * @param array $items
     * @param bool $sendEmail
     * @return bool
     */
    public function create(array $files)
    {
        APIWrapper::verifyReadiness();
        $this->files = $files;

        $url = "https://app.fetchapp.com/api/v2/products/create";
        $data = $this->toXML();
        $response = APIWrapper::makeRequest($url, "POST", $data);
        if (isset($response->id)) {
            var_dump($response);
            // It worked, let's fill in the rest of the data
			// $this->setTotal($response->total);
			//  $this->setStatus(OrderStatus::getValue($response->status));
			//  $this->setProductCount($response->product_count);
			//   $this->setLink($response->link["href"]);
			//  $this->setCreationDate(new \DateTime($response->created_at));
            return true;
        } else {
            // It failed, let's return the error
            return $response[0];
        }
    }


    public function delete()
    {
        APIWrapper::verifyReadiness();
        $requestURL = "https://app.fetchapp.com/api/v2/products/" . $this->ProductID . "/delete";
        APIWrapper::makeRequest($requestURL, "DELETE");
    }

    /**
     * @return OrderDownload[] $downloads
     */
    public function getDownloads()
    {
        APIWrapper::verifyReadiness();
        $requestURL = "https://app.fetchapp.com/api/v2/products/" . $this->ProductID . "/downloads";
        $downloads = array();
        $results = APIWrapper::makeRequest($requestURL, "GET");
        foreach ($results->download as $d) {
            $download = new OrderDownload();
            $download->setDownloadID((string)$d->id);
            $download->setFileName((string)$d->filename);
            $download->setSKU((string)$d->product_sku);
            $download->setOrderID((string)$d->order_id);
            $download->setOrderItemID((string)$d->order_item_id);
            $download->setIPAddress((string)$d->ip_address);
            $download->setDownloadedOn(new \DateTime($d->downloaded_at));
            $download->setSizeInBytes((int)$d->size_bytes);

            $downloads[] = $download;
        }
        return $downloads;
    }

    /**
     * @return ProductStatistic[] $statistics
     */
    public function getStatistics()
    {
        APIWrapper::verifyReadiness();
        $requestURL = "https://app.fetchapp.com/api/v2/products/" . $this->ProductID . "/stats";
        $results = APIWrapper::makeRequest($requestURL, "GET");
        $stats = new ProductStatistic();
        $stats->setProductID((string)$results->id);
        $stats->setSKU((string)$results->sku);
        $stats->setDownloadCount((int)$results->download_count);
        $stats->setOrderCount((int)$results->order_count);
        $stats->setPrice((float)$results->price);
        $stats->setCurrency(Currency::getValue((string)$results->currency));
        return $stats;
    }

   /* ToDo: getFiles */




    private $FilesUri;
    private $DownloadsUri;

    public function toXML($sendEmailFlag = true)
    {
        $productXML = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?>' . '<order></order>');
        $productXML->addChild("id", $this->ProductID);
        $productXML->addChild("sku", $this->SKU);
        $productXML->addChild("name", $this->Name);
        $priceElement = $productXML->addChild("price", $this->Price);
        $priceElement->addAttribute("type", "float");
        $productXML->addChild("currency", Currency::getName($this->Currency));

        /* Confirm these elements are accepted; not in API spec */
        $productXML->addChild("paypal_add_to_cart_link", $this->PaypalAddToCartLink);
        $productXML->addChild("paypal_buy_now_link", $this->PaypalBuyNowLink);
        $productXML->addChild("paypal_view_cart_link", $this->PaypalViewCartLink);

        $productXML->addChild("files_uri", $this->FilesUri);
        $productXML->addChild("downloads_uri", $this->DownloadsUri);
        
        $creationDateElement = $productXML->addChild("created_at", $this->CreationDate->format(\DateTime::ISO8601));
        $creationDateElement->addAttribute("type", "datetime");


        $filesElement = $productXML->addChild("files");
        $filesElement->addAttribute("type", "array");
        foreach ($this->files as $file) {
            $file = $filesElement->addChild("file");
            // Check This
            $file->addChild("id", $file->getFileID() );
        }

        return $productXML->asXML();
    }
}