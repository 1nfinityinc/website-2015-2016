<?php 

 if (!isset($_SESSION['uuid'])) {

  print '<div class="container">
  <div id="content-login"  class="text-center" style="background-color: darkgray; padding: 10px;">
                                <div class="row" class="text-center"><span class="label label-warning" style="font-size: 24px;">Please Sign In/Up to Continue</span> </div>
								<hr />
							   <div class="row" id="accountCom">
								<div class="col-md-3"></div>
                                   <div class="col-md-6" id="comSignIn">
                                            <div class="row">
                                                <form action="javascript:shopLog();">
                                                    <div class="col-md-12">
                                                        <div class="text-center">
                                                            <h3><strong>Sign In</strong></h3>
                                                        </div>
                                                        <hr />
                                                    </div>
                                                </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label class="sr-only" for="loginUsername">Username</label>
                                                    <input class="form-control" id="shopUsernameLogin" placeholder="Username" style="font-size: 24px; height:50px; margin-bottom:2px;"  required>
                                                    
                                                </div>
                                            </div>
                                            <div style="margin: 10px;"></div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label class="sr-only" for="loginPassword">Password</label>
                                                    <input type="password" class="form-control" id="shopPassLogin" placeholder="Password" style="font-size: 24px;  height:50;" required>
                                                    <div class="help-block text-right"><a href="../reset/">Forget the password?</a></div>
                                                </div>	
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-primary btn-block" style="font-size: 24px;" id="shopLogin">Sign in</button>
                                                    <br /><br />
                                                </div>
                                            </div>
</form>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <a href="../accounts/?register" style="text-decoration: none;"><button type="submit" class="btn btn-success btn-block" style="font-size: 24px;">Click here to sign up!</button></a>
                                                </div>
                                            </div>
                                            <hr  style="background-color: black;"/>
                                        
                                    </div>
									<div class="col-md-3"></div>
                                </div>
                               
                                
                            </div>
							</div>';

 }

 else

 {

    $type = $_GET['type'];



    $main= array();

    

    $main['2500sq'] = "https://portal.veinternational.org/buybuttons/us061586/btn/office-2500-sq-ft-5/";

    $main['3000sq'] = "https://portal.veinternational.org/buybuttons/us061586/btn/office-3000-sq-ft-6/";

    $main['4500sq'] = "https://portal.veinternational.org/buybuttons/us061586/btn/office-4500-sq-ft-7/";

    $partner = false;

    

    if (isset($_GET['partner'])) {

		$main['2b1b'] = "https://portal.veinternational.org/buybuttons/us061586/btn/2-bedroom-1-bathroom-shared-8/";

		$main['2b2b'] = "https://portal.veinternational.org/buybuttons/us061586/btn/2-bedroom-2-bathroom-shared-9/";

		$main['3b2b'] = "https://portal.veinternational.org/buybuttons/us061586/btn/3-bedroom-2-bathroom-shared-10/";

		$p = "&partner";
       

    }

    else{            



		$main['1b1b'] = "https://portal.veinternational.org/buybuttons/us061586/btn/1-bedroom-1-bathroom-1/";

		$main['2b1b'] = "https://portal.veinternational.org/buybuttons/us061586/btn/2-bathroom-1-bathroom-2/";

		$main['2b2b'] = "https://portal.veinternational.org/buybuttons/us061586/btn/2-bedroom-2-bathroom-3/";

		$main['3b2b'] = "https://portal.veinternational.org/buybuttons/us061586/btn/3-bedroom-2-bathroom-4/";

       

       $partner = false;
	$p = "";

    }

    $loop = false;
	$oneYearOn = date('F j, Y',strtotime(date("F j, Y", time()) . " + 365 day"));
	$dateNow =  date('F j, Y');
    foreach($main as $key => $value)

    {

        

        if ($key == $type) {

            if ($loop == false) {

                $loop = true;

                print '<div style="margin-left: 15%;margin-right: 15%;">
	<div class="row">
		<div class="col-md-12" style="font-size: 24px; " >
			<div style="padding: 30px; background-color: darkgray; border: 1px solid black; overflow: auto; border-radius: 10px; width: 100%; height: 400px;" id="agreeDiv">
				<h1 class="text-center">1nfinity Inc. Contract Agreement</h1>
				<hr />
				<h3>1nfinity offers apartment and office rentals with monthly payments, however the minimum rental time is 1 year. If you rent an apartment or office, you are required to pay the cost of the apartment or office every month from the date displayed below, until a date one year later. In total, 12 payments must be completed during the duration of the year that you are renting.</h4>
				<br />
				<h4 class="text-center"><strong>Purchase Date:</strong> ' . $dateNow . ' </h4>
				<h4 class="text-center"><strong>Contract End Date:</strong> ' . $oneYearOn . ' </h4>
			</div>	
			</div> 			
	<div class="col-md-4"></div>
		
	</div>                           
	<div class="row">
		<div class="col-md-3 text-center"></div>
		<div class="col-md-6 text-center" ></div>
			<a href="http://1nfinityinc.ml/redirect/?uuid=' . $_SESSION['uuid'] . '&type=' . $type . $p . '" style=" text-decoration: none;">
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

 ?>