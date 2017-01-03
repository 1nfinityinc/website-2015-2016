<?php           

$query = 'SELECT * FROM css_main';
$content = array();

require 'php/database.php';

if (@mysql_query ($query)) {
	$results=mysql_query ($query);
	WHILE($row = mysql_fetch_array ($results)) { // this loops through all the rows that were pulled from the DB
	print $row['property'] . "   =    " . $row['value'];	
        print '<br />';



    }
}



?>