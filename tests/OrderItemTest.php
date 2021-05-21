<?php declare(strict_types=1);

namespace FetchApp\Tests;

use FetchApp\API\FetchApp;
use FetchApp\API\Order;
use FetchApp\API\OrderItem;
use FetchApp\API\FileDetail;

final class OrderItemTest extends FetchAppBaseTest
{
    public function testClass(): void
    {
        $fetch = self::$fetch;
            
        $order = $fetch->getOrderByID($_ENV['TEST_SINGLE_ORDER_ID']);
        $items = $order->getItems(); // Get the existing order items

        $this->assertIsArray($items);
        $this->assertNotEmpty($items);
        $this->assertInstanceOf(
            OrderItem::class,
            $items[0]
        );
    }
}
