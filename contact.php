<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php require "php/head.php"?>
<!-- Map Settings Start -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
var gmap;

function getLatLong(address) {
    var geocoder = new google.maps.Geocoder();
    var result = new Object();
    geocoder.geocode( { 'address': address }, function(results, status) {
         if (status == google.maps.GeocoderStatus.OK) {
             result["lat"] = results[0].geometry.location.lat();
             result["lng"] = results[0].geometry.location.lng();
             result["error"] = null;
         } else {
             result["error"] = "Unable to find address: " + status;
         }
         showMap (result);
        });
}

function initialize() {

    var address = "<?php echo preg_replace( "/\r|\n/", " ", $addressText); ?>";     
    getLatLong(address);
}

function showMap(result)
{
    var lat = 40.568864;
    var lng = -75.344098;

    if(result["error"] == null)
    {
        lat = result["lat"];
        lng = result["lng"];
    }

    var myLatlng = new google.maps.LatLng(lat, lng);

    var myMapOptions = {
   	 zoom: 16,
   	 center: myLatlng, // google map location to show
   	 mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    
    gmap = new google.maps.Map(document.getElementById('gmap_contact'), myMapOptions);
    
    var myMarkerOptions = {
   	 position: myLatlng, // google map location to show
         map: gmap,
         title: "<?php echo $company ?>"
    };
    
    marker = new google.maps.Marker(myMarkerOptions);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
<!-- Map Settings End -->
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
                    <div class="clr"></div>
                    <div class="maps_view" style="width:97%; float:left; position:relative;padding: 0.5%;
background: #F4F4F4;
border: 1px solid white; margin-bottom: 15px;">
                      <div id="gmap_contact" style="width:100%; height:100%;"></div>
                      <div class="clr"></div>
                    </div>
                    <div class="separator_clear small"></div>
                    <br />
                    <p><span>We are committed to answering all your questions and meeting any need you may have.  We'd love to hear from you!  Please fill out the form below so we may assist you.</span></p>
                    <div class="clr"></div>
                    <form action="php/email.php" method="post" id="contactform_main">
                      <ol>
                        <li>
                          <label for="name">Name*</label>
                          <input id="name" name="name" class="text"/>
                        </li>
                        <li>
                          <label for="email">Email*</label>
                          <input id="email" name="email" class="text" />
                        </li>
                        <li>
                          <label for="url">Website</label>
                          <input id="url" name="url" class="text"/>
                        </li>
                        <li>
                          <label for="subject">Subject*</label>
                          <input id="subject" name="subject" class="text"/>
                        </li>
                        <li>
                          <label for="message">Message*</label>
                          <textarea id="message" name="message" rows="6" cols="50" ></textarea>
                        </li>
                        <li class="buttons">
                          <input type="submit" name="imageField" value="submit" class="send" />
                          <div class="clr"></div>
                        </li>
                      </ol>
                    </form>
                  </div>
                </div>
                <div class="one-third column omega">
                  <div class="sidebar last">
                    <div class="fcol pop_posts">
                      <div class="clr"></div>
                      <?php echo $company; ?>
                      <br />
                      <?php echo $addressHTML; ?>
                      <br /><br/>
                      <?php echo $phone ?>
                      <br />
                      <?php echo $email; ?>                      
                      <br/></br/>
                      <?php echo getFileHTML("text/contact/office_hours.txt"); ?>
                      <br/>
                    </div>
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
