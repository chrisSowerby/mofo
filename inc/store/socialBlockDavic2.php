<?php defined('C5_EXECUTE') or die(_("Access Denied.")); 
  $home = Page::getByID(HOME_CID); // get home id
  $linkedin = $home->getAttribute('linked_in'); // get whats contained in the attribute
  $facebook = $home->getAttribute('facebook');
  $twitter = $home->getAttribute('twitter');
?>

 <div class="social-block fRight socialMarginFix">
          <div class="social-block-inner fRight ">
            <div class="social-icons">
              <ul>
              	<?php if($twitter !="") { ?>
                <li class="twitter">                  
                    
                    <a href="<?php if($twitter !="") { echo $twitter;} else {echo "#";}?>" target="_blank">Twitter</a>             
               
                </li>
               <?php } ?>             
              </ul>
            </div>
          </div>
      </div> 