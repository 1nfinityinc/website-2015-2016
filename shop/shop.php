
<?php 

 
 
if (isset($_GET['residental'])) {

        print ' <div id="content-size" style="margin-left: 15px; margin-right: 15px; background-color: darkgray; border-radius: 5px;" class="text-center">
			        <div class="row">
                        <div class="col-md-12 text-center">
                            <h1><span class="label label-info " style="padding:5px; margin-bottom: 70px; font-size: 24px" >SmartPartment - Choose a Size...</span></h1>
                            <br />
                        </div>
                    </div>
                              
                    <div class="row" id="shopsProducts">
                        <div class="col-md-6 text-center">
                            <h3 class="text-center"><span class="label label-primary">1</span> Bedroom <span class="label label-primary">1</span> Bath</h3>
                            <img src="../assets/media/1b1b/bed1b1b.png" class="img-rounded" style= "border: 1px solid black; "alt="Residential" /> 
                            <br /><br /><br />
                            <div class="text-center"><button type="submit" class="btn btn-success" value="Submit" name="buyRes" data-toggle="modal" data-target="#shop1bed1bath" style="font-size: 24px;">Purchase SmartPartment</button></div>
                        </div>
                        <div class="col-md-6 text-center">
                            <h3 class="text-center"><span class="label label-success">2</span> Bedroom <span class="label label-success">1</span> Bath</h3>
                            <img src="../assets/media/1b1b/Kitchen1b1b.png" class="img-rounded" style= "border: 1px solid black; "alt="Residential" /> 
                            <br /><br /><br />
                            <div class="text-center"><button type="submit" class="btn btn-success" value="Submit" name="buyRes" data-toggle="modal" data-target="#shop2bed1bath" style="font-size: 24px;">Purchase SmartPartment</button></div>
                        </div>
					</div>
					<hr />
					<div class="row" id="shopsProducts">
                        <div class="col-md-6 text-center">
                            <h3 class="text-center"><span class="label label-info">2</span> Bedroom <span class="label label-info">2</span> Bath</h3>
                            <img src="../assets/media/1b1b/livingroom1b1b.png" class="img-rounded" style= "border: 1px solid black; "alt="Residential" /> 
                            <br /><br /><br />
                           <div class="text-center"><button type="submit" class="btn btn-success" value="Submit" name="buyRes" data-toggle="modal" data-target="#shop2bed2bath" style="font-size: 24px;">Purchase SmartPartment</button></div>
                        </div>
                        <div class="col-md-6 text-center">
                            <h3 class="text-center"><span class="label label-warning">3</span> Bedroom <span class="label label-warning">2</span> Bath</h3>
                            <img src="../assets/media/1b1b/bathroom1b1b.png" class="img-rounded" style= "border: 1px solid black; "alt="Residential" /> 
                            <br /><br /><br />
                            <div class="text-center"><button type="submit" class="btn btn-success" value="Submit" name="buyRes" data-toggle="modal" data-target="#shop3bed2bath" style="font-size: 24px;">Purchase SmartPartment</button></div>
							<br /><br />
						</div>                    
                    </div>  
                </div>  
        </div>';
		//MODALS
		print '            <div class="modal fade modal-med" id="shop1bed1bath" role="dialog" aria-labelledby="shop1bed1bathLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" style="font-size: 50px !important; color: red;">&times;</button>
                           <h1 class="modal-title text-center" id="shop1bed1bathLabel">1nfinity Inc. <span class="label label-primary">1</span> Bedroom <span class="label label-primary">1</span> Bath</h1>		     
                        </div>
                        <div class="modal-body" style="margin-left: 10px;">
							<div class="row">
								<div class="col-md-4"><img src="../assets/media/1b1b/bed1b1b.png" class="img-rounded" style= "border: 1px solid black; "alt="Residential" /> 
								<br /><br /><br /></div>
								<div class="col-md-8" style="padding: 3em;">
                                    <h4 class="text-center" style="font-weight: bold">A cozy 500 square foot apartment with one bedroom and one bathroom. This SmartPartment includes all of the smart features listed below and comes at a low monthly cost of $450.</h4>
                                    <ul class="list-group">
                                      <li class="list-group-item"><h4>Phone charging countertops</h4></li>
                                      <li class="list-group-item"><h4>Self-sanitizing door handles, TV remotes and appliances</h4></li>
                                      <li class="list-group-item"><h4>Heated flooring</h4></li>
                                      <li class="list-group-item"><h4>Electronically dimmable windows</h4></li>
                                      <li class="list-group-item"><h4>Doors unlock with your fingerprint or using a smartphone application </h4></li>
                                    </ul>
                                </div>
							</div>
							<div class="row">
								<div class="col-md-4"><h3><span class="label label-warning " style="padding:5px; margin-bottom: 70px; font-size: 24px" >Cost: $450.00</span></h3></div>
								<div class="col-md-8"><a href="../buy/?type=1b1b" style="text-decoration: none;"><button type="submit" class="btn btn-success btn-block" style="font-size: 24px;">Purchase Solo</button></a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		   <div class="modal fade modal-med" id="shop2bed1bath" role="dialog" aria-labelledby="shop2bed1bathLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" style="font-size: 50px !important; color: red;">&times;</button>
                           <h1 class="modal-title text-center" id="shop2bed1bathLabel">1nfinity Inc. <span class="label label-success">2</span> Bedroom <span class="label label-success">1</span> Bath</h1>		     
                        </div>
                        <div class="modal-body" style="margin-left: 10px;">
							<div class="row">
								<div class="col-md-4"><img src="../assets/media/1b1b/Kitchen1b1b.png" class="img-rounded" style= "border: 1px solid black; "alt="Residential" /> 
								<br /><br /><br /></div>
								<div class="col-md-8" style="padding: 3em;">
                                    <h4 class="text-center" style="font-weight: bold">This Smart apartment is an upgrade from the base model, it offers an extra bedroom along with extra living space. This SmartPartment also offers all smart features for the low monthly price of $550. </h4>
                                    <ul class="list-group">
                                      <li class="list-group-item"><h4>Phone charging countertops</h4></li>
                                      <li class="list-group-item"><h4>Self-sanitizing door handles, TV remotes and appliances</h4></li>
                                      <li class="list-group-item"><h4>Heated flooring</h4></li>
                                      <li class="list-group-item"><h4>Electronically dimmable windows</h4></li>
                                      <li class="list-group-item"><h4>Doors unlock with your fingerprint or using a smartphone application </h4></li>
                                    </ul>
                                </div>
							</div>
							<div class="row">
								<div class="col-md-4"><h3><span class="label label-warning " style="padding:5px; margin-bottom: 70px; font-size: 24px" >Cost: $550.00</span></h3></div>
								<div class="col-md-4"><a href="../buy/?type=2b1b&partner" style="text-decoration: none;"><button type="submit" class="btn btn-info btn-block" style="font-size: 24px;">Purchase with Roomate</button></a></div>
								<div class="col-md-4"><a href="../buy/?type=2b1b" style="text-decoration: none;"><button type="submit" class="btn btn-success btn-block" style="font-size: 24px;">Purchase Solo</button></a></div>
							</div>
						</div>
					</div>
				</div>
			</div>		
            <div class="modal fade modal-med" id="shop2bed2bath" role="dialog" aria-labelledby="shop2bed2bathLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" style="font-size: 50px !important; color: red;">&times;</button>
                           <h1 class="modal-title text-center" id="shop2bed2bathLabel"><span class="label label-info">2</span> Bedroom <span class="label label-info">2</span> Bath</h1>		     
                        </div>
                        <div class="modal-body" style="margin-left: 10px;">
							<div class="row">
								<div class="col-md-4"><img src="../assets/media/1b1b/bathroom1b1b.png" class="img-rounded" style= "border: 1px solid black; "alt="Residential" /> 
								<br /><br /><br /></div>
								<div class="col-md-8" style="padding: 3em;">
                                    <h4 class="text-center" style="font-weight: bold"> A beautiful spacious apartment with 2 bedrooms and 2 bathrooms. This SmartPartment also offers all smart features for the low monthly price of $650. </h4>
                                    <ul class="list-group">
                                      <li class="list-group-item"><h4>Phone charging countertops</h4></li>
                                      <li class="list-group-item"><h4>Self-sanitizing door handles, TV remotes and appliances</h4></li>
                                      <li class="list-group-item"><h4>Heated flooring</h4></li>
                                      <li class="list-group-item"><h4>Electronically dimmable windows</h4></li>
                                      <li class="list-group-item"><h4>Doors unlock with your fingerprint or using a smartphone application </h4></li>
                                    </ul>
                                </div>
							</div>
							<div class="row">
								<div class="col-md-4"><h3><span class="label label-warning " style="padding:5px; margin-bottom: 70px; font-size: 24px" >Solo Cost: $650.00</span><br /><br /><span class="label label-info " style="padding:5px; margin-bottom: 70px; font-size: 24px" >Roomate Cost: $375.00</span></h3></div>
								<div class="col-md-4"><a href="../buy/?type=2b2b&partner" style="text-decoration: none;"><button type="submit" class="btn btn-info btn-block" style="font-size: 24px;">Purchase with Roomate</button></a></div>
								<div class="col-md-4"><a href="../buy/?type=2b2b" style="text-decoration: none;"><button type="submit" class="btn btn-success btn-block" style="font-size: 24px;">Purchase Solo</button></a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
            <div class="modal fade modal-med" id="shop3bed2bath" role="dialog" aria-labelledby="shop3bed2bathLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" style="font-size: 50px !important; color: red;">&times;</button>
                           <h1 class="modal-title text-center" id="shop3bed2bathLabel">1nfinity Inc. <span class="label label-warning">3</span> Bedroom <span class="label label-warning">2</span> Bath</h1>		     
                        </div>
                        <div class="modal-body" style="margin-left: 10px;">
							<div class="row">
								<div class="col-md-4"><img src="../assets/media/resident.png" class="img-rounded" style= "border: 1px solid black; "alt="Residential" /> 
								<br /><br /><br /></div>
								<div class="col-md-8" style="padding: 3em;">
                                    <h4 class="text-center" style="font-weight: bold">This is our most spacious and luxurious apartment including 3 bedrooms and 2 bathrooms. Monthly rent is $750 and this SmartPartment includes all of the smart features listed below as well as extra amenities.</h4>
                                    <ul class="list-group">
                                      <li class="list-group-item"><h4>Phone charging countertops</h4></li>
                                      <li class="list-group-item"><h4>Self-sanitizing door handles, TV remotes and appliances</h4></li>
                                      <li class="list-group-item"><h4>Heated flooring</h4></li>
                                      <li class="list-group-item"><h4>Electronically dimmable windows</h4></li>
                                      <li class="list-group-item"><h4>Doors unlock with your fingerprint or using a smartphone application </h4></li>
                                    </ul>
                                </div>
							</div>
							<div class="row">
								<div class="col-md-4"><h3><span class="label label-warning " style="padding:5px; margin-bottom: 70px; font-size: 24px" >Solo Cost: $750.00</span><br /><br /><span class="label label-info " style="padding:5px; margin-bottom: 70px; font-size: 24px" >Roomate Cost: $375.00</span></h3></div>
								<div class="col-md-4"><a href="../buy/?type=3b2b&partner" style="text-decoration: none;"><button type="submit" class="btn btn-info btn-block" style="font-size: 24px;">Purchase with Roomate</button></a></div>
								<div class="col-md-4"><a href="../buy/?type=3b2b" style="text-decoration: none;"><button type="submit" class="btn btn-success btn-block" style="font-size: 24px;">Purchase Solo</button></a></div>
							</div>
						</div>
					</div>
				</div>
			</div>';
}
else if  (isset($_GET['commercial'])) {
        print ' <div id="content-size" style="margin-left: 15px; margin-right: 15px; background-color: darkgray; border-radius: 5px;" class="text-center">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h1><span class="label label-warning " style="padding:5px; margin-bottom: 70px; font-size: 24px" >SmartOffice - Choose a Size...</span></h1>
                            <br />
                        </div>
                    </div>                 
                    <div class="row" id="shopsProducts">
                        <div class="col-md-4 text-center">
                            <h3 class="text-center"><span class="label label-primary">2500</span> Square Feet</h3>
                            <img src="../assets/media/ComSmall.png" class="img-rounded" style= "border: 1px solid black; "alt="Commerical" /> 
                            <br /><br /><br />
                            <div class="text-center"><button type="submit" class="btn btn-success" value="Submit" name="buyCom" data-toggle="modal" data-target="#shop2500sq" style="font-size: 24px;">Purchase SmartOffice</button></div>
                        </div>
                        <div class="col-md-4 text-center">
                            <h3 class="text-center"><span class="label label-success">3000</span> Square Feet</h3>
                            <img src="../assets/media/ComMedium.png" class="img-rounded" style= "border: 1px solid black; "alt="Commerical" /> 
                            <br /><br /><br />
                            <div class="text-center"><button type="submit" class="btn btn-success" value="Submit" name="buyCom" data-toggle="modal" data-target="#shop3000sq" style="font-size: 24px;">Purchase SmartOffice</button></div>
                        </div>
                        <div class="col-md-4 text-center">
                            <h3 class="text-center"><span class="label label-info">4500</span> Square Feet</h3>
							<img src="../assets/media/ComLarge.png" class="img-rounded" style= "border: 1px solid black; "alt="Commerical" /> 
                            <br /><br /><br />
                           <div class="text-center"><button type="submit" class="btn btn-success" value="Submit" name="buyCom" data-toggle="modal" data-target="#shop4500sq" style="font-size: 24px;">Purchase SmartOffice</button></div>
							<br /><br />
					   </div>                 
                    </div>  
                </div>  
        '; 
		print '            <div class="modal fade modal-med" id="shop2500sq" role="dialog" aria-labelledby="2500sqLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" style="font-size: 50px !important; color: red;">&times;</button>
                           <h1 class="modal-title text-center" id="2500sqLabel"><span class="label label-primary">2500</span> Square Feet</h1>		     
                        </div>
                        <div class="modal-body" style="margin-left: 10px;">
							<div class="row">
								<div class="col-md-4"><img src="../assets/media/ComSmall.png" class="img-rounded" style= "border: 1px solid black; "alt="Residential" /> 
								<br /><br /><br /></div>
								<div class="col-md-8" style="padding: 3em;">
                                    <h4 class="text-center" style="font-weight: bold">This spacious 2,500 sq. ft. office offers multiple smart features and modern designs to make any work environment more productive and enjoyable for only $1,700 a month. This office size is ideal for a small, growing company.
</h4>
                                    <ul class="list-group">
                                     <li class="list-group-item"><h4>Phone charging countertops</h4></li>
                                      <li class="list-group-item"><h4>Self-sanitizing door handles, TV remotes and appliances</h4></li>
                                      <li class="list-group-item"><h4>Heated flooring</h4></li>
                                      <li class="list-group-item"><h4>Document Extractor  - A computer and a printer in one</h4></li>
                                      <li class="list-group-item"><h4>Smartphone application to control temperature, windows, and security cameras.</h4></li>
                                    </ul>
                                </div>
							</div>
							<div class="row">
								<div class="col-md-4"><h3><span class="label label-warning " style="padding:5px; margin-bottom: 70px; font-size: 24px" >Cost: $1,700</span></h3></div>
								<div class="col-md-8"><a href="../buy/?type=2500sq" style="text-decoration: none;"><button type="submit" class="btn btn-success btn-block" style="font-size: 24px;">Purchase</button></a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		   <div class="modal fade modal-med" id="shop3000sq" role="dialog" aria-labelledby="3000sqLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" style="font-size: 50px !important; color: red;">&times;</button>
                           <h1 class="modal-title text-center" id="3000sqLabel"><span class="label label-success">3000</span> Square Feet</h1>		     
                        </div>
                        <div class="modal-body" style="margin-left: 10px;">
							<div class="row">
								<div class="col-md-4"><img src="../assets/media/ComMedium.png" class="img-rounded" style= "border: 1px solid black; "alt="Residential" /> 
								<br /><br /><br /></div>
								<div class="col-md-8" style="padding: 3em;">
                                    <h4 class="text-center" style="font-weight: bold">For a low monthly rate of $2,300 the 3,000 sq. ft. corporate office offers a spacious workplace with great smart features. This office is suited for a business that needs more room than the previous office layout offers.

</h4>
                                    <ul class="list-group">
                                      <li class="list-group-item"><h4>Phone charging countertops</h4></li>
                                      <li class="list-group-item"><h4>Self-sanitizing door handles, TV remotes and appliances</h4></li>
                                      <li class="list-group-item"><h4>Heated flooring</h4></li>
                                      <li class="list-group-item"><h4>Document Extractor  - A computer and a printer in one</h4></li>
                                      <li class="list-group-item"><h4>Smartphone application to control temperature, windows, and security cameras.</h4></li>
                                    </ul>
                                </div>
							</div>
							<div class="row">
								<div class="col-md-4"><h3><span class="label label-warning " style="padding:5px; margin-bottom: 70px; font-size: 24px" >Cost: $2,300</span></h3></div>
								<div class="col-md-8"><a href="../buy/?type=3000sq" style="text-decoration: none;"><button type="submit" class="btn btn-success btn-block" style="font-size: 24px;">Purchase</button></a></div>
							</div>
						</div>
					</div>
				</div>
			</div>		
            <div class="modal fade modal-med" id="shop4500sq" role="dialog" aria-labelledby="4500sqLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" style="font-size: 50px !important; color: red;">&times;</button>
                           <h1 class="modal-title text-center" id="4500sqLabel"><span class="label label-info">4500</span> Square Feet</h1>		     
                        </div>
                        <div class="modal-body" style="margin-left: 10px;">
							<div class="row">
								<div class="col-md-4"><img src="../assets/media/ComLarge.png" class="img-rounded" style= "border: 1px solid black; "alt="Residential" /> 
								<br /><br /><br /></div>
								<div class="col-md-8" style="padding: 3em;">
                                    <h4 class="text-center" style="font-weight: bold">The 4,500 sq. ft. office provides a substantially larger workspace than the other two office layouts, which is perfect for a large company that needs lots of space. This office includes state of the art technology to provide an efficient and comfortable workspace for employees. At only $3,500 per month, this office is a great value.</h4>
                                    <ul class="list-group">
                                       <li class="list-group-item"><h4>Phone charging countertops</h4></li>
                                      <li class="list-group-item"><h4>Self-sanitizing door handles, TV remotes and appliances</h4></li>
                                      <li class="list-group-item"><h4>Heated flooring</h4></li>
                                      <li class="list-group-item"><h4>Document Extractor  - A computer and a printer in one</h4></li>
                                      <li class="list-group-item"><h4>Smartphone application to control temperature, windows, and security cameras.</h4></li>
                                    </ul>
                                </div>
							</div>
							<div class="row">
								<div class="col-md-4"><h3><span class="label label-warning " style="padding:5px; margin-bottom: 70px; font-size: 24px" >Cost: $3,500</span></h3></div>
								<div class="col-md-8"><a href="../buy/?type=4500sq" style="text-decoration: none;"><button type="submit" class="btn btn-success btn-block" style="font-size: 24px;">Purchase</button></a></div>
							</div>
						</div>
					</div>
				</div>
			</div>';
}
  
 else {
         
     print '<div class="container">

        <div class="row">
            <div class="col-md-6 nopadding">
                <div  style="background-color: darkgray; padding: 10px; border-top-left-radius: 10px; border-bottom-left-radius: 10px; ">
                    <h3 class="text-center">Residential</h3>
                    <img src="../assets/media/resident.png" class="img-rounded" style= "border: 1px solid black; "alt="Residential" /> 
                    <br /><br /><br />
                    <a href="?residental"><div class="text-center"><button type="submit" class="btn btn-success" value="Submit">Purchase Residential</button></div></a>';
      
        print '</div>
            </div>
            <div class="col-md-6 nopadding" >
                <div  style="background-color: darkgray; padding: 10px; border-bottom-right-radius: 10px; border-top-right-radius: 10px;">
                    <h3 class="text-center">Commercial</h3>
                    <img src="../assets/media/commercial.png" class="img-rounded" style= "border: 1px solid black; "alt="Commercial" /> 
                    <br /><br /><br />
  
                    <a href="?commercial" class="text-center"><div class="text-center"><button type="submit" class="btn btn-success" value="Submit">Purchase Commercial</button></div></a>
                    
                </div>
            </div>
        </div>';
                                
 }?>
</div>









 