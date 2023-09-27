<div class="body_pattern">
  <div class="index_page">
    <div class="main">
      <div class="header">
        <div class="header_pic_bg">
          <div class="header_bg">
            <div class="container">
              <div class="header_resize"> 
                <!-- logo -->
                <div class="logo">				
                  <div><a href="home.php"><span><em class="logo_2_color"><?php echo str_replace(" ", " </em>", $company); ?></span></a></div>
                </div>
                <!-- logo --> 
                <?php require "menu.php"?>
                <!-- /menu -->
                <div class="clr"></div>
              </div>
            </div>
          </div>
          <!-- now_page -->
          <div class="container">
            <div class="now_page">
              <div class="now_page_resize">
              <div class="columns1">
                <div class="one-third column omega">
                  <div class="sidebar last">
                     <div class="img_logo"></div>                
                  </div>
                </div>
                <div class="two-thirds column alpha">
                  <div class="centercol">
<?php

    echo getHeadingFileHTML(basename($_SERVER['PHP_SELF']));

?>
                  </div>
                </div>
                <div class="clr"></div>
              </div>
            </div>
              <!-- /now_page --> 
            </div>
          </div>
          <div class="clr"></div>
        </div>
        <div class="clr"></div>
      </div>
           