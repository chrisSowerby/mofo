<?php defined('C5_EXECUTE') or die(_("Access Denied."));
Loader::element('reload_on_attribute_change');
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7 oldie"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8 ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9 ie8 oldie"> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en" itemscope itemtype="http://schema.org/Product"> <!--<![endif]-->
<head>

<script>document.cookie='resolution='+Math.max(screen.width,screen.height)+'; path=/';</script>
<?php Loader::element('header_required'); ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="<?php echo $this->getThemePath()?>/processAndBuild/stylesheets/style.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 9]>
<script src="<?php echo $this->getThemePath()?>/processAndBuild/js/modernizr-shiv-media-queries.js"></script>
<script src="<?php echo $this->getThemePath()?>/processAndBuild/js/respond.min.js"></script>
<![endif]-->
<link href="<?php echo $this->getThemePath()?>/typography.css" rel="stylesheet">
<link rel="icon" type="image/vnd.microsoft.icon" href="<?php echo $this->getThemePath()?>/img/suregeFavicon.ico">

<!-- simplify the transition from older versions of jQuery
   <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>  --> 
<!-- <script type="text/javascript" src="<?php //echo $this->getThemePath()?>/reflect/js/reflection.js"></script> --> 
 
    <!-- fix svg gradients in IE -->
    <!--[if gte IE 9]>
      <style type="text/css">
        .IEgradient {
           filter: none;
        }
      </style>
    <![endif]-->
</head>
