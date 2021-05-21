<?php declare(strict_types=1);

namespace FetchApp\Tests;

use PHPUnit\Framework\TestCase;
use Dotenv\Dotenv;
use FetchApp\API\FetchApp;

class FetchAppBaseTest extends TestCase
{
    public static $fetch;

    public static function setUpBeforeClass(): void
    {
        $dotenv = Dotenv::createImmutable(__DIR__.'/..');
        $dotenv->load();

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
        $this->assertInstanceOf(
            FetchApp::class,
            $fetch
        );
    }
}
