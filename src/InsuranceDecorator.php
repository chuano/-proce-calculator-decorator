<?php

namespace Calculator;

interface InsuranceDecorator
{
    public function getPrice(int $meters): float;
}
