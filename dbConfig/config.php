<?php

$keyId = 'rzp_test_NZZgOqbpFwdGUB';
$keySecret = 'pXBNUmeU72qxVzRFsOjLjXY3';
$displayCurrency = 'INR';


try{
	$con = mysqli_connect("localhost","root","") or die("Unable to connect");
	mysqli_select_db($con,'goclick');
}
catch(Exception $e){
	echo 'Message: ' .$e->getMessage();
}
?>
