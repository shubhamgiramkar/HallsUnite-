<?php
                                                  
		// servername => localhost
		// username => root
		// password => empty
		// database name => book_event
     
      $conn = mysqli_connect("localhost", "root", "123", "book_event");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
        
		}
?>