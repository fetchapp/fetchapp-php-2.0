<?php declare(strict_types=1);

namespace FetchApp\Tests;

use FetchApp\API\FetchApp;
use FetchApp\API\OrderStatus;
use FetchApp\API\Order;
use FetchApp\API\OrderDownload;
use FetchApp\API\OrderItem;

final class OrderTest extends FetchAppBaseTest
{
    public function testOrders(): void
    {
        $fetch = self::$fetch;

        $orders = $fetch->getOrders(); // Grabs all orders (potentially HUGE!)

        $this->assertIsArray($orders);
        $this->assertNotEmpty($orders);

        $orders = $fetch->getOrders(OrderStatus::All, 10, 0); // Grabs orders of all types, 50 per page, page 4.
        $this->assertCount(10, $orders);

        $orders = $fetch->getOrders(OrderStatus::Expired); // Grabs all expired orders.
        $this->assertIsArray($orders);
        $this->assertNotEmpty($orders);

        $orders = $fetch->getOrders(OrderStatus::Open); // Grabs all open orders
        $this->assertIsArray($orders);
        $this->assertNotEmpty($orders);
    }

    public function testClass(): void
    {
        $fetch = self::$fetch;
        $order = $fetch->getOrderByID($_ENV['TEST_SINGLE_ORDER_ID']);

        $this->assertInstanceOf(
            Order::class,
            $order
        );
    }

    public function testSingleOrder(): void
    {
        $fetch = self::$fetch;
        $order = $fetch->getOrderByID($_ENV['TEST_SINGLE_ORDER_ID']);

        $this->assertInstanceOf(
            Order::class,
            $order
        );

        $this->assertSame((int)$_ENV['TEST_SINGLE_ORDER_ID'], $order->getOrderId());
        $this->assertSame($_ENV['TEST_SINGLE_ORDER_VENDOR_ID'], $order->getVendorID());

        $order = $fetch->getOrder($_ENV['TEST_SINGLE_ORDER_VENDOR_ID']);
        $this->assertInstanceOf(
            Order::class,
            $order
        );

        $this->assertSame((int)$_ENV['TEST_SINGLE_ORDER_ID'], $order->getOrderId());
        $this->assertSame($_ENV['TEST_SINGLE_ORDER_VENDOR_ID'], $order->getVendorID());
    }

    public function testCreateOrder(): void
    {
        $fetch = self::$fetch;

        // $order = new Order();

        // // PRC TODO: SETTING ID IS IGNORED
        // // $order->setOrderID("B008");

        // $order->setFirstName("James");
        // $order->setLastName("Bond");
        // $order->setEmailAddress("007@prcapps.com");

        // $order->setVendorID("M010");

        // $order->setCurrency(Currency::GBP);
        // $order->setCustom1("Herp");
        // $order->setCustom3("Derp");
        // $order->setExpirationDate(new DateTime("2015/12/24"));
        // $order->setDownloadLimit(12);

        // $items = array();
        // // Add items to the item array
        // $order_item = new OrderItem();
        // $order_item->setItemID(3464729);
        // // $order_item->setSKU('TestSKU');
        // array_push($items, $order_item);

        // $response = $order->create($items, false);

        // var_dump($response);

        // var_dump($order);

        $this->assertSame(false, true);

    }

    public function testUpdateOrder(): void
    {
        $fetch = self::$fetch;

        //         $order = $fetch->getOrder(68453243);

        // // PRC TODO: SETTING ID Breaks call to get items
        // // $order->setOrderID("B008");

        // $order->setFirstName("James");
        // $order->setLastName("Bond");
        // $order->setEmailAddress("007@mi6.com");
        // $order->setVendorID("PRC789");
        // $order->setCurrency(Currency::GBP);
        // $order->setCustom1("Herp");
        // $order->setCustom3("Derp");
        // $order->setExpirationDate(new DateTime("2015/12/24"));
        // $order->setDownloadLimit(12);
        // $items = $order->getItems(); // Get the existing order items

        // $response = $order->update($items, false);
        // var_dump($response);

        $this->assertSame(false, true);

    }

    public function testDeleteOrder(): void
    {
        $fetch = self::$fetch;

        //         $order = new Order();

        // $order->setFirstName("James");
        // $order->setLastName("Bond");
        // $order->setEmailAddress("007@prcapps.com");

        // $order->setVendorID("TOBEDELETED03");

        // $order->setCurrency(Currency::GBP);
        // $order->setCustom1("Herp");
        // $order->setCustom3("Derp");
        // $order->setExpirationDate(new DateTime("2015/12/24"));
        // $order->setDownloadLimit(12);

        // $items = array();
        // // Add items to the item array
        // $order_item = new OrderItem();
        // $order_item->setItemID(3464729);
        // // $order_item->setSKU('TestSKU');
        // array_push($items, $order_item);

        // $response = $order->create($items, false);

        // // var_dump($order);

        // $delete_order_id = $order->getOrderID();

        // var_dump($delete_order_id);
        // $response = $order->delete();
        // var_dump($response);

        $this->assertSame(false, true);

    }

    // PRC - Note this functionality is removed
    public function testOrderStats(): void
    {
        $fetch = self::$fetch;
        $this->assertSame(true, true);
    }

    public function testDownloads(): Array
    {
        $fetch = self::$fetch;
        $order = $fetch->getOrder($_ENV['TEST_SAMPLE_VENDOR_ORDER_ID']);

        $this->assertInstanceOf(
            Order::class,
            $order
        );

        $downloads = $order->getDownloads();

        $this->assertNotEmpty($downloads);

        // $download = $downloads[0];
        foreach($downloads as $download):
            $this->assertInstanceOf(
                OrderDownload::class,
                $download
            );
        endforeach;

        return $downloads;
    }

    // PRC - Note sure if I do this or not 
    public function testOrderExpire(): void
    {
        $fetch = self::$fetch;
        $this->assertSame(false, true);
    }

    public function testOrderResendEmail(): void
    {
        $fetch = self::$fetch;

        // try{
        //     $order = $fetch->getOrder("68906333");
        //     $order->setEmailAddress("patrick@prcapps.com");

        //     $items = $order->getItems(); // Get the existing order items

        //     $response = $order->update($items, true);
        //     var_dump($response);

        //     $response = $order->sendDownloadEmail();
        //     var_dump($response);
        // }
        // catch (Exception $e){
        //     // This will occur on any call if the AuthenticationKey and AuthenticationToken are not set.
        //     echo $e->getMessage();
        // }

        $this->assertSame(false, true);
    }
}
