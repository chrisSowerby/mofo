<?php  
defined('C5_EXECUTE') or die("Access Denied.");


$db = Loader::db();
$rs=$db->Execute('SELECT user_name, commentText FROM btGuestBookEntries where approved = 1 ORDER BY RAND()'); 	
$varr = 0;
$name = array();
$text = array();
while ($varr < 4)
{	
	$varr++;
    $row         = $rs->FetchRow();
    $username    = $row['user_name'];
    $commentText = $row['commentText'];	
	if (isset($username))
	{  
	
		$commentLenght = strlen($commentText);
		$charlimit = "200";
			if ($commentLenght >= $charlimit) {
			$outputMessage = substr($commentText,0,$charlimit) . "...";  
			}              
				// $name[] = $username;			
				// $text[] = $outputMessage;			
	}	
}
	
$json = Loader::helper('json');
$jsonData = array(
	'success' => $outputMessage,
	'message' => $username,

);
echo $json->encode( $jsonData );

exit;