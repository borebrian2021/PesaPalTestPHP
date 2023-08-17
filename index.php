<?php include('top.php'); ?>
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

