<?php   defined('C5_EXECUTE') or die(_("Access Denied.")); $this->inc('inc/topIncludes.php'); ?> 	
		
<div class="pageType-default">    

	<div class="container sliderCol">
		<div class="clearfix width100">
			<div class="col-md-12 column">
				<div class="sliderHolderS">
					<?php $a = new GlobalArea ('home page slider');  $a->display($c); ?>
				</div>
            </div> <!-- sliderHolderS -->
        </div> <!-- row -->
    </div>

	<div class="lightBg services-area">
		<div class="container">
			<div class="clearfix width100">
				<div class="col-md-4 column">						
				
					<?php $a = new GlobalArea ('reflect1 global');  $a->display($c); ?>
				</div>

				<div class="col-md-4 column">						
				
					<?php $a = new GlobalArea ('reflect1 global 1');  $a->display($c); ?>
				</div>

				<div class="col-md-4 column">						
					
					<?php $a = new GlobalArea ('reflect1 global 2');  $a->display($c); ?>
				</div>
			</div>
		</div>
	</div>


	<div class="removeOnMobile">
		<div class="container mobileMainText">
			<div class="clearfix width100">
				<div class="col-md-12 column">
					<div class="mainBoxS main-content radius4">							
						<div class="col-md-12 column textCol">
		                    <?php $a = new Area ('Main');  $a->display($c); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="clearfix width100">
			<div class="col-md-12 column">				
	            <?php $a = new globalArea ('acreds');  $a->display($c); ?>
			</div>
		</div>
	</div>

</div>	<?php //close pageType-default ?>

<?php $this->inc('inc/bottomIncludes.php'); ?>

