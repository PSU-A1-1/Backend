<?php
session_start();

if(isset($_POST['userAction'])) {
	$succes = false;
  
  switch ($_POST['userAction']) {
    // Done for now
  case 'login':
    if ($_POST['user'] == 'afvikler' && $_POST['pass'] == 'blackbird') {
      $_SESSION['user'] = 1;
      $succes = true;
    } else if  ($_POST['user'] == 'admin' && $_POST['pass'] == 'stalingrad') {
      $_SESSION['user'] = 2;
      $succes = true;
    } 
    echo $succes;
    break;
  case 'logout':
    session_destroy();
 
}

}