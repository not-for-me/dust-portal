<?php
/* Test Codes
echo '{ "cols": [ {"id":"","label":"year","type":"string"}, {"id":"","label":"sales","type":"number"}, {"id":"","label":"expenses","type":"number"}],
		"rows": [ {"c":[{"v":"2001"},{"v":3},{"v":5}]}, {"c":[{"v":"2002"},{"v":5},{"v":10}]}, {"c":[{"v":"2003"},{"v":6},{"v":4}]}, {"c":[{"v":"2004"},{"v":8},{"v":32}]},{"c":[{"v":"2005"},{"v":3},{"v":56}]}]}';
*/

include("config.inc.php"); //include config file

$result = $mysqli->query("SELECT timestamp, raw_data, idi FROM dust_data ORDER BY id DESC LIMIT 0, 50");
$rows = $result->fetch_all(MYSQLI_ASSOC);

$data['cols'][] = array('type' => 'string', 'label' => 'timestamp');
$data['cols'][] = array('type' => 'number', 'label' => 'raw_data');
$data['cols'][] = array('type' => 'number', 'label' => 'IDI');

for($i=49; $i >= 0 ; $i--){
	$row = $rows[$i];
	$data['rows'][] = array('c' => array( 'v' => $row['timestamp'], 'v' => $row['raw_data'], 'v' => $row['idi']) );
}

echo json_encode($data);

$result->free();
$mysqli->close();

?>