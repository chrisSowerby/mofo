 <?php   defined('C5_EXECUTE') or die(_("Access Denied.")); $this->inc('inc/topIncludes.php'); ?>  
    
<div class="pageType-default pageType-contact">    

  <div class="container">
    <div class="clearfix width100">
      <div class="sliderHolderS">
          <?php //$a = new Area ('top area');  $a->display($c); ?>          
        </div> <!-- sliderHolderS -->
    </div> <!-- row -->


<div class="mainBoxS main-content radius4 subpageStyles">

         <div class="clearfix width100">
          <div class="col-md-12 column textCol">

  <div class="center-bit main-content">

    <div class="padd-this-up">      
        <div class="contact-us-section">        
          <div class="clearfix width100">
          <div class="col-md-4 column">
            <div class="w-form">
              <div class="contact-padding contact-page-form">
              <?php 
                $a = new Area('title');
                $a->display($c); 
              ?>
              <br>
              <?php 
                $a = new Area('Main');
                $a->display($c); 
              ?>              
              </div>
            </div>
          </div>
          <div class="col-md-4 column">
            <div class="map">
            <?php 
              $a = new Area('title 3');
              $a->display($c); 
            ?>
            <br>
              <?php 
                $a = new Area('map');
                $a->display($c); 
              ?>
            </div>
          </div>
          <div class="col-md-4 column">
            <div class="contact-details">
            <?php 
              $a = new Area('title 2');
              $a->display($c); 
            ?>
            <br>
            <?php 
              $a = new Area('details');
              $a->display($c); 
            ?>
            </div>
          </div>
          </div>
        
        </div>
    </div>

  </div>






    
</div> <!-- col-md-12 column textCol -->

</div> <!-- clearfix -->
</div> <!-- mainBoxS -->


  </div> <!-- container -->

</div>  <?php //close pageType-default ?>

<?php $this->inc('inc/bottomIncludes.php'); ?>
