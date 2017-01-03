<?php 

    print '<h1 class="text-center" style="font-weight: bold; color: orange;"> Buying and Registration is disabled! We open in November! (new website)</h1>';
    require 'php/database.php';
	$go = true;
	if ($page != "terms") {
	    $page = $page;
	}

    if ($page == "accounts") {
		$go = false;
        if (isset($_GET['register'])) {
			if (isset($_SESSION['username'])) {
				print '<h1 style="text-align: center; color: orange;">You can\'t register when signed in!</h1>';
			}
			else
			{	
				require 'html/register.php';
			}
		}
		else if (isset ($_GET['confirm'])) {
			require 'system/confirm.php';
		
		}
		else if (isset($_GET['purchases']))
		{
			require 'products/product.php';
			
		}
		else if (isset($_GET['reset']))
		{
			require 'html/reset.php';
		}
		else
		{
			if (isset($_SESSION['user'])) {
				
				require 'account/accounts.php';
			}
		}
    }
	if ($page == "edit")
	{
		$go = false;
		if ($_SESSION['edit'] == "1")
		{
	
			require 'edit/edit.php';
			
	
	
		}
		else
		{
			print 'Hmm an error has occured! :(';
			
			
		}
		
	}
	if ($page == "shop") {
		require 'shop/shop.php';
	}
	if ($page == "buy") {
		require 'shop/buy.php';
	}
		if ($page == "rebuy") {
		require 'shop/rebuy.php';
	}
	if ($page == "contact") {
		require 'contact/contact.php';
	}
	if ($page == "reset") {
		require 'php/email_reset.php';
	}

	if ($page == "staff") {
		if ($_SESSION['rank'] >= 6) {
			require 'edit/staff.php';
		}
		else
		{
			print '<p style="color: red">Error</p>';
			
		}
	}
	if ($go == true) {
		$query = 'SELECT * FROM pages WHERE (page="' . $page . '")';


        if (@mysql_query ($query)) {

           $results=mysql_query ($query);

           WHILE($row = mysql_fetch_array ($results)) { // this loops through all the rows that were pulled from the DB

           print $row['html'];

           }

         }
		
		
	}
	
?>