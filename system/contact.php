<?php


    require '../php/database.php'; 	
if (isset($_POST['email'])) {
	$timestamp = date("Y-m-d H:i:s"); 

	$query = "INSERT INTO contact_logs (name, email, department, message, date) VALUES ( '{$_POST['name']}' , '{$_POST['email']}', '{$_POST['department']}', '{$_POST['text']}', '{$timestamp}')";
		// Execute the query.
	if (@mysql_query ($query)) {

		$done = true;
	} 
	else {
		print 'else error';
		die;

	}




	if ($_POST['department'] == 1) {
		$dep = "CEO";
		$email = "sarahbweatherwax87@gbstu.org";
	}
	else if  ($_POST['department'] == 2) {
		$dep = "CAO";
		$email = "allisonrkoerkel05@gbstu.org";
	}
	else if  ($_POST['department'] == 3) {
		$dep = "CFO";
		$email = "lucasmfinton95@gbstu.org";
	}
	else if  ($_POST['department'] == 4) {
		$dep = "Web Design";
		$email = "ryanmlahaie29@gbstu.org";
	}
	else if  ($_POST['department'] == 5) {
		$dep = "Sales/Marketing";
		$email = "aidanltaylor96@gbstu.org";
	}
	else if  ($_POST['department'] == 6) {
		$dep = "Administrative";
		$email = "mykaelarharris44@gbstu.org";
	}
	else if  ($_POST['department'] == 7) {
		$dep = "Accounting";
		$email = "carleyjhuelskamp28@gbstu.org";
	}
	else if  ($_POST['department'] == 8) {
		$dep = "Relations";
		$email = "brittneybbutcher57@gbstu.org";
	}
	else {
		print 'error';
		die;
	}
	$to = $email;
    	$subject = "1nfinity - Contact Us";
    
	$user = $_POST['email'];

	$name = $_POST['name'];

	$text = $_POST['text'];
        $message = '
        <html>
        <head>
          <title>1nfinity - Contact Us</title>
        </head>
        <body>
	  <p>Someone has contacted you with the name of: ' . $name . ',</p>
	  <p>with a question for the department of ' . $dep .' </p>
          <br />
          <br />
	  <p> Their message is...</p>
	  <hr />
          <p> ' . $text . ' </p>
	  <hr />
	  <p> End of Email</p>
        </body>
        </html>
    
         ';
        $headers   = array();
        $headers[] = "MIME-Version: 1.0";
        $headers[] = "Content-type: text/html; charset=iso-8859-1";
        $headers[] = "From: Contact Us <contact@1nfinityinc.ml>";
        $headers[] = "Reply-To: ' . $name . ' <$user>";
        $headers[] = "Subject: Confirm Registration";
        $headers[] = "X-Mailer: PHP/".phpversion();

        mail($to, $subject, $message, implode("\r\n", $headers));
	print 'sent';
	
}