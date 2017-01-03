
<div class="row" style="margin: 10px">
	<div class="col-sm-4 col-md-3 sidebar" style="background-color: white;border-radius: 10px;" >
		<h2 class="text-center" style="font-weight: bold">Contact Us</h2>
<h4 class="text-center">
1nfinity Inc.<br/>
12500 Holly Road, Grand Blanc, MI 48439<br/>
810-591-6685<br/>
10:38 A.M. - 12:08 P.M.<br/>
1nfinityinc.mi@veinternational.org<br/>
</h4>
	</div>
<div class="container bs-docs-container">
    <div class="col-md-13" role="main">
        <div class="bs-docs-section">
            <div class="panel panel-default" id="mainPanelContact" class="text-center">
                <div class="panel-heading">
                    <h1>Contact Us</h1>
                </div>
                <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6 padding-top-5">
                               <div id="contactName" class="form-group has-feedback"> <!-- Class: has-success has-feedback -->
                                    <label class="control-label">Name</label>
                                    <input class="form-control" id="contactInputName" placeholder="Name" value="<?php print $_SESSION['name']; ?>"required>
                                    <span id="contactIconName" class="glyphicon form-control-feedback"></span>
                                    <br />
                               </div>
                            </div> 
                            <div class="col-md-6 padding-top-6">
							<div id="contactEmail" class="form-group has-feedback"> <!-- Class: has-success has-feedback -->
                                    <label class="control-label">Email</label>
                                    <input class="form-control" id="contactInputEmail" placeholder="Email" value="<?php print $_SESSION['email']; ?>" required>
                                    <span id="contactIconEmail" class="glyphicon form-control-feedback"></span>
                               </div>
                            </div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="sel1">Select Recipient for Contact</label>
								<select class="form-control" id="contactManage">
									<option value="1" >CEO</option>
									<option value="2" >CAO</option>
									<option value="3" >CFO</option>
									<option value="4" >Web Design</option>
									<option value="5" >Sales/Marketing</option>
									<option value="6" >Administrative</option>
									<option value="7" >Accounting</option>
									<option value="8" >Relations</option>
								</select>
							</div>
						</div>
						<div class="row">
                            <div class="col-md-12 padding-top-5">
								<div id="contactText" class="form-group has-feedback"> <!-- Class: has-success has-feedback -->
									<label class="control-label">Description/Content</label>
                                    <textarea class="form-control" id="contactInputText" placeholder="First Name" maxlength="500" style="max-width: 100%; min-width: 100%; min-height: 200px;; " required> </textarea>
                                    <span id="contactIconText" class="glyphicon form-control-feedback"></span>
                                    <span id="contactLimit" class="label label-info">Characters: 0/500</span>

                               </div>

							</div>
						</div>

                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-lg btn-primary btn-block" type="submit" id="btnContact">Submit Request</button>
                            </div>
                        </div>
						  <div class="row padding-top-5">
                            <div class="col-md-12">
                                <div id="contactError"></div>
                            </div>
                        </div>
						
                </div>
            </div>
        </div>    
    </div>
</div>
</div>
<div class="modal fade" id="contactModal" role="dialog">
	<div class="modal-dialog">		
	<!-- Modal content-->
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title">Submitted Request!</h4>
		</div>
		<div class="modal-body">          
			Thanks we will contact you soon!
		</div>
		<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
		</div>				  
	</div>
</div> 

