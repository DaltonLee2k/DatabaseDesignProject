<html>
<head>
        <title>Stadium Capacity</title>
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
            <a class="active": href="../php_scripts/capacity.php">Largest Stadiums</a>
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


$query = "SELECT Stadium_name, City ,Team_name as Home_team, Capacity
FROM Team as T, Stadiums as S
WHERE (S.Team_ID = T.Team_ID)
GROUP BY Capacity DESC;";
$result = mysqli_query($link, $query) 
 or die("Query failed ");

echo "<h1>$table</h1>";


//print results in html
$num_results = mysqli_num_rows($result);



echo " <table border='1'>\n";

//print column headings
echo "\t<tr>\n";
while ($fieldinfo = $result -> fetch_field()){
echo "\t\t<td>$fieldinfo->name</td>\n";
}
echo "\t</tr>\n";


while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

echo "\t<tr>\n";
foreach ($row as $col_value) {
echo "\t\t<td>$col_value</td>\n";
}
echo "\t</tr>\n";
}
echo "</table>\n";

//Free result set
mysqli_free_result($result);

//close connection
mysqli_close($link);
?>

</body>
</html>