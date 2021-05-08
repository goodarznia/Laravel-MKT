<?php


namespace App\Http\Services;


class calculationService
{
    private $gasConstant = 0.0083144;

    public function calcMKT($activationEnergy, $datasets): float
    {
        $termA = -$activationEnergy / $this->gasConstant; //value of -Delta H/R
        $termB = 0; //value of Sigma e^Delta H/RTn
        foreach ($datasets as $dataset) {
            $termB += pow(exp(1), ($termA / (273.15 + $dataset->Temperature)));
        }
        return round(($termA / (log($termB / 4) / log(exp(1)))) - 273.15, 2);
    }
}
