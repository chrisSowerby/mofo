<?php   defined('C5_EXECUTE') or die(_("Access Denied.")); $this->inc('inc/topIncludes.php'); ?>
<div id="system-cener-body" class="pageType-default">
  
<?php 
Loader::model('page_list');
$nh = Loader::helper('navigation');
$th = Loader::helper('text');
$ih = Loader::helper('image');
// The handle of the sorting set
$sortingSet = "sorting_options";
$sortingOptions = AttributeSet::getByHandle($sortingSet); // this is the AttributeSet that holds all the attributes we need to generate the options
$sortingOptionsAttrKeys = $sortingOptions->getAttributeKeys(); 
?>
<div id="my-options">  
  <p class="productPickerTitle">Product picker...</p>
  <form class="controls" id="Filters">    
    <div id="Container"> 
 
<!--To get the name by handle:
CollectionAttributeKey::getByHandle('your_attr_handle')->getAttributeKeyName()-->
      
      <!--
  [
  {"mix_class":"startMix","option_text":"Maths"},
  {"mix_class":"maths","option_text":"Fractions"},
  {"mix_class":"level","option_text":"e2"}
  ]
        
      this will be the name of the attribute-->
      <div class="mix startMix"> 
      <p class="chooseStuffTitle">Choose product category</p>
      <fieldset>    
        <select> 
        <option>Select</option>
          <?php 
            $categoryUrl = array();
            $sorting = array();

            $pl = new PageList();             
            $pl->filterByCollectionTypeHandle("mixitup"); // only get pages with this pagetype Handle
            $pl->sortByDisplayOrder(); // the order in the site map  
            $pl->filter(false, '(ak_exclude_page_list = 0 or ak_exclude_page_list is null)'); // dont show products that have the exclude from page list attr on them           
            $pagelist = $pl->get();   
            
            $i = 0;           
            foreach ($pagelist as $page) {              
              $title = $th->entities($page->getCollectionName());
              $value = str_replace(' ', '', $th->entities($page->getCollectionName()));
              $url = $nh->getLinkToCollection($page);                 
              echo "<option data-href='$url' value='.$value'>$title</option>"; 
              $categoryUrl[$i]['url'] = $url;               
              $categoryUrl[$i]['pageName'] = $title;                            
              $i++;              
            }
          ?>    
        </select>
      </fieldset>   
      </div>



          <?php 
            $categoryUrl = json_decode(json_encode($categoryUrl), FALSE);
            foreach ($categoryUrl as $key => $values) {
              foreach ($values as $keys) {
                  /*echo $values->url;
                  echo $values->pageName; */      
             
              $pl = new PageList();   
              $valuesUrl = substr($values->url, 0, -1);             
              $valuesPageName = strtolower($values->pageName);
              $pl->filterByPath($valuesUrl); // only get pages below this one. Remove last slash from url
              $pl->sortByDisplayOrder(); // the order in the site map  
              $pl->filter(false, '(ak_exclude_page_list = 0 or ak_exclude_page_list is null)'); // dont show products that have the exclude from page list attr on them           
              $pagelist = $pl->get();   
                          
              foreach ($pagelist as $page) {               
/*                
                $value = str_replace(' ', '', $th->entities($page->getCollectionName()));
                $url = $nh->getLinkToCollection($page);                 
                echo $url."|";  */

                  foreach($sortingOptionsAttrKeys as $ak) {
                    // data specific to building the sorting options                                    
                    $handleNoUnderscores = str_replace('_', '', $ak->akHandle); // remove all Underscores to fix class name 
                    $handleNoUnderscores = strtolower($handleNoUnderscores);
                    $theStuffInside = $page->getAttribute($ak->akHandle); // get the name of the attribute

                    //if ($ak->akName == "Price") {echo($name);} 
                  //get the options of the select                 
                    if ($ak->atHandle == "select" || $ak->atHandle == "boolean") { 
                      $sorting[$ak->akHandle][$valuesPageName]["handle"] = $ak->akHandle;
                      $sorting[$ak->akHandle][$valuesPageName]["name"] = $ak->akName;

                      $sorting[$ak->akHandle][$valuesPageName]["dropdownClass"] = $handleNoUnderscores; 
                      $sorting[$ak->akHandle][$valuesPageName]["type"] = $ak->atHandle;
                      if (is_object($theStuffInside)) {                                      
                        foreach ($theStuffInside as $value) { // this is needed in the situation that a page has more than one select value 
                            // add select value with unique class as key                   
                            $sorting[$ak->akHandle][$valuesPageName]["options"][$handleNoUnderscores.str_replace(' ', '', $value->value)] = $value->value;                   
                        }
                      }
                      else { // we must be a boolean                        
                        if ($theStuffInside) {
                         $sorting[$ak->akHandle][$valuesPageName]["options"][$handleNoUnderscores.str_replace(' ', '', $theStuffInside)] = $theStuffInside; 
                        }
                      }
                    }
                  }


              }
            } // foreach
            } //foreach

$forms = array();
$sorting = json_decode(json_encode($sorting), FALSE);

foreach ($sorting as $key => $value) {
/*echo "name: ".$sorting->$key->name."<br>"; // name: Industry type
echo "key: ".$key."<br>"; // key: Industry_type
echo "<hr>";*/
  foreach ($value as $pageName => $values) {
    /*echo "page name: ".$pageName."<br>";//letterheads, logos
    echo "values: ".$values->name."<br>"; //Shape, Text only*/
    $pageNameNoSpaces = str_replace(' ', '', $pageName);
    // remove plurals
    $forms[$pageNameNoSpaces] = '<div class="mix lastMix '.$pageNameNoSpaces.'">
                                  <p class="chooseStuffTitle">Choose any of these '.rtrim($pageName, 's').' options...</p>
                                      <div class="outputPostOptions mix lastMix '.$pageNameNoSpaces.'">
                                          <button class="searchBtn postOptions">Submit</button>
                                      </div>
                                 </div>';


    if (count($values->options) > 0 && $values->type == "boolean") {
      $thisForm = '<div class="mix lastMix '.$pageNameNoSpaces.'">
                    <fieldset class="checks">
                      <p class="optionsTitle">'.$values->name.'</p>
                      <div class="checkbox">
                        <input type="checkbox" data-dropdownClass="'.$values->dropdownClass.'" value=".'.$values->dropdownClass.'1"/>                    
                        <label>yes</label>
                      </div>         
                    </fieldset>
                   </div>';

      $forms[] = $thisForm;
      $thisForm = NULL;
    } // boolean

    if (count($values->options) > 0 && $values->type == "select") {
      // find out if our select was set up to allow more than one selection.
      //Database::setDebug(true);
      $db = Loader::db();
      $attrHandle = $values->handle;
      $attrAkID = $db->getOne("SELECT akID FROM AttributeKeys WHERE akHandle LIKE ? " , array($attrHandle));
      $akSelectAllowMultipleValues = $db->getOne("SELECT akSelectAllowMultipleValues FROM atSelectSettings WHERE akID LIKE ? " , array($attrAkID));
      //Database::setDebug(false);
      
      if ($akSelectAllowMultipleValues == 0) { // single selection
        $thisForm = '<div class="mix lastMix '.$pageNameNoSpaces.'"> 
                      <p class="formTitle">'.$values->name.'</p>
                        <fieldset> 
                          <select>
                          <option>Select</option>';
                            foreach ($values->options as $optionsKey => $valuess) {
                              if ($valuess == 1) {$valuess = "Yes";}
                            /*echo "optionsKey: ".$optionsKey."<br>"; // productcoloursblue
                              echo "values: ".$values."<br>"; // blue
                              echo "<hr>";*/
                              $thisForm .= '<option data-dropdownClass="'.$values->dropdownClass.'" data-value=".'.$optionsKey.'">'.$valuess.'</option>';
                            }
        $thisForm .= '</select>
                    </fieldset>
                  </div>';

        $forms[] = $thisForm;
        $thisForm = NULL;
      } else { // can select more than one
        
        $thisForm = '<div class="mix lastMix '.$pageNameNoSpaces.'">                      
                        <fieldset class="checks">
                        <p class="optionsTitle">'.$values->name.'</p>';
                            foreach ($values->options as $optionsKey => $valuess) {
                              if ($valuess == 1) {$valuess = "Yes";}
                            /*echo "optionsKey: ".$optionsKey."<br>"; // productcoloursblue
                              echo "values: ".$values."<br>"; // blue
                              echo "<hr>";*/                              
                              $thisForm .= '<div class="checkbox">
                                              <input type="checkbox" data-dropdownClass="'.$values->dropdownClass.'" value=".'.$optionsKey.'"/>
                                              <label>'.$valuess.'</label>
                                            </div>';
                            }
        $thisForm .= '  </fieldset>    
                      </div>';

        $forms[] = $thisForm;
        $thisForm = NULL;
      }
    } // if type is select
  }
}
          
//echo '<div class="mix startMix">';
foreach ($forms as $value) {
echo $value;
} // foreach
?>
  
    </div>  <!--Container-->
  </form> 
    
  <div style="display:none" class="searchOptions">
  <hr>
    <p>Options:</p>
    <button class="searchBtn" id="show-all">Show me everything!</button>
    <button class="searchBtn" id="back-one">Go back a step</button>
    <button style="display:none" class="searchBtn" id="reset-back">Reset to beginning</button>    
  </div> 
</div> <!--my-options-->




<?php
/*echo "<pre>";
print_r($forms);
print_r($categoryUrl);
print_r($sorting);
echo "</pre>"; */
?>



















  
</div>  <?php //close pageType-default ?>

<?php $this->inc('inc/bottomIncludes.php'); ?>