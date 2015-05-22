<?php
error_reporting(0);
require'private/db_connection.php';


/*second validation*/


/*initializing the array of errors as an empty array*/
$errorsCount = 0;

/* after the user pressed submit button, starts the second validation*/	

if(isset($_POST['submitNewUser']))
{
	
	
	/* variables*/
if(isset($_POST['gender'])){ $unsafe_gender = htmlentities($_POST['gender']);$unsafe_gender.= '';} else {$unsafe_gender = '';}

$unsafe_userName 	= trim(htmlentities($_POST['userName']));
$unsafe_firstName 	= trim(htmlentities($_POST['firstName']));
$unsafe_lastName 	= trim(htmlentities($_POST['lastName']));
$unsafe_address 	= trim(htmlentities($_POST['address']));
$unsafe_pc4       	= trim(htmlentities($_POST['pc4']));
$unsafe_pc3 		= trim(htmlentities($_POST['pc3']));
$unsafe_district 	= trim(htmlentities($_POST['district']));
$unsafe_birthdate 	= trim(htmlentities($_POST['birthdate']));

$safe_userName 		= mysqli_real_escape_string($dbconnection, $unsafe_userName);
$safe_firstName 	= mysqli_real_escape_string($dbconnection, $unsafe_firstName);
$safe_lastName 		= mysqli_real_escape_string($dbconnection, $unsafe_lastName);
$safe_address 		= mysqli_real_escape_string($dbconnection, $unsafe_address);
$safe_pc4       	= mysqli_real_escape_string($dbconnection, $unsafe_pc4);
$safe_pc3 			= mysqli_real_escape_string($dbconnection, $unsafe_pc3);
$safe_district 		= mysqli_real_escape_string($dbconnection, $unsafe_district);
$safe_birthdate 	= mysqli_real_escape_string($dbconnection, $unsafe_birthdate);
$safe_gender 		= mysqli_real_escape_string($dbconnection, $unsafe_gender);



	
		/*username check, again...*/
		if(!empty($safe_userName))
		{
			/*checks if the username is already on the db*/
			/*check if query was a success*/
			if($checkuser = mysqli_query($dbconnection, "SELECT username FROM usersinfo WHERE username = '$safe_userName' "))
			{
				$check_num_rows = mysqli_num_rows($checkuser);
			} 
			else
			{
				echo('Sorry, something went wrong...Please try again later.');
			}

			if(!empty($safe_userName))
			{
				if($check_num_rows === 1)
				{
					echo '<div class="redMsg">Username already in use, please choose another.</div>';
				}  
			}
		}
		//free result , best practise
		mysqli_free_result($checkuser);
		
		if(!empty($safe_userName) && preg_match('/^[A-Za-z0-9\-\_]{2,26}$/',$safe_userName))
		{
			echo 'username ok <br/>';
		}
		else
		{
			echo 'The username is not filled/with the correct format. <br/>';
			$errorsCount++;
		}
		
		if(!empty($safe_firstName) && preg_match('/^[A-Za-z]{2,26}$/', $safe_firstName))
		{
			echo 'firstname ok <br/>';
		}
		else
		{
			echo 'The firstname is not filled/with the correct format. <br/>';
			$errorsCount++;
		}
		
		if(!empty($safe_lastName) && preg_match( '/^[A-Za-z]{2,26}$/', $safe_lastName))
		{
			echo 'lastname ok <br/>';
		}
		else
		{
			echo 'The lastname is not filled/with the correct format. <br/>';
			$errorsCount++;
		}
		
		if(!empty($safe_address) && preg_match('/^\w{5,60}$/', $safe_address))
		{
			echo 'address ok <br/>';
		}
		else
		{
			echo 'The address is not filled/with the correct format. <br/>';
			$errorsCount++;
		}
		
		if(!empty($safe_pc4) && preg_match('/^[0-9]{4}$/', $safe_pc4) && $safe_pc4 !='0000')
		{
			echo 'pc4 ok <br/>';
		}
		else
		{
			echo 'The four digits of the postal code are not filled/with the correct format. <br/>';
			$errorsCount++;
		}
		
		if(!empty($safe_pc3) && preg_match('/^[0-9]{3}$/', $safe_pc3))
		{
			echo 'pc3 ok <br/> ';
		}
		else
		{
			echo 'The three digits of the postal code are not filled/with the correct format. <br/>';
			$errorsCount++;
		}

		if(!empty($safe_district) && preg_match('/^[A-Za-z]{2,60}$/', $safe_district))
		{
			echo 'district ok <br/> ';
		}
		else
		{
			echo 'The district is not filled/with the correct format. <br/>';
			$errorsCount++;
		}
		
		if(!empty($safe_birthdate) && preg_match('/([0-9]{2})\/([0-9]{2})\/([0-9]{4})/', $safe_birthdate))
		{
			echo 'birthdate ok <br/>';
			/*prepare format to insert in the database because date effect*/
			$safe_birthdate = date('Y-m-d', strtotime(str_replace('-', '/', $safe_birthdate)));
		}
		else
		{
			echo 'The birthdate is not filled/with the correct format. <br/>';
			$errorsCount++;
		}
		
		
		if(!empty($safe_gender))
		{
			echo 'gender ok <br/>';
		}
		else
		{
			echo 'The gender is not filled/with the correct format. <br/>';
			$errorsCount++;
		}
		
		
		if($errorsCount >=1)
		{
			echo '<br/>The form has errors, for a sucessful submisssion of the form, please correct the errors.
			<a href="form.php">Back to the form</a>';
		}
		
		if($errorsCount === 0)
		{
			if($insertNewUser = mysqli_query($dbconnection, "
				INSERT INTO usersinfo 
				(username, firstName, lastName, address, pc4, pc3, district, birthdate, gender)
				VALUES('$safe_userName','$safe_firstName','$safe_lastName','$safe_address','$safe_pc4','$safe_pc3','$safe_district','$safe_birthdate','$safe_gender')"))
			{
				echo 'success!';	
			}
			else
			{
				echo 'error';
			}	
		}
		
}


//close connection
mysqli_close($dbconnection);


?>