<?php

declare(strict_types=1);

namespace Calculator;

class FireHomeInsurance implements InsurancePrice
{
    private const EXTRA_PRICE = 75;

    private InsurancePrice $insurance;

    public function __construct(InsurancePrice $insurance)
    {
        $this->insurance = $insurance;
        $this->insurance->addWarranty(self::class);
    }

    public function getPrice(int $meters): float
    {
        return $this->insurance->getPrice($meters) + self::EXTRA_PRICE;
    }

    public function getBasePrice(int $meters): float
    {
        return $this->insurance->getBasePrice($meters);
    }

    public function addWarranty(string $name): void
    {
        $this->insurance->addWarranty($name);
    }

    public function getWarranties(): array
    {
        return $this->insurance->getWarranties();
    }

}
