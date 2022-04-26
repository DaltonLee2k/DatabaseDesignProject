<html>
<body>
<h1>Career Stats</h1>
    <?php

    $defense = [
        'Nick Bosa',
        'Fred Warner',
        'JJ Watt',
        'Bobby Wagner',
        'Xavien Howard',
    ];


    $player = $_POST["Player"]; //inserted name

    $result = in_array($player, $defense); 


    if ($result) {
        $query = "SELECT Player_name, Position ,Tackles, Sacks, Takeaways, Def_TDs, stat_year
        FROM Players
        INNER JOIN Season_def_stats 
        ON Players.Player_ID=Season_def_stats.Player_ID
        WHERE Player_name = '".$player."'";
    } else {

        $query = "SELECT Player_name, Position ,Pass_yards, Rush_yards, Recieving_yards, Total_yards, Total_TDs, stat_year
        FROM Players
        INNER JOIN Season_off_stats 
        ON Players.Player_ID=Season_off_stats.Player_ID
        WHERE Player_name = '".$player."'";
    }

        //exit if blank name
    if (!$player) {
        echo "You did not enter a name";
            exit;
    }

        //connect statement
    $link=mysqli_connect("localhost", "dl146194", "YiuteeF2geeNg4boraa2ku3od6iemu", "dl146194")
        or die('Could not connect ');
    echo "Connected successfully\n";


        //query statement

    $result = mysqli_query($link, $query)
        or die("Query failed");

    $num_results = mysqli_num_rows($result);

    echo '<p>Number of rows found: '.$num_results.'</p>';
      
    echo " <table border='1'>\n";

    echo '<h1>Player Stats</h1>';
      
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
<button onclick="window.location.href='../index.html'">Go Back</button>
</body>
</html>