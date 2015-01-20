<?php   defined('C5_EXECUTE') or die(_("Access Denied.")); $this->inc('inc/topIncludes.php'); ?> 	
		
<div id="system-cener-body" class="pageType-default">
	<div class="container white80 shell"> 	

		<div class="row">		
			<div class="clearfix width100">
				<div class="col-md-12 column main-content">				
					<?php  $a = new Area ('Main');  $a->display($c); ?>
				</div>
			</div>
		</div>		

	</div> <!-- shell -->
</div>	<?php //close pageType-default ?>

<?php $this->inc('inc/bottomIncludes.php'); ?>

