<?php defined('C5_EXECUTE') or die(_("Access Denied."));
$home = Page::getByID(HOME_CID); // get home id
$facebook = $home->getAttribute('facebook');
$twitter = $home->getAttribute('twitter');
$linkedin = $home->getAttribute('linked_in'); // get whats contained in the attribute
$googleplus = $home->getAttribute('google_plus');
$instagram = $home->getAttribute('instagram');
$pinterest = $home->getAttribute('pinterest');
?>
<a href="<?php if($facebook !="") { echo $facebook;} else {echo "#";}?>">
    <img src="<?php echo $this->getThemePath()?>/processAndBuild/stylesheets/images/facebook.png" alt="facebook"/>
</a>
<a href="<?php if($twitter !="") { echo $twitter;} else {echo "#";}?>">
    <img src="<?php echo $this->getThemePath()?>/processAndBuild/stylesheets/images/twitter.png" alt="twitter"/>
</a>
<a href="<?php if($linkedin !="") { echo $linkedin;} else {echo "#";}?>">
    <img src="<?php echo $this->getThemePath()?>/processAndBuild/stylesheets/images/linkedin.png" alt="linkedin"/>
</a>
<a href="<?php if($googleplus !="") { echo $googleplus;} else {echo "#";}?>">
    <img src="<?php echo $this->getThemePath()?>/processAndBuild/stylesheets/images/googleplus.png" alt="googleplus"/>
</a>
<a href="<?php if($instagram !="") { echo $instagram;} else {echo "#";}?>">
    <img src="<?php echo $this->getThemePath()?>/processAndBuild/stylesheets/images/instagram.png" alt="instagram"/>
</a>
<a href="<?php if($pinterest !="") { echo $pinterest;} else {echo "#";}?>">
    <img src="<?php echo $this->getThemePath()?>/processAndBuild/stylesheets/images/pinterest.png" alt="pinterest"/>
</a>