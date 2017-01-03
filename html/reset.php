
<?php
function checkUser($uuid) {
	$query = 'SELECT * FROM users WHERE (uuid="' . $uuid . '")';
	$loop = 0;
    if (@mysql_query ($query)) {
		$results=mysql_query ($query);
		WHILE($row = mysql_fetch_array ($results)) { // this loops through all the rows that were pulled from the DB
			$loop++;			
		}
		if ($loop == 0)
		{
			return false;
		}
		else 
		{
			return true;
		}
	}
}

function uuid2username($uuid) {
	$query = 'SELECT * FROM users WHERE (uuid="' . $uuid . '")';
	$loop = 0;
    if (@mysql_query ($query)) {
		$results=mysql_query ($query);
		WHILE($row = mysql_fetch_array ($results)) { // this loops through all the rows that were pulled from the DB
			$loop++;
			$name = $row['username'];
		}
		if ($loop == 0)
		{
			print 'Invaild USER UUID! This is an error please xontact help@1nfinityinc.ml for further infomation. Thank you.';
		}
	}
	return $name;
}

function checkPass($uuid, $oldpass) {
	$query = 'SELECT * FROM users WHERE (uuid="' . $uuid . '")';
	$loop = 0;
    if (@mysql_query ($query)) {
		$results=mysql_query ($query);
		WHILE($row = mysql_fetch_array ($results)) { // this loops through all the rows that were pulled from the DB
			$loop++;
			$name = $row['username'];
			$hashed_pass = $row['password'];
		}
		if ($hashed_pass == md5($oldpass))
		{
			return true;
		}
		else
		{
			return false;
		}
		if ($loop == 0)
		{
			print 'Invaild USER UUID! This is an error please xontact help@1nfinityinc.ml for further infomation. Thank you.';
		}
	}
}


function updatePass($pass, $uuid) {
	$query = 'UPDATE users SET password="' . $pass . '" WHERE uuid="' . $uuid . '"';
	$retval = mysql_query($query);
	if(! $retval )
	{
		die('Error?' . mysql_error());
	}

}
if (isset($_POST['submit'])) {
		print '
	<script>
function goBack() {
    window.history.back();
}
</script><div class="container bs-docs-container">
    <div class="col-md-13" role="main">
        <div class="bs-docs-section">';
	if (isset($_GET['uuid']))
	{
		$uuid = $_GET['uuid'];
	}
	else if(isset($_SESSION['uuid'])) {
		
		$uuid = $_SESSION['uuid'];
	}
	else
	{
		$uuid = "null";
	}

	if (checkUser($uuid) == true) {
		if ($_POST['pwd'] == $_POST['cpwd'])
		{
			if (checkPass($uuid, $_POST['oldpwd']) == true)
				{
				$pass = md5($_POST['pwd']);
				updatePass($pass, $uuid);
				print ' <div class="panel panel-default" id="mainResetConfirm">
						<div class="panel-heading">
							<h1>Password has been reset!</h1>
						</div>
						<div class="panel-body">
								<div class="row">
									<div class="col-md-12">
									   <h4>This account password has been reset!</h4>
									</div> 
								</div>    
							</div>
						</div>';
			}
			else
			{
				print ' <div class="panel panel-default" id="mainResetError">
                <div class="panel-heading">
                    <h1> Temp/Old Passowrd isn\'t correct!<h1>
                </div>
                <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                               <h1 style="color: orange;">Make sure that the temp password is correct, or original password is too!</h1>
							   
								<button class="btn btn-default" onclick="goBack()">Go Back</button>
                            </div> 
                        </div>    
                    </div>
                </div>
            </div>    ';	
				
			}
		}
		else
		{
			print ' <div class="panel panel-default" id="mainResetError">
                <div class="panel-heading">
                    <h1> Passwords don\'t match!<h1>
                </div>
                <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                               <h1 style="color: blue;">Password and Confirm Password are not the same!</h1>
							   <br/>
								<button class="btn btn-default" onclick="goBack()">Go Back</button>
                            </div> 
                        </div>    
                    </div>
                </div>
            </div>    ';
			
		}
	
   
	}
	else 
	{
	print ' <div class="panel panel-default" id="mainResetError">
                <div class="panel-heading">
                    <h1>Invaild User ID<h1>
                </div>
                <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                               <h4 style="color: red;">This is an invaild account user ID!</h4>
                            </div> 
                        </div>    
                    </div>
                </div>
            </div>    ';
	}
	print '</div></div></div></div>';
}
else {
if (isset($_GET['uuid'])) {
	print '

	<div class="container bs-docs-container">
		<div class="col-md-13" role="main">
			<div class="bs-docs-section">
				<div class="panel panel-default" id="mainResetPass">
					<div class="panel-heading">
						<h1>Reset Password</h1>
					</div>
					<div class="panel-body">
					<form action="../accounts/?reset&uuid=' . $_GET['uuid'] . '" method="POST" role="form" class="form-horizontal">
						<div class="form-group">
								<label class="control-label col-sm-4" >Temporary Password</label>
							<div class="col-sm-8">
							 <span class="label label-info">Make sure there are no spaces</span><br /><br />
								<input type="input" class="form-control" id="oldpwd" name="oldpwd" placeholder="Enter Temporary Password">
							</div>
						</div>
					<div class="form-group">
							<label class="control-label col-sm-4" for="pwd">New Password:</label>
						<div class="col-sm-8">          
							<input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter Password">
						</div>
					</div>
					<div class="form-group"> 
							<label class="control-label col-sm-4" for="pwd">Confirm Password:</label>
						<div class="col-sm-8">					  
						<input type="password" class="form-control" id="cpwd" name="cpwd" placeholder="Enter Confirm Password">
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
					<form action="../accounts/?reset" method="POST" role="form" class="form-horizontal">
						<div class="form-group">
								<label class="control-label col-sm-4" >Old Password</label>
							<div class="col-sm-8">
									 <span class="label label-info">Make sure there are no spaces</span><br /><br />
								<input type="password" class="form-control" id="oldpwd" name="oldpwd" placeholder="Enter Old/Before Password">
							</div>
						</div>
					<div class="form-group">
							<label class="control-label col-sm-4" for="pwd">New Password:</label>
						<div class="col-sm-8">          
							<input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter Password">
						</div>
					</div>
					<div class="form-group"> 
							<label class="control-label col-sm-4" for="pwd">Confirm Password:</label>
						<div class="col-sm-8">					  
						<input type="password" class="form-control" id="cpwd" name="cpwd" placeholder="Enter Confirm Password">
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
}