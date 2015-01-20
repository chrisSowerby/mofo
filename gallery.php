<?php   defined('C5_EXECUTE') or die(_("Access Denied.")); $this->inc('inc/topIncludes.php'); ?>  
    
    <div class="pageType-subpage">    
     
       <?php $a = new Area ('Main');  $a->display($c); ?>

    
    </div>  <?php //close pageType-default ?>
      
<?php $this->inc('inc/bottomIncludes.php'); ?> 