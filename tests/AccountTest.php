<?php declare(strict_types=1);

use FetchApp\API\FetchApp;
use FetchApp\API\AccountDetail;
use PHPUnit\Framework\TestCase;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/..');
$dotenv->load();

final class AccountTest extends TestCase
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

        $account = $fetch->getAccountDetails();//    That was easy!

        $this->assertInstanceOf(
            AccountDetail::class,
            $account
        );
    }

    public function testFields(): void
    {
        $fetch = self::$fetch;

        $account = $fetch->getAccountDetails();//    That was easy!

        $this->assertInstanceOf(
            AccountDetail::class,
            $account
        );

        $this->assertSame((int)$_ENV['TEST_ACCOUNT_ID'], $account->getAccountID());
        $this->assertSame($_ENV['TEST_ACCOUNT_NAME'], $account->getAccountName());
        $this->assertSame($_ENV['TEST_ACCOUNT_BILLING_EMAIL'], $account->getBillingEmail());
        $this->assertSame($_ENV['TEST_ACCOUNT_EMAIL_ADDRESS'], $account->getEmailAddress());
        $this->assertSame($_ENV['TEST_ACCOUNT_URL'], $account->getURL());
        $this->assertNull($account->getItemDownloadLimit());
        $this->assertNull($account->getOrderExpirationInHours());
    }
}
