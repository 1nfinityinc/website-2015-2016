<?php 

 

    require '../php/database.php';
    $uuid = $_POST['uuid'];
    $query = 'SELECT * FROM users WHERE (uuid="' . $uuid . '")';
    $loop = 0;
    if (@mysql_query ($query)) {
        $results=mysql_query ($query);

        WHILE($row = mysql_fetch_array ($results)) { // this loops through all the rows that were pulled from the DB

        $loop++;

        }

    }

        

   if ($loop == 0)

    {

        print 'error';

    }

    else 

    {

       print 'false';

    }

    }

    else

    {

        print 'false';

    }

    ?>