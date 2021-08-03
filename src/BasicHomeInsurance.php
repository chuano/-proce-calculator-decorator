<?php

declare(strict_types=1);

namespace Calculator;

class BasicHomeInsurance implements InsuranceDecorator
{
    private const PRICE_PER_METER = 12.10;

    public function getPrice(int $meters): float
    {
        return $meters * self::PRICE_PER_METER;
    }
}
