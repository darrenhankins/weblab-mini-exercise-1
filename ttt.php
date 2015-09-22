<?php

// presets the value of the players (x,o) [0,1]
$players = ["X", "O"];

// figure out who current player is
$current_player_idx = getPlayerIdx();
// figure who just took their turn
$player = $players[$current_player_idx];
// figure out who goes next
$next_player_idx = getNextPlayerIdx($current_player_idx);
// initialize board
$board = [
    [null, null, null],
    [null, null, null],
    [null, null, null]
];

// did they select a button
if(isset($_POST['select'])){

    // turn "0,0" into an array
    $parts = explode(',', $_POST['select']);
    // set the value on the board
    $board[$parts[0]][$parts[1]] = $player; // sets piece
    // are there preset values on hmtl board
    if(isset($_POST['board'])) {
      // interate through the first dimension
        forEach ($_POST['board'] as $rowidx => $row) {
          // interate through the second dimension
            forEach ($row as $colidx => $col) {
              // set the value on our virtual board
                $board[$rowidx][$colidx] = $col;
            }
        }

    }
}

// print out the value of $_POST['board']
function debug($val){
    $output = print_r($val, true);
    echo "<pre>". $output ."</pre>";
}

// displays the chosen value or a button to choose a value to the front end
function getCell($row, $col){

    global $board;

    $val = $board[$row][$col];
    // if no value , put in the submit form
    if(is_null($val)){
        return "<input type='submit' value='$row,$col' name='select' />";
    } else {
      // if there is a value print value
        return "<h1>$val</h1><input type='hidden' name='board[$row][$col]' value='$val' />";
    }
}


function getPlayerIdx(){

    $val = 1;

    if(isset($_POST['player'])){
        $val = intval($_POST['player']);
    }

    return $val;
}

function getNextPlayerIdx($idx){
    global $players;

    $val = $idx;
    $val++;
    if($val >= count($players)) $val = 0;
    return $val;

}


?>

<html>
<head>
    <title>Tic Tac Toe</title>
</head>
<body>

  <pre><?php print_r($_POST) ?></pre>

    <form method="POST">
        <input type="hidden" value="<?= $next_player_idx; ?>"  name="player" />
        <table border="1", cellspacing="0" cellpadding="25">
            <tr>
                <td><?= getCell(0,0); ?></td>
                <td><?= getCell(0,1); ?></td>
                <td><?= getCell(0,2); ?></td>
            </tr>
            <tr>
                <td><?= getCell(1,0); ?></td>
                <td><?= getCell(1,1); ?></td>
                <td><?= getCell(1,2); ?></td>
            </tr>
            <tr>
                <td><?= getCell(2,0); ?></td>
                <td><?= getCell(2,1); ?></td>
                <td><?= getCell(2,2); ?></td>
            </tr>
        </table>
    </form>
    <?= debug($board); ?>
</body>
</html>
