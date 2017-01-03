<?php 

 

    require '../php/database.php';

    $username = preg_replace('/\s+/', '', $_POST['username']);

    if(ctype_alnum($username)) {

        $query = 'SELECT * FROM users WHERE (username="' . $username . '")';

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