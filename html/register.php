
 
<div class="container bs-docs-container">
    <div class="col-md-13" role="main">
        <div class="bs-docs-section">
            <div class="panel panel-default" id="mainPanelRegister">
                <div class="panel-heading">
                    <h1>Registration</h1> <span id="mainRegData" class="label label-info">Example</span>
                </div>
                <div class="panel-body">
			<div class="row">
                            <div class="col-md-6 padding-top-5">
				<div id="divFirstName" class="form-group has-feedback"> <!-- Class: has-success has-feedback -->
                                    <label class="control-label">First Name</label>
                                    <input class="form-control" id="inputFirstName" placeholder="First Name" required>
                                    <span id="iconFirstName" class="glyphicon form-control-feedback"></span>
                                    <br />
                               </div>

			    </div>
			    <div class="col-md-6">
				<div id="divLastName" class="form-group has-feedback"> <!-- Class: has-success has-feedback -->
                                    <label class="control-label">Last Name</label>
                                    <input class="form-control" id="inputLastName" placeholder="Last Name" required>
                                    <span id="iconLastName" class="glyphicon form-control-feedback"></span>
                                    <br />
                               </div>

			    </div>
			</div>
                        <div class="row">
                            <div class="col-md-6 padding-top-5">
                               <div id="divUsername" class="form-group has-feedback"> <!-- Class: has-success has-feedback -->
                                    <label class="control-label">Username</label>
                                    <input class="form-control" id="inputUsername" placeholder="Username" required>
                                    <span id="iconUsername" class="glyphicon form-control-feedback"></span>
                                    <br />
                                    <span id="alertConfirmPass" class="label label-warning">Username is 5 to 30 characters in length!</span>
                               </div>
                            </div> 
                            <div class="col-md-6 padding-top-6">
 				<label class="control-label">Captcha</label>
                                <div style="text-align:center" id="rcaptcha" class="g-recaptcha" data-sitekey="6LeGpg0TAAAAAIs0poxpIw5MUtvjlHSIySdBXvqj"></div>
                                <br />
                                <span id="captcha" class="label" ></span>
                            </div>
                        </div>
                        <div class="row padding-top-5">
                            <div class="col-md-12 padding-top-5">
                               <div id="divEmail" class="form-group has-feedback"> <!-- Class: has-success has-feedback -->
                                    <label class="control-label">Email</label>
                                    <input class="form-control" id="inputEmail" placeholder="Email" required/>
                                    <span id="iconEmail" class="glyphicon form-control-feedback"></span>
                               </div>
                            </div> 
                        </div>
                        <div class="row padding-top-5">
                            <div class="col-md-6 padding-top-5">
                               <div id="divPass" class="form-group has-feedback"> <!-- Class: has-success has-feedback -->
                                    <label class="control-label">Password</label>
                                    <input class="form-control" id="inputPass" placeholder="Password" type="password" required/>
                                    <span id="iconPass" class="glyphicon form-control-feedback"></span>
                                    <br />
                                    <span id="alertPass" class="label label-warning" >Passwords are 6 to 30 in length!</span>
                               </div>
                            </div> 
                            <div class="col-md-6 padding-top-5">
                               <div id="divConfirmPass" class="form-group has-feedback"> <!-- Class: has-success has-feedback -->
                                    <label class="control-label">Confirm Password</label>
                                    <input class="form-control" id="inputConfirmPass" placeholder="Confirm Password" type="password" required/>
                                    <span id="iconConfirmPass" class="glyphicon form-control-feedback"></span>
                                    <br />
                                    <span id="alertConfirmPass" class="label label-warning">This must match Password!</span>
                               </div> 
                            </div> 
                        </div>
                        <div class="row padding-top-5">
                            <div class="col-md-12 padding-top-5">
                                <button class="btn btn-lg btn-primary btn-block" type="submit" id="btnRegister">Register</button>
                            </div>
                        </div>
                </div>
            </div>
            <div class="panel panel-default" id="mainPanelConfirm">
                <div class="panel-heading">
                    <h1>Registration - Confirm Email</h1>
                </div>
                <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                               <h4>Please check your Email, <span id="emailAddress"></span></h4>
                            </div> 
                        </div>
                        <div class="row padding-top-5">
                            <div class="col-md-12 padding-top-5">
                                <button class="btn btn-lg btn-primary btn-block" type="submit" id="btnResend">Resend Email</button>
                            </div>
                        </div>        
                    </div>
                </div>
            </div>    
        </div>
    </div>