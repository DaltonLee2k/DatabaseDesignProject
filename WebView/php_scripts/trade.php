<html>
<body>
<h1>Trade Players</h1>
    <?php

    $link=mysqli_connect("localhost", "dl146194", "YiuteeF2geeNg4boraa2ku3od6iemu", "dl146194")
        or die('Could not connect ');
    echo "Connected successfully <br>";

    $player1 = $_POST['Player1'];
    $player2 = $_POST['Player2'];

    $player1ID = "SELECT Team_ID FROM Players WHERE Player_name LIKE '".$player1."'";
    $player2ID = "SELECT Team_ID FROM Players WHERE Player_name LIKE '".$player2."'";

    //get the first players ID
    $ID1 = mysqli_query($link,$player1ID);
    while ($idRow = mysqli_fetch_array($ID1, MYSQLI_ASSOC)) {
        foreach ($idRow as $col_value) {
            $teamID = $col_value;
        }
    }
    $teamID = (int)($teamID);
    //get the second players ID
    $ID2 = mysqli_query($link,$player2ID);
    while ($idRow = mysqli_fetch_array($ID2, MYSQLI_ASSOC)) {
        foreach ($idRow as $col_value) {
            $team2ID = $col_value;
        }
    }
    $team2ID = (int)($team2ID);
    if ($team2ID == $teamID) {
        echo 'These players are on the same team';
        exit;
    }
    
    $swap1 = "UPDATE Players SET Team_ID = $teamID WHERE Player_name LIKE '".$player2."'";
    $swap2 = "UPDATE Players SET Team_ID = $team2ID WHERE Player_name LIKE '".$player1."'";
    $query2 = mysqli_query($link, $swap1);
    $query3 = mysqli_query($link, $swap2);
    echo 'Trade Successful';

      //close connection
    mysqli_close($link);

?>
<button onclick="window.location.href='../index.html'">Go Back</button>
</body>
</html>