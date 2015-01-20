<?php       defined('C5_EXECUTE') or die(_("Access Denied.")); ?> 
<!DOCTYPE html>
<head>
<?php Loader::element('header_required'); ?>
<meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="<?php echo $this->getStyleSheet('stylesheets/style.css')?>" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?php echo $this->getThemePath()?>/yourScriptTotest.js" /></script>

</head>
    <body>
        <div id="page">
            <div id="header">
                <a href="#menu-right"></a>
               Navigate               
            </div>

            <?php $a = new GlobalArea ('Header Nav');  $a->display($c); ?> 
                <p id="confirmation">The page will go here</p><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>            

                   

                <!-- your HTML -->



          <?php  $this->inc('inc/bottomIncludes.php'); ?>
        </div>



<script type="text/javascript">
// your code to test
</script>
<?php Loader::element('footer_required'); ?>
</body>
</html>