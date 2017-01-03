

<?php if (isset($_SESSION['username'])) {

print '

<div class="modal fade" id="userSettings" role="dialog" aria-labelledby="userSettingsLabel">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title" id="userSettingsLabel">Settings</h4>

		</div>

		<div class="modal-body">

			<div class="row">

				<div class="col-md-12"><a href="../accounts/?reset" style="font-weight: none; font-style: none; max-width: 100%;"><button type="button" class="btn btn-warning btn-lg">Reset Password</button></a></div>


			</div>

			<div class="row">



			</div>

		</div>

		<div class="modal-footer">

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

      </div>

    </div>

  </div>

</div>

 </div>'; 

}

?>

