<?php declare(strict_types=1);

namespace FetchApp\Tests;

use FetchApp\API\FetchApp;
use FetchApp\API\Product;
use FetchApp\API\OrderDownload;

final class DownloadTest extends FetchAppBaseTest
{
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
