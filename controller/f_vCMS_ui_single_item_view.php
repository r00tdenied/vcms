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
 ?>                 