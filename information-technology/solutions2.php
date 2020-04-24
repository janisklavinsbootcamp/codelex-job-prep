<?php

function maxProfit(array $pricesAndPurchases): int
{

    $prices = [];
    $purchases = [];

    //separate values for price and purchases, store each of them in array
    foreach ($pricesAndPurchases as $priceAndPurchase) {
        array_push($prices, $priceAndPurchase['price']);
        array_push($purchases, $priceAndPurchase['purchased']);
    }

    $balance = 0;
    $inventoryStock = 0;

    while (sizeof($prices) > 1) {
        //find the max selling price in a array
        $maxPrice = array_keys($prices, max($prices));

        //buy all the products, including at first instance of max price, then sell all at max price
        for ($x = 0; $x <= $maxPrice[0]; $x++) {
            $balance -= $prices[$x] * $purchases[$x];
            $inventoryStock += $purchases[$x];
        }
        //update balance and inventory after selling all the stock
        $balance += $prices[$maxPrice[0]] * $inventoryStock;
        $inventoryStock = 0;

        //remove completed transactions
        for ($x = 0; $x <= $maxPrice[0]; $x++) {
            array_shift($prices);
            array_shift($purchases);
        }
    }
    return $balance;
}

echo 'maxProfit result: ' . PHP_EOL;
$example = [
    0 => ['price' => 2, 'purchased' => 1],
    1 => ['price' => 8, 'purchased' => 1],
    2 => ['price' => 10, 'purchased' => 1],
    3 => ['price' => 4, 'purchased' => 1],
    4 => ['price' => 9, 'purchased' => 1]

];
$example2 = [
    0 => ['price' => 2, 'purchased' => 3],
    1 => ['price' => 3, 'purchased' => 0],
    2 => ['price' => 1, 'purchased' => 1],
    3 => ['price' => 5, 'purchased' => 4],
    4 => ['price' => 3, 'purchased' => 1],
    5 => ['price' => 2, 'purchased' => 2]
];

echo maxProfit($example) . PHP_EOL;
echo maxProfit($example2) . PHP_EOL;


function stringCost(string $a, string $b,
                    int $insertionCost, int $deletionCost, int $replacementCost): int
{
    //using inbuilt php function
    return $levenshtein = levenshtein($a, $b, $insertionCost, $deletionCost, $replacementCost);
}

echo 'stringCost result: ' . PHP_EOL;
echo stringCost('bitten', 'meeting', 1, 1, 1) . PHP_EOL;
echo stringCost('bitten', 'meeting', 2, 3, 6) . PHP_EOL;


function incrementalMedian(array $values): array
{
    $outputValues = [];
    for ($x = 1; $x <= sizeof($values); $x++) {
        $selectedValues = array_slice($values, 0, $x);
        sort($selectedValues);
        if (sizeof($selectedValues) % 2 == 0) {
            array_push($outputValues, ($selectedValues[sizeof($selectedValues) / 2 - 1]));
        } else {
            array_push($outputValues, $selectedValues[sizeof($selectedValues) / 2]);
        }
    }
    return $outputValues;
}

echo 'incrementalMedian result(array) : ' . PHP_EOL;
$medianExample1 = [1, 8, 4, 7, 13];
print_r(incrementalMedian($medianExample1));