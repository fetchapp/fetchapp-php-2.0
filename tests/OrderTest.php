<?php declare(strict_types=1);

namespace FetchApp\Tests;

use FetchApp\API\FetchApp;
use FetchApp\API\OrderStatus;
use FetchApp\API\Order;
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
}
