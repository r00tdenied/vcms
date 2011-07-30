<?php

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
                    <li><a href="#st_content_2" rel="tab_2" class="st_tab">Vendor Data</a></li>                                     
                    <li><a href="#st_content_3" rel="tab_3" class="st_tab">Image Repository</a></li>
                                                                         
                </ul>
            
            </div> <!-- /.st_slide_container -->
            
            <a href="#next" class="st_next"></a>                                                                                                
        
        </div> <!-- /.st_tabs_container -->
       
        <div class="st_view_container">
        
            <div class="st_view">
                        
                <div id="st_content_1" class="st_tab_view">
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
					<br>
					<table class="table_window">
						<tr>
							<td><h3>Internal Item Description</h3></td>
						</tr>
						<tr>
							<td>
								<textarea rows="5" cols="95" name="master_desc"><?php echo db_obj_item_view($parent_sku,'item_master','master_desc')?></textarea>
							</td>
						</tr>
					</table>
					<br>
					<table class="table_window">
						<tr>
							<td colspan="4"><h3>Units of Measure</h3></td>
						</tr>
						<tr>
							<td><b>Length<br/>(inches)</b></td>
							<td><b>Width<br/>(inches)</b></td>
							<td><b>Height<br/>(inches)</b></td>
							<td><b>Weight<br/>(pounds)</b></td>
						</tr>
						<tr>
							<td><input size="3" name="length" value="<?php echo db_obj_item_view($parent_sku, 'item_uom', 'length')?>"/></td>
							<td><input size="3" name="width" value="<?php echo db_obj_item_view($parent_sku, 'item_uom', 'width')?>"/></td>
							<td><input size="3" name="height" value="<?php echo db_obj_item_view($parent_sku, 'item_uom', 'height')?>"/></td>
							<td><input size="3" name="weight" value="<?php echo db_obj_item_view($parent_sku, 'item_uom', 'weight')?>"/></td>
						</tr>
						<tr>
							<td colspan="4"><?php echo db_obj_item_channels($parent_sku) ?></td>
						</tr>
					</table>
					
                                   
                </div>
                
                <div id="st_content_2" class="st_tab_view">
                    <h2>Horizontal Tab #2</h2>
                    
                    
                </div>
                
                <div id="st_content_3" class="st_tab_view">
                    <h2>Horizontal Tab #3</h2>
                    
                   
                </div>
                
                          
            </div> <!-- /.st_view -->
         
        </div> <!-- /.st_view_container -->                                          
    
    </div> <!-- /#st_horizontal -->        
    <!-- End HTML - Horizontal tabs -->              
 <?php 
}
 ?>                 