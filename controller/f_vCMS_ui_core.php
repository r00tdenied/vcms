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
	$item_prefix_query='SELECT * from item_prefix';
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
function channel_master_select()
{
	global $DbLink;
	dbconn(DB_ADDRESS, DB_NAME, DB_USER, DB_PASSWORD);
	$channels_query="SELECT * from channel_master";
	$channels=mysql_query($channels_query,$DbLink);

	echo '<select name="channels">';
	
	while ($row = mysql_fetch_assoc($channels)) 
	{
		echo "<option value=".$row['channel_code'].">".$row['channel_description']." (".$row['channel_code'].")</option>";
	}
	echo '</select>';
}


//
//Generates single item view tabbed ui
//
function single_item_view($parent_sku)
{
?>
    <!-- Start HTML - Horizontal tabs -->
    <div id="st_horizontal" class="st_horizontal">                                                
        
        <div class="st_tabs_container">                                                                                                                                          
            
            <a href="#prev" class="st_prev"></a>
            
            <div class="st_slide_container">
            
                <ul class="st_tabs">
                    <li><a href="#st_content_1" rel="tab_1" class="st_tab st_tab_active">Item Header</a></li>
                    <li><a href="#st_content_2" rel="tab_2" class="st_tab">Item Vendor/Alias</a></li>                                     
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
              		<?php item_vendor_table($parent_sku)?>
              		
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
function item_search($parentSku, $catPref, $itemType, $itemStatus) {
	global $DbLink;
	$i=0;
	dbconn(DB_ADDRESS, DB_NAME, DB_USER, DB_PASSWORD);

	if($parentSku =='' && $catPref == '' && $itemType == '' && $itemStatus == ''){
		//Query for all items EVER!
		$item_query = "	SELECT 	im.parent_sku,
							 	im.master_title, 
							 	im.variant_flag,
							 	alloc.status
						from item_master im
						join item_alloc alloc on im.parent_sku = alloc.parent_sku";
		$item_data = mysql_query($item_query, $DbLink);
	}
	
	if($catPref != '' && $itemType == '' && $itemStatus ==''){
		//Query for catPref only
		$item_query = "	SELECT 	im.parent_sku,
							 	im.master_title, 
							 	im.variant_flag,
							 	alloc.status
						from item_master im
						join item_alloc alloc on im.parent_sku = alloc.parent_sku
						where alloc.sku_prefix ='$catPref'";
		$item_data = mysql_query($item_query, $DbLink);
		
	}
	
	if($catPref == '' && $itemType == '' && $itemStatus !=''){
		//Query for itemStatus only
		$item_query = "	SELECT 	im.parent_sku,
							 	im.master_title, 
							 	im.variant_flag,
							 	alloc.status
						from item_master im
						join item_alloc alloc on im.parent_sku = alloc.parent_sku
						where alloc.status ='$itemStatus'";
		$item_data = mysql_query($item_query, $DbLink);
		
	}
	
	if($catPref == '' && $itemType != '' && $itemStatus ==''){
		//Query for itemType only
		$item_query = "	SELECT 	im.parent_sku,
							 	im.master_title, 
							 	im.variant_flag,
							 	alloc.status
						from item_master im
						join item_alloc alloc on im.parent_sku = alloc.parent_sku
						join item_prefix pref on alloc.sku_prefix = pref.sku_prefix
						where pref.prefix_type ='$itemType'";
		$item_data = mysql_query($item_query, $DbLink);
		
	}
	
	if( $parentSku != '' && $catPref == '' && $itemType == '' && $itemStatus ==''){
		//Query for parentSku only
		$item_query = "	SELECT 	im.parent_sku,
							 	im.master_title, 
							 	im.variant_flag,
							 	alloc.status
						from item_master im
						join item_alloc alloc on im.parent_sku = alloc.parent_sku
						where im.parent_sku like'%$parentSku%'";
		$item_data = mysql_query($item_query, $DbLink);
		
	}
	
	if($parentSku != '' && $catPref != ''){
		//Only allow parentSku field
		include 'view/v_item_search.php';
		echo '<table class="table_main">';
		echo '<tr><td style="color:red;text-align:center;">Search by Parent SKU and Item Prefix is disallowed</td></tr>';
		echo '</table>';
		exit;
	}
	
	if($parentSku != '' && $itemType != ''){
		//Only allow parentSku field
		include 'view/v_item_search.php';
		echo '<table class="table_main">';
		echo '<tr><td style="color:red;text-align:center;">Search by Parent SKU and Item Type is disallowed</td></tr>';
		echo '</table>';
		exit;
	}
	
		if($parentSku != '' && $itemStatus != ''){
		//Only allow parentSku field
		include 'view/v_item_search.php';
		echo '<table class="table_main">';
		echo '<tr><td style="color:red;text-align:center;">Search by Parent SKU and Item Status is disallowed</td></tr>';
		echo '</table>';
		exit;
	}
	
	include 'view/v_item_search.php';
	echo '<table class="table_main">';
	echo  "<tr>
			<td><b>Actions</b></td>
			<td><b>Sku</b></td>
			<td><b>Variation</b></td>
			<td><b>Product Title</b></td>
		</tr>";
	while($row = mysql_fetch_assoc($item_data))
	{
		echo "<tr class='table_row" . ($i++ % 2) ."'>";
		echo 	"<td style='width:80px;'>";
			if($row['status'] == 'NEW' || $row['status'] == 'USED')
				{
					echo '<img src="view/images/pc.de/sign-in.png"/><a class="example7" href="?v=single_item_view&sku='.$row['parent_sku'].'">Edit Item</a>';
				}
			elseif($row['status'] == 'LOCKED' || $row['status'] == 'RESERVED')
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
	
}

//
//Generates item vendor table based on parent_sku
//
function item_vendor_table($parent_sku)
{
	global $DbLink;
	dbconn(DB_ADDRESS, DB_NAME, DB_USER, DB_PASSWORD);
	$item_vendor_query="SELECT 	iv.parent_sku,
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
						where parent_sku='$parent_sku'";
	$item_vendor=mysql_query($item_vendor_query,$DbLink);
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
			<form method='post' url=''>
			<input type='hidden' name='update' value='itemMfg'/>
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
<?php 
	if(is_null(db_obj_item_view($parent_sku, 'item_vendor', 'mfg_name')))
	{
?>
		<tr>
				<td style='text-align:center;'>
					<form method='post' url=''>
					<input type='hidden' name='insert' value='itemMfg'/>
					<input type='text' size='20' name='mfgName'/>
				</td>
				<td style='text-align:center;'>
					<input type='text' size='20' name='mfgUPC''/>
				</td>
				<td style='text-align:right;'>
					<input type='submit' value='Add Mfg'/>
					</form>
				</td>
		</tr>
		<tr>
			<td colspan='3' style='text-align:center;'><i>No manufacturer data is specified. Please add it and insert</i></td></tr>
<?php 			
	}
?>	
	
		</table>
		<table class='table_window'>
    		<tr><td colspan='3'><h3>Item Vendor</h3></td></tr>
			<tr>
				<td style='text-align:center;'><b>Vendor Name</b></td>
				<td style='text-align:center;'><b>Vendor Code</b></td>
 				<td style='text-align:center;'><b>Vendor Sku</b></td>
			</tr>
<?php 
	while ($row = mysql_fetch_assoc($item_vendor)) 
	{
?>
			<tr>
				<td style='text-align:center;'><?php echo $row['vendor_name'] ?></td>
				<td style='text-align:center;'>
					<form method='post' url=''>
					<input type='hidden' name='update' value='itemVendor'/>
					<input type='text' size='3' name='vendorCode' value='<?php echo $row['vendor_code']?>'/>
				</td>
				<td style='text-align:center;'>
					<input type='text' size='10' name='vendorSku' value='<?php echo $row['vendor_sku']?>'/>
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
					<form method='post' url=''>
					<input type='hidden' name='insert' value='itemVendor'/>
					<input type='text' size='3' name='vendorCode'/>
				</td>
				<td style='text-align:center;'>
					<input type='text' size='10' name='vendorSku'/>
				</td>
			</tr>	
<?php 
	}	
?>
	<tr><td></td><td></td><td style='text-align:right;'><input type='submit' value='Add Vendor'/></form></td></tr>
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
							<td><form method="post" url=""><?php echo $parent_sku; ?></td>
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
								<?php channel_master_select(); ?>
								<input type="submit" value="Add item to Channel"/>
								</form>
							</td>
						</tr>
					</table>
<?php	
}
	
