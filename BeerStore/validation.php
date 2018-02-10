<!DOCTYPE html>
<html>
	<head>
		<title>Validation and Order Processing</title>
	</head>
	<body>
		<?php
		
			include ("formValidation.php");
			$taxes = array('britishColumbia'=>1.12, 'ontario'=>1.13, 'quebec'=>1.14975,'alberta'=>1.05,'novaScotia'=>1.15,'newfoundland'=>1.15,'saskatchewan'=>1.11,'manitoba'=>1.13,'newBrunswick'=>1.15,'princeEdwardIsland'=>1.15);
			$nameBeer = array('chimay', 'waterlootb', 'duvel', 'ayinger');
			$priceBeer = array('chimay'=>4.95, 'waterlootb'=>3.95, 'duvel'=>3.45, 'ayinger'=>4.45);
			$nameIndex = array("fname", "lname", "address", "city", "province", "pcode", "phone", "email");		
			$userInfo = array ();
			
			for ($i=0; $i < count( $nameIndex ); $i++){
				
				if (!isset($_POST[$nameIndex[$i]]) || $_POST[$nameIndex[$i]] == ''){
					header("Location: index.html");
				}
				else{
					$userInfo[$i] = $_POST["$nameIndex[$i]"];
				}
			}
			
			ValidateForm($userInfo);
			
			$subtotal = 0;
			for ($i=0; $i<count($nameBeer);$i++){
				$qtdBeer["$nameBeer[$i]"] = $_POST["$nameBeer[$i]"];
				$subtotal += $qtdBeer["$nameBeer[$i]"] *$priceBeer["$nameBeer[$i]"]; 	
			}
			
			
			$subtotalAftTax = $taxes["$userInfo[4]"] * $subtotal;
			
			if ($subtotalAftTax >= 0.01 && $subtotalAftTax <=25.00 ){
				$total = $subtotalAftTax + 3.00;
				$delivery = 1;
			}
			elseif($subtotalAftTax > 25.00 && $subtotalAftTax<=50.00 ){
				$total = $subtotalAftTax + 4.00;
				$delivery = 1;
			} 
			elseif($subtotalAftTax > 50.00 && $subtotalAftTax<=75.00 ){
				$total = $subtotalAftTax + 5.00;
				$delivery = 3;
			} 
			elseif($subtotalAftTax > 75.00){
				$total = $subtotalAftTax + 6.0;  
				$delivery = 4;
			}
			

			echo "<br>Your order has been processed. Please verify the information. <br>";
			echo "<h3>Shipping to:</h3>";
			echo "$userInfo[0] $userInfo[1] <br> $userInfo[2] <br> $userInfo[3] $userInfo[4] <br> $userInfo[5] <br>";
			
			echo "<br><h3>Order information:</h3>";
			
			$tax = $subtotalAftTax - $subtotal;
			
			for ($i=0; $i<count($nameBeer);$i++)
			{
				$qtdBeer["$nameBeer[$i]"] = $_POST["$nameBeer[$i]"];
				$subtotal1 = $qtdBeer["$nameBeer[$i]"] *$priceBeer["$nameBeer[$i]"]; 	
				if($qtdBeer["$nameBeer[$i]"]!=0)
				{
					echo $qtdBeer["$nameBeer[$i]"]." ";
					echo  $nameBeer[$i]. " at $";
					echo $priceBeer["$nameBeer[$i]"]. " each ------------------ Subtotal of $";
					echo (round($subtotal1,2));
					echo " <br>";
				}
				
			}

			
			echo "<br>Tax &nbsp;$" ;
			echo(round($tax,2));
			echo "<br>Delivery &nbsp; $delivery day(s)<br>";
			echo "Total &nbsp; $";
			echo(round($total,2));

			$today=date('d-m-Y');
			$next_date= date('d-m-Y', strtotime($today. " + $delivery days"));

			echo "<br>Estimated delivery date: ";
			echo $next_date;
			

		?>
	</body>
</html>
