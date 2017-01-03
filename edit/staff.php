<?php
$a = array();
$div = array();
if (isset($_GET['pending'])) {
	$a['pending'] = "active";
	$div['pending'] = "in active";
}
else if (isset($_GET['rent'])) {
	$a['rent'] = "active";
	$div['rent'] = "in active";
}
else if (isset($_GET['purchases'])) {
	$a['pur'] = "active";
	$div['pur'] = "in active";
}
else if (isset($_GET['settings'])) {
	$a['settings'] = "active";
	$div['settings'] = "in active";
}
else
{
	$a['pending'] = "active";
	$div['pending'] = "in active";
}
require 'select.php';
?>

<div id="staff-tabs">
	<ul class="nav nav-tabs" id="staffTabs">
		<li class="<?php print $a['pending'];?>"><a href="#staffPending">PENDING</a></li>
		<li class="<?php print $a['rent'];?>"><a href="#staffRent">RENT DUE</a></li>
		<li class="<?php print $a['pur'];?>"><a href="#staffPur">PURCHASES</a></li>
		<li class="<?php print $a['settings'];?>"><a href="#staffSettings">SETTINGS</a></li>
	</ul>
	<div class="tab-content" id="staffContent">
		<div id="staffPending" class="tab-pane fade <?php print $div['pending']; ?>">
			<?php require 'pending.php'; ?>
		</div>
		<div id="staffRent" class="tab-pane fade <?php print $div['rent']; ?>">
			<?php require 'rent.php'; ?>
		</div>
		<div id="staffPur" class="tab-pane fade <?php print $div['pur']; ?>">
			<?php require 'pur.php'; ?>
		</div>
		<div id="staffSettings" class="tab-pane fade <?php print $div['settings']; ?>">
			<p> SETTINGS</p>
		</div>
	</div>
</div>

