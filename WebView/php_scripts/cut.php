<html>
<title>Cut Player</title>
<link rel="stylesheet" type="text/css" href="../style.css">
<body>
<div><h1>Football Database</h1></div>
        <div class="topnav">
            <a href="../index.html">Home</a>
            <a href="../leagueStandings.html">League Standings</a>
            <a href="../StatByYear.html">StatByYear</a>
            <a class="active" href="../cut.html">Cut Players</a>
            <a href="../playerStats.html">Players Stats</a>
            <a href="../playerTeams.html">Players Teams</a>
            <a href="../roster.html">Team Rosters</a>
            <a href="../php_scripts/capacity.php">Largest Stadiums</a>
            <a href="../trade.html">Trade Players</a>
            <a href="../php_scripts/coachWins.php">Coach Wins</a>
            <a href="../php_scripts/gameDates.php">Games by date</a>
            <a href="../awards.html">Yearly Awards</a>
            <a href="../printTables.html">Print Tables</a>
            <a href="../reset.html">Reset DB</a>
        </div>
    <?php

    $link=mysqli_connect("localhost", "dl146194", "YiuteeF2geeNg4boraa2ku3od6iemu", "dl146194")
        or die('Could not connect ');


    $player1 = $_POST['Player1'];
    

    $player1ID = "DELETE FROM Players WHERE Player_name LIKE '".$player1."'";
    $cut = mysqli_query($link,$player1ID);
    echo '<p>Player cut</p>';

      //close connection
    mysqli_close($link);

?>

</body>
</html>