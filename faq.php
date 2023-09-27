<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php require "php/head.php"?>
<script type="text/javascript">
	$(function () {
		$('#menu-top-menu').tinyNav({
			active: 'active',
			header: 'About Us > FAQ Page'
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
              <link type="text/css" rel="stylesheet" href="css/accordion_toggle.css" />
              <script type="text/javascript" src="js/accordion_toggle.js"></script> 
              <link type="text/css" rel="stylesheet" href="css/columns.css" />              
              <a name="list"/>
              <div class="dc_toggle_container" style="width:90%;"> + <a href="#list" class="toggleCollapse" rel="style2">expand all</a><br />
                <br />
<?php

$xmlFile = "text/common/faqs.xml";

if (file_exists($xmlFile))
{
    $faqs = simplexml_load_file($xmlFile);

    foreach ($faqs as $index => $faq)
    {
        $question = nl2br(trim((string)$faq->question));
        $answer = nl2br(trim((string)$faq->answer));            

        echo "\t\t" . "<div class='dc_toggle style2'>\n"; 
        echo "\t\t" . "  <div><a href='' class='dc_toggle_link'>$question</a></div>\n";
        echo "\t\t" . "  <div class='dc_toggle_box'>$answer</div>\n";
        echo "\t\t" . "</div>\n";
    }
}
?>              
              </div>
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
