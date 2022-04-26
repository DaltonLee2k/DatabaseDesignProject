<html>
<body>

<?php

$link=mysqli_connect("localhost", "dl146194", "YiuteeF2geeNg4boraa2ku3od6iemu", "dl146194")
or die('Could not connect ');


$reset = file_get_contents('../../mysql_scripts/reset.sql');

$sql= file_get_contents('FILEPATH');

mysqli_multi_query($link,$reset)
    or die('Table Reset Failed');


echo "<h1>Database Reset!</h1>";
?>
<button onclick="window.location.href='../index.html'">Go Back</button>
</body>
</html>