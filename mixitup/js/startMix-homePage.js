$(function(){   
  $activeOrder = 0;

  // how to move nodes to other parts of the node tree.
  // this is the final submit btn. it needs to come out at the bottom not the top. 
  $('#Container').append($('.outputPostOptions'));

  //////////////////////////////////////////////////////////
  $('#reset-back').click(resetMe);
  function resetMe() { 
      $('.mix').removeClass("activeMix");  
      $('.mix').first().addClass("activeMix"); 
      // put it back to the start

      // put all select options back to default
      $('.mix select').prop('selectedIndex', 0);
      // put all checkboxes back to default. 
      $('.mix input').attr('checked', false); // Unchecks it


     $(".searchOptions").fadeOut(900);
     setTimeout(function(){ 
        $('#Container').mixItUp('filter','.startMix');
      }, 900);
          
      $("select").each(function(){
        this.selectedIndex=0;
      });
        // now set the text in the btn
      
    //$("#show-all").html("Show me everything!");
    $activeOrder = 0;
    return false;
  } 
  
  //////////////////////////////////////////////////////////
  $('#show-all').click(showMeEverything);
  function showMeEverything() {   
    if ($activeOrder == 0) {
      console.log("redirect to search page posting all")
    } else {      
      var categoryUrl = $('.mix[data-order=1]').attr("data-href"); 
      window.location.href = categoryUrl; 
    }    
    return false;
  }  

  //////////////////////////////////////////////////////////
  $('#back-one').click(backOne);
  function backOne() {   
    
    // put it back one step
    // put the last selected select option back.
    if ($activeOrder != 0) {      
      var backOne = '.mix[data-order='+$activeOrder+']';

      // put current and last mix select options back to default
      $(backOne+' select, .activeMix select').prop('selectedIndex', 0);
      // put current and last checkboxes back to default. 
      $(backOne+' input, .activeMix input').attr('checked', false); // Unchecks it

      var classes = $(backOne).attr("class").replace('mix ','');
      classes = "."+classes.split(' ')[0]; // this will only bring back the fist class if there is more than one as it will break the filter


      // remove the order from the last mix
      //$(backOne).removeAttr("data-order");
      $(".mix").removeClass("backOneActive");
      $(backOne).addClass("backOneActive");

      // unset the data-order and data-picked as we are now back one level.
      $(backOne).removeAttr("data-picked");//.removeAttr("data-picked");

      $activeOrder--; 
      /*reset backOne as active order has now changed*/
      var backOne = '.mix[data-order='+$activeOrder+']';
      // now set the text in the btn      
      var selectedText = $(backOne).attr("data-picked");
      if(typeof selectedText != 'undefined') {
        $("#show-all").html("Show me all of: "+selectedText);
      } else {
        //$("#show-all").html("Show me everything!");
      }
      if ($(".mix").first().hasClass("backOneActive")) { // if we are back to the start 
          $(".searchOptions").fadeOut(900);
      }
      setTimeout(function(){ 
        $('#Container').mixItUp('filter', classes);
      }, 900);
      
    }
    return false;
  } 




  $('.postOptions').click(goToThePub);
  function goToThePub() { 

    var holderArray = [];
    $(".lastMix select, .lastMix input").each(function(){   
      if ($(this).is(".lastMix select")) {  
        if (this.selectedIndex != 0) {   
        //console.log(this)         
          holderArray.push({ 
              name: $(this).children("option:selected").attr("data-dropdownclass"), 
             value: $(this).children("option:selected").attr("data-value")
          });
        }
      } 
      if ($(this).is(".lastMix input")) {  
        if (this.checked) {   
        //console.log(this)         
          holderArray.push({ 
              name: $(this).attr("data-dropdownclass"), 
             value: $(this).attr("value")
          });
        }
      }
    });

    holderArray = jQuery.param(holderArray); // make the array work in the URL wen sending as GET
    console.log(holderArray)
    // we should see something like this...
    //?theshape=.theshapesquare&productcolours=.productcoloursred&textonly=.textonly1

    //redirect code
    var categoryUrl = $('.mix[data-order=1]').attr("data-href");
    window.location.href = categoryUrl+"?"+holderArray;
   return false;
  } 





  
  //////////////////////////////////////////////////////////
  $('select').on('change', function(){
    if (!$(this).parent().parent().hasClass("lastMix")) { 
        //lastMix is uses for when we have more than one option to select before posting.
        
        var grabUrl = $('.mix select option[value="' + this.value + '"]').attr("data-href"); 
        //alert(grabUrl);

        $('.mix').removeClass("activeMix");       
        $('#Container '+this.value).addClass("activeMix");
        $('#Container').mixItUp('filter', this.value);  
        $activeOrder++;
        var selectedText = $(this).find("option:selected").text();        
        $('.mix option:contains('+selectedText+')').closest('.mix').attr('data-order', $activeOrder).attr('data-picked', selectedText).attr('data-href', grabUrl); 
        
        // now set the text in the btn
        $("#show-all").html("Show me all of: "+selectedText);
        $(".searchOptions").fadeIn(900);
        
    }
  });
 
  // Instantiate MixItUp      
  $('#Container').mixItUp({
    load: {
      filter: '.startMix' 
    },
  animation: {
    duration: 570,
    effects: 'fade scale(1.16) stagger(128ms)',
    easing: 'cubic-bezier(0.47, 0, 0.745, 0.715)'
  },
    callbacks: {
      onMixFail: function(){
        alert("fail");   
      }   
    } 
  });
});