<?php declare(strict_types=1);

use FetchApp\API\FetchApp;
use FetchApp\API\Product;
use PHPUnit\Framework\TestCase;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/..');
$dotenv->load();

final class ProductTest extends TestCase
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
        $product = $fetch->getProduct($_ENV['TEST_SINGLE_PRODUCT_ID']);

        $this->assertInstanceOf(
            Product::class,
            $product
        );
    }
}
