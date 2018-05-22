<?php 
header('Access-Control-Allow-Origin: *');
include "base.php"; $_SESSION = array(); session_destroy();
if (isset($_COOKIE['keepmesigned'])) {
    setcookie("keepmesigned", "", time()-3600);
}
 ?>
<meta http-equiv="refresh" content="0;index.php">