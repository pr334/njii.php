<?php
$config=parse_ini_file("/afs/cad/u/p/r/pr334/.postgres",false,true);
$host=$config['host'];
$username=$config['username'];
$password=$config['password'];
$db_connection = pg_connect("host=$host dbname=PQRS user=$username password=$password");

if(!$db_connection)
{
	print "Not connected";
}

$result = pg_query($db_connection, "SELECT FirstName, LastName FROM Patient");

if (!$result) {
  echo "An error occurred.\n";
  exit;
}

while ($row = pg_fetch_row($result)) {
  echo "FirstName: $row[0]  LastName: $row[1]";
  echo "<br />\n";
}
pg_close($db_connection);
?>

