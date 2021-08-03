<?php

declare(strict_types=1);

namespace Calculator;

class BasicHomeInsurance implements InsurancePrice
{
    private const PRICE_PER_METER = 12.10;
    private array $warranties;

    public function __construct()
    {
        $this->warranties[] = self::class;
    }

    public function getPrice(int $meters): float
    {
        return $meters * self::PRICE_PER_METER;
    }

    public function getBasePrice(int $meters): float
    {
        return $this->getPrice($meters);
    }

    public function addWarranty(string $name): void
    {
        $this->warranties[] = $name;
    }

    public function getWarranties(): array
    {
        return $this->warranties;
    }
}
