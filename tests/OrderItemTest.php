<?php declare(strict_types=1);

use FetchApp\API\FetchApp;
use FetchApp\API\Order;
use FetchApp\API\OrderItem;
use FetchApp\API\FileDetail;
use PHPUnit\Framework\TestCase;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/..');
$dotenv->load();

final class OrderItemTest extends TestCase
{
    private static $fetch;

        public static function setUpBeforeClass(): void
    {
        self::$fetch = new FetchApp();
        self::$fetch->setAuthenticationKey($_ENV['FETCH_API_KEY']);
        self::$fetch->setAuthenticationToken($_ENV['FETCH_API_TOKEN']);
    }

    public static function tearDownAfterClass(): void
    {
        self::$fetch = null;
    }

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
