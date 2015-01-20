

<!-- copy and paste this code if you need help 

class: remove-add  main-content
 -->

<!-- make space in edit mode: -->
<?php if ($c->isEditMode()) { ?><div style="min-height: 44px"></div><?php } ?>


<!-- how to use the validation token -->

           <?php $token = Loader::helper('validation/token'); ?>
            <form id="startconnecting">
                <input class="yourName" type="text" name="name">
                <input class="yourEmail" type="text" name="email">
                <? $token->output('startconnecting_ajax'); ?> <!-- we will get this back in the ajaxed php script to validate  -->
                <input class="submitBtn" type="submit" alt="submit" value="">
            </form>




<!-- get theme path -->
<?php echo $this->getThemePath()?>


<!-- set block container -->
$a->setBlockWrapperStart('<section class="line">');
$a->setBlockWrapperEnd('</section>');


<!-- example default block names for sample content  -->    
<?php $a = new GlobalArea ('Site Name, Header Nav, Main, Sidebar, Blog: Thumbnail Image');	$a->display($c); ?>


<!-- get whats contained in the attribute only from the homepage -->
<?php 
  $home = Page::getByID(HOME_CID); // get home id
  $linkedin = $home->getAttribute('linked_in'); // get whats contained in the attribute
  $facebook = $home->getAttribute('facebook');
  $twitter = $home->getAttribute('twitter');



//get the current url  
  function getCurrentUrl(){
    //gets full site url + page url
    $currentPage = Page::getCurrentPage();
    Loader::helper('navigation');
    return NavigationHelper::getLinkToCollection($currentPage, true);
  } 

  //how to use 

  if (strpos(getCurrentUrl(),'home-page-1') !== false) {  
    ?>         
    <img class="myLogo" src="<?php echo $this->getThemePath()?>/images/logo.png" alt="<?php echo SITE?> logo">
    <?php
  }
?>

<!-- output the attribute -->
<a href="<?php if($linkedin !="") { ?><?php echo $linkedin; ?><?php } else {echo "#";};?>">blarrr</a>  


<!--    example of how to get a pages url and output it
		example of how to output the site name
		we are also checking if we are on the hompage to out put a link back to the homepage around the logo. -->

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
        
         <img src="<?php echo $this->getThemePath()?>/images/SNE-NEW-LOGO-TRANS.png" alt="<?php echo SITE?> logo">
      
      <?php if($c->getCollectionID() != HOME_CID) { ?> 
      </a>
      <?php } ?>
 

<!-- get page info for loged in user -->

<div class="thisPageInfo">
<?php
      global $cp;
      $canViewToolbar = (isset($cp) && ($cp->canWrite() || $cp->canAddSubContent() || $cp->canAdminPage() || $cp->canApproveCollection()));
      if ($canViewToolbar) { ?>
      <div class="container" style="border:solid 1px #000; padding:10px; background:#fff;margin-bottom:20px;">
      <h3 style="text-align:center;margin-bottom:20px;">Welcome logged in user! you are currently viewing:<br> <?php echo "<p style='margin-top:10px;color:green'>"; echo $c->getCollectionName(); echo "</p>"; ?></h1>
        <p style='text-align:center;margin-bottom:20px'>With the URL: <?php echo getCurrentUrl();?></p>
      </div>
<?php   }  ?> 
</div>




<!-- how to get url to tools files for AJAX calls -->
<?php
  $tool_helper = Loader::helper('concrete/urls');
  $tool_url = $tool_helper->getToolsURL('blogsubscribe'); // file would be named blogsubscribe.php but we leave the .php off.
  $tool_url_startConnecting = $tool_helper->getToolsURL('startConnecting');
?> 





<!--  its js time  -->




<script type="text/javascript">


// AJAX examples

//////////////////// sparkle HOME PAGE CENTER FORM contact us form
$("#startconnecting").submit(function() {
$('#ajaxResponse2').html("<p class='scriptReturn'><span class='f700 footertextRed'>Loading... </span></p>").show();

var yourEmail = $("#startconnecting .yourEmail").val();
var yourName = $("#startconnecting .yourName").val();
var ccm_token = $('#startconnecting').find('input[name="ccm_token"]').val()

console.log(yourEmail)
console.log(yourName)
    $.ajax({
        type: "POST",
        url: "<?php echo $tool_url_startConnecting ?>",
        data: {yourEmail: yourEmail, yourName: yourName, ccm_token: ccm_token},
        dataType : "json",
        success: function(response) { 
            console.log(response);
            $('#ajaxResponse2 p span').html(response).fadeIn(900);        

        },
        error: function () {
            $('#ajaxResponse2 p span').html("Some problem fetching data. Please try again.").fadeIn(900);
        }
       
    }); //end ajax
  
return false; // avoid to execute the actual submit of the form.
});



//////////////////// sparkle FOOTER FORM for blog subscribe
//$('#blogSubscribe').serialize()
$("#blogSubscribe").submit(function() {
$('#ajaxResponse1').html("<p class='scriptReturn'><span class='f700 footertextRed'>Loading... </span></p>").show();

var yourEmail = $("#blogSubscribe .yourEmail").val();
var yourName = $("#blogSubscribe .yourName").val();
var ccm_token = $('#blogSubscribe').find('input[name="ccm_token"]').val()

console.log(yourEmail)
console.log(yourName)
    $.ajax({
        type: "POST",
        url: "<?php echo $tool_url ?>",
        data: {yourEmail: yourEmail, yourName: yourName, ccm_token: ccm_token}, //http://stackoverflow.com/questions/9430918/retrieving-serialize-data-in-a-php-file-called-using-ajax
        dataType : "json",
        success: function(response) {           
          var holdit = response;
            console.log(holdit);
            $('#ajaxResponse1 p span').html(response).fadeIn(900);
        

        },
        error: function () {
            $('#ajaxResponse1 p span').html("Some problem fetching data. Please try again.").fadeIn(900);
        }
       
    }); //end ajax
  
return false; // avoid to execute the actual submit of the form.
});

///////////////////////////////////////////////////////////////////////////


// remove strings from nodes
$('.shazzaa342:contains("2013")').each(function(){
    $(this).html($(this).html().split("2013").join(""));
});


///////////////////////////////////////////////////////////////////////////


// sparkle form backgrounds. on click remove background on input but then re-add it on mouse leave click.
setInterval(function(){
  var yourName1 = $("#blogSubscribe .yourName").val();
  var yourEmail1 = $("#blogSubscribe .yourEmail").val();

  if (yourEmail1.length > 0) {
    $("#blogSubscribe .yourEmail").css({"background-image":"none"});
  }
  if (yourEmail1 == "") {
    $("#blogSubscribe .yourEmail").css({"background-image":"url(<?php echo $this->getThemePath()?>/images/yourEmail.png)"});
  };
  if (yourName1.length > 0) {
    $("#blogSubscribe .yourName").css({"background-image":"none"});
  } 
  if (yourName1 == "") {
    $("#blogSubscribe .yourName").css({"background-image":"url(<?php echo $this->getThemePath()?>/images/yourName.png)"});
  }

  var yourName2 = $(".startConnectingArea .yourName").val();
  var yourEmail2 = $(".startConnectingArea .yourEmail").val();

  if (yourEmail2.length > 0) {
    $(".startConnectingArea .yourEmail").css({"background-image":"none"});
  }
  if (yourEmail2 == "") {
    $(".startConnectingArea .yourEmail").css({"background-image":"url(<?php echo $this->getThemePath()?>/images/connectForm/yourEmail.png)"});
  };
  if (yourName2.length > 0) {
    $(".startConnectingArea .yourName").css({"background-image":"none"});
  } 
  if (yourName2 == "") {
    $(".startConnectingArea .yourName").css({"background-image":"url(<?php echo $this->getThemePath()?>/images/connectForm/yourName.png)"});
  }

}, 500);




///////////////////////////////////////////////////////////////////////////




//Set heights in relation to another div
window.setInterval(function fixSubPageHights(){

 var subpageBox = $(".subpage-box").height();
 if (subpageBox > 100) {  
  var marginSubpageBox = 1 + subpageBox;
 //alert(marginSubpageBox);

   $('.C5wrap .pageType-subpage .center-bit').animate({
      marginTop:marginSubpageBox, 
  }, 700);

 // $(".C5wrap .pageType-subpage .main-bit").css("margin-top", marginSubpageBox);
 }

}, 350);

/////////////////////////////////////////////////////////////////////////////////////////////////////////
// do some animation

$('.flip-top-inner, .carousel').css("opacity","0.0");
setTimeout(function () {

  $('.flip-top-inner, .carousel').animate({
    opacity: 1.0
      
  }, 3000);
}, 200);


$('.social-block-inner').css({"opacity":"0","margin-top":"-50px"});

  $('.social-block-inner').animate({
      marginTop:'53px', opacity: 1.0
  }, 2300);

$('.subpage-box').css({"opacity":"0"});
 $('.subpage-box').animate({
      marginTop:'26px', opacity: 1.0
  }, 1500);


// how to clone nodes to other parts of the node tree.
var PageInfo = $("<div />").append($(".thisPageInfo").clone()).html();          
$("#system-cener-body").prepend(PageInfo); // now place the good where we want them to go    
$(".headerFooterSass .thisPageInfo").remove(); // now remove the old one

// if its only when on mobile...


// move div with main text to the top for mobiles.
var vwptWidth = $(window).width();
if (vwptWidth <= 991) { //if portable device   
    var moveit1 = $("<div />").append($(".C5wrap .mobileMainText").clone()).html();          
    $(".pageType-default").prepend(moveit1); // now place the good where we want them to go        

    // this is for the subpage    
    var moveit2 = $("<div />").append($(".C5wrap .mobileMainTextSubPage").clone()).html();  
    $(".subpage .mainBoxS").prepend(moveit2); // now place the good where we want them to go

    //global used for home and subpages
    $(".C5wrap .removeOnMobile").remove(); // now remove the old one
} 
</script>