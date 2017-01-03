<?php
print $select_data;
$users = array();
$payments = array(array());
$pending = array();

$query = 'SELECT * FROM users';

$loop = 0;
$main_loop = 0;
if (@mysql_query ($query)) {
	$results=mysql_query ($query);
	WHILE($row = mysql_fetch_array ($results)) { // this loops through all the rows that were pulled from the DB
		$users[$row['username']] = $row['uuid'];
        $first[$row['uuid']] = $row['firstname'];
        $last[$row['uuid']] = $row['lastname'];
    }
}
	
foreach($users as $key => $value)
{
	$query = 'SELECT * FROM purchases WHERE user_uuid="' . $value . '"';
		$loop = 0;
		if (@mysql_query ($query)) {
			$results=mysql_query ($query);
			WHILE($row = mysql_fetch_array ($results)) { // this loops through all the rows that were pulled from the DB
				if ($row['pending'] == "5") {
					$loop = $loop + 1;
					$main_loop = $main_loop + 1;
				}
				
			}
		}
		if ($loop > 0 ){
			$loop = 0;
			print '<div style="background-color: orange; padding: 10px; margin: 10px; border-radius: 10px;">
				<h3> #' . $main_loop . ' - ' . $first[$value].' ' . $last[$value] . '</h3>
					<table class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Type</th>
							<th>Purchase Date (Year/Month/Day)</th>
							<th>Contract End Date(Year/Month/Day)</th>
							<th>Next Payment(Year/Month/Day)</th>
							<th>Status</th>
							<th>Select Mode</th>
							<th>Delete?</th>
						</tr>
					</thead>
				<tbody>';
			if (@mysql_query ($query)) {
				$results=mysql_query ($query);
				WHILE($row = mysql_fetch_array ($results)) { // this loops through all the rows that were pulled from the DB
					print $row['pending'];
					if ($row['pending'] == 5) 
					{
						$loop = $loop + 1;
						$pending[$uuid] = $uuid;
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
							$pending = '<h3><i class="fa fa-check" style="color: orange;"></i> Pending</h3>';
						}
						else if ($row['pending'] == 1)
						{
							$pending = '<h3><i class="fa fa-times" style="color: red;"></i> Cancel</h3>';
						}
						else if ($row['pending'] == 5)
						{
							$pending = '<h3><i class="fa fa-check" style="color: yellow;"></i> Repurchase</h3>';
						}
						else 
						{
							$pending = '<h3><i class="fa fa-check" style="color: green;"></i> Accepted</h3>';
						}
						$type = '<a href="?pid=' . $row['uuid'] . '&type=accept"><h3><i class="fa fa-check" style="color: green;"></i></a>';
 						if ($row['reminder'] == 1) {
							$type = $type . '<a href="?pid=' . $row['uuid'] . '&type=repurchase"><i class="fa fa-check" style="color: yellow;"></i></a>	';
						}
						$type = $type . '<a href="?pid=' . $row['uuid'] . '&type=cancel"><i class="fa fa-times" style="color: red;"></i></h3></a>';
						$delete = '<a href="?pid=' . $row['uuid'] . '&delete"><h3><i class="fa fa-times" style="color: darkred;"></i></h3></a>';
						print '<tr>
					<td>' . $loop. '</td>
					<td>' . $name. '</td>
					<td>' . substr($row['cstartdate'], 0, 10) . '</td>
					<td>' . substr($row['cenddate'], 0, 10) . '</td>
					<td>' . substr($row['nextp'], 0, 10) . '</td>
					<td>' . $pending .'</td>
					<td>' . $type . '</td>
					<td>' . $delete . '</td>

					</tr>';
						
						
						
				}
			}
			print '	</tbody>
			</table></div>';
		}
	}
}



?>