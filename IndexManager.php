<?

//-------------------------------------------------------

//					HOW TO USE

//	$page = "{page}" ex: home, accounts, pages, shop, edit, about, etc...

//  require 'IndexManager';

//  Done thats it is.

//



require 'php/session.php';

require 'php/database.php';

require 'edit/css_update.php';

?>

<!doctype html>

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title> <?php require('php/title.php'); ?></title>

    <!--JavaScript and CSS-->

    <?php require('html/head.php'); ?>

</head>

<body>
<div id="ohsnap"></div>
<?php require 'html/user.php';?>
<!-- Trigger the modal with a button -->
<!-- Modal -->
<div id="forgotPassword" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Lost Password</h4>
      </div>
      <div class="modal-body">
        <p><input type="email" class="form-control" id="forgotEmail" placeholder="Email" required=""></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="banner" style="">
<img class="img-center center-block" style="padding: 10px;" src="../assets/media/WebLogo.png" width="300" length="300"/>
	<?php /*
	<div class="row nopadding">
		<div class="col-md-3">
			<?php //<img class="" style="padding-left: 10px; margin-left: 75px; float: left; display: inline-block;" src="../assets/media/HolidayBadge.png" width="125" length="125"/>
		</div>
		<div class="col-md-5">
			<img class="img-center center-block" style="padding: 10px; display: inline-block; margin-left: 33%; margin-right: 25%;" src="../assets/media/WebLogo.png" width="300" length="300"/>
		</div>
		<div class="col-md-1">
		</div>
	</div>
	*/?>
<!--https://s3-us-west-2.amazonaws.com/s.cdpn.io/32877/logo-thing.png-->
</div>
<!-- Static navbar // navbar navbar-default // navbar navbar-inverse navbar-static-top-->
<nav class="navbar navbar-default">
    <div class="container-fluid">
       <?php require 'php/menu.php'; ?>
    </div><!--/.container-fluid -->
</nav>
    <?php require 'PageManager.php'; ?>
<br /><br /><br /><br /><br />
    <footer class="footer" style=" border-top: solid black 1px; color: white;">
	<div style="margin-left: 10%; margin-right: 10%">
		<div class="col-md-12 text-center "><div class="text-center"><a href="https://twitter.com/1nfinityinc"><h3><i class="fa fa-twitter" style="color: #3b5998; padding-right: 5px;"></i></a> <a href="https://www.facebook.com/1nfinityinc/"><i class="fa fa-facebook-official" style="color: #3b5998; display: inline-block;"></i></a> - <a href="../terms/" style="color: black; font-size: 20px; text-decoration: none;"><i class="fa fa-info-circle"></i>
 Terms</a><p style="font-size: 10px;">&copy 2015-2016 1nfinity Inc. - This is an official <a href="https://veinternational.org/" style="color: black">Virtual Enterprises International</a> firm website and is for educational purposes only.</p></div></div>
 <!-- Start of SimpleHitCounter Code -->
<!--<div align="center"><img src="http://simplehitcounter.com/hit.php?uid=2137042&f=16777215&b=0" border="0" height="18" width="83" alt="diaper cakes"></a><br><a href="http://www.finediapercakes.com/" target="_blank" style="text-decoration:none;"></a></div>
 End of SimpleHitCounter Code -->
</footer>
<script src='../assets/javascript/ohsnap.js'></script>
</body>
</html>
