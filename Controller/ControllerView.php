<?php
include_once ("./Model/ModelBrain.php");
include_once ("./Model/ModelAbstractCardHolder.php");
include_once ("./Model/ModelVolunteer.php");

class ControllerView {
  function leftMenu() {
    //if (isset($_GET['view']))
    if ($_SESSION['user'] != 0)  
  		include "View/ViewLeftMenu.php";
  }
  
  
  function menu() {
    //if (isset($_GET['view']))
    if ($_SESSION['user'] != 0)
      include "View/ViewMenu.php";
  }

  function view() {
  	if ($_SESSION['user'] != 0) {
    if (isset($_GET['view'])) {
      switch ($_GET['view']) {
      case "newVolunteer" : include_once "View/ViewNewVolunteer.php";
      break;
      case "editVolunteer" : include_once "View/ViewEditVolunteer.php";
      break;
      case "workGroup" : include_once "View/ViewGrid.php"; //workGroup();
      break;
      case "showall" : include_once "View/ViewGrid.php"; //workGroup();
      break;
      case "login" : include_once 'View/ViewLogin.php';
      break;
      default : include_once "View/ViewGrid.php";
      break;
      }
    } else {
      include "View/ViewLogin.php";
    }
    
  } else {
  	include "View/ViewLogin.php";
  	
  }
}	
  
  
  
}










