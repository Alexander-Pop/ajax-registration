<?php error_reporting(0); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Form</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>	
<script src="jquery-ui-1.11.2/jquery-ui.js"></script>
<script type="text/javascript" src="jqueryScript.js"></script>
</head>

<body>
	<section>
		<header>
			<h1>Sign up!</h1><br/>
		</header>
			<article>
				<fieldset class="formFieldset">
					<form name="registrationForm" method="POST" action="validation2.php">
						<input type="text" name="userName" id="userName_input" placeholder="Username"/><br/>
						<input type="text" name="firstName" id="firstName_input" placeholder="Firstname"/><br/>
						<input type="text" name="lastName" id="lastName_input" placeholder="Lastname" /><br/>
						<input type="text" name="address" id="address_input" placeholder="Address" /><br/>
						<input type="text" name="pc4" id="pc4_input" placeholder="P.C.- 0000" />-
						<input type="text" name="pc3" id="pc3_input" placeholder="P.C.- 000" />
						<input type="text" name="district" id="district_input" placeholder="District" /><br/>
						<input type="text" name="birthdate" id="datepicker" readonly="readonly" placeholder="Birthdate"/><br/>
						<label for="male">Male</label>
                        <input type="radio" name="gender" id="male_gender" value="male"><br>
						<label for="female">Female</label>
                        <input type="radio" name="gender" id="female_gender" value="female"><br/>
						<input type="submit" id="submitNewUser" name="submitNewUser" value="Register">
					</form>	
				</fieldset>
				<div class="messageFieldset">
					<div id="usernameMessage"></div><!--end of div id usernameMessage--><br/>
					<div id="firstNameMessage"></div><!--end of div id firstNameMessage--><br/>
					<div id="lastNameMessage"></div><!--end of div id lastNameMessage--><br/>
					<div id="addressMessage"></div><!--end of div id addressMessage--><br/>
					<div id="pcMessage"></div><!--end of div id pcMessage--><br/>
					<div id="districtMessage"></div><!--end of div id districtMessage--><br/>
					<div id="birthdateMessage"></div><!--end of div id birthdateMessage--><br/>
					<div id="genderMessage"></div><!--end of div id genderMessage--><br/>
				</div><!--end of div class messageFieldset-->
			</article>		
	</section>
</body>
</html>