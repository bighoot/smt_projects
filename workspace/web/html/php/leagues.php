<?php
/*

	$username="strongsi_brian";
	$password="124578";
	$database="strongsi_vball_data";
	
	mysql_connect(localhost,$username,$password);
	
	@mysql_select_db($database) or die( "Unable to select database");

	$query="SELECT * FROM leagues";
	
	$result=mysql_query($query);
	
	$num=mysql_numrows($result);mysql_close();

	echo "{\"data\"': [";
    
    $i = 0;
    
    $num=mysql_numrows($result);
    		
	while ($i < $num) {
	    echo "[";
	    echo "\"" . mysql_result($result,$i,"night") . "\",";
	    echo "\"" . mysql_result($result,$i,"gender") . " " . mysql_result($result,$i,"team_comp"). "\",";
	    echo "\"" . mysql_result($result,$i,"start_date") . "\",";
	    echo "\"" . mysql_result($result,$i,"times") . "\",";
	    echo "\"" . mysql_result($result,$i,"game_structure") . "\",";
	    echo "\"" . mysql_result($result,$i,"season_length") . "\",";
	    echo "\"" . mysql_result($result,$i,"cost") . "\",";
	    echo "\"" . mysql_result($result,$i,"registration_status") . "\"";
	    echo "],";
	    
	    $i++;
	}
	echo "]}";
	mysqli_close($con);

*/	
	
	
// DB table to use
$table = 'leagues';
 
// Table's primary key
$primaryKey = 'id';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'night', 				'dt' => 0 ),
    array( 'db' => 'gender_format', 		'dt' => 1 ),
    array( 'db' => 'start_date',   			'dt' => 2 ),
    array( 'db' => 'times',     			'dt' => 3 ),
    array( 'db' => 'game_structure',     	'dt' => 4 ),
    array( 'db' => 'season_length',     	'dt' => 5 ),
    array( 'db' => 'cost',     				'dt' => 6 ),
    array( 'db' => 'registration_status',	'dt' => 7 )
);
 
// SQL server connection information
$sql_details = array(
    'user' => 'strongsi_brian',
    'pass' => '124578',
    'db'   => 'strongsi_vball_data',
    'host' => 'localhost'
);
 
require( 'ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);
?>