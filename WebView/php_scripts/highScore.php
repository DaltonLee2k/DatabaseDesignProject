<html>
<head>
    <title>Highest Scoring Games</title>
</head>
<body>
<h1>Highest Scoring Games</h1>
<?php
    $link=mysqli_connect("localhost", "dl146194", "YiuteeF2geeNg4boraa2ku3od6iemu", "dl146194")
        or die('Could not connect ');

    $query = "SELECT MAX(Team1_points + Team2_points) AS Total_score, game_date
        FROM Games";    
    
    $result = mysqli_query($link,$query) 
        or die("Query failed ");
    echo "query ok \n";

    $num_results = mysqli_num_rows($result);

    echo '<p>Number of rows found: '.$num_results.'</p>';

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