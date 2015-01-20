<?php defined('C5_EXECUTE') or die(_("Access Denied.")); 
  $home = Page::getByID(HOME_CID); // get home id
  $linkedin = $home->getAttribute('linked_in'); // get whats contained in the attribute
  $facebook = $home->getAttribute('facebook');
  $twitter = $home->getAttribute('twitter');
?>

 <div class="social-block LeftSocialMarginFix">
          <div class="social-block-inner fLeft">
            <div class="social-icons">
              <ul>
                <?php if($facebook !="") { ?>
                <li class="facebook">                
                    
                    <a href="<?php if($facebook !="") { echo $facebook;} else {echo "#";}?>" target="_blank">Facebook</a>                  
                
                </li>
                <?php } ?>               
              </ul>
            </div>
          </div>
      </div> 