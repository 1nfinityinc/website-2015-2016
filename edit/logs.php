<?php 
$cat = array("Css", "Html", "Settings");



$users = array();
foreach ($cat as $value) {
	print '<div class="page-header"><h1><strong>' . $value . '</strong></h1></div>';
	if ($value == "Css"){
		print '
		<table class="table table-striped">
		<thead>
		  <tr>
			<th>User</th>
			<th>CSS</th>
			<th>Timestamp</th>
		  </tr>
		</thead>
		<tbody>	
				';	
					
		
		
		$page = array();
		$before = array();
		$loop = 0;

		if (isset($_GET['page']) ) {
			$page = (int)$_GET['page'] * 10;
			$pageb = $page - 10;
				
			
		}
		else
		{
			$pageb = 0;
			$page = 10;
			
		}
		$loop =0 ;
		$amount = 0;
		$query = 'SELECT * FROM logs WHERE type="' . $value . '"';
		if (@mysql_query ($query)) {
			$results=mysql_query ($query);
			WHILE($row = mysql_fetch_array ($results)) { // this loops through all the rows that were pulled from the DB
				if ($value == "Css"){               
					if ($loop >= $pageb){
						if ($amount <= 10) {
							$amount = $amount + 1;
							print ' <tr>
									<td>' . $row['username'] .'</td>
									<td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#logsCss' .  $row['id'] .'">View Changes</button></td>
									<td>' . $row['date'] . '</td>
									</tr>';
						}
					}
					$loop = $loop + 1;
				}
			
			}	
		}
		print '    
		</tbody>
		</table>';
		$query = 'SELECT * FROM logs WHERE type="' . $value . '"';
		$loop =0 ;
		$amount = 0;
		if (@mysql_query ($query)) {
			$results=mysql_query ($query);
			WHILE($row = mysql_fetch_array ($results)) { // this loops through all the rows that were pulled from the DB
				if ($value == "Css"){
					$main = explode(";", $row['log']);
					if ($loop >= $pageb){
						if ($amount <= 10) {
							$amount = $amount + 1;
												print ' 
						<div class="modal fade" id="logsCss' . $row['id'] . '" role="dialog">
						<div class="modal-dialog">
						
						  <!-- Modal content-->
						  <div class="modal-content">
							<div class="modal-header">
							  <button type="button" class="close" data-dismiss="modal">&times;</button>
							  <h4 class="modal-title">CSS Edited: ' . $row['username'] .'</h4>
							</div>
							<div class="modal-body">          
						<table class="table table-striped">
						<thead>
						  <tr>
							<th>User</th>
							<th>Property</th>
							<th>Value</th>
							<th>Date</th>
						  </tr>
						</thead>
						<tbody>	'; 
								foreach($main as $key => $val){
									   list($property, $val) = explode(":", $val);
										print '        <tr>
							<td>' . $row['username']   .'</td>
							<td>' . $property  .'</td>
							<td>' . $val . '</td>
							<td>' . $row['date'] . '</td>
						  </tr>';
									
									
									}
								
								
							print '    </tbody>
							</table></div>
							<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
							</div>
						  
							</div>
							</div>';
						}
					}
					$loop = $loop + 1;
				}
			}
		}
		print '<ul class="pagination pagination-lg">';
		if (isset($_GET['page'])) {
			if (is_numeric($_GET['page'])) {
				$next = $_GET['page'] + 1;
				$last = $_GET['page'] - 1;
				if ($_GET['page'] >= 1) {
					print '<li><a href="?logs&page=' . $last .'"><</a></li>';
					print '<li><a href="?logs&page=' . $next .'">></a></li>';
				
						
				}
				
						
			}
		}
		else
		{
		 print '<li><a href="?logs&page=2' . $last .'">></a></li>';
			
		}
		print '</ul>';
	}
}

?>