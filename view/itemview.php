<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/itemview.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/sprinkle.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.14.custom.min.js"></script>
<script type="text/javascript" src="js/jquery-1.5.1.min.js"></script>
</head>

<body>

<table style="margin-left:auto; margin-right:auto;width:600px;">
	<tr>
		<tr>
		<td style="text-align:left;border:1px solid #000;padding:10px;">
		<h3 style="text-align:center;">Single Item Edit View</h3><br/>
		<form>
		
		<table>
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
		<td style="text-align:center;border:1px solid #000;padding:10px;">
		<h3 style="text-align:center;">Current Repository Images</h3><br/>
		<img src="56621.jpg" alt="test image" /> 
		</td>
		</tr>


		<tr>
		<td style="border:1px solid #000;padding:10px;">
		<div id="tabvanilla" class="widget">  
  
		<ul class="tabnav">  
		<li><a href="#popular">Item Information</a></li>  
		<li><a href="#recent">Sales Channels</a></li>  
		<li><a href="#featured">Analytics</a></li>  
		</ul>  
  
		<div id="popular" class="tabdiv">  
		<ul>  
		<li><a href="#">Item Metrics0</a></li>  
		<li><a href="#">Item Metrics1</a></li>  
		<li><a href="#">Item Metrics2</a></li>  
		<li><a href="#">Item Metrics3</a></li>  
		<li><a href="#">Item Metrics4</a></li>  
		<li><a href="#">Item Metrics5</a></li>  
		<li><a href="#">Item Metrics6</a></li>  
		<li><a href="#">Item Metrics7</a></li>  
		<li><a href="#">Item Metrics8</a></li>  
		<li><a href="#">Item Metrics9</a></li>  
		</ul>  
		</div><!--/popular-->  
  
		<div id="recent" class="tabdiv">  

		<div id="mktch">
			<form>
			Select the Sales channel: 
			<select name="Sales Channel">
				<option value="BosYahoo">Yahoo</option>
				<option value="BosAmz">Amazon</option>
				<option value="BosEby">Ebay</option>
			</select><br />
			</form>
		</div>

		</div><!--/recent-->  
  
		<div id="featured" class="tabdiv">  
		<ul>  
		<li><a href="#">Analytics Data0</a></li>  
		<li><a href="#">Analytics Data1</a></li>  
		<li><a href="#">Analytics Data2</a></li>  
		<li><a href="#">Analytics Data3</a></li>  
		<li><a href="#">Analytics Data4</a></li>  
		<li><a href="#">Analytics Data5</a></li>  
		<li><a href="#">Analytics Data6</a></li>  
		<li><a href="#">Analytics Data7</a></li>  
		<li><a href="#">Analytics Data8</a></li>  
		<li><a href="#">Analytics Data9</a></li>   
		</ul>  
		</div><!--featured-->  
  
		</div><!--/widget-->
		</td>
		</tr>
	
	</tr>
</table>

</body>

</html>

<?php

?>