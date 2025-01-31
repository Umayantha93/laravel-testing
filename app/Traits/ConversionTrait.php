<?php

namespace App\Traits;

use App\Services\CurrencyService;

trait ConversionTrait
{
    public function convertCurrency(float $value, string $to, string $from): float
    {
        $currencyService = app(CurrencyService::class);
        return $currencyService->convert($value, $to, $from);
    }
}
