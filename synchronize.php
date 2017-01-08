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
  $r[]=$row;
  $response= array("Result"=> 1,"Messages"=>$r);
}

$encoded = json_encode($response);
header('Content-type: application/json');
echo $encoded;
pg_close($db_connection);
?>
