<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php require "php/head.php"?>
<script type="text/javascript">
	$(function () {
		$('#menu-top-menu').tinyNav({
			active: 'active',
			header: 'About Us > Testimonials'
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
            <div class="content_full_size"> 
              <link type="text/css" rel="stylesheet" href="css/columns.css" />              
              <link type="text/css" rel="stylesheet" href="css/quotes.css" />
              <script src="js/jquery.quovolver.js"></script>               
<?php

$xmlFile = "text/common/testimonials.xml";

if (file_exists($xmlFile))
{
    $testimonials = simplexml_load_file($xmlFile);
    $count = 0;

    // Show testimonials without images first.
    foreach ($testimonials as $index => $testimonial)
    {
        $image = trim((string)$testimonial->image);
        
        if (strlen($image) == 0 || !file_exists("images/testimonials/$image"))
        {
            $name = ucfirst(trim((string)$testimonial->name));
            $description = trim((string)$testimonial->description);            

            echo "\t\t" . "<div class='nine_tenth'>\n"; 
            echo "\t\t" . "  <blockquote class='dc_black_blockquotes'>\n";
            echo "\t\t" . "    <p>$description</p>\n";
            echo "\t\t" . "    <cite>$name</cite>\n";
            echo "\t\t" . "  </blockquote>\n";
            echo "\t\t" . "</div>\n";
        }
    }

    echo "<div class='dc_clear'></div>";

    // Show testimonials with images next.
    foreach ($testimonials as $index => $testimonial)
    {
        $image = trim((string)$testimonial->image);
       
        if (strlen($image) > 0 && file_exists("images/testimonials/$image"))
        {
            $name = ucfirst(trim((string)$testimonial->name));
            $description = trim((string)$testimonial->description);            
            echo "\t\t" . "<div class='one_third_pad'><img src='images/testimonials/$image' width=250></div>\n"; 
            echo "\t\t" . "<div class='three_fifth column-last'>\n"; 
            echo "\t\t" . "  <blockquote class='dc_green_blockquotes'>\n";
            echo "\t\t" . "    <p>$description</p>";
            echo "\t\t" . "    <cite>$name</cite>";
            echo "\t\t" . "  </blockquote>";
            echo "\t\t" . "</div>";
            echo "<div class='dc_clear'></div>";
        }
    }
}
?>              
              </div>
              <div class="dc_clear"></div>
            </div>
            <div class="clr"></div>
          </div>
        </div>
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
      </div>
      <!-- /content -->
<?php require "php/body_footer.php"?>
</body>
</html>
