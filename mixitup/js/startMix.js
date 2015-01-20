// To keep our code clean and modular, all custom functionality will be contained inside a single object literal called "checkboxFilter".
var checkboxFilter = {
  
  // Declare any variables we will need as properties of the object
  
  $filters: null,
  $reset: null,
  groups: [],
  outputArray: [],
  outputString: '',
  
  // The "init" method will run on document ready and cache any jQuery objects we will need.
  
  init: function(){
    var self = this; // As a best practice, in each method we will asign "this" to the variable "self" so that it remains scope-agnostic. We will use it to refer to the parent "checkboxFilter" object so that we can share methods and properties between all parts of the object.
    
    self.$filters = $('#Filters');
    self.$reset = $('#Reset');
    self.$container = $('#Container');
    
    self.$filters.find('fieldset').each(function(){
      self.groups.push({
        $inputs: $(this).find('input'),
        active: [],
        tracker: false
      });
    });
    
    self.bindHandlers();
  },
  
  // The "bindHandlers" method will listen for whenever a form value changes. 
  
  bindHandlers: function(){
    var self = this;
    
    self.$filters.on('change', function(){
      self.parseFilters();
    });
    
    self.$reset.on('click', function(e){
      e.preventDefault();
      self.$filters[0].reset();
      self.parseFilters();
    });
  },
  
  // The parseFilters method checks which filters are active in each group:
  
  parseFilters: function(){
    var self = this;
 
    // loop through each filter group and add active filters to arrays
    
    for(var i = 0, group; group = self.groups[i]; i++){
      group.active = []; // reset arrays
      group.$inputs.each(function(){ 
        $(this).is(':checked') && group.active.push(this.value);
      });
      group.active.length && (group.tracker = 0);
    }
    
    self.concatenate();
  },
  
  // The "concatenate" method will crawl through each group, concatenating filters as desired:
  
  concatenate: function(){
    var self = this,
      cache = '',
      crawled = false,
      checkTrackers = function(){
        var done = 0;
        
        for(var i = 0, group; group = self.groups[i]; i++){
          (group.tracker === false) && done++;
        }

        return (done < self.groups.length);
      },
      crawl = function(){
        for(var i = 0, group; group = self.groups[i]; i++){
          group.active[group.tracker] && (cache += group.active[group.tracker]);

          if(i === self.groups.length - 1){
            self.outputArray.push(cache);
            cache = '';
            updateTrackers();
          }
        }
      },
      updateTrackers = function(){
        for(var i = self.groups.length - 1; i > -1; i--){
          var group = self.groups[i];

          if(group.active[group.tracker + 1]){
            group.tracker++; 
            break;
          } else if(i > 0){
            group.tracker && (group.tracker = 0);
          } else {
            crawled = true;
          }
        }
      };
    
    self.outputArray = []; // reset output array

    do{
      crawl();
    }
    while(!crawled && checkTrackers());

    self.outputString = self.outputArray.join();
    
    // If the output string is empty, show all rather than none:
    
    !self.outputString.length && (self.outputString = 'all'); 
    
    //console.log(self.outputString); 
    
    // ^ we can check the console here to take a look at the filter string that is produced
    
    // Send the output string to MixItUp via the 'filter' method:
    
    
    
    
    
  
    
// helpchrisplz edits
    
    var extraDropDownColours = [];
    $(".dropdownSort").each(function(){      
      extraDropDownColours.push($("option:selected", this).val().substring(1));      
    });
   
    $.each(extraDropDownColours, function(index, item) {
    //alert(item);    
      if (item != "select") { // if its not the top option
          
        if(self.outputString == "all"){
          self.outputString += ',.' +item.toLowerCase(); // as its the first item just add the comma to end and dot
        } else {
          // there must be more that one option selected now...
            
          // Removes all of the commas within your string and ech part is now in an array that we can loop over
          var suckIt = self.outputString.split(','); 

          // Iterate through each value
          self.outputString = "";
          for(var i = 0; i < suckIt.length; i++){  
            self.outputString += suckIt[i] + '.' + item.toLowerCase() + ',';   
          }    

          if (self.outputString.substring(self.outputString.length-1) == ",")
          {
            self.outputString = self.outputString.substring(0, self.outputString.length-1);
          }    

        }
      }

     }); //each
//  end helpchrisplz edits
    
    
    
    
    
    
    if(self.$container.mixItUp('isLoaded')){
      console.log(self.outputString)
      self.$container.mixItUp('filter', self.outputString);
      
    }
  }
};
  
// On document ready, initialise our code.

$(function(){
      
  // Initialize checkboxFilter code
      
  checkboxFilter.init();
      
  // Instantiate MixItUp
      
  $('#Container').mixItUp({
    pagination: {
      limit: 9
    },
    controls: {
      enable: true // price ascending ....
 
    },
    animation: {
      easing: 'cubic-bezier(0.86, 0, 0.07, 1)',
      duration: 600
    },
    load: {
      //http://mofo.co.uk.88-208-248-91.tseoc.co.uk/letter-heads/?productcolours=.productcoloursred&textonly=.textonly1
      //http://mofo.co.uk.88-208-248-91.tseoc.co.uk/logos/?theshape=.theshapesquare&productcolours=.productcoloursred&textonly=.textonly1
      filter : (function(){ 
        // Read a page's GET URL variables and return them as an associative array.
       
 
  // get the options that we just set and pass them to mixitup 
/*    var extraDropDownColours = [];
    $(".dropdownSort").each(function(){
      extraDropDownColours.push($("option:selected", this).val().substring(1));      
    });
    //checkboxFilter.concatenate();
    //self.concatenate(); // get the checkbox options before we start. If nothing is found self.outputString will be all   
    console.log("self.outputString "+self.outputString)
    self.outputString = "all";
    $.each(extraDropDownColours, function(index, item) {      
       
      if (item != "select") { // if its not the top option
          
        if(self.outputString == "all"){
          self.outputString += ',.' +item.toLowerCase(); // as its the first item just add the comma to end and dot
        } else {
          // there must be more that one option selected now...
            
          // Removes all of the commas within your string and ech part is now in an array that we can loop over
          var suckIt = self.outputString.split(','); 

          // Iterate through each value
          self.outputString = "";
          for(var i = 0; i < suckIt.length; i++){  
            self.outputString += suckIt[i] + '.' + item.toLowerCase() + ',';   
          }    

          if (self.outputString.substring(self.outputString.length-1) == ",")
          {
            self.outputString = self.outputString.substring(0, self.outputString.length-1);
          }    

        }
      }*/

    // }); //each
//  end helpchrisplz edits


        if (self.outputString) {
        console.log(self.outputString);
        return self.outputString;
        } 

      })()
    }
  });    
});
$(document).ready(function(){

var timeline = new TimelineMax({repeat:-1, repeatDelay:0.5});
timeline.append(TweenMax.staggerTo(
  $('.objLoader'), 
  2, 
  {
    left:$('body').width()+$('.objLoader').width(), 
    rotation:0,
    ease:SlowMo.ease.config(0.2, 0.4)
  },0.15)
);  

$('#Container').one('mixEnd', function(e, state){
        var vars = [], hash;
        var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');    

        for(var i = 0; i < hashes.length; i++)
        {
            hash = hashes[i].split('=');   
            //set the chackboxes to the valuses we have got from the address bar.    
            $('#Filters .checkbox input[value="' + hash[1] + '"]').trigger('click');            
            //console.log("terms: "+hash[0]);        
            //console.log("option: "+hash[1]);            
        }

       setTimeout(function(){ 
         for(var i = 0; i < hashes.length; i++)
        {
            hash = hashes[i].split('=');   
            //set the select options to the valuses we have got from the address bar.           
            $('#Filters option[value="' + hash[1] + '"]').prop('selected', 'selected').trigger('change');            
            //console.log("terms: "+hash[0]);        
            //console.log("option: "+hash[1]);            
        }
          setTimeout(function(){
            $(".objLoader, p.waitForIt").fadeOut(500);
            setTimeout(function(){
              $(".mixInner").animate({ 
                  opacity: 1
              }, 800);   
            }, 510);          
          }, 1200); 
        }, 2300);

});
/*$(".mixInner").animate({ 
                  opacity: 1
              }, 800);*/ 
});
//pagination
  window.setInterval(function(){ 
      if ( $('.pager-list').children().length > 0 ) {
        $(".pager-list").show();
        //alert("1");
      } else {
        $(".pager-list").hide();       
        //alert("2");
      }
    }, 600);