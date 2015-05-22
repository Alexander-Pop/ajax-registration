<?php
error_reporting(0);
require 'private/db_connection.php';

////
/*ATTENTION- 
$_POST variables are the ones that are referenced in the jq file*/
//defenitive validation in the validation2.php, after the user submit the form
////


/*username validation*/
if(isset($_POST['username']))
{
	$unsafe_userName 	= trim(htmlentities($_POST['username']));
	$safe_userName 		= mysqli_real_escape_string($dbconnection, $unsafe_userName);
	
	if(!empty($safe_userName) && $safe_userName !=' ')
	{
		/*check if query was a success*/
		if($checkuser = mysqli_query($dbconnection, "SELECT username FROM usersinfo WHERE username = '$safe_userName' "))
		{
			$check_num_rows = mysqli_num_rows($checkuser);
		} 
		else
		{
			echo('Sorry, something went wrong...Please try again later.');
		}
	}

/*too short or too long?*/
/*must be bigger than 1 and less than 26, and if username exists error message*/

	if(!empty($safe_userName)){
		if(strlen($safe_userName)< 2)
		{
			echo '<div class="redMsg">Username must be bigger than 2 characters.</div>';
		} 
		else if(strlen($safe_userName) > 26)
		{
			echo '<div class="redMsg"> Username is too big.</div>';
		} 
		else if($check_num_rows === 1)
		{
			echo '<div class="redMsg">Username is already registered.</div>';
		} 
		else if($safe_userName === '')
		{
			echo '<div class="redMsg">Must fill in the username.</div>';
		} 
		else
		{
			echo '<img src="https://cdn4.iconfinder.com/data/icons/Free-Medical-Icons-Set/32x32/Select.png" width="20px" height="20px;">';
		}
	}
	//free the result, best practise
mysqli_free_result($checkuser);
}


/*firstname validation*/
if(isset($_POST['firstname']))
{
	$unsafe_firstName 	= trim(htmlentities($_POST['firstname']));
	$safe_firstName 	= mysqli_real_escape_string($dbconnection, $unsafe_firstName);
		
	if(!empty($safe_firstName)  && $safe_firstName !=='')
	{
		/*too sort or too long ?*/
		/*must be bigger than 1 and less than 25*/
		if(strlen($safe_firstName) < 2)
		{
			echo '<div class="redMsg">The length of your name must be bigger than 2 characters.</div>';
		} 
		else if(strlen($safe_firstName) > 26)
		{
			echo '<div class="redMsg">Please check your name.The length is too long.</div>';
		}  
		else if($safe_firstName === '')
		{
			echo '<div class="redMsg">Please fiil in you firstname.</div>';
		}
		else if(!preg_match('/^[a-zA-Z]+$/',$safe_firstName))
		{
			echo '<div class="redMsg">A name cannot contain numbers.</div>';
		}
		else
		{
			echo '<img src="https://cdn4.iconfinder.com/data/icons/Free-Medical-Icons-Set/32x32/Select.png" width="20px" height="20px;">';
		}
	}
}

/*lastname validation*/
if(isset($_POST['lastname']))
{
	$unsafe_lastName 	= trim(htmlentities($_POST['lastname']));
	$safe_lastName 		= mysqli_real_escape_string($dbconnection, $unsafe_lastName);
	
	/*too sort or too long ?*/
	/*must be bigger than 1 and less than 25*/
	if($safe_lastName !== NULL)
	{
		if(strlen($safe_lastName) < 2)
		{
			echo '<div class="redMsg">Lastname must be bigger than 2 characters.</div>';
		} 
		else if(strlen($safe_lastName) > 26)
		{
			echo '<div class="redMsg">Oops, lastname is too long.</div>';
		} 
		else if($safe_lastName == '')
		{
			
			echo '<div class="redMsg">Lastname is a mandatory field.</div>';
		} 
		else if(!preg_match('/^[a-zA-Z]+$/',$safe_lastName))
		{
			echo '<div class="redMsg">A lastname cannot contain numbers.</div>';
		}
		else
		{
			echo '<img src="https://cdn4.iconfinder.com/data/icons/Free-Medical-Icons-Set/32x32/Select.png" width="20px" height="20px;">';
		}
	}
}

/*address validation*/
if(isset($_POST['address'])){
	/*delete all spaces before and after the adress*/
	$unsafe_address 	= trim(htmlentities($_POST['address']));
	$safe_address 		= mysqli_real_escape_string($dbconnection, $unsafe_address);
			
	/*too sort or too long ?*/
	/*must be bigger than 1 and less than 60*/

	if(!empty($safe_address))
	{
		if(strlen($safe_address) < 5)
		{
			echo '<div class="redMsg">Please insert your complete address.</div>';
		} 
		else if(strlen($safe_address) > 70)
		{
			echo '<div class="redMsg">Please check if your address is correct.</div>';
		} 
		else if($safe_address == '')
		{
			echo '<div class="redMsg">The address field is mandatory.</div>';
		} 
		else
		{
			echo '<img src="https://cdn4.iconfinder.com/data/icons/Free-Medical-Icons-Set/32x32/Select.png" width="20px" height="20px;">';
		}
	}
}


/*pc4 validation*/
if(isset($_POST['pc4']))
{

	$unsafe_pc4    = trim(htmlentities($_POST['pc4']));
	$safe_pc4      = mysqli_real_escape_string($dbconnection, $unsafe_pc4);
	$patternRegex = '/^[0-9]*$/';
			
	/*must have 4 numbers and cannot be 0000 ?*/
	if($safe_pc4 !== NULL)
	{
		if(strlen($safe_pc4) !== 4)
		{
			echo '<div class="redMsg">Please insert your first 4 digits of your postal code.</div>';
		} 
		else if($safe_pc4 === '')
		{
			echo '<div class="redMsg">Postal code is mandatory.</div>';
		} 
		else if($safe_pc4 === '0000')
		{
		echo '<div class="redMsg">Please check if your postal code is correct.</div>';
		} 
		else if(!preg_match($patternRegex, $safe_pc4))
		{
			echo '<div class="redMsg">The four first numbers of your postal code must be four digits long.</div>';
		}
		else
		{
			echo '<img src="https://cdn4.iconfinder.com/data/icons/Free-Medical-Icons-Set/32x32/Select.png" width="20px" height="20px;">';
		}
	}
}

/*pc3 validation*/
if(isset($_POST['pc3']))
{
	
	$unsafe_pc3		= trim(htmlentities($_POST['pc3']));
	$safe_pc3 		= mysqli_real_escape_string($dbconnection, $unsafe_pc3);
	$patternRegex = '/^[0-9]*$/';
			
	/*must have 3 numbers*/
	if(!empty($safe_pc3))
	{
		if(strlen($safe_pc3) !== 3)
		{
			echo '<div class="redMsg">Please fill your 3 last postal code numbers.</div>';
		} 
		else if($safe_pc3 == '')
		{
			echo '<div class="redMsg">Postal code is mandatory.</div>';
		} 
		else if(!preg_match($patternRegex, $safe_pc3))
		{
			echo '<div class="redMsg">The 3 last digits of your postal code must be numbers.</div>';
		}else
		{
			echo '<img src="https://cdn4.iconfinder.com/data/icons/Free-Medical-Icons-Set/32x32/Select.png" width="20px" height="20px;">';
		}
	}
}

/*district validation*/
if(isset($_POST['district']))
{
	$unsafe_district 	= trim(htmlentities($_POST['district']));
	$safe_district 		= mysqli_real_escape_string($dbconnection, $unsafe_district);
			
	/*too short or too long?*/
	/*must be bigger than 2 and less than 26 and only letters*/
	if(!empty($safe_district))
	{
		if(strlen($safe_district)< 2)
		{
			echo '<div class="redMsg">District must be bigger than 2 letters.</div>';
		} 
		else if(!preg_match('/^[a-zA-Z]+$/',$safe_district))
		{
			echo '<div class="redMsg">District cannot have numbers.</div>';
		}
		else if(strlen($safe_district) > 26)
		{
			echo '<div class="redMsg">That is a very long district.</div>';
		}
		else if($safe_district == '')
		{
			echo '<div class="redMsg">District is mandatory.</div>';
		} 
		else
		{
			echo '<img src="https://cdn4.iconfinder.com/data/icons/Free-Medical-Icons-Set/32x32/Select.png" width="20px" height="20px;">';
		}
	}
}

/*birthdate validation*/
if(isset($_POST['birthdate']))
{	
	$unsafe_birthdate 	= trim(htmlentities($_POST['birthdate']));
	$safe_birthdate 	= mysqli_real_escape_string($dbconnection, $unsafe_birthdate);
		  
	/*date picker jquery UI*/
	if(!empty($safe_birthdate))
	{
		if($safe_birthdate === '00/00/0000' || $safe_birthdate == '')
		{
			echo '<div class="redMsg">Birthdate is mandatory.</div>';
		}
		else
		{
			echo '<img src="https://cdn4.iconfinder.com/data/icons/Free-Medical-Icons-Set/32x32/Select.png" width="20px" height="20px;">';
		}
	}
}

/*gender validation*/
if(isset($_POST['gender']))
{
	$unsafe_gender 		= trim(htmlentities($_POST['gender']));
	$safe_gender 		= mysqli_real_escape_string($dbconnection, $unsafe_gender);
		
	if(!empty($safe_gender))
	{
		if(empty($safe_gender))
		{
			echo '<div class="redMsg">Gender is mandatory.</div>';
		} 
		else
		{
			echo '<img src="https://cdn4.iconfinder.com/data/icons/Free-Medical-Icons-Set/32x32/Select.png" width="20px" height="20px;">';
		}
	}
}

//close datanase connection
mysqli_close($dbconnection);

?>