<?php

$playerCount = (int)readline("Choose contestant count: 2, 3, 4 or 5: \n");

$playerSymbols = ["🐸", "🐙", '🐥', '🦀', '🐞'];
$playerChoices = array_splice($playerSymbols, 0, $playerCount);
$players = [];
foreach ($playerChoices as $player) {
    $players[$player] = 0;
}

//$bettingAmount = (int)readline("Input betting amount: ");
//$bettingOn = (int) readline("On which track will you bet on? ");
//$bettingLine = array_splice($players, $bettingOn, 1);
//var_dump($bettingLine);

$trackLength = 15;
$winners = [];
$iterations = 0;


function hasFinished($position, $trackLength)
{
    return $position >= $trackLength;
}

function isRacing($players, $trackLength)
{
    foreach ($players as $position) {
        if (!hasFinished($position, $trackLength)) {
            return true;
        }
    }
    return false;
}


while (isRacing($players, $trackLength)) {
    foreach ($players as $player => $position) {
        $players[$player] = $position + rand(1, 3);
        if ($position == 14) {
            $position += 1;
        }
        if ($position == 13) {
            $position += 2;
        }
        $track = array_fill(0, $trackLength, "_");
        $track[min($position, $trackLength + 1)] = $player;
        echo implode(' ', $track) . "\n";
        if (hasFinished($position, $trackLength) && !isset($winners[$player])) {
            $winners[$player][] = $iterations;
            for ($i = 1; $i <= count($winners); $i++) {
                $results = " place: " . $i . $player . "\n";
            }
            $result[] = $results;
        }
    }

    echo "\n-----------------------------\n";
    $iterations++;
    //sleep(1);
}
//var_dump($result);
echo "Results: \n" . implode("\n", $result);
//echo "You won: " . $payout;
//var_dump($winners);


//uz ceturtdienu, 13.01 :

//japabeidz hipodroms ✔
//uzvaru nosaka pec kartas - kura vieta
//var uzlikt likmes betting amount✔
//likmi var uzlikt uz konkretu simbolu vai konkretu trasi✔
//izdoma koeficientu ko vinnee pirmaa vieta✔
//ja ir divas vietas, tad tik un taa vi️nnee (izmantot in array?)