<?php

/**
 * 
 * f_vCMS_ui_core
 * All core UI vCMS functions 
 */

//
// Generates form select options based on db populated item prefix
//
function item_prefix_select($allow_any_prefix)
{
	global $DbLink;
	dbconn(DB_ADDRESS, DB_NAME, DB_USER, DB_PASSWORD);
	$item_prefix_query='SELECT * from item_prefix order by sku_prefix asc';
	$item_prefix=mysql_query($item_prefix_query,$DbLink);

	echo '<select name="catPref">';
	if($allow_any_prefix == '1'){
		echo '<option value="">Any Prefix</option>';
	}
	while ($row = mysql_fetch_assoc($item_prefix)) 
	{
		echo '<option value="'. $row['sku_prefix'] .'">' . $row['description'] .' ('. $row['sku_prefix'] .')</option>';
	}
	echo '</select>';
}

//
// Generates select options based on db populated vendors
//
function vendor_select()
{
	global $DbLink;
	dbconn(DB_ADDRESS, DB_NAME, DB_USER, DB_PASSWORD);
	$vendor_query='SELECT * from vendor_detail order by vendor_code asc';
	$vendor=mysql_query($vendor_query,$DbLink);

	echo '<select name="vendorCode">';
		echo '<option>--Select a Vendor--</option>';
	while ($row = mysql_fetch_assoc($vendor)) 
	{
		echo '<option value="'. $row['vendor_code'] .'">' . $row['vendor_code'] .' - '. $row['vendor_name'] .'</option>';
	}
	echo '</select>';
}


//
//Generates form select options based on db populated prefix types
//
function item_prefix_type_select($allow_any_type)
{
	global $DbLink;
	dbconn(DB_ADDRESS, DB_NAME, DB_USER, DB_PASSWORD);
	$item_prefix_type_query="SELECT distinct prefix_type from item_prefix";
	$item_prefix_type=mysql_query($item_prefix_type_query,$DbLink);

	echo '<select name="itemType">';
	if($allow_any_type == '1'){
		echo '<option value="">Any Type</option>';
	}
	while ($row = mysql_fetch_assoc($item_prefix_type)) 
	{
		echo "<option value=".$row['prefix_type'].">".$row['prefix_type']."</option>";
	}
	echo '</select>';
}

//
//Generates form select options based on db status
//
function item_status_select($allow_any_status)
{
	global $DbLink;
	dbconn(DB_ADDRESS, DB_NAME, DB_USER, DB_PASSWORD);
	$item_status_query="SELECT distinct status from item_alloc";
	$item_status=mysql_query($item_status_query,$DbLink);

	echo '<select name="itemStatus">';
	if($allow_any_status == '1'){
		echo '<option value="">Any Status</option>';
	}
	while ($row = mysql_fetch_assoc($item_status)) 
	{
		echo "<option value=".$row['status'].">".$row['status']."</option>";
	}
	echo '</select>';
}	

//
//Generates form select options based on db channel master
//
function channel_master_select($parent_sku)
{
	global $DbLink;
	dbconn(DB_ADDRESS, DB_NAME, DB_USER, DB_PASSWORD);
	$channels_query="SELECT * from channel_master";
	$channels=mysql_query($channels_query,$DbLink);

	$used_channels = db_obj_item_channels($parent_sku);
	$used_channels = explode(':', $used_channels);
	
	
	echo '<select name="channels">';
	
	while ($row = mysql_fetch_assoc($channels)) 
	{
		if(in_array($row['channel_code'],$used_channels ))
		{
			//Do nothing because the item is using that channel
		}
		else 
		{
			echo "<option value=".$row['channel_code'].">".$row['channel_description']." (".$row['channel_code'].")</option>";
		}
	}
	echo '</select>';
}


//
//Generates single item view tabbed ui
//
function item_view($parent_sku,$tab)
{
?>
    <!-- Start HTML - Horizontal tabs -->
    <div id="st_horizontal" class="st_horizontal">                                                
        
        <div class="st_tabs_container">                                                                                                                                          
            
            <a href="#prev" class="st_prev"></a>
            
            <div class="st_slide_container">
            
                <ul class="st_tabs">
                	<?php 
                	if($tab == 'item_header' || $tab == '')
                	{
                		echo ' <li><a href="#st_content_1" rel="tab_1" class="st_tab st_tab_active">Item Header</a></li>';
                	}
                	elseif($tab != 'item_header')
                	{
                		echo ' <li><a href="#st_content_1" rel="tab_1" class="st_tab">Item Header</a></li>';
                	}
                	if($tab == 'item_vendor')
                	{
                		echo '<li><a href="#st_content_2" rel="tab_2" class="st_tab st_tab_active">Item Vendor/Alias</a></li>';
                	}
                	elseif($tab !='item_vendor')
                	{
                		echo '<li><a href="#st_content_2" rel="tab_2" class="st_tab">Item Vendor/Alias</a></li>';
                	}
                	?>                              
                    <li><a href="#st_content_3" rel="tab_3" class="st_tab">Image Repository</a></li>
                     <?php $chan_array = explode(':',db_obj_item_channels($parent_sku));
							$tab_head = 0;
							$array_count = count($chan_array);
	
							if($array_count > '0' && $chan_array[0] != '')
							{
								while($tab_head<$array_count)
								{
									$cont = $tab_head+4;
									echo '<li><a href="#st_content_'.$cont.'" rel="tab_'.$cont.'" class="st_tab">'.$chan_array[$tab_head].'</a></li>';
									$tab_head++;
		
								}
							}    
                    ?>                                                     
                </ul>
            
            </div> <!-- /.st_slide_container -->
            
            <a href="#next" class="st_next"></a>                                                                                                
        
        </div> <!-- /.st_tabs_container -->
       
        <div class="st_view_container">
        
            <div class="st_view">
                        
                <div id="st_content_1" class="st_tab_view">
                   <?php item_header_table($parent_sku)?>                      
                </div>
                
                <div id="st_content_2" class="st_tab_view">
                	<?php item_mfg_table($parent_sku)?>
              		<?php item_vendor_table($parent_sku)?>
              		<?php item_alias_table($parent_sku)?>
              		
                </div>
                
                <div id="st_content_3" class="st_tab_view">
                    <h2>Image Repo Placeholder</h2>
               </div>
               <?php $chan_array = explode(':',db_obj_item_channels($parent_sku));
							$tab_div = 0;
							$array_count = count($chan_array);
	
							while($tab_div<$array_count)
							{
								$tab_cont = $tab_div+4;
								echo '<div id="st_content_'.$tab_cont.'" class="st_tab_view">';
								echo "<h2>Placeholder</h2>";
								echo "</div>";
								$tab_div++;
		
							}
                    
                    ?>          
                
                          
            </div> <!-- /.st_view -->
         
        </div> <!-- /.st_view_container -->                                          
    
    </div> <!-- /#st_horizontal -->        
    <!-- End HTML - Horizontal tabs -->              
 <?php 
}

//
//Accepts post input and generates item list table based on search criteria
//
function item_search($parentSku, $catPref, $itemType, $itemStatus, $min, $max, $sort) {
	global $DbLink;
	$i=0;
	dbconn(DB_ADDRESS, DB_NAME, DB_USER, DB_PASSWORD);

	if(is_null($sort)){$sort = 'asc'; }
	if(is_null($min)){$min = 0;}
	if(is_null($max)){$max = 20;}
	
	if($parentSku == '')
	{
		if($catPref == '' && $itemType == '' && $itemStatus == '')
		{
			//Row count

			$item_count = 'SELECT * from item_alloc';
			$item_count = mysql_query($item_count, $DbLink);
			$rows = mysql_num_rows($item_count);
					
			//Query for all items EVER!
			$item_query = "	SELECT 	im.parent_sku,
								 	im.master_title, 
								 	im.variant_flag,
								 	alloc.status
							from item_master im
							join item_alloc alloc on im.parent_sku = alloc.parent_sku
							order by im.parent_sku $sort
							limit $min , $max";
			$item_data = mysql_query($item_query, $DbLink);
		}
	
		if($catPref != ''){
			
			$item_count = "SELECT * from item_alloc where sku_prefix ='$catPref'";
			$item_count = mysql_query($item_count, $DbLink);
			$rows = mysql_num_rows($item_count);
		
			//Query for catPref only
			$item_query = "	SELECT 	im.parent_sku,
								 	im.master_title, 
									im.variant_flag,
								 	alloc.status
							from item_master im
							join item_alloc alloc on im.parent_sku = alloc.parent_sku
							where alloc.sku_prefix ='$catPref'
							order by im.parent_sku $sort
							limit $min , $max";
			$item_data = mysql_query($item_query, $DbLink);
		
		}
	
		if($itemStatus !=''){
		
			$item_count = "SELECT * from item_allow where status='$itemStatus'";
			$item_count = mysql_query($item_count, $DbLink);
			$rows = mysql_num_rows($item_count);
		
			//Query for itemStatus only
			$item_query = "	SELECT 	im.parent_sku,
								 	im.master_title, 
								 	im.variant_flag,
								 	alloc.status
							from item_master im
							join item_alloc alloc on im.parent_sku = alloc.parent_sku
							where alloc.status ='$itemStatus'
							order by im.parent_sku $sort
							limit $min , $max";
			$item_data = mysql_query($item_query, $DbLink);
		
		}
	
		if($itemType != ''){
		
			$item_count = "SELECT * from item_alloc alloc 
							join item_prefix pref on alloc.sku_prefix = pre.sku_prefix
							where pref.prefix_type='$itemType'";
			$item_count = mysql_query($item_count, $DbLink);
			$rows = mysql_num_rows($item_count);
		
			//Query for itemType only
			$item_query = "	SELECT 	im.parent_sku,
								 	im.master_title, 
								 	im.variant_flag,
								 	alloc.status
							from item_master im
							join item_alloc alloc on im.parent_sku = alloc.parent_sku
							join item_prefix pref on alloc.sku_prefix = pref.sku_prefix
							where pref.prefix_type ='$itemType'
							order by im.parent_sku $sort
							limit $min , $max";
			$item_data = mysql_query($item_query, $DbLink);
		
		}
	}
	if( $parentSku != ''){
		
		$item_count = "SELECT * from item_master where parent_sku like '%$parentSku%'";
		$item_count = mysql_query($item_count, $DbLink);
		$rows = mysql_num_rows($item_count);
		
		//Query for parentSku only
		$item_query = "	SELECT 	im.parent_sku,
							 	im.master_title, 
							 	im.variant_flag,
							 	alloc.status
						from item_master im
						join item_alloc alloc on im.parent_sku = alloc.parent_sku
						where im.parent_sku like'%$parentSku%'
						order by im.parent_sku $sort
						limit $min , $max";
		$item_data = mysql_query($item_query, $DbLink);
		
	}
	
	if($parentSku != '' && $catPref != ''){
		//Only allow parentSku field
		include 'view/v_vCMS_item_search.php';
		echo '<table class="table_main">';
		echo '<tr><td style="color:red;text-align:center;">Search by Parent SKU and Item Prefix is disallowed</td></tr>';
		echo '</table>';
		exit;
	}
	
	if($parentSku != '' && $itemType != ''){
		//Only allow parentSku field
		include 'view/v_vCMS_item_search.php';
		echo '<table class="table_main">';
		echo '<tr><td style="color:red;text-align:center;">Search by Parent SKU and Item Type is disallowed</td></tr>';
		echo '</table>';
		exit;
	}
	
		if($parentSku != '' && $itemStatus != ''){
		//Only allow parentSku field
		include 'view/v_vCMS_item_search.php';
		echo '<table class="table_main">';
		echo '<tr><td style="color:red;text-align:center;">Search by Parent SKU and Item Status is disallowed</td></tr>';
		echo '</table>';
		exit;
	}
	
	include 'view/v_vCMS_item_search.php';
	echo '<table class="table_main">';
	echo  "<tr>
			<td><b>Actions</b></td>";
			if($sort == 'asc')
			{
				echo "<td><a href='?p=vCMS&process=itemSearch&parentSku=$parentSku&catPref=$catPref&itemType=$itemType&itemStatus=$itemStatus&min=$min&max=$max&sort=desc'><b>Sku</b></a></td>";
			}
			if($sort == 'desc')
			{
				echo "<td><a href='?p=vCMS&process=itemSearch&parentSku=$parentSku&catPref=$catPref&itemType=$itemType&itemStatus=$itemStatus&min=$min&max=$max&sort=asc'><b>Sku</b></a></td>";
			}
			
	echo 	"<td><b>Variation</b></td>
			<td><b>Product Title</b></td>
		</tr>";
	while($row = mysql_fetch_assoc($item_data))
	{
		echo "<tr class='table_row" . ($i++ % 2) ."'>";
		echo 	"<td style='width:80px;'>";
			if($row['status'] == 'NEW')
				{
					echo '<img alt="New Item" src="view/images/pc.de/sign-in.png"/>&nbsp;&nbsp;<a class="example7" href="?v=item_view&sku='.$row['parent_sku'].'">Edit Item</a>';
				}
			if($row['status'] == 'USED')
			{
					echo '<img src="view/images/pc.de/issue.png"/>&nbsp;&nbsp;<a class="example7" href="?v=item_view&sku='.$row['parent_sku'].'">Edit Item</a>';
			}
			if($row['status'] == 'LOCKED' || $row['status'] == 'RESERVED')
				{
					echo '<img src="view/images/pc.de/lock.png"/> Locked';
				}
		echo "</td>				
			<td style='width:80px;'>".$row['parent_sku']."</td>";
			if($row['variant_flag'] == '1')
				{
					echo "<td style='width:40px;'>Edit Variation</td>";
				}
			elseif($row['variant_flag'] == '0') 
				{
					echo "<td style='width:80px;'></td>";
				}
		echo '<td>'.$row['master_title'].'</td>';
		echo '</tr>';

	}
	
	if($rows>$max && $min == '0')
	{
		$next_min = $min + 20;
		$next_max = $max;
		
		echo '<table class="table_main"><tr>';
		echo '<td style="text-align:left;width:100px;"></td>';
		echo "<td style='text-align:center;'>Total Results: $rows</td>";
		echo "<td style='text-align:right;width:100px;'>";
		echo "<form method='GET' action='?p=vCMS'>";
		echo "<input type='hidden' name='p' value='vCMS'>";
		echo "<input type='hidden' name='process' value='itemSearch'>";
		echo "<input type='hidden' name='parentSku' value='$parentSku'>";
		echo "<input type='hidden' name='catPref' value='$catPref'>";
		echo "<input type='hidden' name='itemType' value='$itemType'>";
		echo "<input type='hidden' name='itemStatus' value='$itemStatus'>";
		echo "<input type='hidden' name='min' value='$next_min'>";
		echo "<input type='hidden' name='max' value='$next_max'>";
		echo "<input type='hidden' name='sort' value='$sort'>";
		echo "<input type='submit' value='Next 20'></form>";
		echo '</td></tr></table>';
	}
	if($min >'0')
	{
		$prev_min = $min - 20;
		$prev_max = $max;
		echo '<table class="table_main"><tr>';
		echo '<td style="text-align:left;width:100px;">';
		echo "<form method='GET' action='?p=vCMS'>";
		echo "<input type='hidden' name='p' value='vCMS'>";
		echo "<input type='hidden' name='process' value='itemSearch'>";
		echo "<input type='hidden' name='parentSku' value='$parentSku'>";
		echo "<input type='hidden' name='catPref' value='$catPref'>";
		echo "<input type='hidden' name='itemType' value='$itemType'>";
		echo "<input type='hidden' name='itemStatus' value='$itemStatus'>";
		echo "<input type='hidden' name='min' value='$prev_min'>";
		echo "<input type='hidden' name='max' value='$prev_max'>";
		echo "<input type='hidden' name='sort' value='$sort'>";
		echo "<input type='submit' value='Previous 20'></form></td>";
		
		echo "<td style='text-align:center;'>Total Results: $rows</td>";
		
		if($max<=$rows)
		{
			$next_min=$min+20;
			$next_max=$max;
			
			echo '<td style="text-align:right;width:100px;">';
			echo "<form method='GET' action='?p=vCMS'>";
			echo "<input type='hidden' name='p' value='vCMS'>";
			echo "<input type='hidden' name='process' value='itemSearch'>";
			echo "<input type='hidden' name='parentSku' value='$parentSku'>";
			echo "<input type='hidden' name='catPref' value='$catPref'>";
			echo "<input type='hidden' name='itemType' value='$itemType'>";
			echo "<input type='hidden' name='itemStatus' value='$itemStatus'>";
			echo "<input type='hidden' name='min' value='$next_min'>";
			echo "<input type='hidden' name='max' value='$next_max'>";
			echo "<input type='hidden' name='sort' value='$sort'>";
			echo "<input type='submit' value='Next 20'></form>";
		}	echo '</td></tr></table>';
	}
	
	
}

//
//Generates item mfg table based on parent_sku
//
function item_mfg_table($parent_sku)
{
	?>
	<table class='table_window'>
	<tr>
		<td colspan='3'>
			<h3>Item Manufacturer</h3>
		</td>
	</tr>
	<tr>
		<td style='text-align:center;'>
			<b>Mfg Name</b>
		</td>
		<td style='text-align:center;'>
			<b>Mfg UPC</b>
		</td>
	</tr>
	
	<tr>
		<td style='text-align:center;'>
			<form method='post' action='?p=vCMS-tab'>
			<input type='hidden' name='update' value='itemMfg'/>
			<input type='hidden' name='parent_sku' value='<?php echo $parent_sku; ?>'/>
			<input type='text' size='20' name='mfgName' value='<?php echo db_obj_item_view($parent_sku, 'item_vendor', 'mfg_name')?>'/>
		</td>
		<td style='text-align:center;'>
			<input type='text' size='20' name='mfgUPC' value='<?php echo db_obj_item_view($parent_sku, 'item_vendor', 'mfg_upc')?>'/>
		</td>
		<td style='text-align:right;'>
			<input type='submit' value='Update Mfg'/>
			</form>
		</td>
	</tr>
	</table>
	<?php 
}

//
// Generates item alias table based on parent_sku
//
function item_alias_table($parent_sku)
{
	global $DbLink;
	dbconn(DB_ADDRESS, DB_NAME, DB_USER, DB_PASSWORD);
	$item_alias_query="SELECT type,alias_sku from item_alias where parent_sku ='$parent_sku'";
	$item_alias=mysql_query($item_alias_query,$DbLink);
?>
	<table class='table_window'>
	<tr><td colspan='5'><h3>Item Aliases</h3></td></tr>
	<tr>
		<td style='text-align:center;width:25%;'><b>Parent Sku</b></td>
		<td style='text-align:center;width:25%;'><b>Alias Type</b></td>
		<td style='text-align:center;width:25%;'><b>Alias Sku</b></td>
	</tr>
<?php 
while ($row = mysql_fetch_assoc($item_alias)) 
	{
?>
	<form method='post' action='?p=vCMS-tab'>
	<tr>
		<td style='text-align:center;'><?php echo $parent_sku; ?></td>
		<td style='text-align:center;'><?php echo $row['type']?></td>
		<td style='text-align:center;'>
					<input type='hidden' name='update' value='itemAlias'/>
					<input type='hidden' name='parent_sku' value='<?php echo $parent_sku; ?>'/>
					<input type='text' size='10' name='newAliasSku' value='<?php echo $row['alias_sku']?>'/>
					<input type='hidden' name='oldAliasType' value='<?php echo $row['type']?>'/>
					<input type='hidden' name='oldAliasSku' value='<?php echo $row['alias_sku']?>'/></td>
		<td style='text-align:right;width:15px;'>
					<input type='submit' value='Update'/>
					</form>
		</td>
		<td style='text-align:left;width:15px;'>
					<form method='post' action='?p=vCMS-tab'>
					<input type='hidden' name='delete' value='itemAlias'/>
					<input type='hidden' name='parent_sku' value='<?php echo $parent_sku; ?>'/>
					<input type='hidden' name='aliasType' value='<?php echo $tow['type']?>'/>
					<input type='hidden' name='aliasSku' value='<?php echo $row['alias_sku']?>'/>
					<input type='submit' value='Delete'/>
					</form>
		</td>
	</tr>
<?php 
	}
	if(is_null($row['alias_sku']))
	{
?>
			<form method='post' action='?p=vCMS-tab'>
			<input type='hidden' name='insert' value='itemAlias'/>
			<input type='hidden' name='parent_sku' value='<?php echo $parent_sku; ?>'/>
			<tr>
				<td style='text-align:center;'><?php echo $parent_sku; ?></td>
				<td style='text-align:center;'>Not Implemented</td>
				<td style='text-align:center;'>
					<input type='text' size='10' name='aliasSku'/>
				</td>
				<td colspan='2' style='text-align:center;width:15px;'>
					<input type='submit' value='Add Alias'/>
					</form>
				</td>

			</tr>	
<?php 
	}	
?>
	</table>	
<?php 
}



//
//Generates item vendor table based on parent_sku
//
function item_vendor_table($parent_sku)
{
	global $DbLink;
	dbconn(DB_ADDRESS, DB_NAME, DB_USER, DB_PASSWORD);
	$item_vendor_query="SELECT 	iv.item_vendor_id,
								iv.parent_sku,
								vd.vendor_name,
								iv.vendor_code,
								iv.vendor_sku,
								iv.cost,
								iv.primary_vsku,
								iv.mfg_name,
								iv.mfg_upc,
								iv.fulfillment_type
						from item_vendor iv
						join vendor_detail vd on iv.vendor_code = vd.vendor_code
						where iv.parent_sku='$parent_sku'";
	$item_vendor=mysql_query($item_vendor_query,$DbLink);
?>
		<table class='table_window'>
    		<tr><td colspan='5'><h3>Item Vendor</h3></td></tr>
			<tr>
				<td style='text-align:center;width:25%;'><b>Vendor Name</b></td>
				<td style='text-align:center;width:25%;'><b>Vendor Code</b></td>
 				<td style='text-align:center;width:25%;'><b>Vendor Sku</b></td>
			</tr>
<?php 
	while ($row = mysql_fetch_assoc($item_vendor)) 
	{
?>
			<tr>
				<td style='text-align:center;'><?php echo $row['vendor_name'] ?></td>
				<td style='text-align:center;'>
					<form method='post' action='?p=vCMS-tab'>
					<input type='hidden' name='update' value='itemVendor'/>
					<input type='hidden' name='parent_sku' value='<?php echo $parent_sku; ?>'/>
					<input type='text' size='3' name='newVendorCode' value='<?php echo $row['vendor_code']?>'/>
					<input type='hidden' name='oldVendorCode' value='<?php echo $row['vendor_code']?>'/>
				</td>
				<td style='text-align:center;'>
					<input type='text' size='10' name='newVendorSku' value='<?php echo $row['vendor_sku']?>'/>
					<input type='hidden' name='oldVendorSku' value='<?php echo $row['vendor_sku']?>'/>
				</td>
				<td style='text-align:right;width:15px;'>
					<input type='submit' value='Update'/>
					</form>
				</td>
				<td style='text-align:left;width:15px;'>
					<form method='post' action='?p=vCMS-tab'>
					<input type='hidden' name='delete' value='itemVendor'/>
					<input type='hidden' name='parent_sku' value='<?php echo $parent_sku; ?>'/>
					<input type='hidden' name='vendorCode' value='<?php echo $row['vendor_code']?>'/>
					<input type='hidden' name='vendorSku' value='<?php echo $row['vendor_sku']?>'/>
					<input type='submit' value='Delete'/>
					</form>
				</td>
			</tr>
<?php 
	}
	if(is_null($row['vendor_sku']))
	{
?>
			<tr>
				<td style='text-align:center;'>---</td>
				<td style='text-align:center;'>
					<form method='post' action='?p=vCMS-tab'>
					<input type='hidden' name='insert' value='itemVendor'/>
					<input type='hidden' name='parent_sku' value='<?php echo $parent_sku; ?>'/>
					<input type='text' size='3' name='vendorCode'/>
				</td>
				<td style='text-align:center;'>
					<input type='text' size='10' name='vendorSku'/>
				</td>
				<td colspan='2' style='text-align:center;width:15px;'>
					<input type='submit' value='Add Vendor'/>
					</form>
				</td>

			</tr>	
<?php 
	}	
?>
	</table>
<?php 
}

//
//Generates item header table based on parent_sku
//
function item_header_table($parent_sku)
{
?>	
	 <table class="table_window">
						<tr><td colspan="3"><h3>Internal Item Header</h3></td></tr>
						<tr>
							<td><b>Parent SKU</b></td>
							<td><b>Variation</b></td>
							<td><b>Item Title</b></td>
						</tr>
						<tr>
							<td><form method="post" action="?p=vCMS-tab"><?php echo $parent_sku; ?>
							<input type="hidden" name="parent_sku" value="<?php echo $parent_sku; ?>"/></td>
							<td><?php echo db_obj_item_view($parent_sku,'item_master','variant_flag')?></td>
							<td><input size= "100" type="text" name="master_title" value="<?php echo db_obj_item_view($parent_sku,'item_master','master_title')?>"/>
							</td>
						</tr>
					</table>
					
					<table class="table_window">
						<tr>
							<td><h3>Internal Item Description</h3></td>
						</tr>
						<tr>
							<td>
								<textarea rows="3" cols="95" name="master_desc"><?php echo db_obj_item_view($parent_sku,'item_master','master_desc')?></textarea>
							</td>
						</tr>
					</table>
					
					<table class="table_window">
						<tr>
							<td colspan="4"><h3>Units of Measure</h3></td>
						</tr>
						<tr>
							<td style="text-align:center;"><b>Length<br/>(inches)</b></td>
							<td style="text-align:center;"><b>Width<br/>(inches)</b></td>
							<td style="text-align:center;"><b>Height<br/>(inches)</b></td>
							<td style="text-align:center;"><b>Weight<br/>(pounds)</b></td>
						</tr>
						<tr>
							<td style="text-align:center;">
								<input size="3" name="length" value="<?php echo db_obj_item_view($parent_sku, 'item_uom', 'length')?>"/>
							</td>
							<td style="text-align:center;">
								<input size="3" name="width" value="<?php echo db_obj_item_view($parent_sku, 'item_uom', 'width')?>"/>
							</td>
							<td style="text-align:center;">
								<input size="3" name="height" value="<?php echo db_obj_item_view($parent_sku, 'item_uom', 'height')?>"/>
							</td>
							<td style="text-align:center;">
								<input size="3" name="weight" value="<?php echo db_obj_item_view($parent_sku, 'item_uom', 'weight')?>"/>
							</td>
						</tr>
					</table>
					
					<table class="table_window">
						<tr>
							<td style="text-align:left;">
								<input type="hidden" name="update" value="itemHeader"/>
								<input type="submit" value="Update Item Header"/>
								</form>
							</td>
							<td style="text-align:right;">
								<form method="post" url="">
								<input type="hidden" name="insert" value="addChannel"/>
								<?php channel_master_select($parent_sku); ?>
								<input type="submit" value="Add item to Channel"/>
								</form>
							</td>
						</tr>
					</table>
<?php	
}

