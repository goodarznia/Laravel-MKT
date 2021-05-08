<?php

namespace Tests\Unit;

use App\Services\calculationService;
use PHPUnit\Framework\TestCase;

class CalculationServiceTest extends TestCase
{
    public $dataset = array();

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_calcMKT()
    {
        $MKTCalculator = new calculationService();
        $acivationEnergy = 83.144;
        $this->assertTrue(true);
        $result = $MKTCalculator->calcMKT($acivationEnergy, $this->provideDataset());
        $expected = 24.65;
        $this->assertSame($expected, $result);
    }

    public function provideDataset()
    {
        $this->dataset[] = array("Time" => "2021-05-06 08:00:00", "Temperature" => "20");
        $this->dataset[] = array("Time" => "2021-05-06 08:01:00", "Temperature" => "27");
        $this->dataset[] = array("Time" => "2021-05-06 08:02:00", "Temperature" => "21");
        $this->dataset[] = array("Time" => "2021-05-06 08:03:00", "Temperature" => "28");
        return json_decode(json_encode($this->dataset));
    }
}
