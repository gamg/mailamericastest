<pre>
<?php

$players = [
  [
    'name' => 'Carlos',
    'age' => 19,
    'ranking' => 1
  ],
  [
    'name' => 'Juan',
    'age' => 27,
    'ranking' => 5
  ],
  [
    'name' => 'Tomas',
    'age' => 23,
    'ranking' => 3
  ],
  [
    'name' => 'Pedro',
    'age' => 26,
    'ranking' => 4
  ],
  [
    'name' => 'Pablo',
    'age' => 20,
    'ranking' => 2
  ],
];


// Prepare result array
foreach ($players as $key => $player) {
	$result[$key]['name'] = $player['name'];
	$result[$key]['points'] = 0;
}

$maxPlayers = sizeof($players) - 1;

// Set points
foreach ($players as $indexP1 => $player1) {

	for ($indexP2=$indexP1 + 1; $indexP2 <= $maxPlayers; $indexP2++) {

		$player2 = $players[$indexP2];

		if (($player1['age'] - $player2['age']) >= 5) {
			$result[$indexP1]['points'] += 3;
		} elseif (($player2['age'] - $player1['age']) >= 5) {
			$result[$indexP2]['points'] += 3;
		} elseif ($player1['ranking'] < $player2['ranking']) {
			$result[$indexP1]['points'] += 3;
		} elseif ($player2['ranking'] < $player1['ranking']) {
			$result[$indexP2]['points'] += 3;
		}
	}
	
}

// Order players by points
function compare($playerA, $playerB) {

    if ($playerA['points'] == $playerB['points']) {
      return $playerA['name'] > $playerB['name'] ? 1 : -1;
    }

    return $playerA['points'] > $playerB['points'] ? -1 : 1;
}

usort($result, "compare");


print_r($result);

?>
</pre>