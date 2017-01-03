
<?php
$res = array();
$com = array();
$res_count = 0;
$com_count = 0;




$query = 'SELECT * FROM purchases WHERE user_uuid="' . $_SESSION['uuid'] . '"';
if (@mysql_query ($query)) {
	$results=mysql_query ($query);
	WHILE($row = mysql_fetch_array ($results)) { // this loops through all the rows that were pulled from the DB
		if ($row['pending'] != 4) {
			if ($row['item'] == "1b1b")
			{
				$name = "1 Bed, 1 Bath";
				$type = false;
			}
			if ($row['item'] == "2b1b")
			{
				$name = "2 Bed, 1 Bath";
				$type = false;
			}
			if ($row['item'] == "2b1b-p")
			{
				$name = "2 Bed, 1 Bath - Partner";
				$type = false;
			}
			if ($row['item'] == "2b2b")
			{
				$name = "2 Bed, 2 Bath";
				$type = false;
			}
			if ($row['item'] == "2b2b-p")
			{
				$name = "2 Bed, 2 Bath - Partner";
				$type = false;
			}
			if ($row['item'] == "3b2b")
			{
				$name = "3 Bed, 2 Bath";
				$type = false;
			}	
			if ($row['item'] == "3b2b-p")
			{
				$name = "3 Bed, 2 Bath - Partner";
				$type = false;
			}
			if ($row['item'] == "2500sq")
			{
				$name = "2500 Square Feet";
				$type = true;
			}
			if ($row['item'] == "3000sq")
			{
				$name = "3000 Square Feet";
				$type = true;
			}
			if ($row['item'] == "4500sq")
			{
				$name = "4500 Square Feet";
				$type = true;
			}
			
			if ($row['pending'] == 0)
			{
				$pending = '<h3><i class="fa fa-check" style="color: orange;"></i> Pending</h3>
	';
			}
			else if ($row['pending'] == 1)
			{
				$pending = '<h3><i class="fa fa-times" style="color: red;"></i> Canceled</h3>
	';
			}
			else if ($row['pending'] == 5)
			{
				$pending = '<h3><i class="fa fa-check" style="color: yellow;"></i> Waiting on Repurchase</h3>';
	
			}
			else 
			{
				$pending = '<h3><i class="fa fa-check" style="color: green;"></i> Approved</h3>';
			}
			$today = date("Y-m-d");   
			$payment = substr($row['nextp'], 0, 10) ;

			$diff = abs(strtotime($payment) - strtotime($today));
				
			$years = floor($diff / (365*60*60*24));
			$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
			$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));	
			/*
			if ($months == 1)
			{
				$date = $months . ' month(s)';
			}
			else{
				$date = $days . ' day(s)';
			}
				*/	
			$amount = $months ;
			$before = False;
			print $days;
			if ($days > 0)
			{
				$amount = $amount + 1;
			}
			$date = 'You are ' . $months . ' month(s) ' .  $days . ' day(s)  behind in payment(s)! <br/> <span style="font-weight: 10px;" >You have ' . $amount . ' more payment(s)!</span>';
			if (new DateTime() > new DateTime($payment)) {
				$reminder = 1;
				$before = True;
			}
			else
			{
				$reminder = $row['reminder'];
			}
			
			if ($reminder == 1) {
				
				$pending = $pending .  '<br /> <a href="../rebuy/?pur=' . $row['uuid']  . '" style="text-decoration: none;"><button class="btn btn-lg btn-success btn-block" type="submit" style="text-decoration: none;">Repurchase</button></a>';	
				if ($before == False)
				{
					$date = 'You have ' . $months . ' month(s) ' .  $days . ' day(s) until next payment.';
				}
				
				
			}
			else {
	
				$date = 'You have ' . $months . ' month(s) ' .  $days . ' day(s) until next payment.';
				
			}
			
			
			
			
			
		
					
			
			if ($type == true) {
				$com_count++;
				 $data = '<tr>
					<td>' . $com_count. '</td>
					<td>' . $name. '</td>
					<td>' . substr($row['cstartdate'], 0, 10) . '</td>
					<td>' . substr($row['cenddate'], 0, 10) . '</td>
					<td>' . substr($row['nextp'], 0, 10) . '</td>
					<td>' . $date . '</td>
					<td>' . $pending .'</td>

					</tr>';
				
				$com[] = $data;
				
			}
			else {
				$res_count++;
	
				
				
				$data = '<tr>
					<td>' . $res_count. '</td>
					<td>' . $name. '</td>
					<td>' . substr($row['cstartdate'], 0, 10) . '</td>
					<td>' . substr($row['cenddate'], 0, 10) . '</td>
					<td>' . substr($row['nextp'], 0, 10) . '</td>
					<td>' . $date . '</td>
					<td>' . $pending .'</td>

					</tr>';
				
				$res[] = $data;
				
				
				
				
				
			}
			
			
			
		}
	
	}
	
	print '<div style="background-color: lightgray; padding: 10px; margin: 10px; border-radius: 10px;">
	<h3>SmartPartments</h3>';
	if ($res_count > 0) {
			print'
		<table class="table">
		<thead>
		  <tr>
			<th>#</th>
			<th>Type</th>
			<th>Purchase Date (Year/Month/Day)</th>
			<th>Contract End Date (Year/Month/Day)</th>
			<th>Next Payment (Year/Month/Day)</th>
			<th>Days/Months to Next Payment</th>
			<th>Status</th>
		  </tr>
		</thead>
		<tbody>';
		foreach($res as $key => $value)
		{
			print $value;
			
		}
	}
	else
	{
		print '<h4 class="text-center">You have no SmartPartments to display.</h1>';
		
	}
	//NEXT
	print '
	</tbody>
  </table>
  <h3>SmartOffices</h3>';
	if ($com_count > 0) {
		print '<table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Type</th>
        <th>Purchase Date(Year/Month/Day)</th>
        <th>Contract End Date (Year/Month/Day)</th>
        <th>Next Payment (Year/Month/Day)</th>
		<th>Days/Months to Next Payment</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>';
		foreach($com as $key => $value)
		{
			
			print $value;
		}
	}
	else
	{
		print '<h4 class="text-center">You have no SmartOffices to display.</h1>';
	}
	print '</tbody>
  </table>
  </div></div>
  <br />';;
	
}



?>
  <div style="background-color: lightgray; padding: 10px; margin: 10px; border-radius: 10px;">
	<div class="row">
		<div class="col-md-4"><h3><i class="fa fa-check" style="color: orange;"></i> = Pending</h3></div>
		<div class="col-md-4"><h3><i class="fa fa-times" style="color: red;"></i> = Canceled</h3></div>
		<div class="col-md-4"><h3><i class="fa fa-check" style="color: green;"></i> = Approved</h3></div>
	</div>
  </div>'