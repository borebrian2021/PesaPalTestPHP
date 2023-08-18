<?php include('top.php'); 

$first_name = 'Brian';
$last_name = 'Koskei';
$email = 'bkimutai2021@gmail.com';
$phone_number = '+254712035642';
$currency = 'KES';
$amount = '1';
$reference = ''; // Set the reference value if needed
$consumer_keys = 'checked';
$description = ''; // Set the description value if needed

// Encode the dynamic data
$encoded_first_name = urlencode($first_name);
$encoded_last_name = urlencode($last_name);
$encoded_email = urlencode($email);
$encoded_phone_number = urlencode($phone_number);
$encoded_currency = urlencode($currency);
$encoded_amount = urlencode($amount);
$encoded_reference = urlencode($reference);
$encoded_consumer_keys = urlencode($consumer_keys);
$encoded_description = urlencode($description);

// Construct the API link
$api_link = "http://localhost/payments/iframe.php?" .
    "first_name={$encoded_first_name}&" .
    "last_name={$encoded_last_name}&" .
    "email={$encoded_email}&" .
    "phone_number={$encoded_phone_number}&" .
    "currncy={$encoded_currency}&" .
    "amount={$encoded_amount}&" .
    "reference={$encoded_reference}&" .
    "consumer_keys={$encoded_consumer_keys}&" .
    "description={$encoded_description}";

echo $api_link;
?>
<script>
				function referenceShuffle(val){
					if (document.getElementById('ref').checked){
						document.getElementById("refholder").style.visibility = "visible";
					}else{
						document.getElementById("refholder").style.visibility = "hidden";
					}
				}
			</script>
<br />
<div class="row-fluid">
	
    <div class="span5">
        <form id="rightcol" action="iframe.php" method="post" class="rounded5">
            <table>
                <tr>
                    <td>First Name:</td>
                    <td><input type="text" name="first_name" value="" /></td>
                </tr>
                <tr>
                    <td>Last Name:</td>
                    <td><input type="text" name="last_name" value="" /></td>
                </tr>
                <tr>
                    <td>Email Address:</td>
                    <td><input type="text" name="email" value="" /></td>
                </tr>
                <tr>
                    <td>Phone Number:</td>
                    <td><input type="text" name="phone_number" value="" /></td>
                </tr>
                <tr>
                    <td>Amount:</td>
                    <td>
                        <select name="currency" id="currency">
                            <option value="KES">Kenya shillings</option>  
                            <option value="UGX">Ugandan Shillings</option> 
                            <option value="TZS">Tanzanian shillings</option>  
                            <option value="USD">US Dollars</option>  
                        </select>
                        <input type="text" name="amount" value="" />
                    </td>
                </tr>
                <tr id="refholder" style="visibility: hidden">
                    <td>Reference:</td>
                    <td><input type="text" name="reference" value="" /></td>
                </tr>
                    <tr>
                <td colspan="2"><input type="checkbox" name="ref" id="ref" onClick="return referenceShuffle()" />System allows my clients to input a predefined reference code issued to the client before they make the payment</td>
                </tr>
                <td colspan="2"><input type="checkbox" name="keys" id="keys"/><b>ENSURE TO CHECK THIS FIELD</b> The consumer key and consumer secret i have used used in this sample PHP code are <a href="https://developer.pesapal.com/api3-demo-keys.txt"><b>DEMO Credentials</b></a>.</td>
                </tr>
                <tr><td colspan="2"><hr /></td></tr>
                <tr>
                    <td>Description:</td>
                    <td><input type="text" name="description" value="Payments to XYZ Company" /></td>
                </tr>
                <tr><td colspan="2"><hr /></td></tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Make Payment" class="btn" /></td>
                </tr>
            </table>
        </form>
    </div>
</div>

