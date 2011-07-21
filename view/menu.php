<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	
	<script type="text/javascript">
	    $(document).ready(function(){
	        $('#example-1').sticklr({
	            animate     : true,
				showOn		: 'hover',
				relativeTo	: 'top',
				relativeGap	: 10
			});
	    });
	</script>
</head>
<body>

    <ul id="example-1" class="sticklr">
    	<li>
    		<a href="?v=portal" class="icon-home" title="Portal"></a>
		</li>    
    	<li>
            <a href="#" class="icon-product" title="Item Management"></a>
            <ul>
                <li class="sticklr-title">
                    <a href="#">Item Management</a>
                </li>
                <li>
                    <a href="?v=skugen" class="icon-database">Generate New Skus</a>
                </li>
             </ul>
        </li>
        	<li>
            <a href="#" class="icon-process" title="Order Management"></a>
            <ul>
                <li class="sticklr-title">
                    <a href="#">Order Management</a>
                </li>
                <li>
                    <a href="?v=sears-importer" class="icon-database">Sears Import Controls</a>
                </li>
           </ul>
        </li>
        <li>
            <a href="?v=itemsearch" class="icon-zoom" title="Item Search"></a>
       </li>
    </ul>

</body>
</html>
