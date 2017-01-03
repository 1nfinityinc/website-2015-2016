<?php

    require 'database.php';
    $query = 'SELECT * FROM pages WHERE (page="' . $page . '")';
    if (@mysql_query ($query)) {

    	$results=mysql_query ($query);

    	WHILE($row = mysql_fetch_array ($results)) { // this loops through all the rows that were pulled from the DB

           print $row['title'];

         }

     }

?>