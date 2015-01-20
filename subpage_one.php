<?php   defined('C5_EXECUTE') or die(_("Access Denied.")); $this->inc('inc/topIncludes.php'); ?>

<div id="system-cener-body" class="pageType-default pageType-subpage keyBenefits">
  
  
  
  
  
  <!--start of main content section-->
  
  
  
  <div class="thirdSecBg">
    
    <div class="container">
      
      <div class="row">
        
        <div class="mapBg">
          
          <div class="col-md-8">
            
            <div class="mainContentBg">
              
              <div class="mainContentHead">
                
                <h2><?php $a = new Area ('main title'); $a->display($c); ?></h2>
                
                </div> <!--mainContentHead-->
                
                <div class="mainContentSec main-content">
                  <?php $a = new Area ('main'); $a->display($c); ?>
                  </div> <!--mainContentSec-->
                  
                  </div> <!--mainContentBg-->
                  
                  </div> <!--col-md-8-->
                  
                  <div class="col-md-4">
                    
                    <?php
                    Loader::model('page_list');
                    $nh = Loader::helper('navigation');
                    $pl = new PageList();
                    $th = Loader::helper('text');
                    $ih = Loader::helper('image');
                    $pl->filterByAttribute('not_visable_in_search', '0'); // if this is not selected
                    $pl->filterByCollectionTypeHandle("trump_card");
                    $pl->sortByDisplayOrder();
                    //$pl->sortByMultiple('p1.cParentID ASC, p1.cDisplayOrder ASC'); //<--this might work better for sorting if the pages are scattered throughout the site
                    $pagelist = $pl->get();
                    $total = $pl->getTotal();
                    $randomPage = rand(1,$total);
                    $i = 0;
                    foreach ($pagelist as $page) {
                    $i++;
                    if ($i == $randomPage) {
                    
                    $lowToHigh = "";
                    $fleetSizeNumber = "";
                    $rawSaving = $page->getAttribute('saving');
                    $saving = $rawSaving;
                    $saving = preg_replace('/[^0-9]+/', '', $saving); // remove any letters leaving number only
                    if ($rawSaving == "") {
                    $rawSaving = "N/A";
                    }
                    if ($saving != "") {
                    $lowToHigh = "data-myorder='$saving'";
                    }
                    $companyName = $page->getAttribute('company_name');
                    if ($companyName == "") { $companyName = "No company name yet"; }
                    $companyIndustry = $page->getAttribute('company_Industry');
                    if ($companyIndustry == "") { $companyIndustry = "No company industry yet"; }
                    $fleetSize = $page->getAttribute('fleet_size');
                    $fleetSizeNumber = $fleetSize;
                    $fleetSizeNumber = preg_replace('/[^0-9]+/', '', $fleetSizeNumber); // remove any letters leaving number only
                    
                    if ($fleetSize == "") { $fleetSize = "No company fleet size yet"; }
                    $yearlyMileage = $page->getAttribute('yearly_mileage');
                    if ($yearlyMileage == "") { $yearlyMileage = "No yearly mileage yet"; }
                    $keyBenefits = $page->getAttribute('key_benefits');
                    if ($keyBenefits == "") { $keyBenefits = "No key benefits yet"; }
                    $companyIndustryRaw = $companyIndustry;
                    $companyIndustry = preg_replace('/\s+/', '', $companyIndustry); // remove all whitespace to fix class name
                    
                    echo '<a class="linkToCompany clearfix width100" href="' . $nh->getLinkToCollection($page) . '">';
                      ?>
                      <div class="trumpCardBG">
                        <div class="trumpCard">
                          <div class="trumpCardTop">
                            
                            <div class="companyLogo">
                              <?php
                              $img = $page->getAttribute('logo_image');
                              if ($img) {
                              $thumb = $ih->getThumbnail($img, 350, 125, FALSE);
                              ?><img src="<?php echo $thumb->src ?>" width="<?php echo $thumb->width ?>" height="<?php echo $thumb->height ?>" alt="logo image" /><?php
                              }
                              else {
                              ?><img src="<?php echo $this->getThemePath()?>/img/noImage.jpg" width="<?php echo $thumb->width ?>" height="<?php echo $thumb->height ?>" alt="no image" /><?php
                              }
                              ?>
                              </div> <!--companyLogo-->
                              
                              </div> <!--trumpCardTop-->
                              <div class="trumpTextOutside">
                                <div class="trumpText">
                                  <span class="trumpCardInfoLeft">Company Name:</span>
                                  <span class="trumpCardInfoRight"><?php echo $companyName; ?></span>
                                </div>
                                
                                <div class="trumpText"><span class="trumpCardInfoLeft">Industry:</span>
                                <span class="trumpCardInfoRight"><?php echo $companyIndustryRaw; ?></span></div>
                                
                                <div class="trumpText">
                                  <span class="trumpCardInfoLeft">Fleet Size:</span>
                                  <span class="trumpCardInfoRight"><?php echo $fleetSize; ?></span>
                                </div>
                                <div class="trumpText">
                                  <span class="trumpCardInfoLeft">Yearly Mileage:</span>
                                  <span class="trumpCardInfoRight"><?php echo $yearlyMileage; ?></span>
                                </div>
                                
                                <div class="trumpText">
                                  <span class="trumpCardInfoLeft">Savings Using GTrak:</span>
                                  <span class="trumpCardInfoRight"><!-- &pound; --><?php echo $rawSaving; ?></span>
                                </div>
                                
                                <div class="trumpText">
                                  <span class="trumpCardInfoLeft">Key Benefits:</span>
                                  <span class="trumpCardInfoRight"><?php echo $keyBenefits; ?></span>
                                </div>
                              </div>
                              </div> <!--trumpCard-->
                            </div>
                            <?php
                          echo '</a>'; // link to company wrap close
                          } // if $i = random page
                          } // foreach
                          ?>
                          
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