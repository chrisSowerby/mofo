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
      $(".C5wrap").css("display", "none"); 
       //make it use a loading icon
       $(".loadingWrap").addClass("loading"); 
    </script> 








<div id="system-header">
  <div class="headerFooterSass"> 
    <div class="container" style="position:relative">
      <div class="heightWrap">


        <!-- start hardcode -->

        <div id="basicSliderOuter">  
            <div class="control_next">&gt;</div> 
            <div class="control_prev">&lt;</div>    
          <div id="basicSlider" style="width: 1140px; height: 617px;"> 
            <ul>
              <li class="slidechildNumber1" style="width: 1140px; height: 199px;">      
                <ul>
                  <img class="img-responsive" src="<?php echo $this->getThemePath()?>/images/spark/blog/blogSlider.png" width="1140" height="617" alt="ourblog">
 
                  <div class="inside-slide">  
                            <p class="theName"><?php echo $c->getCollectionName(); ?></p>
                  
                            <p>not used</p>
                  
                          </div> 

                  <div class="transOverlay" style="width: 1140px; height: 617px;"></div>
                </ul>
              </li>
           </ul>
          </div>

           <div id="slideBtns" style="display: none;"><span class="slidechildNumber1 slideBtns"></span></div> 
        </div>
<script type="text/javascript">

//jquery by helpchrisplz - chris sowerby

$(window).load(function () {

$autoSlideChange = 9000;
$childNumbers = 0; // this must be 0
$useSlideBtns = true;
$setSlideHeights = false;
$slideEffect = "fade"; // fade or slide
var refreshInterval;
var refreshIntervalHeights;

if ($useSlideBtns == true) {  
  $('#basicSlider > ul li').each(function(){  
    $childNumbers++;   

    //var addSlideBtn = "<span class='slidechildNumber"+$childNumbers+"'>"+$childNumbers+"</span>";
    var addSlideBtn = "<span class='slidechildNumber"+$childNumbers+"'></span>";
    
    //#slideBtns span
    $(this).addClass('slidechildNumber'+$childNumbers);
   $('#slideBtns').append(addSlideBtn);
  });
  $("#slideBtns span:nth-child(1)").addClass("slideBtns");
  if ($childNumbers == 1) { $("#slideBtns").css({"display":"none"}); };
}


  
  //call resizeMyWindow function when the window is resized
var basicSliderResizeTimer;
$(window).resize(function() {
    clearTimeout(basicSliderResizeTimer);
    basicSliderResizeTimer = setTimeout(basicSliderResizeMyWindow, 100); 
});

function basicSliderResizeMyWindow() {   
  slideCount = $('#basicSlider > ul li').length;  
  slideWidth = $('#basicSlider > ul li').width();
  
  var theParentWidth = $("#basicSlider").parent().width(); 
 
  slideWidth = theParentWidth; 
  $('#basicSlider > ul li').css("width",slideWidth); 

   if (slideCount == 1) { childPosition = 1; } else { childPosition = 2; }; 
   console.log(slideCount)
   slideHeight = $("#basicSlider > ul > li:nth-child(" + childPosition + ") > ul .img-responsive").height();
   sliderUlWidth = slideCount * slideWidth;
  
  $('#basicSlider, .transOverlay').css({ width: slideWidth, height: slideHeight });

    slideHeight = $("#basicSlider > ul > li:nth-child(" + childPosition + ") > ul .inside-slide").height() + 149;
  $('#basicSlider ul > li').css({height: slideHeight});
  
  //$('#basicSlider').css({ width: slideWidth});
  
  if (slideCount != 1) {
    $('#basicSlider > ul').css({ width: sliderUlWidth, marginLeft: - slideWidth });
  };
  
}
  $('#basicSlider > ul li:last-child').prependTo('#basicSlider > ul');
basicSliderResizeMyWindow(); 
  

function doNextBtnRight() {   
  $("#slideBtns").find(".slideBtns").removeClass("slideBtns")
  .next().addClass("slideBtns");
  
  if(!$("#slideBtns span").hasClass("slideBtns")){
    $("#slideBtns span:nth-child(1)").addClass("slideBtns");
  }
}
function doNextBtnLeft() {   
  $("#slideBtns").find(".slideBtns").removeClass("slideBtns")
  .prev().addClass("slideBtns");
  
  if(!$("#slideBtns span").hasClass("slideBtns")){
    $("#slideBtns span:last-child").addClass("slideBtns");
  }
}

function setTheHight() { 
//used if content is difrent sizes. 
  slideHeight = $("#basicSlider > ul > li:nth-child(" + childPosition + ") > ul").height() + 20;
  $('#basicSlider').animate({            height: slideHeight        }, 100);
  
} 
    

    function moveLeft(no) {        
        if (!no) {
          doNextBtnLeft();
        }  
        if ($slideEffect == "fade" && slideCount != 1) {
          $('#basicSlider > ul').animate({ 
              opacity: 0.0
          }, 600, function () {
              $('#basicSlider > ul li:last-child').prependTo('#basicSlider > ul');
              $('#basicSlider > ul').css('opacity', '1.0');
          });
        }
        if ($slideEffect == "slide" && slideCount != 1) {
          $('#basicSlider > ul').animate({
              left: + slideWidth
          }, 600, function () {
              $('#basicSlider > ul li:last-child').prependTo('#basicSlider > ul');
              $('#basicSlider > ul').css('left', '0');
          }); 
        }
      if ($setSlideHeights == true){
        setTimeout(function(){ 
          setTheHight();
        }, 420);      
      }
    };

    function moveRight(no) { 
        if (!no) {
          doNextBtnRight();
        } 
      
        if ($slideEffect == "fade" && slideCount != 1) {
          console.log("here")
          $('#basicSlider > ul').animate({
             opacity: 0.0           
          }, 600, function () {
              $('#basicSlider > ul li:first-child').appendTo('#basicSlider > ul');          
              $('#basicSlider > ul').css('opacity', '1.0');          
          }); 
        }
      
        if ($slideEffect == "slide" && slideCount != 1) {
          $('#basicSlider > ul').animate({             
             left: - slideWidth
          }, 600, function () {
              $('#basicSlider > ul li:first-child').appendTo('#basicSlider > ul');          
              $('#basicSlider > ul').css('left', '0');          
          });
        }

      if ($setSlideHeights == true){
        setTimeout(function(){
          setTheHight(); 
        }, 420); 
      }
    };

    $('.control_prev').click(function () {       
      clearInterval(refreshInterval);
      moveLeft();
      refreshInterval = setInterval( update, $autoSlideChange);
    });

    $('.control_next').click(function () {
      clearInterval(refreshInterval);
      moveRight();
      refreshInterval = setInterval( update, $autoSlideChange); 
    }); 

// this block of code is to change the slide if $useSlideBtns is set to true.
$('#slideBtns span').click(function () {  
  clearInterval(refreshInterval);
  // the one you click on
   var numberFromCurrentClass = $(this).prevAll().length + 1; 
  
  // the one that is active
   var numberFromClickedToEnd = $("#slideBtns .slideBtns").prevAll().length + 1; 
  
  //remove old class and update to new position
  $("#slideBtns .slideBtns").removeClass("slideBtns");
  $(this).addClass("slideBtns");
  
   //console.log("numberFromCurrentClass "+numberFromCurrentClass)
   //console.log("numberFromClickedToEnd "+numberFromClickedToEnd)
  // if i click on 1 but 2 is active becasue the clicked on is less than the active we need to call move left else move right by the amount of difference between the 2 numbers.
  
  if (numberFromCurrentClass < numberFromClickedToEnd) {
    var newNumber = numberFromClickedToEnd - numberFromCurrentClass; 
    //console.log("minus = "+newNumber)
    
    for ( var i = 0; i < newNumber; i++ ) {      
      if (i == 1) {
        moveLeft("no"); 
      } else {
        setTimeout(function(){ 
          moveLeft("no"); 
        }, 1000);
      }          
    }
    
  } else {
    var newNumber = numberFromCurrentClass - numberFromClickedToEnd;  
    //console.log("plus = "+newNumber)
    
    for ( var i = 0; i < newNumber; i++ ) {         
      if (i == 1) {
        moveRight("no");
      } else {
        setTimeout(function(){
          
          moveRight("no");
        }, 1000);
      }          
    }
    
  }          
        refreshInterval = setInterval( update, $autoSlideChange);    
});


refreshInterval = setInterval( update, $autoSlideChange);

if ($setSlideHeights == true){
setTheHight();
}

function update(){    
      moveRight();
}

// height doesnt get set sometimes so just makeing sure it does here.
if ($setSlideHeights == true){
  refreshIntervalHeights = setInterval( goDoSetHeights, 11000);
  function goDoSetHeights(){ 
    setTheHight();
  }
}
  
 });



</script>

<style type="text/css">
#basicSliderOuter {
  position: relative; 
  max-width: 1140px;   
} 

#basicSlider {
  position: relative;
  overflow: hidden;
  margin: 0px auto 0 auto; 
  /*background: #20565a;*/
}

#basicSlider ul {
  position: relative;
  margin: 0;
  padding: 0;
  list-style: none;
}

#basicSlider ul > ul {
    /*custom styles*/
  position:relative;  
  min-height:650px;
}

#basicSlider .transOverlay {
    /*custom styles*/
  position:absolute;
  top:0;
  left:0;  
  background: url(<?php echo $this->getThemePath()?>/images/spark/overlayTranBlack.png);
  width:100%;
  height:100%;
}

#basicSlider > ul li {
  position: relative; 
  display: block;
  float: left;
  margin: 0;
  padding: 0;
  max-width: 1140px;    
  text-align: left; 
  /* min-height: 650px; */
}

.inside-slide {
  width: 100%;
}

.inside-slide p {
  font-size: 24px;
  line-height: 38px;
  text-align: center;
  font-family: "museo",serif;
  color: #fff;
  margin: 23px 0 0px;
  font-weight: 300;
  display: none;
}
.inside-slide p.theName { display: block; }
p.theName span {font-weight: 700;}
.inside-slide a p {
background: #f2797f;
display: inline-block;
padding: 9px 30px;
margin-top: 20px !important;
font-family: "museo",serif;
font-weight: 500 !important;
-webkit-border-radius:5px;
   -moz-border-radius:5px;
        border-radius:5px;
}
p.theName {
font-family: "museo",serif;
color: #fff; 
 font-weight: 300;
 font-size: 40px;
 margin-bottom: 12px !important;
}
#basicSlider ul li .inside-slide {
  padding: 187px 19.5%;
  z-index: 1;
  position: absolute;
  top: 101px;
  text-align: center;
  background: url(images/servicesSparks.png);
  background-repeat: no-repeat;
  background-position: 50% 50%;
}
div.control_prev, div.control_next {
position: absolute;
top: 25%;
margin: 12px;
z-index: 999;
display: block;
width: auto;
height: 74px;
padding: 0 2% 0 2%;
color: #add138;
text-decoration: none;
font-weight: 900;
font-size: 47px;
opacity: 1;
cursor: pointer;
/* background: #000; */
border-radius: 36px !important;
-moz-border-radius: 36px !important;
border-radius: 36px !important;
}
div.control_prev, div.control_next {
  display:none;
}
div.control_prev {
  left: -30px;
  
}
div.control_next {
  right: -30px;
  
}
div.control_prev:hover, div.control_next:hover {
  opacity: 1;
  -webkit-transition: all 0.2s ease;  
}
.slideBtns{
    margin-top:2px;
    height: 9px !important;
    width: 9px !important;
    margin-top: 12px !important;
}
#slideBtns {
 position:absolute;
 bottom: 63px;
 left: 60px;
}
#slideBtns span {
  cursor: pointer;
  margin: 10px 8px 8px 0;
  background: #fff;
  border-radius: 10px;
  display: block;
  height: 13px;
  width: 13px;
  float: left;
}

@media (max-width: 1310px) {
  div.control_prev {
    left: 10px;    
  }
  div.control_next {
    right: 10px;    
  }
  

}
@media (max-width: 1199px) { 
  #basicSlider ul li .inside-slide {    
    top: 62px;    
  }
}
@media (max-width: 1079px) {
  #basicSlider ul li .inside-slide {
   
   
  }
}
@media (max-width: 991px) {
  .inside-slide p {
  font-size: 23px;
  line-height: 32px;
  margin: 13px 0 0px;
  }
  p.theName {
    font-size: 27px !important;
    margin-top: 26px !important;
  }
  #basicSlider ul li .inside-slide {
    top: -18px;
    background: none;
  }

}
@media (max-width: 814px) {
  div.control_prev, div.control_next {
    opacity: 0;
  }
  #leftIcon {

  left:35px;
  }
  #rightIcon {

    right:35px;
   
  }
}

@media (max-width: 710px) {
  .transOverlay {
    width: 100% !important;
    height: 100% !important;
  }
  #basicSlider {
    height: auto !important;
    /*background:#20575b;*/
  }
  #basicSlider ul li .inside-slide {   
    top: 100px;
    padding: 0px;
  }
  div#basicSlider img {
    /*display: none;*/
  }
}

</style>
        <!-- end hardcode -->


        <div class="tagsHere">
          <?php 
            $a = new Area ('tag');  $a->display($c); 
          ?> 
        </div>

      </div> <!-- heightWrap -->

        <div class="greenOverlay">

            <div class="container setHeight">
              <?php     
             // using backstretch?
             //$this->inc('inc/store/backstretch.php');
             ?> 

              <div class="col-md-5">
                
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
                         <img class="myLogo" src="<?php echo $this->getThemePath()?>/images/logo.png" alt="<?php echo SITE?> logo">              
                        <?php if($c->getCollectionID() != HOME_CID) { ?> 
                        </a>
                        <?php } ?>
                    </div>
                  </div>

              </div>  <!-- logo -->

           
              <div class="col-md-7 colRight remove-add">        
                  <?php 
                    $a = new GlobalArea ('Header Nav');  $a->display($c); 
                  ?>
              </div> 


          </div><!-- container -->
      
      </div> <!-- greenOverlay -->
    </div> <!-- container -->


    <div style="display:none" class="thisPageInfo">
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
