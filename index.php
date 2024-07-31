<?php

require_once 'product.php';
require_once 'basket.php';



$catalogue = [
    'R01' => new Product('R01', 32.95),
    'G01' => new Product('G01', 24.95),
    'B01' => new Product('B01', 7.95)
];


$deliveryRules = [
    ['min' => 0, 'max' => 50, 'cost' => 4.95],
    ['min' => 50, 'max' => 90, 'cost' => 2.95],
    ['min' => 90, 'max' => INF, 'cost' => 0]
];


$offers = [
    'R01' => ['type' => 'BOGOHP', 'description' => 'Buy one red widget, get the second half price']
];


function displayBasketTotal($products, $total) {
    echo "<tr>";
    echo "<td>" . implode(", ", $products) . "</td>";
    echo "<td>$" . number_format($total, 2) . "</td>";
    echo "</tr>";
}

echo "<table border='1'>";
echo "<tr><th>Products</th><th>Total</th></tr>";

$basket = new Basket($catalogue, $deliveryRules, $offers);
$basket->add('B01');
$basket->add('G01');
displayBasketTotal(['B01', 'G01'], $basket->total());

$basket = new Basket($catalogue, $deliveryRules, $offers);
$basket->add('R01');
$basket->add('R01');
displayBasketTotal(['R01', 'R01'], $basket->total());

$basket = new Basket($catalogue, $deliveryRules, $offers);
$basket->add('R01');
$basket->add('G01');
displayBasketTotal(['R01', 'G01'], $basket->total());

$basket = new Basket($catalogue, $deliveryRules, $offers);
$basket->add('B01');
$basket->add('B01');
$basket->add('R01');
$basket->add('R01');
$basket->add('R01');
displayBasketTotal(['B01', 'B01', 'R01', 'R01', 'R01'], $basket->total());

echo "</table>";

?>