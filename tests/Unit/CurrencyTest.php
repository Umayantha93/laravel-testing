<?php

namespace Tests\Unit;

use App\Services\CurrencyService;
use PHPUnit\Framework\TestCase;

class CurrencyTest extends TestCase
{
    public function test_convert_usd_to_eur_successful(): void
    {
        $this->assertEquals(82, (new CurrencyService())->convert(100.00, 'usd', 'eur'));
    }
}
