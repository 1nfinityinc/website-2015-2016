<?php

$users = array();
$name = array();


$queues = array();
$type = array();
$cenddate = array();
$cstartdate = array();
$new_name = array();
  
require '../php/database.php';
$query = 'SELECT * FROM users';
if (@mysql_query ($query)) {
	$results=mysql_query ($query);
	WHILE($row = mysql_fetch_array ($results)) { // this loops through all the rows that were pulled from the DB
		$users[$row['uuid']] = $row['uuid'];
		$name[$row['uuid']] = $row['firstname'] . ' ' . $row['lastname'];
		$email[$row['uuid']] = $row['email'];
    }
}
	
foreach($users as $key => $value)
{
	$query = 'SELECT * FROM purchases WHERE user_uuid="' . $value . '"';
	$loop = 0;
	if (@mysql_query ($query)) {
			$results=mysql_query ($query);
			WHILE($row = mysql_fetch_array ($results)) { // this loops through all the rows that were pulled from the DB
				if ($row['pending'] == "2") {
					print 'yes';
					if ($row['reminder'] == "0") {
						$today = date("Y-m-d");   
						$payment = substr($row['nextp'], 0, 10) ;
						print $payment; 
						if (new DateTime() > new DateTime($payment)) {
								print 'DateTime';
								$queues[$key] = $row['uuid'];
								$type[$row['uuid']] = $row['item'];
								$cenddate[$row['uuid']] = $row['cenddate'];
								$cstartdate[$row['uuid']] = $row['cstartdate'];
								$nextp[$row['uuid']] = $row['nextp'];
						}
						else
						{
							print 'yea';
								$diff = abs(strtotime($payment) - strtotime($today));
				
							$years = floor($diff / (365*60*60*24));
							$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
							$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));	
							print $days;
							if (($days < 20 ) && ($months == 0)) {
							
								$queues[$key] = $row['uuid'];
								$type[$row['uuid']] = $row['item'];
								$cenddate[$row['uuid']] = $row['cenddate'];
								$cstartdate[$row['uuid']] = $row['cstartdate'];
								$nextp[$row['uuid']] = $row['nextp'];
								
								
							}
						}
						
					}	
					
				}
				
			}
		}


}
$loop = 0;
foreach($queues as $key => $value)
{
	
	
	$query = 'UPDATE purchases SET reminder="1" WHERE uuid="' . $value . '"';

	$retval = mysql_query($query);
	if(! $retval )
	{
		die('Error?' . mysql_error());
	}
	
	
	$query = 'UPDATE purchases SET pending="5" WHERE uuid="' . $value . '"';

	$retval = mysql_query($query);
	if(! $retval )
	{
		die('Error?' . mysql_error());
	}

	$to = $email[$key];
    $subject = "1nfinity Rent Due";
    
    $message = '
     <html>
     <head>
     <title>NOTICE: Repurchase Order Due!</title>
     </head>
     <body>
	 <p>Hello, ' . $name[$key] . ',</p>
     <p>Please click the link below to view pending rent payments for 1nfinity.</p>
      <a href="http://1nfinityinc.ml/accounts/?purchases">My Purchases</a> (You will have to Sign In)
      <p>This email is sent out about a week or more before the next rent payment is due.</p>
	  <br />
	  <p>Please keep this data below, just in case something doesn\'t go to plan: </p>
	  <h4>User-UUID: ' . $key . '</h4>
	  <h4>User-Name: ' . $name[$key] . '</h4>
	  <h4>Type: ' . $type[$value] . '</h4>
	  <h4>Next-Payment: ' . $nextp[$value] . ' + 30 days</h4>
	  <h4>Contact-Start-Date: ' . $cstartdate[$value] . '</h4>
	  <h4>Contact-End-Date: ' . $cenddate[$value] .  '</h4>	  
	  <br />
      <p>Notice we do not check during weekends or holidays. Thank you.</p>
      <p>If you need more help contact us go here: <a href="http://1nfinityinc.ml/contact">Contact Us</a></p>
      <br />
      <p>If you did not sign up please ignore this email. Thank you.</p>
      <p>If you got a duplicate email, we are testing new system software. Thank You.</p>
     </body>
     </html>
    
         ';
        $headers   = array();
        $headers[] = "MIME-Version: 1.0";
        $headers[] = "Content-type: text/html; charset=iso-8859-1";
        $headers[] = "From: Repurchase Order <noreply@1nfinityinc.ml>";
        $headers[] = "Reply-To: 1nfinity Admin <admin@1nfinityinc.ml>";
        $headers[] = "Subject: Confirm Registration";
        $headers[] = "X-Mailer: PHP/".phpversion();

        mail($to, $subject, $message, implode("\r\n", $headers));
	
	
	$loop++;
	print '# ' . $loop;
	print '<br / >User-UUID: ' . $key;
	print '<br / >User-Name: ' . $name[$key];
	print '<br / >Email: ' . $email[$key];
	print '<br / >Type: ' . $type[$value];
	print '<br />Next-Payment: ' . $nextp[$value];
	print '<br / >Contact-Start-Date: ' . $cstartdate[$value];
	print '<br / >Contact-End-Date: ' . $cenddate[$value];
	print '<hr /> <br / >';
}


?>