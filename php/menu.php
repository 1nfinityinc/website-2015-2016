 <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../home/">Home</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="../about/">About</a></li>
              <li><a href="../shop/">Shop</a></li>
              <li><a href="../contact/">Contact</a></li>
              <li><a href="../news/">News</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
				<?php
				if (isset($_SESSION['username'])) { 
					print ' 
					<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>  <b>Account</b> <span class="caret"></span></a>
                        <ul id="login-dp" class="dropdown-menu">
                            <li>
                                <div class="row">
                                    <div class="col-md-12">
										<h3 class="text-center">Account Options</h3>
										<div class="list-group">
											<a class="list-group-item" href="../accounts/?purchases"><i class="fa fa-building fa-fw"></i>&nbsp; My SmartPartment</a>
											<a class="list-group-item" href="#" id="settings" ><i class="fa fa-cog fa-fw fa-spin"></i>&nbsp; Settings</a>';
											if ($_SESSION['edit'] == '1') { 
											print '<a class="list-group-item" href="../edit/"><i class="fa fa-pencil fa-fw fa-spin"></i>&nbsp; Edit Site</a>';
											}
												if ($_SESSION['rank'] >= 6) { 
											print '<a class="list-group-item" href="../staff/"><i class="fa  fa-user-plus"></i>&nbsp; Staff Site</a>';
											}
										print'</div>
									</div>
								</div>
							</form>
							<hr  style="background-color: black;"/>
								<div class="row">
									<div class="col-md-12">
										<div class="text-center">
										<form method="post">
                                        <button class="btn btn-primary btn-block" id="logout" name="logout"><i class="fa fa-sign-out fa-fw"></i>&nbsp; <b> Sign Out</b></button>
										</form>
										<br /><br />
										</div>
                                    </div>
								</div>
                             </div>
                        </li>
                    </ul>
                </li>';
				}
				else 
				{
				print '
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Sign In/Up</b> <span class="caret"></span></a>
                        <ul id="login-dp" class="dropdown-menu">
                            <li>
                                <div class="row">
								<form action="javascript:mainLogin();">
                                    <div class="col-md-12">
                                        <h4>Welcome back! Sign In!</h4>
									</div>
								</div>
                                <div class="row">
									<div class="col-md-12">
                                        <label class="sr-only" for="loginUsername">Username</label>
                                        <input class="form-control" id="loginUsername" placeholder="Username" required>
									</div>
                                </div>
                                <div class="row">
									<div class="col-md-12">
                                        <label class="sr-only" for="loginPassword">Password</label>
                                        <input type="password" class="form-control" id="loginPassword" placeholder="Password" required>
										<div class="help-block text-right"><a href="../reset" >Forgot your password?</a></div>
									</div>	
                                </div>
								<div class="row">
									<div class="col-md-12">
                                                                           </div>
								</div>
                                <div class="row">
									<div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-block" id="btnLogin">Sign in</button>
									</div>
								</div>
							</form>
							<hr  style="background-color: black;"/>
								<div class="row">
									<div class="col-md-12">
										<div class="text-center">
                                        <a href="../accounts/?register" class="btn btn-success btn-block"><b> New here? Join us!</b></a>
										<br />
										</div>
                                    </div>
								</div>
                             </div>
                        </li>
                    </ul>
                </li>
				';
				}
				?>
            </ul>
			

