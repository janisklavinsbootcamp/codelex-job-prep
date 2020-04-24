<?php
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



$input = 'aaabbccaayyttaa';
$split = str_split($input);
var_dump($split);
$answers = [];
foreach ($split as $tree)
{
    array_push($answers, longestSubstr(implode($split)));
    array_shift($split);
}

$lengths = array_map('strlen', $answers);
var_dump($lengths);

function getmax($array, $cur, $curmax) {
    return $cur >= count($array) ? $curmax :
        getmax($array, $cur + 1, strlen($array[$cur]) > strlen($array[$curmax])
            ? $cur : $curmax);
}

echo $index_of_longest = getmax($lengths, 0, 0);