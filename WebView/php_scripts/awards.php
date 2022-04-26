<html>
<head>
  <title>League Standings</title>
</head>
<body>
<h1>League Standings</h1>

<?php
  // Create year variable
  $searchYear = $_POST["searchYear"];
  $searchYear = trim($searchYear);
  $league = $_POST["league"];

  $yearCheck = [2019,2020,2021];
  $result = in_array($searchYear,$yearCheck);
  if (!$result) {
    echo 'Invalid year entered';
    exit;
  }
  if (!$searchYear)
  {
    echo 'You did not enter a year';
    exit;
  }


  $query = "SELECT League_name, Player_name AS MVP, Team_name AS League_Champion, Season_year
            FROM Players AS P , Team AS T, League AS L, Yearly_awards AS A
            WHERE (P.Player_ID = A.League_MVP) AND (T.Team_ID = A.League_Champion) AND (Season_Year = $searchYear)
             AND (L.League_ID = A.League_ID)";

  $link=mysqli_connect("localhost", "dl146194", "YiuteeF2geeNg4boraa2ku3od6iemu", "dl146194")
    or die('Could not connect ');
  echo "Connected successfully <br>";
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
<button onclick="window.location.href='../index.html'">Go Back</button>
</body>
</html>