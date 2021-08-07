<?php
	$conn = mysqli_connect('localhost','root','','money_bank');
	if(!$conn)
    {
		die("Could not connect to the database - Error:  ".mysqli_connect_error());
	}
?>