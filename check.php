<?php
include("connect/db.php"); //Establishing connection with our database

//test
if(isset($_POST['mobile_no_check_with_ip']))
{

	// $sql="SELECT Code,Country FROM countrycode";
	// $result=mysqli_query($connection,$sql);

	// $ccodes = array();
	// while ($row = mysqli_fetch_assoc($result))
	// {
	// 	$ccodes[$row['Code']] = $row['Country'];
	// }
 
	// $phone = $_POST['mobile_no_check_with_ip'];

	// krsort( $ccodes );

	// foreach( $ccodes as $key=>$value )
	// {
	//     if ( substr( $phone, 1, strlen( $key ) ) == $key )
	//     {
	//         // match
	//         $country[$phone] = $value;
	//         break;
	//     }
	// }
	 
	// echo $value; 
	// die();


	// $sql="SELECT Code,Country FROM countrycode";
	// $result=mysqli_query($connection,$sql);

	// $ccodes = array();
	// while ($row = mysqli_fetch_assoc($result))
	// {
	// 	$ccodes[$row['Code']] = $row['Country'];
	// }
 	$ccodes = array( $_POST['countrycode']  => $_POST['countrycodetext'] );
	$phone = $_POST['mobile_no_check_with_ip'];

	//krsort( $ccodes );
	
	foreach( $ccodes as $key=>$value )
	{
	    if ( substr( $phone, 1, strlen( $key ) ) == $key )
	    {
	        // match
	        $country[$phone] = $value;
	        break;
	    }
	}
	 
	//echo $country[$phone]; 
	//die();
}


if(isset($_POST['mobile_no_check_with_ip']))
{
	$username=$_POST['mobile_no_check_with_ip'];
	
	$query_verify_email = "SELECT * FROM users WHERE mobile_no ='$username'";
	$verified_email = mysqli_query($connection,$query_verify_email) or die("Error: ".mysqli_error($connection));
	if (mysqli_num_rows($verified_email) >0) 
	{
		echo 'Available';
	}
	else
	{
		echo 'Not Available';
	}
}
else
{
	echo 'no';
}

?>