<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/itemview.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/sprinkle.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.14.custom.min.js"></script>
<script type="text/javascript" src="js/jquery-1.5.1.min.js"></script>
</head>

<body>

<table style="margin-left:auto; margin-right:auto;text-align:center;width:600px;">
	<tr>
		<tr>
		<td style="text-align:left;border:1px solid #000;border-radius:5px;--webkit-border-radius:5px;">
		<h2>Item View</h2>
		<form>
		
		Item Number: <input type="text" name="Item Number" /><br />
		Item Category: <select name="Item Category">
			<option value="SportsFitness">Sports And Fitness</option>
			<option value="WaterToys">Water Toys</option>
			<option value="Camping">Camping</option>
		</select><br />
		OM Item Title: <input type="text" name="Description" /><br />
	
		<button type="button">Previous Item</button>
		<button type="button">Next Item</button><br />
			
		<textarea rows="4" cols="50">
		This is where the item description will go for more extensive descriptions
		</textarea><br />
			
		<button type="button">Update Item</button>
		<button type="button">New Item</button><br />
		</td>
		</tr>
		<tr>
		<td>
		<img src="56621.jpg" alt="test image" /> 
		</form>
		</td>
		</tr>


		<tr>
		<td>
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