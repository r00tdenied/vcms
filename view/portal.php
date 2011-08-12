<table class='table_main'>
<td><h3>vCMS Portal</h3></td>
</table>
<table class='table_main'>
<td><h3>vCMS FAQ</h3><br/>
<p><b><i>What is vCMS?</i></b><br/>
The primary goal of vCMS is build an effective solution to managing the content for product across multiple market channels.
vCMS will also be built in a modular fashion to allow integration into ERP and WMS systems</p>
<p><b><i>How do I generate new skus?</i></b><br/>
Sku generation in vCMS is simple.  Just navigate to the Item Management menu via the <img src='view/images/pc.de/product.png'> icon on the left 
menu and select 'Generate New Skus'.</p> 
<p>In the Sku generation view, you simply have to select the correct item prefix from the drop down and enter the number of 
required skus.  When vCMS builds the skus, you will be automatically redirected to the Item Search view displaying the newly generated skus.</p>
<p>From that view you can click on the Edit Item link and complete the necessary item information.</p>
<p><b><i>How do I search for items?</i></b><br/>
To search for items based on various criteria, navigate to Item Management menu via the <img src='view/images/pc.de/product.png'> icon on the left
menu and select 'Item Search'.</p>
<p>From item search you can lookup items based on various conditions.
<ul>
<li>You can look up a specific sku or enter in a portion of a sku like OS-0000</li>
<li>The Item Prefix dropdown allows you to search based on the various sku prefix types</li>
<li>The Item Type dropdown allows you to filter items based on fulfillment types:
	<ul>
		<li>MIXED- Can either be locally fulfilled,drop shipped or chased</li>
		<li>CHASED-Item will be ordered and fulfilled locally on a case by case basis</li>
		<li>DROPSHIP-Item will be sent to the consumer directly by the vendor</li>
	</ul></li>
<li>Item Status allows you to view items based:
	<ul>
		<li>USED-This sku has content and might be actively listed on one of more channel</li>
		<li>LOCKED-(not yet implemented)Another user has this order open for editing</li>
		<li>NEW-Sku was generated and item data/content has not yet been entered</li>
	</ul></li>
</ul></p>
<p><b><i>How do I edit items?</i></b><br/>
From the Item Search view, simply click the Edit Item link for the specific sku you wish to modify.  This will open a window with tabs.
These tabs organize specific parts of item data:
<ul>
<li>Item Header - All fields for the basic Item Title, an internal Item Description, and Basic Units of Measure</li>
<li>Item Vendor/Alias - Edit item Mfg info including the orig. UPC, Editing Vendor information, Editing Item Aliases</li>
</ul></p>
<p><b><i>What are Item Aliases and how will the be used?</i></b><br/>
Item Aliases will allow us to maintain data for mapping QA Skus to BOS Skus.  This is also an interim solution to store data for items with 
the incorrect QA Sku on other channels for future content revisions and to assist with item mapping in Order Manager.</p>
</td>
</table>
<table class='table_main'>
<td><h3>Known Issues</h3><br/>
<ul>
<li>Item Edit View fields do not have any data validation
	<ul>
		<li>Please avoid entering the same vendor or item alias twice</li>
		<li>UoM fields are numeric only, entering alpha characters will result in a 0 in the field w/o warning</li>
		<li>Internal Item Description is supposed to be plain text, no HTML at all.  This field is meant for internal item information</li>		
	</ul>
<li>Add item to Channel button is displayed but this function is not implemented yet and is still being planned</li>
<li>Item Variation features are not yet programmed.  This system is designed to generate a parent sku, and if an item has a variation then children skus
will be associated.</li>
</ul>

</table>