<?php

namespace Calculator;

interface InsurancePrice
{
    public function getPrice(int $meters): float;
}
