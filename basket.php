<?php

class Basket {
    private $products = [];
    private $catalogue;
    private $deliveryRules;
    private $offers;

    public function __construct($catalogue, $deliveryRules, $offers) {
        $this->catalogue = $catalogue;
        $this->deliveryRules = $deliveryRules;
        $this->offers = $offers;
    }

    public function add($productCode) {
        if (isset($this->catalogue[$productCode])) {
            $this->products[] = $this->catalogue[$productCode];
        } else {
            throw new Exception("Product code $productCode not found in catalogue.");
        }
    }

    public function total() {
        $total = 0;
        $redWidgetCount = 0;

        // Calculate total price for products
        foreach ($this->products as $product) {
            if ($product->code == 'R01') {
                $redWidgetCount++;
            }
            $total += $product->price;
        }

        // Apply offers
        if ($redWidgetCount > 1) {
            $total -= floor($redWidgetCount / 2) * ($this->catalogue['R01']->price / 2);
        }

        // Calculate delivery cost
        $deliveryCost = 0;
        if ($total < 50) {
            $deliveryCost = 4.95;
        } elseif ($total < 90) {
            $deliveryCost = 2.95;
        }

        return round($total + $deliveryCost, 2);
    }
}

?>
