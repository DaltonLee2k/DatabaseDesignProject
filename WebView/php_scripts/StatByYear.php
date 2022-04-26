<html>
<head>
  <title>Players Stats By Year</title>
  <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
<div><h1>Football Database</h1></div>
        <div class="topnav">
            <a href="../index.html">Home</a>
            <a href="../leagueStandings.html">League Standings</a>
            <a class="active" href="../StatByYear.html">StatByYear</a>
            <a href="../cut.html">Cut Players</a>
            <a href="../playerStats.html">Players Stats</a>
            <a href="../playerTeams.html">Players Teams</a>
            <a href="../roster.html">Team Rosters</a>
            <a href="capacity.php">Largest Stadiums</a>
            <a href="../trade.html">Trade Players</a>
            <a href="coachWins.php">Coach Wins</a>
            <a href="gameDates.php">Games by date</a>
            <a href="../awards.html">Yearly Awards</a>
            <a href="../printTables.html">Print Tables</a>
            <a href="../reset.html">Reset DB</a>
        </div>

<?php
  // Create year variable
  $searchYear = $_POST["searchYear"];
  $searchYear = trim($searchYear);
  $ballSide = $_POST["sideOfBall"];

  $yearCheck = [2019,2020,2021];
  $result = in_array($searchYear,$yearCheck);
  if (!$result) {
    echo 'Invalid year entered';
    exit;
  }
  

  if ($ballSide == 'Offense') {
    $query = "SELECT Player_name, Team_name,Position ,Pass_yards, Rush_yards, Recieving_yards, Total_yards, Total_TDs, Stat_year 
    FROM Season_off_stats AS S, Players AS P, Team AS T WHERE (T.Team_ID = S.Team_ID) AND (P.Player_ID = S.Player_ID) AND (stat_year = $searchYear)";
  } else {
    $query = "SELECT Player_name, Team_name ,Position ,Tackles, Sacks, Takeaways, Def_TDs, Stat_year 
    FROM Season_def_stats AS S, Players AS P, Team AS T WHERE (T.Team_ID = S.Team_ID) AND (P.Player_ID = S.Player_ID) AND (stat_year = $searchYear)";
  }

  echo "Position type: $ballSide";
  echo '<br>';
  echo "Year entered: $searchYear";
  echo "<br>";

  if (!$searchYear)
  {
    echo 'You did not enter a year';
    exit;
  }

  $link=mysqli_connect("localhost", "dl146194", "YiuteeF2geeNg4boraa2ku3od6iemu", "dl146194")
    or die('Could not connect ');

  $result = mysqli_query($link,$query) 
    or die("Query failed ");


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