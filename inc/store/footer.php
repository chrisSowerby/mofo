<?php       defined('C5_EXECUTE') or die(_("Access Denied.")); ?>  
<div id="system-theme-footer" class="footerSass themeFooter">


   <div class="greyWrapThreeButtonsFooter">
    
    <div class="container">
  
      <div class="row">
   
        <div class="col-md-12">
          
          
          <div class="threeButtonsFooter clearfix inline-blocks remove-add">
       
                <?php $a = new GlobalArea ('the buttons'); $a->display($c); ?>
              
            </div> <!--threeButtons-->
            
     
        </div> <!--col-md-12-->
     
      </div> <!--row-->
   
    </div> <!--container-->
  
  </div> <!--greyWrap-->





<!--start of footer-->

<div class="whiteWrapFooter">
  
  <div class="container">
    
    
    <div class="row">
      
      <div class="col-md-8">
        
        <div class="getInTouch">
          
          <div class="leftContactInfo remove-add inline-blocks">
          <ul>
            <li><strong>Get <span class="red">In</span> Touch...</li></strong>
            <li><strong><span class="red">T: </span></strong><?php $a = new GlobalArea ('the tel'); $a->display($c); ?></li>
            <li><strong><span class="red">E: </span></strong><?php $a = new GlobalArea ('the email'); $a->display($c); ?></li>
          </ul>
          
          <div class="socialMediaFooter"> 
            <a href="https://twitter.com/GtrakTracking"><img src="<?php echo $this->getThemePath()?>/processAndBuild/stylesheets/images/twitter.png"    alt="twitter"/></a> 
            <a href="https://www.linkedin.com/company/gtrak-ltd"><img src="<?php echo $this->getThemePath()?>/processAndBuild/stylesheets/images/linkedin1.png" alt="LinkedIn"/></a>
         </div> <!--socialMediaFooter-->
          
          <div class="copyrightPolicy">
           <!--  <p>&copy GTrak Privacy Policy</p> -->
          </div> <!--copyrightPolicy-->
       
        </div> <!--leftContactInfo-->
        
        <div class="rightContactInfo">
          <ul>
            <li><strong><span class="red">A:</span></strong> Queensway House</li>
            <li>Queensway</li>
            <li>Middlesbrough</li>
            <li>TS3 8TF</li>
            
          </ul>  
        </div> <!--rightContactInfo-->
        
      </div> <!--getInTouch-->
    
    </div> <!--col-md-8-->
    
    <div class="col-md-4">

        <?php $a = new GlobalArea ('blog feed'); $a->display($c); ?>      
  
    </div> <!--col-md-4-->

    
      </div> <!--row-->


      <div class="row">            
                <div class="col-md-12">  <!-- use remove-add  -->                           
                
                    <div class="footer-box"> 
                        <div class="tag-containe">    
                            
                            <p style="display: block;" class='displayInline'>&copy; <?php echo SITE." "?> <?php echo date("Y");?>. All rights reserved. <a class='displayInline' href='<?php echo View::url('/site_map'); ?>' target='_blank'>HTML Site Map</a></p>
                            <?php if($c->getCollectionID() != HOME_CID) {
                              echo "<p class='displayInline'>Web design by Surge Marketing Solutions Middlesbrough</p>";
                            } else {
                              echo "<a class='displayInline' href='http://surgemarketingsolutions.co.uk/websites/' target='_blank'>Web design by Surge Marketing Solutions Middlesbrough</a>";
                            }
                            ?>                        
                        </div>
                    </div>
                </div>            
        </div>






    </div> <!--container-->
  </div> <!--whiteWrapFooter-->

 </div>   <!-- closes  <div class="headerFooterSass"> -->
