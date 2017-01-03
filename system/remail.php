<?php

	if (isset($_POST['submit'])) {
		print '> Submit <';
		if (isset($_POST['password'])) {
			if ($_POST['password'] == "jasper") {
				print '> Accepted < <br/>';
			
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

					print '> Issue < <br/>';

					die;

					

				}
				if ($loop  == 0){
				   print '> Failed to Send < <br/>';
				} else {
					$to = $email;
						$subject = "1nfinity Registration Confirmation!";
					print '> Email:' . $email . '<br/>';
						$message = '
						<html>
						<head>
						  <title>Register Confirmation</title>
						</head>
						<body>
					  <p>Hello, ' . $name . ',</p>
						  <p>Sorry for the email issues. Click the link below to confirm your account and begin exploring!</p>
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
						$headers[] = "Reply-To: 1nfinity Admin <admin@1nfinity.ml>";
						$headers[] = "Subject: Confirm Registration";
						$headers[] = "X-Mailer: PHP/".phpversion();

						mail($to, $subject, $message, implode("\r\n", $headers));
						print '> Sent < <br/>';
						


				}
			}
		}
	}			

?>

<form action="" method="post">
	Username: <input type="text" name="username"/><br />
	Key:<input type="password" name="password"/><br />
	 <input type="submit" value="Submit" name="submit">
</form>	
	