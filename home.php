<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php require "php/head.php"?>
<script type="text/javascript">
  if($.browser.msie && $.browser.version < 8)
  {
      alert("This site has been developed and optimized to run on Internet Explorer 8.0 and above.  " + 
            "You'll now be sent to the Internet Explorer Download Page.");
      document.write('<script type="text/undefined">')
      window.location.href = "http://microsoft.com/ie";
  }
</script>
<!-- Config Slider : SLIDER START -->
<!-- DC Flex Slider CSS -->
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<!-- DC Flex Slider JS -->
<script defer src="js/jquery.flexslider.js"></script>
<!-- requires easing library -->
<script src="js/jquery.mousewheel.js"></script>
<!-- Config Slider : SLIDER END -->
<!-- START slider1 -->
<link rel="stylesheet" href="css/website.css" type="text/css" media="screen"/>
<script type="text/javascript" src="js/jquery.tinycarousel.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$('#slider1').tinycarousel();
$('#slider2').tinycarousel();
$('#slider3').tinycarousel();	
});
</script>
<!-- END slider1 -->
<script type="text/javascript">
	$(function () {
		$('#menu-top-menu').tinyNav({
			active: 'active' 
		});
	});
</script>
</head>
<body>
<?php 

    require "php/body_header.php";			  

    $dir = "images/products";				
    $slideImages = array();
    $maxImages = 20;
    $subDir = listSubDirectories($dir);

    foreach($subDir as $subDirKey => $subDirValue)
    {
        $slideImages = array_merge($slideImages, listFiles("$dir/$subDirValue", ".jpg|.png"));
    }

    shuffle($slideImages);	
    $slideImagesHTML = getSlideImagesHTML($slideImages, 20);
?>
        <div class="container">
          <div id="now_slider"> 
            <!-- DC Flex Slider Start -->
            <div id="dc_flex_container" role="dc_flex_container">
              <section class="f_slider">
                <div id="f_slider" class="flexslider">
                  <ul class="fslides">
<?php echo $slideImagesHTML; ?>
                  </ul>
                </div>
                <div id="flex_carousel" class="flexslider">
                  <ul class="fslides">
<?php echo $slideImagesHTML; ?>
                  </ul>
                </div>
              </section>
            </div>
            <!-- DC Flex Slider End -->
            <div class="dc_clear"></div>
            <!-- line break/clear line --> 
            
            <!-- DC Flex Slider Settings --> 
            <script type="text/javascript">
        
        $(window).load(function(){
          // Thumbnail Carousel
          $('#flex_carousel').flexslider({
            animation: "slide",
            controlNav: true,								// Create navigation for paging control of each clide? Note: Leave true for manualControls usage
            animationLoop: true,						// Should the animation loop? If false, directionNav will received "disable" classes at either end
            slideshow: false,								// Animate slider automatically
            startAt: 0,                     // The slide that the slider should start on. Array notation (0 = first slide)
                touch: true,                    // Allow touch swipe navigation of the slider on touch-enabled devices
                video: false,                   // if using video in the slider, will prevent CSS3 3D Transforms to avoid graphical glitches        
            itemWidth: 140,									// Box-model width of individual carousel items, including horizontal borders and padding.
            itemMargin: 5,									// Margin between carousel items.
            asNavFor: '#f_slider'						// Internal property exposed for turning the slider into a thumbnail navigation for another slider
          });
          
          $('#f_slider').flexslider({
                    // Banner Slider
            animation: "slide",
            controlNav: false,						 // Create navigation for paging control of each clide? Note: Leave true for manualControls usage
            animationLoop: false,					 // Should the animation loop? If false, directionNav will received "disable" classes at either end
            slideshow: true,               // Animate slider automatically
                slideshowSpeed: 4000,          // Set the speed of the slideshow cycling, in milliseconds
                animationSpeed: 600,           // Set the speed of animations, in milliseconds        
                smoothHeight: true,            // Allow height of the slider to animate smoothly in horizontal mode
            sync: "#flex_carousel",				 // Mirror the actions performed on this slider with another slider. Use with care.
            start: function(slider){
              $('body').removeClass('loading');
            }
          });
        });
        </script>
            <br/>
            <br/>
            <div class="clr"></div>
          </div>
        </div>
        <!-- now_page -->
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
    </div>
    <div class="clr"></div>
    <!-- /content -->
<?php require "php/body_footer.php"?>
</body>
</html>
