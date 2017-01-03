<?php
function PassGen() {

     return sprintf( '%04x%04x%04x%04x',

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
function emailCheck($email) {
	$query = 'SELECT * FROM users WHERE (email="' . $email. '")';
	$loop = 0;
    if (@mysql_query ($query)) {
		$results=mysql_query ($query);
		WHILE($row = mysql_fetch_array ($results)) { // this loops through all the rows that were pulled from the DB
			$emails = $row['email'];			
		}
		if ($emails == $email) {
			return true;
		}
		else 
		{
			return false;
		}
	}
}

function emailUser($email) {
	$query = 'SELECT * FROM users WHERE (email="' . $email. '")';
	$loop = 0;
    if (@mysql_query ($query)) {
		$results=mysql_query ($query);
		WHILE($row = mysql_fetch_array ($results)) { // this loops through all the rows that were pulled from the DB
			$uuid = $row['uuid'];			
		}
	}
	
	
	
	$temppass = PassGen();
	$newpass = md5($temppass);
	$query = 'UPDATE users SET password="' . $newpass . '" WHERE email="' . $email . '"';
	$retval = mysql_query($query);
	if(! $retval )
	{
		die('Error?' . mysql_error());
	}
	$to = $email;
	$subject = "1nfinity Password Reset!";
	$message = '
			<html>
<head>
<title>Reset Password</title>
</head>
<body>
<p>Hello user at, ' . $email. ',</p>
<p>Click the link below to reset your password, but make sure you use the <strong>temporary</strong> password below</p>

<p><strong>Temporary Password: '. $temppass . '</strong>
<br />
<br />
<br />
<a href="http://1nfinityinc.ml/accounts/?reset&uuid=' . $uuid . '">Reset Password</a>
<br />
<br />
<p>If you did not reset your password, this temporary password will override your original password.</p>
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
	
}


if (isset($_POST['submit'])) {
  if(emailCheck($_POST['email']) == true) {
    emailUser($_POST['email']);
	print '<div class="container bs-docs-container">
    <div class="col-md-13" role="main">
        <div class="bs-docs-section">
            <div class="panel panel-default" id="mainResetPass">
                <div class="panel-heading">
                    <h1>Reset Password</h1>
                </div>
                <div class="panel-body">
					<h1> Please check your email, thanks!</h1>
                </div>
            </div>
     
        </div>
    </div>
	</div>';
  }	
	else
	{
		print '

<div class="container bs-docs-container">
    <div class="col-md-13" role="main">
        <div class="bs-docs-section">
            <div class="panel panel-default" id="mainResetPass">
                <div class="panel-heading">
                    <h1>Reset Password</h1>
                </div>
                <div class="panel-body">
				<form action="../reset/" method="POST" role="form" class="form-horizontal">
					<div class="form-group">
							<label class="control-label col-sm-4" >Enter Email</label>
						<div class="col-sm-8">
							<input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
						</div>
					</div>
				<div class="form-group">        
				  <div class="col-sm-offset-4 col-sm-10">
					<button type="submit" id="submit" name="submit" class="btn btn-default">Submit</button>
				  </div>
				</div>
			  </form>
                </div>
            </div>
				<div style="background-color: gray; border-radius: 10px; margin: 10px; padding: 5px;">
					Invaild Email Address!
				</div>
        </div>
    </div>
	</div>';
		
	}
}
else {
print '

<div class="container bs-docs-container">
    <div class="col-md-13" role="main">
        <div class="bs-docs-section">
            <div class="panel panel-default" id="mainResetPass">
                <div class="panel-heading">
                    <h1>Reset Password</h1>
                </div>
                <div class="panel-body">
				<form action="../reset/" method="POST" role="form" class="form-horizontal">
					<div class="form-group">
							<label class="control-label col-sm-4" >Enter Email</label>
						<div class="col-sm-8">
							<input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
						</div>
					</div>
				<div class="form-group">        
				  <div class="col-sm-offset-4 col-sm-10">
					<button type="submit" id="submit" name="submit" class="btn btn-default">Submit</button>
				  </div>
				</div>
			  </form>
                </div>
            </div>
     
        </div>
    </div>
	</div>';



}

?>

