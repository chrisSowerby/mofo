<?php       defined('C5_EXECUTE') or die(_("Access Denied."));
/*how to get url to tools files for AJAX calls*/
  $tool_helper = Loader::helper('concrete/urls');
  //$tool_url = $tool_helper->getToolsURL('blogsubscribe');
  $tool_url_gtrackHomePageForm = $tool_helper->getToolsURL('gtrackHomePageForm');
   
  
   
?> 
<script type="text/javascript">
	$tool_url_gtrackHomePageForm = "<?php echo $tool_url_gtrackHomePageForm;?>";
	// set php varable in javascript so that we can use it in the ajax calls 
</script>
<script src="<?php echo $this->getThemePath()?>/processAndBuild/js/build/dest-min.js"></script>

<!--[if lt IE 9]> 
<script type="text/javascript"> 
var $buoop = {vs:{i:8,f:3.6,o:10.6,s:4,n:9}} 
$buoop.ol = window.onload; 
window.onload=function(){ 
 try {if ($buoop.ol) $buoop.ol();}catch (e) {} 
 var e = document.createElement("script"); 
 e.setAttribute("type", "text/javascript"); 
 e.setAttribute("src", "http://browser-update.org/update.js"); 
 document.body.appendChild(e); 
} 
</script>
<![endif]-->
  