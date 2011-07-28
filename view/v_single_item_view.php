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
                    <li><a href="#st_content_4" rel="tab_4" class="st_tab">Horizontal Tab #4</a></li>
                    <li><a href="#st_content_5" rel="tab_5" class="st_tab">Horizontal Tab #5</a></li>                                                       
                    <li><a href="#st_content_6" rel="tab_6" class="st_tab">Horizontal Tab #6</a></li>
                    <li><a href="#st_content_7" rel="tab_7" class="st_tab">Horizontal Tab #7</a></li>
                    <li><a href="#st_content_8" rel="tab_8" class="st_tab">Horizontal Tab #8</a></li>                                                            
                </ul>
            
            </div> <!-- /.st_slide_container -->
            
            <a href="#next" class="st_next"></a>                                                                                                
        
        </div> <!-- /.st_tabs_container -->
       
        <div class="st_view_container">
        
            <div class="st_view">
                        
                <div id="st_content_1" class="st_tab_view">
                    <table class="table_window">
						<tr><td colspan="3"><h3>Internal Item Header</h3></td></tr>
						<tr><td><b>Parent SKU</b></td><td><b>Variation</b></td><td><b>Item Title</b></td></tr>
						<tr><td><?php echo $parent_sku; ?></td><td><?php single_item_view($parent_sku,'variant_flag');?></td><td><?php single_item_view($parent_sku,'master_title');?></td></tr>
					</table>
					<br>
					<table class="table_window">
						<tr><td colspan="3"><h3>Internal Item Description</h3></td></tr>
						<tr><td colspan="3"><?php single_item_view($parent_sku, 'master_desc')?> </td></tr>
					</table>
                                   
                </div>
                
                <div id="st_content_2" class="st_tab_view">
                    <h2>Horizontal Tab #2</h2>
                    
                    <div class="text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris a tellus nec tellus volutpat interdum vel vel nisi. Vestibulum vestibulum porta ultrices. Suspendisse pharetra nisi eu orci sollicitudin nec suscipit tellus lacinia. Cras porta metus sit amet dolor imperdiet at mollis est malesuada. Nulla ligula dolor, porta vel odio. Sed sodales nulla blandit mauris commodo eu varius purus rhoncus. Nam imperdiet elementum egestas. Proin sapien metus, viverra quis tristique a, malesuada a nibh.</p>                                                                
                        
                        <blockquote>Nam et iaculis est. Phasellus nec tempor arcu. Praesent risus vitae eget facilisis tempus fermentum eget mauris semper.</blockquote>                                                                        
                        
                        <p>Nam et iaculis est. Phasellus nec tempor arcu. Praesent at risus vitae lacus facilisis tempus et sed tortor. Duis cursus sapien eget neque laoreet quis fermentum mauris semper. Nulla a diam quis tellus lobortis congue ut vitae massa, sed a ante eros.</p>
                        
                        <p>Donec lacinia aliquet porttitor. Pellentesque vel sem et dui sagittis aliquet. Ut et est eget augue tristique pharetra sit amet quis orci. Quisque elit sem, feugiat a auctor ac, congue vitae massa. Nulla convallis tortor eget ligula elementum in fringilla augue elementum. Ut bibendum accumsan nibh non fringilla. Fusce nec elementum enim. Duis condimentum cursus massa, elit bibendum turpis auctor elementum. Quisque ante felis, tincidunt vel iaculis non, volutpat non neque.</p>
                    </div>
                </div>
                
                <div id="st_content_3" class="st_tab_view">
                    <h2>Horizontal Tab #3</h2>
                    
                    <div class="text">
                        <p>Lorem ipsum dolor sit amet, duis netus ut posuere feugiat arcu, purus wisi quis fringilla at, nunc ut eget elit duis erat praesent, ut fermentum lacus turpis cras. Justo gravida erat quam mauris purus, aliquam quisque, eget nisl. Pellentesque nibh duis odio morbi quam, scelerisque convallis aenean quam tincidunt ornare nam nec feugiat sodales tristique.</p>
                        
                        <blockquote><p>Aliquam commodo ullamcorper aenean erat. Nullam vel justo in neque porttitor eget laoreet. Aenean lacus adipiscing.</p></blockquote>
                                
                        <p>Aliquam commodo ullamcorper erat. Nullam vel justo cras porttitor laoreet. Aenean lacus dui, consequat eu, adipiscing nonummy, eget non, nisi. Morbi nunc est, dignissim non, ornare sed, luctus eu, massa. Vivamus tincidunt diam nec eget urna.</p>
                        
                        <p>Curabitur velit. Veniam donec orci viverra, lorem convallis in libero quisque, purus erat dolor curabitur, justo arcu nisl, natoque velit euismod dapibus nulla semper. Suspendisse odio tempor. Id ornare nam nec feugiat, ac consectetuer magna, dolor enim vel in, pulvinar bibendum ante ac, dui nibh dui est neque lacinia et. Duis netus ut posuere feugiat arcu, purus wisi quis fringilla at, nunc ut eget elit duis erat, eu praesent, ut fermentum lacus turpis cras. Justo gravida erat quam mauris purus, aliquam quisque, eget nisl. Pellentesque nibh ut odio morbi quam, scelerisque convallis tincidunt tristique.</p>
                    </div>
                </div>
                
                <div id="st_content_4" class="st_tab_view">
                    <h2>Horizontal Tab #4</h2>
                    
                    <div class="text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris a tellus nec tellus volutpat interdum vel vel nisi. Vestibulum vestibulum porta ultrices. Suspendisse pharetra nisi eu orci sollicitudin nec suscipit tellus lacinia. Cras porta metus sit amet dolor imperdiet at mollis est malesuada. Nulla ligula dolor, porta vel odio. Sed sodales nulla blandit mauris commodo eu varius purus rhoncus. Nam imperdiet elementum egestas. Proin sapien metus, viverra quis tristique a, malesuada a nibh.</p>                                                                
                        
                        <blockquote>Nam et iaculis est. Phasellus nec tempor arcu. Praesent risus vitae eget facilisis tempus fermentum eget mauris semper.</blockquote>                                                                        
                        
                        <p>Nam et iaculis est. Phasellus nec tempor arcu. Praesent at risus vitae lacus facilisis tempus et sed tortor. Duis cursus sapien eget neque laoreet quis fermentum mauris semper. Nulla a diam quis tellus lobortis congue ut vitae massa, sed a ante eros.</p>
                        
                        <p>Donec lacinia aliquet porttitor. Pellentesque vel sem et dui sagittis aliquet. Ut et est eget augue tristique pharetra sit amet quis orci. Quisque elit sem, feugiat a auctor ac, congue vitae massa. Nulla convallis tortor eget ligula elementum in fringilla augue elementum. Ut bibendum accumsan nibh non fringilla. Fusce nec elementum enim. Duis condimentum cursus massa, elit bibendum turpis auctor elementum. Quisque ante felis, tincidunt vel iaculis non, volutpat non neque.</p>
                    </div>
                </div>
                
                <div id="st_content_5" class="st_tab_view">
                    <h2>Horizontal Tab #5</h2>
                    
                    <div class="text">
                        <p>Lorem ipsum dolor sit amet, duis netus ut posuere feugiat arcu, purus wisi quis fringilla at, nunc ut eget elit duis erat praesent, ut fermentum lacus turpis cras. Justo gravida erat quam mauris purus, aliquam quisque, eget nisl. Pellentesque nibh duis odio morbi quam, scelerisque convallis aenean quam tincidunt ornare nam nec feugiat sodales tristique.</p>
                        
                        <blockquote><p>Aliquam commodo ullamcorper aenean erat. Nullam vel justo in neque porttitor eget laoreet. Aenean lacus adipiscing.</p></blockquote>
                                
                        <p>Aliquam commodo ullamcorper erat. Nullam vel justo cras porttitor laoreet. Aenean lacus dui, consequat eu, adipiscing nonummy, eget non, nisi. Morbi nunc est, dignissim non, ornare sed, luctus eu, massa. Vivamus tincidunt diam nec eget urna.</p>
                        
                        <p>Curabitur velit. Veniam donec orci viverra, lorem convallis in libero quisque, purus erat dolor curabitur, justo arcu nisl, natoque velit euismod dapibus nulla semper. Suspendisse odio tempor. Id ornare nam nec feugiat, ac consectetuer magna, dolor enim vel in, pulvinar bibendum ante ac, dui nibh dui est neque lacinia et. Duis netus ut posuere feugiat arcu, purus wisi quis fringilla at, nunc ut eget elit duis erat, eu praesent, ut fermentum lacus turpis cras. Justo gravida erat quam mauris purus, aliquam quisque, eget nisl. Pellentesque nibh ut odio morbi quam, scelerisque convallis tincidunt tristique.</p>
                    </div>
                </div>
                
                <div id="st_content_6" class="st_tab_view">
                    <h2>Horizontal Tab #6</h2>
                    
                    <div class="text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris a tellus nec tellus volutpat interdum vel vel nisi. Vestibulum vestibulum porta ultrices. Suspendisse pharetra nisi eu orci sollicitudin nec suscipit tellus lacinia. Cras porta metus sit amet dolor imperdiet at mollis est malesuada. Nulla ligula dolor, porta vel odio. Sed sodales nulla blandit mauris commodo eu varius purus rhoncus. Nam imperdiet elementum egestas. Proin sapien metus, viverra quis tristique a, malesuada a nibh.</p>                                                                
                        
                        <blockquote>Nam et iaculis est. Phasellus nec tempor arcu. Praesent risus vitae eget facilisis tempus fermentum eget mauris semper.</blockquote>                                                                        
                        
                        <p>Nam et iaculis est. Phasellus nec tempor arcu. Praesent at risus vitae lacus facilisis tempus et sed tortor. Duis cursus sapien eget neque laoreet quis fermentum mauris semper. Nulla a diam quis tellus lobortis congue ut vitae massa, sed a ante eros.</p>
                        
                        <p>Donec lacinia aliquet porttitor. Pellentesque vel sem et dui sagittis aliquet. Ut et est eget augue tristique pharetra sit amet quis orci. Quisque elit sem, feugiat a auctor ac, congue vitae massa. Nulla convallis tortor eget ligula elementum in fringilla augue elementum. Ut bibendum accumsan nibh non fringilla. Fusce nec elementum enim. Duis condimentum cursus massa, elit bibendum turpis auctor elementum. Quisque ante felis, tincidunt vel iaculis non, volutpat non neque.</p>
                    </div>
                </div>
                
                <div id="st_content_7" class="st_tab_view">
                    <h2>Horizontal Tab #7</h2>
                    
                    <div class="text">
                        <p>Lorem ipsum dolor sit amet, duis netus ut posuere feugiat arcu, purus wisi quis fringilla at, nunc ut eget elit duis erat praesent, ut fermentum lacus turpis cras. Justo gravida erat quam mauris purus, aliquam quisque, eget nisl. Pellentesque nibh duis odio morbi quam, scelerisque convallis aenean quam tincidunt ornare nam nec feugiat sodales tristique.</p>
                        
                        <blockquote><p>Aliquam commodo ullamcorper aenean erat. Nullam vel justo in neque porttitor eget laoreet. Aenean lacus adipiscing.</p></blockquote>
                                
                        <p>Aliquam commodo ullamcorper erat. Nullam vel justo cras porttitor laoreet. Aenean lacus dui, consequat eu, adipiscing nonummy, eget non, nisi. Morbi nunc est, dignissim non, ornare sed, luctus eu, massa. Vivamus tincidunt diam nec eget urna.</p>
                        
                        <p>Curabitur velit. Veniam donec orci viverra, lorem convallis in libero quisque, purus erat dolor curabitur, justo arcu nisl, natoque velit euismod dapibus nulla semper. Suspendisse odio tempor. Id ornare nam nec feugiat, ac consectetuer magna, dolor enim vel in, pulvinar bibendum ante ac, dui nibh dui est neque lacinia et. Duis netus ut posuere feugiat arcu, purus wisi quis fringilla at, nunc ut eget elit duis erat, eu praesent, ut fermentum lacus turpis cras. Justo gravida erat quam mauris purus, aliquam quisque, eget nisl. Pellentesque nibh ut odio morbi quam, scelerisque convallis tincidunt tristique.</p>
                    </div>
                </div>
                
                <div id="st_content_8" class="st_tab_view">
                    <h2>Horizontal Tab #8</h2>
                    
                    <div class="text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris a tellus nec tellus volutpat interdum vel vel nisi. Vestibulum vestibulum porta ultrices. Suspendisse pharetra nisi eu orci sollicitudin nec suscipit tellus lacinia. Cras porta metus sit amet dolor imperdiet at mollis est malesuada. Nulla ligula dolor, porta vel odio. Sed sodales nulla blandit mauris commodo eu varius purus rhoncus. Nam imperdiet elementum egestas. Proin sapien metus, viverra quis tristique a, malesuada a nibh.</p>                                                                
                        
                        <blockquote>Nam et iaculis est. Phasellus nec tempor arcu. Praesent risus vitae eget facilisis tempus fermentum eget mauris semper.</blockquote>                                                                        
                        
                        <p>Nam et iaculis est. Phasellus nec tempor arcu. Praesent at risus vitae lacus facilisis tempus et sed tortor. Duis cursus sapien eget neque laoreet quis fermentum mauris semper. Nulla a diam quis tellus lobortis congue ut vitae massa, sed a ante eros.</p>
                        
                        <p>Donec lacinia aliquet porttitor. Pellentesque vel sem et dui sagittis aliquet. Ut et est eget augue tristique pharetra sit amet quis orci. Quisque elit sem, feugiat a auctor ac, congue vitae massa. Nulla convallis tortor eget ligula elementum in fringilla augue elementum. Ut bibendum accumsan nibh non fringilla. Fusce nec elementum enim. Duis condimentum cursus massa, elit bibendum turpis auctor elementum. Quisque ante felis, tincidunt vel iaculis non, volutpat non neque.</p>
                    </div>
                </div>                                
            
            </div> <!-- /.st_view -->
         
        </div> <!-- /.st_view_container -->                                          
    
    </div> <!-- /#st_horizontal -->        
    <!-- End HTML - Horizontal tabs -->                                                                                                        

