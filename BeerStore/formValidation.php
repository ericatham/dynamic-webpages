<!DOCTYPE html>
<html>
	<head>
		<title>Validation of form data</title>
	</head>
	<body>
		<?php
			
			//Server side check for first name entry
			function ValidateFName ($fname){
				if ( strlen($fname)<2 || $fname == "" || is_numeric($fname))
				{
					echo "Invalid First Name <br>";
					return false;
				} 
				else {
					return true;
				}	
			}
			
			//Server side check for last name entry
			function ValidateLName ($lname){
				if ( strlen($lname)<2 || $lname == "" || is_numeric($lname))
				{
					echo "Invalid Last Name <br>";
					return false;
				} 
				else {
					return true;
				}	
			}
			
			//Server side check for Postal Code entry
			function CheckPostalCode($pcode){
				$expression = '/^([a-zA-Z]\d[a-zA-Z])\ {0,1}(\d[a-zA-Z]\d)$/';
				
				$valid = (bool)preg_match($expression, $pcode);
				if ($valid== false || $pcode == ""){
					echo "Invalid postal code <br>";
					return false;
				}
				else {
					return true;
				}
			}
			
			//Server side check for phone number entry
			function CheckPhoneNumber($phone){
				$expression = '/^\(?\d{3}\)?[\.\-\/\s]?\d{3}[\.\-\/\s]?\d{4}$/';
				
				$valid = (bool)preg_match($expression, $phone);
				if ($valid== false || $phone == ""){
					echo "Invalid phone number <br>";
					return false;
				}
				else {
					return true;
				}		
			} 
			
			//Server side check for email entry
			function ValidateEmail($email){
				$expression = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';
				
				$valid = (bool)preg_match($expression, $email);
				if ($valid== false || $email == ""){
					echo "Invalid email <br>";
					return false;
				}
				else {
					return true;
				}		
			} 
			
			//Server side check for address entry
			function ValidateAddress ($address){
				if ( strlen($address)<5 || $address == "" || is_numeric($address))
				{
					echo "Invalid Address <br>";
					return false;
				} 
				else {
					return true;
				}	
			}
			
			//Check if all the information is valid
			function ValidateForm ($userInfo){
				ValidateFName($userInfo[0]);
				ValidateLName($userInfo[1]);
				ValidateAddress($userInfo[2]);
				ValidateAddress($userInfo[3]);
				ValidateAddress($userInfo[4]);
				CheckPostalCode($userInfo[5]);
				CheckPhoneNumber($userInfo[6]);
				ValidateEmail($userInfo[7]);
			}
		?>
	</body>
</html>
