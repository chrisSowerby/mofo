<?php defined('C5_EXECUTE') or die(_("Access Denied.")); 

  global $cp;
  function getCurrentUrl(){
    //gets full site url + page url
    $currentPage = Page::getCurrentPage();
    Loader::helper('navigation');
    return NavigationHelper::getLinkToCollection($currentPage, true);
  }   
?>

<div class="loadingWrap"> 
  <div id="page" class="C5wrap">

          <div id="header-contain">
            <div id="header">
              <a href="#menu-right"></a>
               Navigate               
            </div>
          </div>

   <script type="text/javascript">
      <?php $page = Page::getCurrentPage(); if ($page->getCollectionTypeHandle() == "mixitup") { ?>
        function isiPhone(){
            return (
                (navigator.platform.indexOf("iPhone") != -1) ||
                (navigator.platform.indexOf("iPod") != -1)
            );
        }
        if(!isiPhone()){ // if its not ipone     
           $(".C5wrap").css("display", "none"); // breaks mixit up when on iphone
        } 
      <?php } else { ?>
        // not ipone so do the fadein.
        $(".C5wrap").css("display", "none");        
      <?php } ?>

       //make it use a loading icon
       $(".loadingWrap").addClass("loading"); 
    </script>


<div id="system-header">
  <div class="headerSass"> 



<div class="greyWrap">
  
  <div class="container">
  
    <div class="row">
    
      <div class="col-md-12">  
      
        <div class="socialMediaTop">
          <a class="twitterIcon" href="https://twitter.com/GtrakTracking"><img src="<?php echo $this->getThemePath()?>/processAndBuild/stylesheets/images/twitter.png"    alt="twitter"/></a> 
          <a class="linkedinIcon" href="https://www.linkedin.com/company/gtrak-ltd"><img src="<?php echo $this->getThemePath()?>/processAndBuild/stylesheets/images/linkedin1.png" alt="LinkedIn"/></a>
        </div> <!--socialMediaTop-->
    
      </div> <!--col-md-12--> 
  
    </div> <!--row-->
  
  </div> <!--container-->

</div> <!--greyWrap--> 








<div class="whiteWrap">
  
  <div class="container">
    
    <div class="row">
      
      <div class="col-md-3"> 
        
        <div class="logoLeft">


            <div class="logoRow">
              <div class="logo-outer">
                <?php 
                    function getTheURL($url_id) {
                       $opg = Page::getById($url_id);
                       $url=Loader::helper('navigation'); 
                       $canonical=$url->getCollectionURL($opg); 
                       $canonical=preg_replace("/index.php\?cID=1$/","",$canonical); 
                       echo $canonical;
                    }
                  ?>  
                  <?php if($c->getCollectionID() != HOME_CID) { ?>
                  <a href="<?php getTheURL(1); ?>"> 
                  <?php } ?>
                   <img class="myLogo" src="<?php echo $this->getThemePath()?>/processAndBuild/stylesheets/images/logo.png" alt="<?php echo SITE?> logo">              
                  <?php if($c->getCollectionID() != HOME_CID) { ?> 
                  </a>
                  <?php } ?>
              </div>
            </div>



 

        </div> <!--logoLeft-->
      
      </div> <!--col-md-6-->
      
        <div class="col-md-9">
          
          <div class="rightSide">
            
            <div class="contactIcons remove-add inline-blocks">
              
              <div class="telephone">
              <img src="<?php echo $this->getThemePath()?>/processAndBuild/stylesheets/images/telephone1.png" alt="telephone icon">

              <p><?php $a = new GlobalArea ('the tel'); $a->display($c); ?></p>
              
             
            </div> <!--telephone-->  
            
              <div class="emailUs">
              <img src="<?php echo $this->getThemePath()?>/processAndBuild/stylesheets/images/emailEnvelope.png" alt="email icon"/>
              <p><?php $a = new GlobalArea ('the email'); $a->display($c); ?></p>
              
             
            </div> <!--emailUs-->
            
            </div> <!--contactIcons--> 
           
            <div class="threeButtons inline-blocks">

            
              <?php $a = new GlobalArea ('the buttons'); $a->display($c); ?>
               
            </div> <!--threeButtons-->
             
            
          </div> <!--rightSide--> 
        </div> <!--col-md-6-->
      </div> <!--row close-->
    
  </div> <!--container close-->
</div> <!--whiteWrap close-->






<div class="greyWrapNav">
  
  <div class="container">
  
    <div class="row">
    
      <div class="col-md-12 remove-add">
      
            <?php 
              $a = new GlobalArea ('Header Nav');  $a->display($c); 
            ?>
      
      </div> <!--col-md-12 close-->
     
    </div> <!--row close-->
   
  </div> <!--container close-->
 
</div> <!--greyWrapNav close-->







      
   
   


      <div style="display:none" class="thisPageInfo"> <!-- style="display:none" -->
      <?php

            $canViewToolbar = (isset($cp) && ($cp->canWrite() || $cp->canAddSubContent() || $cp->canAdminPage() || $cp->canApproveCollection()));
            if ($canViewToolbar) { ?>
            <div class="container" style="border:solid 1px #000; padding:10px; background:#fff;margin-bottom:20px;">
            <h3 style="text-align:center;margin-bottom:20px;">Welcome logged in user! you are currently viewing:<br> <?php echo "<p style='margin-top:10px;color:green'>"; echo $c->getCollectionName(); echo "</p>"; ?></h1>
              <p style='text-align:center;margin-bottom:20px'>With the URL: <?php echo getCurrentUrl();?></p>
            </div>
      <?php   }  ?> 
      </div>


  </div> <!-- close <div class="headerFooterSass"> -->
</div> <!-- close system-header -->
