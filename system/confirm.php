<?php
if (isset ($_GET['code'])) {
	$code = $_GET['code'];        

	$query = 'UPDATE users SET confirm_email="1" WHERE uuid="' . $code . '"';

	$retval = mysql_query($query);
	if(! $retval )
	{
	die('Error?' . mysql_error());
	}
	else
	{
		print '<div class="container bs-docs-container">
    <div class="col-md-13" role="main">
        <div class="bs-docs-section">
            <div class="panel panel-default" id="mainPanelRegister">
                <div class="panel-heading text-center">
                    <h1>Confirm Email!</h1>
                </div>
                <div class="panel-body text-center">
					<h1><span  class="label label-success">Thanks for confirming your account!<span></h1>
					<br />
					<h1><span  class="label label-info">You may sign in now!<span></h1>
				</div>
			</div>
		</div>
	</div>
</div>';
	}
} else {
	print '<div class="container bs-docs-container">
    <div class="col-md-13" role="main">
        <div class="bs-docs-section">
            <div class="panel panel-default" id="mainPanelRegister">
                <div class="panel-heading text-center">
                    <h1>Confirm Email!</h1>
                </div>
                <div class="panel-body text-center">
			<h1><span  class="label label-danger">This code is invaild!<span></h1>
				</div>
			</div>
		</div>
	</div>
</div>';
}
?>