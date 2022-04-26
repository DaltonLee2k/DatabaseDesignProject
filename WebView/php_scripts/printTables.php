<html>
<body>
<?php
// connect to database
$link=mysqli_connect("localhost", "dl146194", "YiuteeF2geeNg4boraa2ku3od6iemu", "dl146194")
   or die('Could not connect ');
echo "Connected successfully\n";



//perform SQL query
$table = $_POST['tableType'];


$query = "SELECT * from $table";
$result = mysqli_query($link, $query) 
	or die("Query failed ");
echo "query ok";
echo "<h1>$table</h1>";


//print results in html
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