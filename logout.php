<?php 
header('Access-Control-Allow-Origin: *');
include "base.php"; $_SESSION = array(); session_destroy();
setcookie("PHPSESSID", "null", time()-3600);
setcookie("keepmesigned", "null", time()-3600);	
setcookie("test", "null", time()-3600);	
 ?>
<meta http-equiv="refresh" content="0;index.php">