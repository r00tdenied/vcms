<?php 
//Get sku
$parent_sku = $_GET['sku'];
?>

    <!-- Start HTML - Horizontal tabs -->
    <div id="st_horizontal" class="st_horizontal">                                                
        
        <div class="st_tabs_container">                                                                                                                                          
            
            <a href="#prev" class="st_prev"></a>
            
            <div class="st_slide_container">
            
                <ul class="st_tabs">
                    <li><a href="#st_content_1" rel="tab_1" class="st_tab st_tab_active">Item Header</a></li>
                    <li><a href="#st_content_2" rel="tab_2" class="st_tab">Horizontal Tab #2</a></li>                                     
                    <li><a href="#st_content_3" rel="tab_3" class="st_tab">Horizontal Tab #3</a></li>
                                                                         
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
							<td><?php echo $parent_sku; ?></td>
							<td><?php db_obj_view($parent_sku,'item_master','variant_flag')?></td>
							<td><?php db_obj_view($parent_sku,'item_master','master_title')?></td>
						</tr>
					</table>
					<br>
					<table class="table_window">
						<tr>
							<td><h3>Internal Item Description</h3></td>
						</tr>
						<tr>
							<td><?php db_obj_view($parent_sku,'item_master','master_desc')?> </td>
						</tr>
					</table>
					<br>
					<table class="table_window">
						<tr>
							<td colspan="4"><h3>Units of Measure</h3></td>
						</tr>
						<tr>
							<td><b>Length</b></td>
							<td><b>Width</b></td>
							<td><b>Height</b></td>
							<td><b>Weight</b></td>
						</tr>
						<tr>
							<td><?php db_obj_view($parent_sku, 'item_uom', 'length')?></td>
							<td><?php db_obj_view($parent_sku, 'item_uom', 'width')?></td>
							<td><?php db_obj_view($parent_sku, 'item_uom', 'height')?></td>
							<td><?php db_obj_view($parent_sku, 'item_uom', 'weight')?></td>
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

