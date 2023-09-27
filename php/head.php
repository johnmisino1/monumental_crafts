<?php 

require "php/functions.php";

$company = getFileText("text/contact/company.txt");
$addressText = getFileText("text/contact/address.txt");
$addressHTML = nl2br($addressText);
$phone = getPhoneText();
$email = getEmailHTML();

?>
<title><?php echo $company ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content="<?php echo getFileText("text/meta/description.txt")?>">
<meta name="keywords" content="<?php echo getFileText("text/meta/keywords.txt")?>" />
<meta name="robots" content="<?php echo getFileText("text/meta/robots.txt")?>" />
<!-- Mobile Specific Metas
  ================================================== -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/layout.css">
<link rel="stylesheet" href="css/skeleton.css">
<link rel="stylesheet" type="text/css" href="css/menusm.css" />
<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="js/jquery.hoverIntent.minified.js"></script>
<script type="text/javascript" src="js/menusm.js"></script>
<!-- PrettyPhoto Starts -->
<link rel="stylesheet" type="text/css" href="prettyPhoto/css/prettyPhoto.css" />
<script type="text/javascript" src="prettyPhoto/js/jquery.prettyPhoto.js"></script>
<!-- PrettyPhoto Ends -->
<!-- Preloader Starts -->
<link href="preloader/css/preloader.css" rel="stylesheet" />
<script src="preloader/js/jquery.preloader.js" charset="utf-8"></script>
<!-- Preloader Ends -->
<!-- Ui To Top Starts -->
<link href="ui_totop/css/ui.totop.css" rel="stylesheet" />
<script src="ui_totop/js/jquery.ui.totop.js" charset="utf-8"></script>
<!-- Ui To Top Ends -->
<script type="text/javascript" src="js/scripts.js"></script>
<!-- Config User Interface Box Import START -->
<link href="http://fonts.googleapis.com/css?family=PT+Sans" type="text/css" rel="stylesheet">
<style>
.logo, h1, h2, h3, h4, h5, h6, .menu,.social-text,.cs-title, .cs-title,.cs-prev,.cs-next,.camera_caption,.slideDiv div.title,.cp-title,.caption-head,.creative_layer,.caption_green,.caption_blue,.caption_black,.caption_red,.caption_white,.caption_orange,.cr-titles h3 span { font-family:"PT Sans", "Lato", "Trebuchet MS", Arial, "Helvetica CY", "Nimbus Sans L", sans-serif; }
</style>
<!-- Config User Interface Box Import END -->
<script type="text/javascript" src="js/tinynav.min.js"></script>
<!-- Modernizr -->
<script src="js/modernizr.js"></script>