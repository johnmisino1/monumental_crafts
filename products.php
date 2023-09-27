<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php require "php/head.php"?>
<!-- Products Starts -->
<script type="text/javascript" src="js/gallery-masonry/jquery.masonry.min.js"></script>
<script type="text/javascript" src="js/gallery-masonry/modernizr-transitions.js"></script>
<script type="text/javascript" src="js/gallery-masonry/gallery-masonry.js"></script>
<!-- Products Ends -->
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
          <div class="content_resize" id="gallery">
            <div class="content_page">
              <p></p>
              <ul class="gallery-categ" id="gallery-sort-menu">
                <li class="all active" data-id="all"><a href="#">All Products</a></li>
<?php

    $xmlFile = "text/common/pictures.xml";
    $pictureDescriptions = null;

    if (file_exists($xmlFile))
    {
        $pictureDescriptions = simplexml_load_file($xmlFile);
    }

    $dir = "images/products";
    $subDir = listSubDirectories($dir);

    foreach($subDir as $subDirKey => $subDirValue)
    {
        $productName = ucwords(str_replace("_", " ", $subDirValue));
        echo "\t\t" . "<li class='$subDirValue' data-id='$subDirValue'><a href='#'>$productName</a></li>\n";
    }
?>              </ul>
              <div class="separator_clear"></div>
              <div class="cols44" id="gallery-imgs">
<?php

    foreach($subDir as $subDirKey => $subDirValue)
    {
        $imageDir = "$dir/$subDirValue";
        $productImages = listFiles($imageDir, ".jpg|.png"); 
    
        foreach($productImages as $imageKey => $imageValue)
        {
            echo "\t\t" . "<div class='col44 gallery-item' data-tags='$subDirValue'>\n";
            echo "\t\t" . "  <div class='pic img_hover_box'>\n";
            echo "<a href='$imageValue' class='prettyPhoto' rel='prettyPhoto[gallery]'>";
            echo "<img src='$imageValue' width='215' />";
            echo "<img src='images/common/spacer.gif' width='1' height='1' class='r_plus_overlay'/>";
            echo "<img src='images/common/img_hover.png' width='16' height='16' alt='Image' class='r_plus'/></a></div>\n";

            if($pictureDescriptions != null)
            {
                $desc = $pictureDescriptions->xpath("//Picture/name[.='$imageKey']/parent::*");
                
                if (count($desc) == 1)
                {
                    echo "\t\t" . "    <p>" . $desc[0]->description . "</p>\n";
                }
            }

            echo "\t\t" . "</div>\n";
        }
    }
?>                <div class="clr"></div>
                <div class="clr"></div>
              </div>
              <div class="clr"></div>
            </div>
            <div class="clr"></div>
          </div>
        </div>
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
      <!-- /content -->
<?php require "php/body_footer.php"?>
</body>
</html>
