<?php   defined('C5_EXECUTE') or die(_("Access Denied.")); $this->inc('inc/topIncludesView.php'); ?>

<div id="system-cener-body" class="pageType-default">
  

  <div class="container">   
      <div class="row"> 
        <!--   <div class="col-md-12">   -->      
				<?php 
					Loader::element('system_errors', array('error' => $error)); 
				?>
				<?php 								
					print $innerContent;
				?>
          <!-- </div>  -->    
      </div>  
  </div>

				
<?php $this->inc('inc/bottomIncludes.php'); ?>
