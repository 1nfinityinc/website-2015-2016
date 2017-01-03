<?php if (isset($_GET['delete']))
{
	if (isset($_GET['pid']))
	{
	print '<div class="text-center" style="background-color: lightgray; padding: 10px; margin: 10px; border-radius: 10px;"><h1 style="color: red"> DO YOU WANT TO DELETE THIS FROM THE DATABASE?</h1><br/>
		<a href="?pid=' . $_GET['pid']  . '&type=delete"><i class="fa fa-check" style="color: green; font-size: 24px;">YES</i><a href="?pur">   <i class="fa fa-times" style="color: red; font-size: 24px;">NO</a></i>
	</div>';
	}
}
else if (isset($_GET['add'])){
	if (isset($_GET['pid']))
	{
	print '<div class="text-center" style="background-color: lightgray; padding: 10px; margin: 10px; border-radius: 10px;"><h1 style="color: purple"> DO YOU WANT TO ADD 30 DAYS TO THIS PURCHASE?</h1><br/>
		<a href="?pid=' . $_GET['pid']  . '&type=add"><i class="fa fa-check" style="color: green; font-size: 24px;">YES</i><a href="?pur">   <i class="fa fa-times" style="color: red; font-size: 24px;">NO</a></i>
	</div>';
	}
	
}
else if (isset($_GET['sub'])){
	if (isset($_GET['pid']))
	{
	print '<div class="text-center" style="background-color: lightgray; padding: 10px; margin: 10px; border-radius: 10px;"><h1 style="color: red"> DO YOU WANT TO SUBTRACT 30 DAYS TO THIS PURCHASE?</h1><br/>
		<a href="?pid=' . $_GET['pid']  . '&type=sub"><i class="fa fa-check" style="color: green; font-size: 24px;">YES</i><a href="?pur">   <i class="fa fa-times" style="color: red; font-size: 24px;">NO</a></i>
	</div>';
	}
	
}
else {

    if (isset($_GET['pid']))
    {
        if (isset($_GET['type']))
        {
            $query = 'SELECT * FROM purchases WHERE uuid="' . $_GET['pid'] . '"';
            $loop = 0;
            if (@mysql_query ($query)) {
                $results=mysql_query ($query);
                WHILE($row = mysql_fetch_array ($results)) { // this loops through all the rows that were pulled from the DB
                        $loop = $loop + 1;
				$count = $row['count'];
					$nextp = $row['nextp'];
                    }
                    
                }
            }
            $code = $_GET['pid'];
            if ($loop > 0)
            {
                if($_GET['type'] == "delete")
                {
                    $query = 'UPDATE purchases SET pending="4" WHERE uuid="' . $code . '"';

                    $retval = mysql_query($query);
                    if(! $retval )
                    {
                    die('Error?' . mysql_error());
                    }
                    else
                    {
                        print '<div class="text-center" style="background-color: lightgray; padding: 10px; margin: 10px; border-radius: 10px;"><h1 style="color: red"> DELETED PURCHASE FROM DATABASE </h1></div>';
                    }
                    
                }
                else if($_GET['type'] == "accept")
                {
                    
                    $query = 'UPDATE purchases SET pending="2" WHERE uuid="' . $code . '"';

                    $retval = mysql_query($query);
                    if(! $retval )
                    {
                    die('Error?' . mysql_error());
                    }
                    else
                    {
                        print '<div class="text-center" style="background-color: lightgray; padding: 10px; margin: 10px; border-radius: 10px;"><h1 style="color: green"> ACCEPTED PURCHASE </h1></div>';
                    }
                }
                else if($_GET['type'] == "cancel")
                {
                    
                    $query = 'UPDATE purchases SET pending="1" WHERE uuid="' . $code . '"';

                    $retval = mysql_query($query);
                    if(! $retval )
                    {
                    die('Error?' . mysql_error());
                    }
                    else
                    {
                        print 'CANCELED PURCHASE';
                    }
                    
                }
                else if($_GET['type'] == "repurchase")
                {
                    
                    $query = 'UPDATE purchases SET pending="2" WHERE uuid="' . $code . '"';

                    $retval = mysql_query($query);
                    if(! $retval )
                    {
                    die('Error?' . mysql_error());
                    }
					$count = $count + 1;
					$query = 'UPDATE purchases SET count="' . $count  . '" WHERE uuid="' . $code . '"';

                    $retval = mysql_query($query);
                    if(! $retval )
                    {
                    die('Error?' . mysql_error());
                    }
	
                    $query = 'UPDATE purchases SET reminder="0" WHERE uuid="' . $code . '"';

                    $retval = mysql_query($query);
                    if(! $retval )
                    {
                    die('Error?' . mysql_error());
                    }
                    else
                    {
                        print '<div class="text-center" style="background-color: lightgray; padding: 10px; margin: 10px; border-radius: 10px;"><h1 style="color: yellow">ACCEPTED REPURCHASE</h1></div>';
                    }
                    
                }
		else if ($_GET['type'] == "add") {
		    $nextpayment = date('Y-m-d H:i:s',strtotime(date("Y-m-d H:i:s",strtotime($nextp )) . " + 30 days"));
		    
                    $query = 'UPDATE purchases SET nextp="' . $nextpayment  . '" WHERE uuid="' . $code . '"';

                    $retval = mysql_query($query);
                    if(! $retval )
                    {
                    die('Error?' . mysql_error());
                    }
                    else
                    {
                        print '<div class="text-center" style="background-color: lightgray; padding: 10px; margin: 10px; border-radius: 10px;"><h1 style="color: lightblue">ADDED 30 DAYS TO PURCHASE</h1></div>';
                    }
		    $count = $count + 1;

		    $query = 'UPDATE purchases SET count="' . $count  . '" WHERE uuid="' . $code . '"';

                    $retval = mysql_query($query);
                    if(! $retval )
                    {
                    die('Error?' . mysql_error());
                    }

					
		}
		else if ($_GET['type'] == "sub") {
			
		    $newdate = strtotime ( '-30 days' , strtotime ( $nextp) ) ;
print $newdate;
		    $nextpayment = date ( 'Y-m-d H:i:s' , $newdate );
print $newpaymement;
                    $query = 'UPDATE purchases SET nextp="' . $nextpayment  . '" WHERE uuid="' . $code . '"';

                    $retval = mysql_query($query);
                    if(! $retval )
                    {
                    die('Error?' . mysql_error());
                    }
                    else
                    {
                        print '<div class="text-center" style="background-color: lightgray; padding: 10px; margin: 10px; border-radius: 10px;"><h1 style="color: blue">SUBTRACTED 30 DAYS TO PURCHASE</h1></div>';
                    }
		    
		    $count = $count - 1;

		    $query = 'UPDATE purchases SET count="' . $count  . '" WHERE uuid="' . $code . '"';

                    $retval = mysql_query($query);
                    if(! $retval )
                    {
                    die('Error?' . mysql_error());
                    }
	
					
		}

                else
                {
                    print 'URL GET ERROR. MAKE SURE "TYPE=DELETE/ACCEPT/CANCEL"';
                    print '<div class="text-center" style="background-color: lightgray; padding: 10px; margin: 10px; border-radius: 10px;"><h1 style="color: red"> URL GET ERROR. MAKE SURE "TYPE=DELETE/ACCEPT/CANCEL </h1></div>';
                }
                    
                
                
                
                
                
                
            }
            else
            {
                print '<div class="text-center" style="background-color: lightgray; padding: 10px; margin: 10px; border-radius: 10px;"><h1 style="color: red"> NO PURCHASE ID IN DATABASE!! </h1></div>';
                
            }
        
        }
    }
    ?>