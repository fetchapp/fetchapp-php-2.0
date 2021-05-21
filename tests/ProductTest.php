<?php declare(strict_types=1);

namespace FetchApp\Tests;

use FetchApp\API\FetchApp;
use FetchApp\API\Product;

final class ProductTest extends FetchAppBaseTest
{
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
