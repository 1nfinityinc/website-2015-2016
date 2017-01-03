<?php

if (isset($done)){
	if (isset($now)) {
		print '<div class="text-center"><h1><span class="label label-error">Error??!?!?!?!</span></h1></div>';			
	}
	else
	{
		
		print '<div class="text-center"><h1><span class="label label-info">The CSS Has been saved</span></h1></div>';			
		
	}
}

$cat = array("Banner", "Navbar", "Body", "Footer");

print '<form action="?css" method="post" id="cssMain">';
foreach ($cat as $value) {
	print '<div class="page-header">
<h1><strong>' . $value . '</strong></h1>
</div>';
	$query = 'SELECT * FROM css_main WHERE (cat="' . $value . '")';

	if (@mysql_query ($query)) {

	$results=mysql_query ($query);

	WHILE($row = mysql_fetch_array ($results)) { // this loops through all the rows that were pulled from the DB
		print '' . $row['description'] . ' <input type="text" id="' . $row['property']. '" name="' . $row['property']. '" value="' .  $row['value'] . '" style="border-radius: 10px; margin:3px; padding:5px;"><span style="color: ' . $row['value'] . ';">Example</span><br /> ';
				

		 }
	}
}

print '<div class="text-center"><button type="submit" form="cssMain" class="btn btn-success" value="Submit" name="css">Save CSS</button></div>';
print '</form>';



?>