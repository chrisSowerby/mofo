<?php   defined('C5_EXECUTE') or die(_("Access Denied.")); $this->inc('inc/topIncludes.php'); ?>  
    
<div id="system-cener-body" class="pageType-default">


  
  <div class="mainArea">
    <div class="container">   
        <div class="row"> 
            <div class="col-md-9 secondCol"> 
              <?php 
                    $a = new Area ('new main');  $a->display($c); 
                  ?>       
              <?php 

                   // $a = new Area ('main');  $a->display($c); 
              ?>
            </div>  
            <div class="col-md-3"> 
              <?php 
                    $a = new GlobalArea ('footer1');  $a->display($c); 
              ?> 
            </div>
        </div>  
    </div>
  </div>

  <div class="darkGrey startConnectingArea">
    <div class="container"> 
      <div class="row">         
          <div class="col-md-12 centerThis sparkForm">  

                  <?php $token = Loader::helper('validation/token'); ?>
                  <form id="startconnecting">
                      <input class="yourName" type="text" name="name">
                      <input class="yourEmail" type="text" name="email">
                      <? $token->output('startconnecting_ajax'); ?>
                      <input class="submitBtn" type="submit" alt="submit" value="">
                  </form>

                  <div id="ajaxResponse2"><p class='scriptReturn'><span class='f700 footertextRed'></span></p></div>

          </div>  
      </div>
    </div>
  </div>
  

  
</div>  <?php //close pageType-default ?>

<?php $this->inc('inc/bottomIncludes.php'); ?>
