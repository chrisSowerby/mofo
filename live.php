<?php   defined('C5_EXECUTE') or die(_("Access Denied.")); $this->inc('inc/topIncludes.php'); ?>
<div id="system-cener-body" class="pageType-default pageType-subpage keyBenefits pageType-trumpCard">
  
  
  
  
  
  <!--start of main content section-->
  
  
  
  <div class="thirdSecBg">
    
    <div class="container">
      
      <div class="row">
        
        <div class="mapBg">
          
          <div class="col-md-8">
            <div class="mainContentBg trumpTopSection">
              <div class="mainContentHead">
                <?php
                $page = Page::getCurrentPage();                
                ?>
                <h2><?php echo $page->getCollectionName(); ?></h2>
                
                <!--mainContentHead-->
              </div>
              
              <div class="mainContentSec main-content">
                <!-- get image back here -->
<?php
$page = Page::getCurrentPage();
$ih = Loader::helper('image');

                $img = $page->getAttribute('mind_map_image');
                if ($img) {
                $thumb = $ih->getThumbnail($img, 690, 700, FALSE);
                ?><img src="<?php echo $thumb->src ?>" width="<?php echo $thumb->width ?>" height="<?php echo $thumb->height ?>" alt="Live card" /><?php
                }
                else {
                ?><img src="<?php echo $this->getThemePath()?>/processAndBuild/stylesheets/images/sampleLiveCard.jpg" width="<?php echo $thumb->width ?>" height="<?php echo $thumb->height ?>" alt="Live card no image yet" /><?php
                }
                ?>

                <!--mainContentSec-->
              </div>
              <!--mainContentBg-->
            </div>
            
            <div class="mainContentBg">
              
              
              <div class="mainContentSec main-content">
                <?php $a = new Area ('main'); $a->display($c); ?>
                
                <!--mainContentSec-->
              </div>
              
              <!--mainContentBg-->
            </div>
            
            <!--col-md-8-->
          </div>
          
          <div class="col-md-4">
            <div class="contact-us-section sideForm">
              <?php // $a = new Area ('form side'); $a->display($c); ?>
              <?php $a = new Area ('side form'); $a->display($c); ?>
              <script>
              $( ".sideForm h3" ).click(function() {
              $( ".formblock" ).slideToggle( "slow" );
              });
              </script>
            </div>

            <?php $a = new Area ('side'); $a->display($c); ?>

          </div> <!--col-md-4-->
                  
                  </div> <!--thisBg-->
                  
                  </div> <!--row-->
                  
                  </div> <!--container-->
                  
                  </div> <!--thirdSecBg-->
                  
                  
                  <div class="greyWrap">
                    <div class="container">
                      
                      <div class="row">
                        
                        <div class="col-md-12">
                          
                          <h2>Key Benefits of Vehicle Tracking</h2>
                          
                          </div> <!--col-md-12-->
                          
                          </div> <!--row-->
                          
                          </div> <!--container-->
                          
                          </div> <!--greyWrap-->
                          <!--start of benefit icons-->
                          
                          <div class="container">
                            
                            <div class="row">
                              
                              <div class="col-md-12">
                                
                                
                                <div class="iconBenefits">
                                  
                                  
                                  <div class="iconImages">
                                    
                                    <img src="<?php echo $this->getThemePath()?>/processAndBuild/stylesheets/images/hand.png" alt="hand"/>
                                    
                                    <p>Increase productivity
                                    & efficiency.</p>
                                    
                                  </div>
                                  
                                  <div class="iconImages">
                                    
                                    <img src="<?php echo $this->getThemePath()?>/processAndBuild/stylesheets/images/gasStation.png" alt="Gas Station"/>
                                    
                                    <p>Reduce labour & fuel costs.</p>
                                    
                                  </div>
                                  
                                  <div class="iconImages">
                                    
                                    <img src="<?php echo $this->getThemePath()?>/processAndBuild/stylesheets/images/truck.png" alt="truck"/>
                                    
                                    <p>Monitor driving behaviour.</p>
                                    
                                  </div>
                                  <div class="iconImages">
                                    
                                    <img src="<?php echo $this->getThemePath()?>/processAndBuild/stylesheets/images/smile.png" alt="Customer service"/>
                                    <p>Improve customer service.</p>
                                    
                                    
                                  </div>
                                  
                                  <div class="iconImages">
                                    <img src="<?php echo $this->getThemePath()?>/processAndBuild/stylesheets/images/firstAid.png" alt="Health and Safety"/>
                                    
                                    <p>Improved health & safety standards.</p>
                                    
                                  </div>
                                  
                                  <div class="iconImages">
                                    <img src="<?php echo $this->getThemePath()?>/processAndBuild/stylesheets/images/spanner.png" alt="maintenance"/>
                                    
                                    <p>​Monitor vehicle maintenance records.</p>
                                    
                                  </div>
                                  
                                  
                                  </div> <!--iconBenefits-->
                                  
                                  </div> <!--col-md-12-->
                                  
                                  </div> <!--row-->
                                  
                                  </div> <!--container-->
                                  
                                </div>  <?php //close pageType-default ?>
                                <script type="text/javascript">
                                //fix overflow breaking trump card
                                $(window).resize(test_overflow);
                                function test_overflow()
                                {
                                sections= $(".trumpTextOutside")[0];
                                if(overflow(sections))
                                {
                                $(".trumpCard").addClass("overflow");
                                }
                                else
                                {
                                $(".trumpCard").removeClass("overflow");
                                }
                                }
                                function overflow(element)
                                {
                                return element.offsetHeight < element.scrollHeight;
                                }
                                test_overflow();
                                </script>
                                <?php $this->inc('inc/bottomIncludes.php'); ?>