<?php   defined('C5_EXECUTE') or die(_("Access Denied.")); $this->inc('inc/topIncludes.php'); ?>  
    
<div id="system-cener-body" class="pageType-default pageType-subpage keyBenefits">


  

   
   



  
  
     <!--start of main content section-->
  
    
   
   <div class="thirdSecBg"> 
   
    <div class="container">  
   
   <div class="row">
          
     <div class="mapBg">
          
       <div class="col-md-9">
            
         <div class="mainContentBg">
            
           <div class="mainContentHead">
  
           <h2><?php  echo $c->getCollectionName(); ?></h2>
            
           </div> <!--mainContentHead-->
           
            <div class="mainContentSec main-content">  

				<?php 
				if ($c->isEditMode()) {
				print '<br><h2>This is your thumbnail that will show on the top level blog page.</h2>';
				$a = new Area('Thumbnail Image');
				$a->display($c);
				}
				?>
				
				<?php  
				$a = new Area('Header Image');
				$a->display($c);
				?>
				<br><br>
				<?php $a = new Area ('Main');  $a->display($c); ?>
				<br>


				<div id="main-content-post-author">
				<?php 
				$vo = $c->getVersionObject();
				if (is_object($vo)) {
				$uID = $vo->getVersionAuthorUserID();
				$username = $vo->getVersionAuthorUserName();
				if (Config::get("ENABLE_USER_PROFILES")) {
				$profileLink= '<a href="' . $this->url('/profile/view/', $uID) . '">' . $username . '</a>';
				}else{ 
				$profileLink = $username;
				} ?>
				<p>
				<?php  echo t(
				/*i18n: %1$s is an author name, 2$s is an URL, %3$s is a date, %4$s is a time */
				'Posted by <span class="post-author">%1$s at <a href="%2$s">%3$s on %4$s</a></span>',
				$profileLink,
				$c->getLinkToCollection,
				$c->getCollectionDatePublic(DATE_APP_GENERIC_T),
				$c->getCollectionDatePublic(DATE_APP_GENERIC_MDY_FULL)
				); ?>
				</p>

				<!-- 				<div id="main-content-post-footer-share">
				<p><?php // echo t('Share:'); ?>
				<a href="mailto:?subject=<?php // echo $c->getCollectionName(); ?>&body=<?php //  echo $nav->getLinkToCollection($c, true); ?>"><img class="main-content-post-footer-share-email" src="<?php // echo $this->getThemePath(); ?>/images/icon_email.png" alt="<?php // echo t('Email'); ?>" /></a>
				<a href="https://twitter.com/share"><img class="main-content-post-footer-share-twitter" src="<?php // echo $this->getThemePath(); ?>/images/icon_twitter.png" alt="<?php // echo t('Share on Twitter'); ?>" /></a>
				<a href="http://www.facebook.com/share.php?u=<?php // echo $nav->getLinkToCollection($c, true); ?>"><img class="main-content-post-footer-share-facebook" src="<?php // echo $this->getThemePath(); ?>/images/icon_facebook.png" alt="<?php // echo t('Share on Facebook'); ?>" /></a>
				</p>
				</div> -->
				<?php  } ?>
				</div>	

            </div> <!--mainContentSec-->
            
         </div> <!--mainContentBg-->
          
       </div> <!--col-md-8-->
          
		<div class="col-md-3">

			<?php $a = new Area ('Sidebar');	$a->display($c); ?>

		</div> <!--col-md-3-->
       
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

<?php $this->inc('inc/bottomIncludes.php'); ?>