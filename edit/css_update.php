<?php

function UUIDGet() {

     return sprintf( '%04x%04x%04x%04x%04x%04x%04x%04x',

        // 32 bits for "time_low"

        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),



        // 16 bits for "time_mid"

        mt_rand( 0, 0xffff ),



        // 16 bits for "time_hi_and_version",

        // four most significant bits holds version number 4

        mt_rand( 0, 0x0fff ) | 0x4000,



        // 16 bits, 8 bits for "clk_seq_hi_res",

        // 8 bits for "clk_seq_low",

        // two most significant bits holds zero and one for variant DCE1.1

        mt_rand( 0, 0x3fff ) | 0x8000,



        // 48 bits for "node"

        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )

      );

    }

if (isset($_POST['css'])) {
	$list = array();
	$add = array();
	
	$query = 'SELECT * FROM css_main';
	print 'CSS<br />';
	if (@mysql_query ($query)) {
		$results=mysql_query ($query);
		WHILE($row = mysql_fetch_array ($results)) { // this loops through all the rows that were pulled from the DB
			if ($_POST[$row['property']]  != $row['value']) {
				$add[$row['property']] = $row['value'];
			}
			$list[$row['property']] = $row['property'];
		}	
	}
	foreach ($list as $value) {
		$query = 'UPDATE css_main SET value="' . $_POST[$value] . '" WHERE property="' . $value . '"';
		print  $query . 'working<br />';
		$retval = mysql_query($query);
		if(! $retval )
		{
		die('Error?' . mysql_error());
			$now = true;
		}
		else
		{
			$done = true;
			
		}
	}
	
	$first = 0;
	foreach($add as $key => $value)
	{
		if($first == 0){
			$first = 1;
			$log = $key . ':' . $value ;
		}
		else
		{
			
		$log = $log . ';' . $key . ':' . $value ;
			
		}
		
	}
	if (isset($log)) {
		$uuid = UUIDGet();
		$type = "Css";
		print 'inserting';
		$query = "INSERT INTO logs (log, type, uuid, username, user_uuid) VALUES ( '{$log}' , '{$type}', '{$uuid}', '{$_SESSION['username']}', '{$_SESSION['uuid']}')";
			// Execute the query.
		
		 if (@mysql_query ($query)) {

			$done = true;
		} 
		else {

			die('Error?' . mysql_error());	
			$now = true;
		}	
	}	
}

?>