<?php defined('C5_EXECUTE') or die(_("Access Denied.")); 
  $home = Page::getByID(HOME_CID); // get home id
  $linkedin = $home->getAttribute('linked_in'); // get whats contained in the attribute
  $facebook = $home->getAttribute('facebook');
  $twitter = $home->getAttribute('twitter');
  $pinterest = $home->getAttribute('pinterest');
?>

 <div class="social-block-original">
          <div class="social-block-inner">
            <div class="social-icons">
              <ul>

              	<?php if($twitter !="") { ?>
                <li class="twitter">                  
                    
                    <a href="<?php if($twitter !="") { echo $twitter;} else {echo "#";}?>" target="_blank">Twitter</a>             
               
                </li>
               <?php } ?>

                <?php if($facebook !="") { ?>
                <li class="facebook">                
                    
                    <a href="<?php if($facebook !="") { echo $facebook;} else {echo "#";}?>" target="_blank">Facebook</a>                  
                
                </li>
                <?php } ?>

                <?php if($linkedin !="") { ?>
                <li class="linkedin">                 
                    
                    <a href="<?php if($linkedin !="") { echo $linkedin;} else {echo "#";}?>" target="_blank">LinkedIN</a>                   
          
                </li> 
                <?php } ?>

                <?php if($pinterest !="") { ?>
                <li class="pinterest">
                    <a href="<?php if($pinterest !="") { echo $pinterest;} else {echo "#";}?>" target="_blank">Pinterest</a> 
                </li>
                <?php } ?>









               <!--  <li class="youtube">
                <a href="http://www.twitter.com/#" target="_blank">YouTube</a>
                </li>

                <li class="googleplus">
                <a href="http://www.twitter.com/#" target="_blank">Google +r</a>
                </li>

                <li class="pinterest">
                <a href="http://www.twitter.com/#" target="_blank">Pinterest</a>
                </li>

                <li class="paypal">
                <a href="http://www.twitter.com/#" target="_blank">Paypal</a>
                </li>

                <li class="flickr">
                <a href="http://www.twitter.com/#" target="_blank">Flickrr</a>
                </li>

                <li class="vimeo">
                <a href="http://www.twitter.com/#" target="_blank">Vimeo</a>
                </li>

                <li class="tumblr">
                <a href="http://www.twitter.com/#" target="_blank">Tumblr</a>
                </li>

                <li class="orkut">
                <a href="http://www.twitter.com/#" target="_blank">Orkut</a>
                </li>

                <li class="picasa">
                <a href="http://www.twitter.com/#" target="_blank">Picasa</a>
                </li>

                <li class="skype">
                <a href="http://www.twitter.com/#" target="_blank">Skype</a>
                </li>

                <li class="html5">
                <a href="http://www.twitter.com/#" target="_blank">HTML 5</a>
                </li>

                <li class="rss">
                <a href="http://www.twitter.com/#" target="_blank">RSS Feed</a>
                </li> -->






               
              </ul>
            </div>
          </div>
      </div> 