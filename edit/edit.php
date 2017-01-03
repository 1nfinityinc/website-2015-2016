<?php
$a = array();
$div = array();
if (isset($_GET['edit'])) {
	$a['edit'] = "active";
	$div['edit'] = "in active";
}
elseif (isset($_GET['html'])) {
	$a['html'] = "active";
	$div['html'] = "in active";
}
else if (isset($_GET['css'])) {
	$a['css'] = "active";
	$div['css'] = "in active";
}
else if (isset($_GET['logs'])) {
	$a['logs'] = "active";
	$div['logs'] = "in active";
}
else if (isset($_GET['revs'])) {
	$a['revs'] = "active";
	$div['revs'] = "in active";
}
else if (isset($_GET['settings'])) {
	$a['settings'] = "active";
	$div['settings'] = "in active";
}

else
{
	$a['edit'] = "active";
	$div['edit'] = " in active";
}
?>
<div id="edit-tabs">
	<ul class="nav nav-tabs" id="editTabs">
		<li class="<?php print $a['edit'];?>"><a href="#editHome">Home</a></li>
		<li class="<?php print $a['css'];?>"><a href="#editCss">CSS</a></li>
		<li class="<?php print $a['html'];?>"><a href="#editHtml">HTML</a></li>
		<li class="<?php print $a['logs'];?>"><a href="#editLogs">LOGS</a></li>
		<li class="<?php print $a['revs'];?>"><a href="#editRevs">REVISIONS</a></li>
		<li class="<?php print $a['settings'];?>"><a href="#editSettings">SETTINGS</a></li>
	</ul>
	<div class="tab-content" id="editContent">
		<div id="editHome" class="tab-pane fade <?php print $div['edit']; ?>">
		<div class="container">
      <div class="page-header">
        <h1>1nfinity Inc.</h1>
      </div>
      <p class="lead">Put infomation here about the company...</p>
      <p>Random text...sdyguisdghsduy</p>
    </div><br /><br /><br /><br /><br />
		</div>
		<div id="editCss" class="tab-pane fade <?php print $div['css']; ?>">
			<?php require 'css.php'; ?>
		</div>
		<div id="editHtml" class="tab-pane fade <?php print $div['html']; ?>">
		</div>
		<div id="editLogs" class="tab-pane fade <?php print $div['logs']; ?>">
			<?php require 'logs.php'; ?>
		</div>
		<div id="editRevs" class="tab-pane fade <?php print $div['edit']; ?>">
		</div>
		<div id="editSettings" class="tab-pane fade <?php print $div['settings'] ?>">
		<p>Settings</p>
		</div>
	</div>
</div>

