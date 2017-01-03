<?php

/*PHPDatabase Script*/

$debug = 0;

if ($dbc = @mysql_connect ('localhost', 'lmmecom_infinity', '1q2w3e4r5t6y')) 

{ // Open the database.

    mysql_select_db ('lmmecom_infinity');   

    if ($debug == 1)

    {

        print '<p style="color: lightgreen;"><strong>Connected!</strong></p>'; 

    }

}

else {

    print '<p style="color: red;"><strong>!Did not connect to DataBase beacause MySQL ERROR!</strong></p>';

}





?>