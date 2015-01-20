/*@license 
  reflection.js for jQuery v1.11
  (c) 2006-2013 Christophe Beyls <http://www.digitalia.be>
  MIT-style license.

 * Bootstrap v3.0.1 by @fat and @mdo
 * Copyright 2013 Twitter, Inc.
 * Licensed under http://www.apache.org/licenses/LICENSE-2.0
 *
 * Designed and built with all the love in the world by @mdo and @fat.
*/  

$(window).load(function () {  
  // fix image reflections after its been applied in document ready below.
  $(".mainContentBg img").addClass("img-responsive").parent().css({"width":"auto","height":"auto"});
});


$(document).ready(function () { 

// mind map live image hover effects
$('.liveImages img').mouseenter(function() {

    $(this).stop().animate({
        marginTop: "-40px",
        marginBottom: "52px"
    });

}).mouseleave(function() {

     $(this).stop().animate({
        marginTop: "12px",
        marginBottom: "12px"
    }); 

});


// mind map link hover effects
$('.liveBrainLinks a').mouseenter(function() {

    $(this).stop().animate({
        marginTop: "-40px",
        marginBottom: "52px"
    });

}).mouseleave(function() {

     $(this).stop().animate({
        marginTop: "12px",
        marginBottom: "12px"
    }); 

});

//image reflections
$(".mainContentBg img").not(".trumpTopSection img").reflect({height:0.25,opacity:0.4}); 



if ($('#system-cener-body').hasClass('keyBenefits')) {

  $(".iconBenefits").css({"width":"100%"});
  $('.myLogo').bind('inview', function(event, visible) {
    if (visible) {
      $(".iconBenefits").hide(100);

    }
  });


  $('.socialMediaFooter').bind('inview', function(event, visible) {
    if (visible) {
      $(".iconBenefits").show(1700);

    }
  });

}

//////////////////// gtracks homepage form
$("#gtrackContactUsForm").submit(function() {
$('#ajaxResponse2').html("<p class='scriptReturn'><span class='f700 footertextRed'>Loading... </span></p>").show();

var yourName = $("#gtrackContactUsForm").find('input[name="yourName"]').val();
var yourEmail = $("#gtrackContactUsForm").find('input[name="yourEmail"]').val();
var telNumber = $("#gtrackContactUsForm").find('input[name="telNumber"]').val();
var NumVehicles1 = $("#gtrackContactUsForm").find('input[name="NumVehicles1"]').val();
var NumVehicles2 = $("#gtrackContactUsForm").find('input[name="NumVehicles2"]').val();
var ccm_token = $('#gtrackContactUsForm').find('input[name="ccm_token"]').val(); // gtrackContactUsForm_ajax

    $.ajax({
        type: "POST",
        url: $tool_url_gtrackHomePageForm,
        data: {yourName: yourName, yourEmail: yourEmail, telNumber: telNumber, NumVehicles1: NumVehicles1, NumVehicles2: NumVehicles2, ccm_token: ccm_token},
        dataType : "json",
        success: function(response) { 
            console.log(response);

              alert(response);
           // $('#ajaxResponse2 p span').html(response).fadeIn(900);        

        },
        error: function () {
            //$('#ajaxResponse2 p span').html("Some problem fetching data. Please try again.").fadeIn(900);
            alert("Some problem fetching data. Please try again.");
        }
       
    }); //end ajax
  
return false; // avoid to execute the actual submit of the form.
});


// animate the navigation
$('.sf-menu').css({"opacity":"0"});

  $('.sf-menu').animate({ 
      opacity: 0.9
  }, 3000);

// how to clone nodes to other parts of the node tree.
var PageInfo = $("<div />").append($(".thisPageInfo").clone()).html();          
$("#system-cener-body").prepend(PageInfo); // now place the good where we want them to go    
$(".headerSass .thisPageInfo").remove(); // now remove the old one 

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

/////////////////////////////////////////////////////////////////////////////

//lets set the footer up so that its allways at the bottom of the page.
if ($('html').hasClass('oldie')) { } else {// if its not old IE
$("#system-theme-footer").hide(); // stop the node flash
var noflash = 0;
window.setInterval(function(){
  noflash++;
  var headerHeight = $("#system-header").height();
  var cenerBodyHeight = $("#system-cener-body").height();
  var themeFooterHeight = $("#system-theme-footer").height();
  var allHeights = headerHeight + cenerBodyHeight + themeFooterHeight;
  var bodyHeight = $(".C5wrap").height();
  var vwptHeight = $(window).height();  

// snap the footer if ...
  if (vwptHeight >= bodyHeight) {   
     $("#system-theme-footer").css("position","absolute").css("bottom","0").css("width","100%");
     
     if (noflash == 1) {
      $("#system-theme-footer").fadeIn(70);
     }
        if (allHeights >= vwptHeight) {
          $("#system-theme-footer").css("position","relative").css("bottom","0").css("left","0").css("margin-left","0");
        }   
  }
  else {
    $("#system-theme-footer").css("position","relative").css("bottom","0").css("left","0").css("margin-left","0");
     if (noflash == 1) {
      $("#system-theme-footer").fadeIn(70);
     }
  }

}, 600);
}

}); // document ready


////////////////////////////////////////////////////////////////////////////////////////////

// handle navigation effects
$(document).ready(function () {
  $('.has-dropdown > a').removeAttr("href").removeClass("transition").css("cursor","alias");  
  
  $(".transition").click(function(event){

    event.preventDefault();
    linkLocation = this.href;
    $('.modal-gif').fadeIn(30);
    setTimeout(function() {
      $("body").fadeOut(900, redirectPage);  
    }, 500); 
      
  });  
    
  function redirectPage() {
    window.location = linkLocation;    
  }    
   $('.C5wrap').fadeIn(900);
$('.modal-gif').fadeOut(850);
});

////////////////////////////////////////////////////////////////////////////////////////////

// set the height of nodes to be the same 
/*$(window).load(function () {

//if($( window ).width() > 992 ) { //only do it lower than this width

  setTimeout(function(){      
    //console.log("It works!")
    var elementHeights = $('.mainWrap .col-md-6').map(function() {
      return $(this).height();
    }).get();

    // Math.max takes a variable number of arguments
    // `apply` is equivalent to passing each height as an argument
    var maxHeight = Math.max.apply(null, elementHeights);

    // Set each height to the max height
    $('.mainWrap .col-md-6').height(maxHeight);
  }, 1500);
//}

});*/

////////////////////////////////////////////////////////////////////////////////////////////

// this scrip will animate down to an #id from a link on an external page.
/*(function($){

var jump=function(e)
{
   if (e){
       e.preventDefault();
       var target = $(this).attr("href");
   }else{
       var target = location.hash;
   }

   $('html,body').animate(
   {
       scrollTop: $(target).offset().top
   },1000,function()
   {
       location.hash = target;
   });

}

//$('html, body').hide() // its already display none

$(document).ready(function()
{
    $('a[href^=#]').bind("click", jump);

    if (location.hash){
        setTimeout(function(){
            $('html, body').scrollTop(0).show()
            jump()
        }, 0);
    }else{
      $('html, body').fadeIn(900)
    }
});

})(jQuery)	*/