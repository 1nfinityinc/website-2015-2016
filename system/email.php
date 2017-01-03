<?php

	
    require '../php/database.php'; 	
    $query = 'SELECT * FROM users WHERE (username="' . $_POST['username'] . '")';
    
    $loop = 0;
    	

    if (@mysql_query ($query)) {

        $results=mysql_query ($query);

        WHILE($row = mysql_fetch_array ($results)) { // this loops through all the rows that were pulled from the DB

            $loop = $loop + 1;
            $email = $row['email'];
            $uuid = $row['uuid'];
			$name = $row['username'];

        

        }

    }
    if (empty ($_POST['username'] )) {

		print 'other';

		die;

		

    }
    if ($loop  == 0){
       print 'failed';
    } else {
	$to = $email;
    	$subject = "1nfinity Registration Confirmation!";
    
        $message = '
        <html>
        <head>
          <title>Register Confirmation</title>
        </head>
        <body>
	  <p>Hello, ' . $name . ',</p>
          <p>Please click the link below to complete registration for 1nfinity.</p>
          <a href="http://1nfinityinc.ml/accounts/?confirm&code=' . $uuid . '">Confirm Code</a>
          <br />
          <br />
          <p>If you did not sign up please ignore this email. Thank you.</p>
        </body>
        </html>
    
         ';
        $headers   = array();
        $headers[] = "MIME-Version: 1.0";
        $headers[] = "Content-type: text/html; charset=iso-8859-1";
        $headers[] = "From: Register <noreply@1nfinityinc.ml>";
        $headers[] = "Reply-To: 1nfinity Admin <admin@1nfinityinc.ml>";
        $headers[] = "Subject: Confirm Registration";
        $headers[] = "X-Mailer: PHP/".phpversion();

        mail($to, $subject, $message, implode("\r\n", $headers));
	
        


    }


?>