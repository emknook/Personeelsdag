
<?php 

/**
 * 
 * File for all small functions
 * 
**/


function escape($html) {
  return htmlspecialchars($html, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
}


?>