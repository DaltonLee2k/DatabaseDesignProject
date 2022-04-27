<html>
<head>
        <title>Team current rosters</title>
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
            <a class="active" href="../roster.html">Team Rosters</a>
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
   

    $team = $_POST['Team'];
    

    $teamID = "SELECT Team_ID FROM Team WHERE Team_name LIKE '".$team."'";
   
    //get the teams ID
    $ID1 = mysqli_query($link,$teamID);
    while ($idRow = mysqli_fetch_array($ID1, MYSQLI_ASSOC)) {
        foreach ($idRow as $col_value) {
            $teamID = $col_value;
        }
    }
    $teamID = (int)($teamID);

    

    
    $swap1 = "SELECT Player_name, Team_name, Position 
    FROM Team as T, Players as P 
    WHERE P.Team_ID = T.Team_ID AND P.Team_ID = $teamID";
    $result = mysqli_query($link, $swap1);
    

      //close connection
      $num_results = mysqli_num_rows($result);

      
      echo "<br>";
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