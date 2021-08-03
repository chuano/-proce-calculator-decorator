<?php

declare(strict_types=1);

namespace Tests;

use Calculator\BasicHomeInsurance;
use Calculator\FireHomeInsurance;
use Calculator\GlassHomeInsurance;
use Calculator\TheftHomeInsurance;
use PHPUnit\Framework\TestCase;

class InsurancePriceCalculatorTest extends TestCase
{
    /** @test */
    public function should_return_base_price(): void
    {
        $insurance = new BasicHomeInsurance();
        $this->assertEquals(1210, $insurance->getPrice(100));
    }

    /** @test */
    public function should_return_base_price_plus_fire_extra(): void
    {
        $baseInsurance = new BasicHomeInsurance();
        $insurance = new FireHomeInsurance($baseInsurance);
        $this->assertEquals(1285, $insurance->getPrice(100));
    }

    /** @test */
    public function should_return_base_price_plus_glass_extra(): void
    {
        $baseInsurance = new BasicHomeInsurance();
        $insurance = new GlassHomeInsurance($baseInsurance);
        $this->assertEquals(1235, $insurance->getPrice(100));
    }

    /** @test */
    public function should_return_base_price_plus_theft_extra(): void
    {
        $baseInsurance = new BasicHomeInsurance();
        $insurance = new TheftHomeInsurance($baseInsurance);
        $this->assertEquals(1250, $insurance->getPrice(100));
    }

    /** @test */
    public function should_return_base_price_all_extra(): void
    {
        $baseInsurance = new BasicHomeInsurance();
        $fireInsurance = new FireHomeInsurance($baseInsurance);
        $fireAndGlassInsurance = new GlassHomeInsurance($fireInsurance);
        $fireGlassAndTheftInsurance = new TheftHomeInsurance($fireAndGlassInsurance);
        $this->assertEquals(1350, $fireGlassAndTheftInsurance->getPrice(100));
    }

    /** @test */
    public function should_return_baseprice_given_none_warranty(): void
    {
        $baseInsurance = new BasicHomeInsurance();
        $this->assertEquals(1210, $baseInsurance->getBasePrice(100));
    }

    /** @test */
    public function should_return_baseprice_given_one_warranty(): void
    {
        $baseInsurance = new BasicHomeInsurance();
        $fireInsurance = new FireHomeInsurance($baseInsurance);
        $this->assertEquals(1210, $fireInsurance->getBasePrice(100));
    }

    /** @test */
    public function should_return_baseprice_given_all_warranties(): void
    {
        $baseInsurance = new BasicHomeInsurance();
        $fireInsurance = new FireHomeInsurance($baseInsurance);
        $fireAndGlassInsurance = new GlassHomeInsurance($fireInsurance);
        $fireGlassAndTheftInsurance = new TheftHomeInsurance($fireAndGlassInsurance);
        $this->assertEquals(1210, $fireGlassAndTheftInsurance->getBasePrice(100));
    }

    /** @test */
    public function should_return_base_warranty(): void
    {
        $expected = [BasicHomeInsurance::class];
        $baseInsurance = new BasicHomeInsurance();
        $this->assertEquals($expected, $baseInsurance->getWarranties());
    }

    /** @test */
    public function should_return_basic_and_fire_warranty(): void
    {
        $expected = [BasicHomeInsurance::class, FireHomeInsurance::class];
        $baseInsurance = new BasicHomeInsurance();
        $fireInsurance = new FireHomeInsurance($baseInsurance);
        $this->assertEquals($expected, $fireInsurance->getWarranties());
    }

    /** @test */
    public function should_return_all_warranties(): void
    {
        $expected = [
            BasicHomeInsurance::class,
            FireHomeInsurance::class,
            GlassHomeInsurance::class,
            TheftHomeInsurance::class
        ];
        $baseInsurance = new BasicHomeInsurance();
        $fireInsurance = new FireHomeInsurance($baseInsurance);
        $fireAndGlassInsurance = new GlassHomeInsurance($fireInsurance);
        $fireGlassAndTheftInsurance = new TheftHomeInsurance($fireAndGlassInsurance);
        $this->assertEquals($expected, $fireGlassAndTheftInsurance->getWarranties());
    }
}
