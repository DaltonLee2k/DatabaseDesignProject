<html>
<title>Reset</title>
<link rel="stylesheet" type="text/css" href="../style.css">
    </head>
    <body>
        <div><h1>Football Database</h1></div>
        <div class="topnav">
            <a href="../index.html">Home</a>
            <a href="../leagueStandings.html">League Standings</a>
            <a href="../StatByYear.html">StatByYear</a>
            <a href="../cut.html">Cut Players</a>
            <a href="../playerStats.html">Players Stats</a>
            <a href="../playerTeams.html">Players Teams</a>
            <a href="../roster.html">Team Rosters</a>
            <a href="../php_scripts/capacity.php">Largest Stadiums</a>
            <a href="../trade.html">Trade Players</a>
            <a href="../php_scripts/coachWins.php">Coach Wins</a>
            <a href="../php_scripts/gameDates.php">Games by date</a>
            <a href="../awards.html">Yearly Awards</a>
            <a href="../printTables.html">Print Tables</a>
            <a class="active" href="../reset.html">Reset DB</a>
        </div>

<?php

$link=mysqli_connect("localhost", "dl146194", "YiuteeF2geeNg4boraa2ku3od6iemu", "dl146194")
or die('Could not connect ');


$reset = file_get_contents('../../mysql_scripts/reset.sql');

$sql= file_get_contents('FILEPATH');

mysqli_multi_query($link,$reset)
    or die('Table Reset Failed');


echo "<h1>Database Reset!</h1>";
?>

</body>
</html>