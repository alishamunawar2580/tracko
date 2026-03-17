<?php

namespace App\Domain\Master\Product\Actions;

class CalculateProfitMarginAction
{
    public function execute(float $purchasePrice, float $sellingPrice): float
    {
        if ($purchasePrice == 0) {
            return 0;
        }
        return (($sellingPrice - $purchasePrice) / $purchasePrice) * 100;
    }
}
