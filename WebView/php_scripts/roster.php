<html>
<body>
<h1>Roster</h1>
    <?php

    $link=mysqli_connect("localhost", "dl146194", "YiuteeF2geeNg4boraa2ku3od6iemu", "dl146194")
        or die('Could not connect ');
    echo "Connected successfully <br>";

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
    echo 'Trade Successful';

      //close connection
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