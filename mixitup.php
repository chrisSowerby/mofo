<?php   defined('C5_EXECUTE') or die(_("Access Denied.")); $this->inc('inc/topIncludes.php'); ?>

<div id="system-cener-body" class="pageType-default pageType-mix">     
  <div class="container">



<!-- do not remove this -->
<style>
@media (max-width: 991px){ 
    .pageType-default > .container {
      width: 100% !important;
    }
}
 @-webkit-keyframes thePulse {
  0% { -webkit-box-shadow: 0 0 0px #000; }  
  50% {  -webkit-box-shadow: 0 0 10px #000; }
  100% {  -webkit-box-shadow: 0 0 0px #000; }
}
@-moz-keyframes thePulse {
  0% { -moz-box-shadow: 0 0 0px #000; }  
  50% {  -moz-box-shadow: 0 0 10px #000; }
  100% {  -moz-box-shadow: 0 0 0px #000; }
}
@-o-keyframes thePulse {
  0% { -o-box-shadow: 0 0 0px #000; }  
  50% {  -o-box-shadow: 0 0 10px #000; }
  100% {  -o-box-shadow: 0 0 0px #000; }
}
@keyframes thePulse {
  0% { box-shadow: 0 0 0px #000; }  
  50% {  box-shadow: 0 0 10px #000; }
  100% {  shadow: 0 0 0px #000; }
}
</style>
<?php   
//$this->inc('mixitup/js/loadjscssfiles.php');
Loader::model('page_list');
$nh = Loader::helper('navigation');
$th = Loader::helper('text');
$ih = Loader::helper('image');

function testThisRange($int,$min,$max){
return ($int>$min && $int<$max);
}
//sort between these numbers
$page = Page::getCurrentPage();
$mediumStart = $page->getCollectionAttributeValue('medium_price_range_start');
$mediumEnd = $page->getCollectionAttributeValue('medium_price_range_end');
$smallMin = 0;
$smallMax = $mediumStart - 1;
$mediumMin = $mediumStart;
$mediumMax = $mediumEnd;
$largeMin = $mediumEnd + 1;
$largeMax = 99999999999999;

// The handle of the sorting set
$sortingSet = "sorting_options";
// The handle of the product display elements set (things that show within the card)
$productDisplaySet = "product_display_elements";
// the max width and height of the product image
$productImageW = 350;
$productImageh = 125;
//should it be cropped?
$cropOption = FALSE; // or TRUE or FALSE

/*echo "smallMin: ".$smallMin."<br>";
echo "smallMax: ".$smallMax."<br><br>";
echo "mediumMin: ".$mediumMin."<br>";
echo "mediumMax: ".$mediumMax."<br><br>";
echo "largeMin: ".$largeMin."<br>";
echo "largeMax: ".$largeMax."<br><br>";*/


/*$ak = CollectionAttributeKey::getByHandle('not_visable'); // check if we have this attribute installed
if ( is_null($ak) || !is_object($ak) || !intval($ak->getAttributeKeyID()) ) {$not_visable = "not installed";}*/
//print_r($ak);
//echo $not_visable."---------------------------------------------";


// get attributes set handle.
//Database::setDebug(true);
/*$db = Loader::db();
$attrHandle = "not_visible_in_search";
$attrAkID = $db->getOne("SELECT akID FROM AttributeKeys WHERE akHandle LIKE ? " , array($attrHandle) );
$attrAsID = $db->getOne("SELECT asID FROM AttributeSetKeys WHERE akID LIKE ? " , array($attrAkID) );
$attrAsHandle = $db->getOne("SELECT asHandle FROM AttributeSets WHERE asID LIKE ? " , array($attrAsID) );*/
//Database::setDebug(false);
// $attrAsHandle now has the attributes set name in it.
?>

<script>
$(document).ready(function() {
//loadjscssfile("<?php echo $this->getThemePath()?>/mixitup/css/mixitup.css", "css", "head");
});
$(window).load(function() {
//loadjscssfile("<?php echo $this->getThemePath()?>/mixitup/js/jquery.mixitup.min.js", "js", "footer");
//loadjscssfile("<?php echo $this->getThemePath()?>/mixitup/js/jquery.mixitup-pagination.min.js", "js", "footer");
//loadjscssfile("<?php echo $this->getThemePath()?>/mixitup/js/startMix.js", "js", "footer");
});
</script>

    <div class="row mixOuter">
    <p class="waitForIt">Please wait.</p>
      <div class="objLoader"></div>
      <div class="objLoader"></div>
      <div class="objLoader"></div>
      <div class="objLoader"></div>
   

      <div class="col-md-3 mixInner marginPadding">
        
        <form class="form-inline controls clearfix" id="Filters" role="form">
          <div class="formText main-content">
            <?php $a = new Area ('Main'); $a->display($c); ?>
          </div>
          <?php
            $sortingOptions = AttributeSet::getByHandle($sortingSet); // this is the AttributeSet that holds all the attributes we need to generate the options
            $sortingOptionsAttrKeys = $sortingOptions->getAttributeKeys(); 
          
            $displayElements = AttributeSet::getByHandle($productDisplaySet);
            $displayElementsAttrKeys = $displayElements->getAttributeKeys();

            $sorting = array();
            $results = array();
            $key1 = array(); 
            $key2 = array();

            foreach($displayElementsAttrKeys as $ak) {               
                $key1[$ak->akHandle][] = $ak->atHandle;
            } 
            foreach($sortingOptionsAttrKeys as $ak) {
                $key2[$ak->akHandle][] = $ak->atHandle;
            }                     
            $merged = $key1 + $key2;           
?>
              
<?php             

              $pl = new PageList();
              $categoryPage = Page::getCurrentPage();                                 
              $pl->filterByPath($categoryPage->getCollectionPath()); // only get pages below this one.
              $pl->filterByCollectionTypeHandle("product_detail"); // only get pages with this pagetype Handle
              $pl->sortByDisplayOrder(); // the order in the site map  
              $pl->filter(false, '(ak_exclude_page_list = 0 or ak_exclude_page_list is null)'); // dont show products that have the exclude from page list attr on them           
              $pagelist = $pl->get();              
              foreach ($pagelist as $page) {
                // data specific to displaying the result
                // These attributes are for showing the mixitup tiles                
                foreach($merged as $attributeName => $ak) {
                  //echo "attribute name: ".$attributeName."<br>";                
                  foreach($ak as $type) {  
                       // echo "type: ".$type."<br><br>";     <pre> // print_r($ak);</pre>                           
                 
                      if ($type == "select") { 

                        //echo "|".$attributeName."|";
                        $theStuffInside = $page->getAttribute($attributeName); // get the name of the attribute
                        if (is_object($theStuffInside)) {
                          $foo = 1;           
                          foreach ($theStuffInside as $value) { // this is needed in the situation that a page has more than one select value 
                            if ($foo == 1) {
                                $dropdownGroup .= str_replace('_', '', $attributeName).str_replace(' ', '', $value);
                            }
                            else {
                                $dropdownGroup .= " ".str_replace('_', '', $attributeName).str_replace(' ', '', $value);
                            }
                            $foo++;                                               
                          }
                          // has been added on the page but has been removed so its still an object
                          if ($dropdownGroup == "") {$dropdownGroup = str_replace('_', '', $attributeName)."EMPTY";}
                          //echo( $dropdownGroup)."|";
                          $results["results"][$attributeName][] = $dropdownGroup;  
                          $dropdownGroup = NULL;
                        } else {
                          // no object has been added on the page before
                          if ($dropdownGroup == "") {$dropdownGroup = str_replace('_', '', $attributeName)."EMPTY";}
                          $results["results"][$attributeName][] = $dropdownGroup;  
                          $dropdownGroup = NULL;
                        }
                      }
                      if ($type == "number") {
                        $number = $page->getCollectionAttributeValue($attributeName);                        
                        if ($number == "") {$number = "EMPTY";}
                        $results["results"][$attributeName][] = str_replace('_', '', $attributeName).$number;
                      }
                      if ($type == "boolean") {
                        $boolean = $page->getCollectionAttributeValue($attributeName);                        
                        if ($boolean == "") {$boolean = "EMPTY";}                        
                        $results["results"][$attributeName][] = str_replace('_', '', $attributeName).$boolean;
                      }      
                      if ($type == "image_file") {                    
                        $img = $page->getAttribute($attributeName);                    
                        if ($img) { 
                            $file = File::getByID($img->fID);
                            $title = $file->getTitle();
                            $thumb = $ih->getThumbnail($img, $productImageW, $productImageh, $cropOption);
                            $results["results"][$attributeName][] = '<img src="'.$thumb->src.'" width="'.$thumb->width.'" height="'.$thumb->height.'" alt="'.$title.'" />';
                        }
                        else {
                            $results["results"][$attributeName][] = '<img src="'.$this->getThemePath().'/img/noImage.jpg" width="'.$thumb->width.'" height="'.$thumb->height.'" alt="no image" />';
                        }
                      } 
                    }
                  }

                  $results["results"]["link"][] = $nh->getLinkToCollection($page);
                  
                  // remove any £ or $ signs from price
                  $priceRemoveLetters = preg_replace('/[^0-9]+/', '', $page->getCollectionAttributeValue('the_price'));                              
                  if (testThisRange($priceRemoveLetters,$smallMin,$smallMax)) {
                    $results["results"]["pricerange"][] = 'pricerangelow';
                  }
                  else if (testThisRange($priceRemoveLetters,$mediumMin,$mediumMax)) {
                    $results["results"]["pricerange"][] = 'pricerangemedium';
                  }
                  else if (testThisRange($priceRemoveLetters,$largeMin,$largeMax)) {
                    $results["results"]["pricerange"][] = 'pricerangehigh';
                  }
                  else {
                    $results["results"]["pricerange"][] = 'pricerangeEMPTY';
                  }
                


                  foreach($sortingOptionsAttrKeys as $ak) {

                  ?>
                      <!-- <pre><?php // print_r($ak);?></pre> -->
                  <?php

                    // data specific to building the sorting options                                    
                    $handleNoUnderscores = str_replace('_', '', $ak->akHandle); // remove all Underscores to fix class name 
                    $theStuffInside = $page->getAttribute($ak->akHandle); // get the name of the attribute

                    //if ($ak->akName == "Price") {echo($name);} 
                  //get the options of the select                 
                    if ($ak->atHandle == "select" || $ak->atHandle == "boolean") { 
                      $sorting[$ak->akHandle]["handle"] = $ak->akHandle;
                      $sorting[$ak->akHandle]["name"] = $ak->akName;

                      $sorting[$ak->akHandle]["dropdownClass"] = $handleNoUnderscores; 
                      $sorting[$ak->akHandle]["type"] = $ak->atHandle;
                      if (is_object($theStuffInside)) {                                      
                        foreach ($theStuffInside as $value) { // this is needed in the situation that a page has more than one select value 
                            // add select value with unique class as key                   
                            $sorting[$ak->akHandle]["options"][$handleNoUnderscores.str_replace(' ', '', $value->value)] = $value->value;                   
                        }
                      }
                      else { // we must be a boolean                        
                        if ($theStuffInside) {
                         $sorting[$ak->akHandle]["options"][$handleNoUnderscores.str_replace(' ', '', $theStuffInside)] = $theStuffInside; 
                        }
                      }
                    }
                  }
              }
           ?>

<!--            <pre> 
              <?php //  print_r($sorting); ?> 
          </pre> 
           <pre> 
              <?php //  print_r($results); ?> 
          </pre>  --> 

          <?php 
          $object = json_decode(json_encode($sorting), FALSE);

          foreach($object as $data) { 
          /*
          echo $data->handle."<br>";
           
          echo $data->name."<br>";
          echo $data->dropdownClass."<br>";
          */
           
            if (count($data->options) > 0 && $data->type == "select") {

            // find out if our select was set up to allow more than one selection.
            //Database::setDebug(true);
            $db = Loader::db();
            $attrHandle = $data->handle;
            $attrAkID = $db->getOne("SELECT akID FROM AttributeKeys WHERE akHandle LIKE ? " , array($attrHandle));
            $akSelectAllowMultipleValues = $db->getOne("SELECT akSelectAllowMultipleValues FROM atSelectSettings WHERE akID LIKE ? " , array($attrAkID));
            //Database::setDebug(false);
 
              if ($akSelectAllowMultipleValues == 0) { // single selection
              ?>
                <fieldset class="dropdownSort">
                  <p class="optionsTitle"><?php echo $data->name;?>: </p>
                  <select name="<?php echo strtolower($data->dropdownClass);?>" class="form-control">
                    <option value=".select">Select</option> 
                      <?php
                        foreach($data->options as $uniqueClass => $option) {              
                            echo '<option value=".'.$uniqueClass.'">'.strtolower($option).'</option>';
                        }
                      ?>              
                    </select>
                </fieldset>
              <?php 
              } else { // can select more than one
                ?>
                  <fieldset class="checks">
                    <p class="optionsTitle"><?php echo $data->name;?>: </p>
                    <?php
                      foreach($data->options as $uniqueClass => $option) {
                        echo '<div class="checkbox">
                                <input type="checkbox" value=".'.strtolower($uniqueClass).'"/>
                                <label>'.$option.'</label>
                              </div>';
                      }
                    ?>
                  </fieldset>
                <?php
              }          
            }

            if (count($data->options) > 0 && $data->type == "boolean") {
            ?>
              <fieldset class="checks">
                <p class="optionsTitle"><?php echo $data->name;?>: </p>
                <div class="checkbox">
                  <input type="checkbox" value=".<?php echo strtolower($data->dropdownClass); ?>1"/>
                  <label>yes</label>
                </div>         
              </fieldset>
            <?php 
            }
          } // foreach

          // now we need to hard code the price range...
          ?>
          
              <fieldset class="dropdownSort">
                <p class="optionsTitle">Price range: </p>
                <select name="theprice" class="form-control">
                  <option value=".select">Select</option> 
                  <option value=".pricerangelow">low</option>
                  <option value=".pricerangemedium">medium</option>
                  <option value=".pricerangehigh">high</option>            
                </select>
              </fieldset>
          <div class="mixButtons">      
            <button type="button" class="btn btn-primary sort" data-sort="myorder:asc">Price ascending</button>
            <button type="button" class="btn btn-primary sort" data-sort="myorder:desc">Price descend</button>
            <button type="button" id="Reset" class="btn btn-primary">Clear filters</button>
          </div>
        </form>
   

</div> <!-- end col -->
<div class="col-md-9 mixInner">


<!-- the results -->
  <div id="Container" class="mixContainer">
    <div class="fail-message"><span>No items were found matching the selected filters</span></div>
    <?php 
   // $merged = json_decode(json_encode($merged), FALSE);
/*      foreach ($merged as $attrHandles => $value) {

          echo "attr handles: ".$attrHandles."<br>";

          foreach ($value as $type => $data) {
            echo "type: ".$data."<br><hr>";
          } // foreach  
      }*/ // foreach

      //$key2 = json_decode(json_encode($key2), FALSE);
      foreach ($results as $keys => $value) {
        foreach ($value as $atKeys => $atKeysValue) {
           // echo "keys: ".$atKeys."<br>";
            //echo "atKeysValue: ".$atKeysValue."<br><hr>";
          foreach ($key2 as $keys2 => $values) {
           // echo "sorting options: ".$keys2."<br><hr>";
            //echo "value->values: ".$value->$value;

           if ($atKeys == $keys2) {
            // these are are sorting attributes!
             //echo $atKeys." ".$keys2."<br>";
            $j = 0;
            foreach ($atKeysValue as $classes) {
              if (empty($classes)) {
                continue;
              }              
              $results["results"]["pageclasses"][$j] .= " ".$classes;                           
              $j++;               
            }            
           }
            unset($results["results"][$keys2]);
          } 
        }

      } // foreach


      foreach ($results as $keys => $value) {
        foreach ($value as $atKeys => $atKeysValue) {
          $j = 0;
          foreach ($atKeysValue as $each) {
           // echo($atKeys)."<br>";
            $results["results"]["pagesfixed"][$j][$atKeys] = $each;
            $j++;
          }
          unset($results["results"][$atKeys]);
        }
      } // foreach



      $results = json_decode(json_encode($results), FALSE);

      foreach ($results as $keys => $value) {
        foreach ($value as $atKeys => $atKeysValue) {
          foreach ($atKeysValue as $each) {

          //  echo $each->product_image;
          //  echo $each->link;
          //  echo $each->pricerange;
          //  echo $each->pageclasses;
          //  echo preg_replace('/[^0-9]+/', '', $each->the_price);

            echo '<div class="mix '.strtolower($each->pricerange).strtolower($each->pageclasses).'" data-myorder="'.preg_replace('/[^0-9]+/', '', $each->the_price).'">';
             // echo '<a class="linkToCompany clearfix width100" href="' . $each->link . '">'; ?>      
                
                <div class="picture">
                  <?php
                    echo $each->product_image;
                  ?>
                </div> <!--picture-->                
                  
                <div class="cardDetails">
                 
                </div>

                <?php
           //   echo '</a>'; // link to company wrap close
            echo "</div>"; // mix wrap close

          }  
        }
      }

?>
               





    <!-- <pre><?php //  print_r($results);?></pre> -->
    <div class="gap"></div>
    <div class="gap"></div>
    <div class="gap"></div>
    <div class="gap"></div>
  </div> <!-- close id="Container" -->
    <div class="pager-list">
      <!-- Pagination buttons will be generated here -->
    </div>          
  </div> <!-- col-md-8 -->








</div> <!-- row -->
    

















                                                                        
  </div>                                                                    
</div>  <?php //close pageType-default ?>
                                                               
<?php $this->inc('inc/bottomIncludes.php'); ?>







