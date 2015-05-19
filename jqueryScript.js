
/*datepicker*/
$(function() {
    $("#datepicker").datepicker({
    	inline: true,  
            showOtherMonths: true,
            minDate:'-100y',maxDate:'0',
            changeYear: true,
            changeMonth: true
    	});
  });


$(document).ready(function(){

	$('#usernameMessage').load('validation.php').show();
		$('#userName_input').keyup(function(){
			$.post('validation.php', { username: registrationForm.userName.value },
				function(result){
					$('#usernameMessage').html(result).show();
				});
		});

		$('#firstNameMessage').load('validation.php').show();
			$('#firstName_input').keyup(function(){
				$.post('validation.php', { firstname: registrationForm.firstName.value },
					function(result){
						$('#firstNameMessage').html(result).show();
					});
			});

		$('#lastNameMessage').load('validation.php').show();
			$('#lastName_input').keyup(function(){
				$.post('validation.php', { lastname: registrationForm.lastName.value },
					function(result){
						$('#lastNameMessage').html(result).show();
					});
			});	


		$('#addressMessage').load('validation.php').show();
			$('#address_input').keyup(function(){
				$.post('validation.php', { address: registrationForm.address.value },
					function(result){
						$('#addressMessage').html(result).show();
					});
			});		

		$('#pcMessage').load('validation.php').show();
			$('#pc4_input').keyup(function(){
				$.post('validation.php', { pc4: registrationForm.pc4.value },
					function(result){
						$('#pcMessage').html(result).show();
					});
			});	


		$('#pcMessage').load('validation.php').show();
			$('#pc3_input').keyup(function(){
				$.post('validation.php', { pc3: registrationForm.pc3.value },
					function(result){
						$('#pcMessage').html(result).show();
					});
			});

		$('#districtMessage').load('validation.php').show();
			$('#district_input').keyup(function(){
				$.post('validation.php', { district: registrationForm.district.value },
					function(result){
						$('#districtMessage').html(result).show();
					});
			});				


		$('#birthdateMessage').load('validation.php').show();
			$('#datepicker').change(function(){
				$.post('validation.php', { birthdate: registrationForm.birthdate.value },
					function(result){
						$('#birthdateMessage').html(result).show();
					});
			});	


		$('#genderMessage').load('validation.php').show();
			$('input[name=gender]:radio').change(function(){
				$.post('validation.php', { gender: registrationForm.gender.value },
					function(result){
						$('#genderMessage').html(result).show();
					});
			});	


});


