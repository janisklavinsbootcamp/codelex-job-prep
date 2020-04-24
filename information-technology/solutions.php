<?php

function findOddEvenPair(array $numbers): int
{
    $indexes = [];
    for ($i = 0; $i < sizeof($numbers) - 1; $i++) {
        if ($numbers[$i] % 2 === 0 && $numbers[$i + 1] % 2 !== 0 ||
            $numbers[$i] % 2 !== 0 && $numbers[$i + 1] % 2 === 0) {
            array_push($indexes, (int)$i);
        }
    }
    //var_dump($indexes);
    $randomIndex = array_rand($indexes);
    return $indexes[$randomIndex];
}

//echo findOddEvenPair([1, 2, 4, 3, 7]);


class SummationService
{
    private array $data;

    public function __construct(array $data)
    {
        if (!empty($data)) {
            $this->data = $data;
        } else {
            echo 'Error! Array must contain integers!';
        }
    }

    public function sum(int $a, int $b): int
    {
        $dataWithBoundaries = array_slice($this->data, $a, $b);
        return array_sum($dataWithBoundaries);
    }
}

//$new = new SummationService([-1, 0, 2, 7, -15]);
//echo $new->sum(2, 4);


function longestSubstr(string $string): string
{
    //split the input string into an array of letters
    $letters = str_split($string);

    //create letter pairs and push them to an array
    $letterPairs = [];
    for ($i = 0; $i < sizeof($letters) - 1; $i++) {
        array_push($letterPairs, $letters[$i] . $letters[$i + 1]);
    }

    //flip array values with keys
    $uniquesIndexes = array_flip($letterPairs);

    //reset all values in the associative array
    $uniqueLetterCount = array_fill_keys(array_keys($uniquesIndexes), 0);

    //count the occurrences for the elements in letterPairs array, stop pushing values if values start to repeat
    $uniquePairsFinal = [];
    foreach ($letterPairs as $letterUniquePair) {
        if (array_key_exists($letterUniquePair, $uniqueLetterCount) == true) {
            $uniqueLetterCount[$letterUniquePair]++;
            array_push($uniquePairsFinal, $letterUniquePair);
            if (max($uniqueLetterCount) > 1) {
                array_pop($uniquePairsFinal);
                break;
            }
        }
    }
    //count how many occurrences happened without them repeating,
    $outputStringLength = (sizeof($uniquePairsFinal));
    $lettersForOutput = [];

    //cut the input string length
    for ($i = 0; $i <= $outputStringLength; $i++) {
        array_push($lettersForOutput, $letters[$i]);
    }

    //output result
    return implode($lettersForOutput);
}

echo longestSubstr('aaa') . PHP_EOL;
echo longestSubstr('aZa') . PHP_EOL;
echo longestSubstr('aZAzaz') . PHP_EOL;

