<?php
$host_name = "localhost";
$user_name = "root";
$password = "1234";
$db_name = "dust";
$db =  mysql_connect($host_name , $user_name , $password);
mysql_select_db($dbname);  
	
$sql = "SELECT timestamp, raw_data, FROM dust_data ORDER BY id DESC LIMIT 0, 20";
$result = mysql_query($sql);    
$num = mysql_num_rows($result);   

$data[0] = array('time','dust_cnt');
for ($i=1; $i<($num+1); $i++){
	$data[$i] = array(mysql_result($result, $i-1, "timestamp"), mysql_result($result, $i-1, "raw_data"));
}

echo json_encode($data);
    mysql_close($db);
?>