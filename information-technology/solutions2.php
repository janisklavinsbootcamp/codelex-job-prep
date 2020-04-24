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
    return $moneyEarned = abs($balance);
}


$example = [
    0 => ['price' => 2, 'purchased' => 3],
    1 => ['price' => 3, 'purchased' => 0],
    2 => ['price' => 1, 'purchased' => 1],
    3 => ['price' => 5, 'purchased' => 4],
    4 => ['price' => 3, 'purchased' => 1],
    5 => ['price' => 2, 'purchased' => 2]
];

echo maxProfit($example) . PHP_EOL;




//
//function stringCost(string $a, string $b,
//                    int $insertionCost, int $deletionCost, int $replacementCost): int
//{
//
//
//    throw new \Exception('Not implemented.');
//}
//
//function incrementalMedian(array $values): array
//{
//
//
//    throw new \Exception('Not implemented.');
//}
