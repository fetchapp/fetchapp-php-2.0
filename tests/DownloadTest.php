<?php declare(strict_types=1);

use FetchApp\API\FetchApp;
use FetchApp\API\Product;
use FetchApp\API\OrderDownload;
use PHPUnit\Framework\TestCase;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/..');
$dotenv->load();

final class DownloadTest extends TestCase
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
        $downloads = $product->getDownloads();
        $this->assertIsArray($downloads);
        $this->assertNotEmpty($downloads);

        $this->assertInstanceOf(
            OrderDownload::class,
            $downloads[0]
        );
    }
}
