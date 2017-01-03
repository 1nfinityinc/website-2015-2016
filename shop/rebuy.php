<?php 



function addDayswithdate($date,$days){



    $date = strtotime("+".$days." days", strtotime($date));

    return  date("Y-m-d", $date);



}







 if (!isset($_SESSION['uuid'])) {



  print '<div class="container">

  <div id="content-login"  class="text-center" style="background-color: darkgray; padding: 10px;">

                     <div class="row" class="text-center"><span class="label label-warning" style="font-size: 24px;">Please Sign In/Up to Continue</span> </div>

       </div>

	</div>';



 }

 else

 {

	$query = 'SELECT * FROM purchases WHERE uuid="' . $_GET['pur'] . '"';

    $worked = false;

	if (@mysql_query ($query)) {

			$results=mysql_query ($query);

			WHILE($row = mysql_fetch_array ($results)) { // this loops through all the rows that were pulled from the DB

				$worked = true;

				$type = $row['item'];

				$nextdate = $row['nextp'];

				$cenddate = $row['cenddate'];

			}	

		}

	



	if ($worked == false) {

		 print '	<div style="margin-left: 15%;margin-right: 15%;">

						<div class="row">

							<div class="col-md-12" style="font-size: 24px; " >

								<div style="padding: 30px; background-color: darkgray; border: 1px solid black; overflow: auto; border-radius: 10px; width: 100%; height: 400px;" id="agreeDiv">

									<h1 class="text-center">1nfinity Inc. Contract Agreement</h1>

									<hr />

									<h3>1nfinity offers apartment and office rentals with monthly payments, however the minimum rental time is 1 year. If you rent an apartment or office, you are required to pay the cost of the apartment or office every month from the date displayed below, until a date one year later. In total, 12 payments must be completed during the duration of the year that you are renting.</h4>

									<br />

									<h1 class="text-center"><strong style="color: red"> INVAILD USER / PURCHASE </h1>

								</div>	

							</div> 			

							<div class="col-md-4">

							</div>

						</div>                           

					</div>



 '; 

		

	}

	else {

    $main= array();

    



    $main['2500sq'] = "https://portal.veinternational.org/buybuttons/us061586/btn/office-2500-sq-ft-5/";



    $main['3000sq'] = "https://portal.veinternational.org/buybuttons/us061586/btn/office-3000-sq-ft-6/";



    $main['4500sq'] = "https://portal.veinternational.org/buybuttons/us061586/btn/office-4500-sq-ft-7/";



	$main['2b1b-p'] = "https://portal.veinternational.org/buybuttons/us061586/btn/2-bedroom-1-bathroom-shared-8/";



	$main['2b2b-p'] = "https://portal.veinternational.org/buybuttons/us061586/btn/2-bedroom-2-bathroom-shared-9/";



	$main['3b2b-p'] = "https://portal.veinternational.org/buybuttons/us061586/btn/3-bedroom-2-bathroom-shared-10/";



	$main['1b1b'] = "https://portal.veinternational.org/buybuttons/us061586/btn/1-bedroom-1-bathroom-1/";



	$main['2b1b'] = "https://portal.veinternational.org/buybuttons/us061586/btn/2-bathroom-1-bathroom-2/";

	

	$main['2b2b'] = "https://portal.veinternational.org/buybuttons/us061586/btn/2-bedroom-2-bathroom-3/";



	$main['3b2b'] = "https://portal.veinternational.org/buybuttons/us061586/btn/3-bedroom-2-bathroom-4/";



    if ($type == "1b1b")

	{

		$name = "1 Bed, 1 Bath";

	}

	if ($type == "2b1b")

	{

		$name = "2 Bed, 1 Bath";

	}

	if ($type == "2b1b-p")

	{

		$name = "2 Bed, 1 Bath - Partner";

	}

	if ($type == "2b2b")

	{

		$name = "2 Bed, 2 Bath";

	}

	if ($type == "2b2b-p")

	{

		$name = "2 Bed, 2 Bath - Partner";

	}

	if ($type == "3b2b")

	{

		$name = "3 Bed, 2 Bath";



	}	

	if ($type == "3b2b-p")

	{

		$name = "3 Bed, 2 Bath - Partner";



	}

	if ($type == "2500sq")

	{

		$name = "2500 Square Feet";



	}

	if ($type == "3000sq")

	{

		$name = "3000 Square Feet";



	}

	if ($type == "4500sq")

	{

		$name = "4500 Square Feet";



	}

   





	

    $nextpayment = date('F j, Y',strtotime(date("F j, Y",strtotime($nextdate)) . " + 30 day"));

	$enddate = date('F j, Y',strtotime(date("F j, Y",strtotime($cenddate))));

    $loop = false;

    foreach($main as $key => $value)



    {



        



        if ($key == $type) {



            if ($loop == false) {



                $loop = true;



                print '<div style="margin-left: 15%;margin-right: 15%;">

	<div class="row">

		<div class="col-md-12" style="font-size: 24px; " >

			<div style="padding: 30px; background-color: darkgray; border: 1px solid black; overflow: auto; border-radius: 10px; width: 100%; height: 500px;;" id="agreeDiv">

				<h1 class="text-center">1nfinity Inc. Contract Agreement</h1>

				<hr />

				<h3>1nfinity offers apartment and office rentals with monthly payments, however the minimum rental time is 1 year. If you rent an apartment or office, you are required to pay the cost of the apartment or office every month from the date displayed below, until a date one year later. In total, 12 payments must be completed during the duration of the year that you are renting.</h4>

				<br />

				<h4 class="text-center"><strong>The next payment will be due on: </strong> ' . $nextpayment . ' </h4>

				<h4 class="text-center"><strong>Contract End Date:</strong> ' . $enddate . ' </h4>

				<h4 class="text-center"><strong>Type of Product:</strong> ' . $name . ' </h4>

			</div>	

			</div> 			

	<div class="col-md-4"></div>

		

	</div>                           

	<div class="row">

		<div class="col-md-3 text-center"></div>

		<div class="col-md-6 text-center" ></div>

			<a href="http://1nfinityinc.ml/redirect/buy/?uuid=' . $_SESSION['uuid'] . '&pur=' .  $_GET['pur']  .  '" style=" text-decoration: none;">

					 <h1><button class="btn btn-warning btn-block" id="btnAgree" name="btnAgree" style="font-size: 24px;" >Agree and Buy!</button></h1>

			</a>

		<div class="col-md-3 text-center"></div>

	</div>

	</div>

	</div>



 '; 



            }



        }

    }

  }

}

 ?>