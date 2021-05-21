<?php declare(strict_types=1);

namespace FetchApp\Tests;

use FetchApp\API\FetchApp;
use FetchApp\API\Order;
use FetchApp\API\FileDetail;
use PHPUnit\Framework\TestCase;

final class FileTest extends FetchAppBaseTest
{
    public function testClass(): void
    {
        $fetch = self::$fetch;
            
        $order = $fetch->getOrderByID($_ENV['TEST_SINGLE_ORDER_ID']);
        $items = $order->getItems(); // Get the existing order items

        foreach($items as $orderitem):
            $files = $orderitem->getFiles();
            $this->assertIsArray($files);
            // $this->assertNotEmpty($files);
            // $this->assertInstanceOf(
            //     FileDetail::class,
            //     $files[0]
            // );
        endforeach;
    }
}
