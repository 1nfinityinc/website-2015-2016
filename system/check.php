<?php 

   session_start();

   if (isset($_SESSION['username'])) {
	
      print 'active';

   }
   else
   {


	  print 'failed';


   }
        
?>