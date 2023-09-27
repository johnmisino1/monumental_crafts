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
          <div class="content_resize" id="gallery">
            <div class="content_page">
              <div class="columns1">
                <div class="two-thirds column alpha">
                  <div class="centercol">
                    <div class="h2_background">
                      <h2><span>What we do</span></h2>
                      <div class="clr"></div>
                    </div>
                    <div class="clr"></div>
                    <div class="content_full_size">
                      <div class="pic"> <a href="images/common/what_we_do.jpg" class="prettyPhoto" rel="prettyPhoto[id]"><img src="images/common/what_we_do.jpg" width="576" alt="Image" /></a> </div>
                      <div class="separator_clear small"></div>
                      <h3><?php echo getFileHTML("text/common/what_we_do.txt"); ?></h3>
                    </div>
                    <div class="clr"></div>
                  </div>
                </div>
                <div class="one-third column omega">
                  <div class="sidebar last">
                    <div class="fcol pop_posts">
                      <div class="h2_background">
                        <h2><span>Recent Posts</span></h2>
                      </div>
                      <div class="clr"></div>
<?php

$xmlFile = "text/common/posts.xml";

if (file_exists($xmlFile))
{
    $posts = simplexml_load_file($xmlFile);

    foreach ($posts as $index => $post)
    {
        $title = trim((string)$post->title);
        $description = nl2br(trim((string)$post->description));            
        $date = trim((string)$post->date);            
        $dateString = date('M jS Y', strtotime($date));

        echo "\t\t" . "  <h3>$title<span>Posted on $dateString</span></h3>\n"; 
        echo "\t\t" . "  <p>$description</p>\n";
        echo "\t\t" . "  <div class='clr'></div>\n";
    }
}
?>              
                    </div>
                    <div class="separator_clear"></div>
                  </div>
                </div>
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
