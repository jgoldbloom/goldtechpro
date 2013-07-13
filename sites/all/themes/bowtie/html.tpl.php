<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="<?php print $language->dir; ?>" lang="<?php print $language->language; ?>" xml:lang="<?php print $language->language; ?>" xmlns:fb="http://www.facebook.com/2008/fbml">
<head profile="<?php print $grddl_profile; ?>">
  <?php global $base_url; ?>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
  <?php print $scripts; ?>
  <!--[if lt IE 9]>
	<script src="<?php print $base_url.'/'.drupal_get_path('theme', 'bowtie') ?>/js/html5.js"></script>
	<![endif]-->
	<!--[if IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php print $base_url.'/'.drupal_get_path('theme', 'bowtie') ?>/css/ie8.css">
	<![endif]-->

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-30171914-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>


</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
  <a name="top"></a>
  <div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
  <?php if (theme_get_setting('tm_sliders') == 2) { ?>
  	<!-- Piecemaker Slider -->
    <script type="text/javascript" src="<?php print $base_url.'/'.drupal_get_path('theme', 'bowtie') ?>/scripts/swfobject/swfobject.js"></script>
    <script type="text/javascript">
      var flashvars = {};
      flashvars.cssSource = "<?php print $base_url.'/'.drupal_get_path('theme', 'bowtie') ?>/piecemaker/piecemaker.css";
      flashvars.xmlSource = "<?php print $base_url.'/'.drupal_get_path('theme', 'bowtie') ?>/piecemaker/piecemaker.xml";
		
      var params = {};
      params.play = "true";
      params.menu = "false";
      params.scale = "showall";
      params.wmode = "transparent";
      params.allowfullscreen = "true";
      params.allowscriptaccess = "always";
      params.allownetworking = "all";
	  
      swfobject.embedSWF('<?php print $base_url.'/'.drupal_get_path('theme', 'bowtie') ?>/piecemaker/piecemaker.swf', 'piecemaker', '1000', '600', '10', null, flashvars,    
      params, null);
    
    </script>
  <?php } ?>
  <?php if (theme_get_setting('tm_layouts') == 0 or theme_get_setting('tm_layouts') == 3) { ?>
  <script type="text/javascript">
    settings = {
      'username' : ['<?php print theme_get_setting('tm_ac_twitter') ?>'],
      'updates' : 5, 				
      'loadingText' : "Loading tweets..."
    }
    jQuery('#tuw_div').tuw(settings);
  </script>
  <?php } ?>
  <!--[if lt IE 7 ]>
	<script src="<?php print $base_url.'/'.drupal_get_path('theme', 'bowtie') ?>/js/dd_belatedpng.js"></script>
	<script> DD_belatedPNG.fix('img, .png_bg');</script>
	<![endif]-->
</body>
</html>
