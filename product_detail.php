<?php   defined('C5_EXECUTE') or die(_("Access Denied.")); $this->inc('inc/topIncludes.php'); ?>   
    
<div id="system-cener-body" class="pageType-default">
  <div class="container white80 shell detailPage">

    <div class="row">   
      <div class="clearfix width100">
        <div class="col-md-12 column">
          <div class="clearfix linksBg remove-add">         
            <?php  $a = new Area ('links here');  $a->display($c); ?>
          </div>
        </div>
      </div>
    </div>

    <div class="row">   
      <div class="clearfix width100 main-content">
        <div class="col-md-7 column mobileFix"> 


          <div class="address">
          <?php 
            if ($c->getCollectionAttributeValue('address')) {
              echo '<div class="styleContentBox">
                      <span class="mainHeading"><h1>'.$c->getCollectionAttributeValue('address').'</h1></span>  
                    </div>';
            }
            else {
              echo '<div class="styleContentBox">
                      <span class="mainHeading"><h1>No address yet</h1></span>  
                    </div>';              
            }
           ?>
          <?php  ?>
          </div>

        </div>
        <div class="col-md-5 column mobileFix"> 
          <div class="price">
          <?php 
            if ($c->getCollectionAttributeValue('price')) {
              echo '<div class="styleContentBox">
                      <span class="mainHeading"><h1>Asking price: £'.$c->getCollectionAttributeValue('price').'</h1></span>  
                    </div>';
            }
            else {
              echo '<div class="styleContentBox">
                      <span class="mainHeading"><h1>No price yet</h1></span>  
                    </div>';              
            }
           ?>
          <?php  ?>
          </div>
        </div>
      </div>
    </div>






    <div class="row">   
      <div class="clearfix width100">
        <div class="col-md-12 column">
          <div class="clearfix width100 insideBox">
            <div class="col-md-7 column alpha">
              <div class="imageSlider remove-add">
                <?php  $a = new Area ('slider');  $a->display($c); ?>
              </div>
            </div>
            <div class="col-md-5 column main-content omega"> 
              <div class="contactForm">
                <p class="missOut">Don't miss out!</p>

                <div class="callBoxHere">
                  <p>Call 01642 725008</p>
                </div>

                <div class="formStart">
                  <div class="formTitle">
                    <p>Or request a call back</p>
                  </div>

                  <div class="contact-us-section remove-add">
                    <?php  $a = new Area ('request callback');  $a->display($c); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



    <div class="row mbM10">   
      <div style="margin-top: 10px;" class="clearfix width100">     
        <div class="col-md-12 column">
          <div class="clearfix width100">
            <div class="col-md-6 column alpha main-content fixPaddingRight">       
              <?php  $a = new Area ('Main');  $a->display($c); ?>
            </div>
            <div class="col-md-6 column omega main-content fixPaddingLeft">       
              <?php  $a = new Area ('summary');  $a->display($c); ?>
            </div>
          </div>
        </div>
      </div>     
    </div>

    <div class="row mbM10">   
      <div style="margin: 10px 0 19px;" class="clearfix width100">
        <div class="col-md-12 column">       
          <?php  $a = new Area ('map');  $a->display($c); ?>
        </div>
      </div>
    </div>

  </div> <!-- shell -->
</div>  <?php //close pageType-default ?>

<?php $this->inc('inc/bottomIncludes.php'); ?>


