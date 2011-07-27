<html>
<head>
<script type="text/javascript" src="view/js/sprinkle.js"></script>
<script type="text/javascript" src="view/js/jquery-ui-1.8.14.custom.min.js"></script>
<script type="text/javascript" src="view/js/jquery-1.4.3.min.js"></script>
</head>

<body>

<table class="table_main">
	<tr>
		<tr>
		<td>
		<h3>Single Item Edit View</h3><br/>
		<form>
		
		<table class="table_sub">
			<tr><td>Item Number:</td><td><input type="text" name="Item Number" /></td></tr>
			<tr><td>Item Master Category:</td><td><select name="Item Category">			
											<option value="AP">Apparel (AP)</option>
											<option value="OS">Outdoors and Sports (OS)</option>
											<option value="PS">Pool and Spa (OS)</option>
											<option value="GT">Games and Toys (GT)</option>
											<option valued="GE">Gadgets and Electronics (GE)</option>
																					
											</select></td></tr>
			<tr><td>OM Item Title:</td><td><input type="text" name="Description" /></td></tr>
		</table>
	
		<button type="button">Previous Item</button>
		<button type="button">Next Item</button><br />
			
		<textarea rows="8" cols="70">This is the generic non-channel specific item description</textarea><br />
			
		<button type="button">Update Item</button>
		<button type="button">New Item</button><br />
		</form>
		</td>
		</tr>
		<tr>
		<td>
		<h3>Current Repository Images</h3><br/>
		<img src="view/images/56621.jpg" alt="test image" /> 
		</td>
		</tr>


		<tr>
		<td>
		
		</td>
		</tr>
	
	</tr>
</table>

</body>

</html>

<?php

?>