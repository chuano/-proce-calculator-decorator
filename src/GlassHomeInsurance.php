<?php

declare(strict_types=1);

namespace Calculator;

class GlassHomeInsurance implements InsurancePrice
{
    private const EXTRA_PRICE = 25;

    private InsurancePrice $insurance;

    public function __construct(InsurancePrice $insurance)
    {
        $this->insurance = $insurance;
    }

    public function getPrice(int $meters): float
    {
        return $this->insurance->getPrice($meters) + self::EXTRA_PRICE;
    }
}
