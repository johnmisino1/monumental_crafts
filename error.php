<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php require "php/head.php"?>
<script type="text/javascript">
	$(function () {
		$('#menu-top-menu').tinyNav({
			active: 'active',
			header: 'Navigation' 
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
              <div class="p404">
                <h2>Not found<br />
                  <span>Oops, this page can't be found!</span></h2>
                <p>We are sorry but the page you are looking for does not exist. <br />
                  You could return to the <a href="home.php">homepage</a></p>
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
