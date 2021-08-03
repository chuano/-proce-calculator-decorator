<?php

namespace Calculator;

interface InsurancePrice
{
    public function getPrice(int $meters): float;

    public function getBasePrice(int $meters): float;

    public function addWarranty(string $name): void;

    public function getWarranties(): array;
}
