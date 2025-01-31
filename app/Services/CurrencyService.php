<?

namespace App\Services;

class CurrencyService
{
    public function convert(float $amount, string $from, string $to): float
    {
        $rate = $this->getRate($from, $to);
        return $amount * $rate;
    }

    private function getRate(string $from, string $to): float
    {
        $rates = [
            'usd' => ['eur' => 0.82, 'gbp' => 0.74],
            'eur' => ['usd' => 1.22, 'gbp' => 0.91],
            'gbp' => ['usd' => 1.35, 'eur' => 1.10],
        ];

        return $rates[$from][$to] ?? 1.0;
    }
}