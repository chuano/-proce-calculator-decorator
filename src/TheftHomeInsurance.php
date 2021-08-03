<?php

declare(strict_types=1);

namespace Calculator;

class TheftHomeInsurance implements InsuranceDecorator
{
    private const EXTRA_PRICE = 40;

    private InsuranceDecorator $insurance;

    public function __construct(InsuranceDecorator $insurance)
    {
        $this->insurance = $insurance;
    }

    public function getPrice(int $meters): float
    {
        return $this->insurance->getPrice($meters) + self::EXTRA_PRICE;
    }
}
