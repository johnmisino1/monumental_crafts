<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php require "php/head.php"?>
<script type="text/javascript">
	$(function () {
		$('#menu-top-menu').tinyNav({
			active: 'active' 
		});
	});
</script>
</head>
<body>
<?php require "php/body_header.php"?>
    <div class="content">
      <div class="container">
        <div class="content_resize">
          <div class="content_page">
              <!-- Columns CSS -->
              <link type="text/css" rel="stylesheet" href="css/columns.css" />              
              <!-- Pricing Tables CSS -->
              <link type="text/css" rel="stylesheet" href="css/pricing_tables.css" />
              <!-- Pricing Tables JS --> 
              <script type="text/javascript" src="js/pricing_tables.js"></script>                             
<?php

$xmlFile = "text/common/prices.xml";

if (file_exists($xmlFile))
{
    $products = simplexml_load_file($xmlFile);
    $productCount = count($products);
    $i = 0;

    foreach ($products as $index => $product)
    {
        $name = trim((string)$product->name);
        $price = trim((string)$product->price);            
        $image = trim((string)$product->image);            
        $colIndex = ($i % 4) + 1; 

        $productName = ucwords(str_replace("_", " ", $name));
        $imagePath = "images/products/$name/$image";

        // Add a starting div for a new set of price columns when the column index is 1.
        if($colIndex == 1)
        {
            echo "\t\t" . "<div class='dc_pricingtable03 dc_pt3_style1'>";
        }

        echo "\t\t" . "<div class='column_$colIndex'>\n";
        echo "\t\t" . "  <ul>\n"; 
        echo "\t\t" . "    <li class='header_row_1 align_center'>\n";
        echo "\t\t" . "      <br/>";
        
        if(strlen($image) > 0 && file_exists($imagePath))
        {
            echo "\t\t" . "      <h2 class='col1'><img src='$imagePath'/></h2>";
        }

        echo "\t\t" . "      <h2 class='col1'><span>$productName</span></h2>";
        echo "\t\t" . "    </li>";
        echo "\t\t" . "    <li class='header_row_2 align_center'>\n";
        echo "\t\t" . "      <h2 class='col1'>$price</h2>";
        echo "\t\t" . "    </li>";
        echo "\t\t" . "</div>";

        $i++;

        // Add a closing div for a complete set of price columns when the column index is 4 or all products are shown.
        if ($colIndex == 4 || $productCount == $i)
        {
            echo "\t\t" . "</div>";            
        }
    }
}
?>              
            </div>
            <div class="clr"></div>
            <br />
          </div>
        </div>
      </div>
      <div class="clr"></div>
      <!-- /content -->
<?php require "php/body_footer.php"?>
</body>
</html>
