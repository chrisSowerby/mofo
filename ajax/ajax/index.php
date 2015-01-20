<script src="http://code.jquery.com/jquery-latest.min.js"
        type="text/javascript"></script>
<style type="text/css">
.container {
  max-width:1140px;
  margin:0 auto;
}
#basicSliderOuter {
  position: relative; 
  max-width: 1140px; 
  margin-bottom:20px;  
} 

#basicSlider {
  position: relative;
  overflow: hidden;
  margin: 20px auto 0 auto; 
  border-radius: 1px;  
  border: solid 4px #add138;
  border-right: none;
  border-left: none;
  background: #ededed;
}
#leftIcon, #rightIcon {
  position:absolute;
  top:20px;
  width:68px;
  height:54px;
}
#leftIcon {
  background: url(http://surgemarketingsolutions.co.uk/themes/theme_by_chris_sowerby/img/quote1.png);
  left:90px;
}
#rightIcon {
    background: url(http://surgemarketingsolutions.co.uk/themes/theme_by_chris_sowerby/img/quote2.png);
  right:90px;
   top:50px;
}
#basicSlider > ul {
  position: relative;
  margin: 0;
  padding: 0;
  list-style: none;  
}

#basicSlider > ul li {
  position: relative; 
  display: block;
  float: left;
  margin: 0;
  padding: 0;
  max-width: 1140px;    
  text-align: left; 
}

.inside-slide p {
  font-size:16px;
  text-align:center; 
  color:#434343;
  font-family: "tahoma",arial,sans-serif;
  font-style:italic;
  margin: 14px 0 !important;
}
p.theName {
  color:#add138;
  font-style:normal;
}
#basicSlider ul li .inside-slide {
  padding:5px 15%;
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
  box-shadow: 0 0 8px 1px #f2797f;
}
#slideBtns span {
  cursor:pointer;
  padding:5px 10px;
  margin:10px 10px 10px 0;
  background:#add138;
}

@media (max-width: 1310px) {
  div.control_prev {
    left: 10px;    
  }
  div.control_next {
    right: 10px;    
  }
  
  #basicSlider ul li .inside-slide {
    padding: 5px 24%;
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
</style>

<div id="sliderHere">
  
   
</div>


<script type="text/javascript">

//jquery by helpchrisplz - chris sowerby
function startSliderNow() {  

$autoSlideChange = 3000;
$childNumbers = 0; // this must be 0
$useSlideBtns = true;
$slideEffect = "fade"; // fade or slide
var refreshInterval;

if ($useSlideBtns == true) {  
  $('#basicSlider > ul li').each(function(){  
    $childNumbers++;   

    var addSlideBtn = "<span class='slidechildNumber"+$childNumbers+"'>"+$childNumbers+"</span>";

    //#slideBtns span
    $(this).addClass('slidechildNumber'+$childNumbers);
   $('#slideBtns').append(addSlideBtn);
  });
  $("#slideBtns span:nth-child(1)").addClass("slideBtns");
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
   
   slideHeight = $('#basicSlider > ul > li:nth-child(2) > ul').height() + 20;
   sliderUlWidth = slideCount * slideWidth;
  
  $('#basicSlider').css({ width: slideWidth, height: slideHeight });
  
  $('#basicSlider > ul').css({ width: sliderUlWidth, marginLeft: - slideWidth });
  
  
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
  slideHeight = $('#basicSlider > ul > li:nth-child(2) > ul').height() + 20;
  $('#basicSlider').animate({            height: slideHeight        }, 100);
  
} 
    

    function moveLeft(no) {        
        if (!no) {
          doNextBtnLeft();
        }  
        if ($slideEffect == "fade") {
          $('#basicSlider > ul').animate({ 
              opacity: 0.0
          }, 400, function () {
              $('#basicSlider > ul li:last-child').prependTo('#basicSlider > ul');
              $('#basicSlider > ul').css('opacity', '1.0');
          });
        }
        if ($slideEffect == "slide") {
          $('#basicSlider > ul').animate({
              left: + slideWidth
          }, 400, function () {
              $('#basicSlider > ul li:last-child').prependTo('#basicSlider > ul');
              $('#basicSlider > ul').css('left', '0');
          }); 
        }
      
      setTimeout(function(){ 
        setTheHight();
      }, 420);      
    };

    function moveRight(no) { 
        if (!no) {
          doNextBtnRight();
        } 
      
        if ($slideEffect == "fade") {
          $('#basicSlider > ul').animate({
             opacity: 0.0           
          }, 400, function () {
              $('#basicSlider > ul li:first-child').appendTo('#basicSlider > ul');          
              $('#basicSlider > ul').css('opacity', '1.0');          
          }); 
        }
      
        if ($slideEffect == "slide") {
          $('#basicSlider > ul').animate({             
             left: - slideWidth
          }, 400, function () {
              $('#basicSlider > ul li:first-child').appendTo('#basicSlider > ul');          
              $('#basicSlider > ul').css('left', '0');          
          });
        }

      
      setTimeout(function(){
        setTheHight(); 
      }, 420);          
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
        }, 500);
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
        }, 500);
      }          
    }
    
  }          
        refreshInterval = setInterval( update, $autoSlideChange);    
});


refreshInterval = setInterval( update, $autoSlideChange);

function update(){    
      moveRight();
}

}




$("#sliderHere").load("http://tseoc.co.uk/ajax/slider.php .container", function(){
     /* new html now exists*/
    startSliderNow();

}).delay(800).slideDown('slow');


</script>