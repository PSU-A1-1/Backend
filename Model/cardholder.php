<?php

// Debug
ini_set('display_errors',1); 
error_reporting(E_ALL); 


class CardHolder {

  public $id;
  public $beers;
  public $drinks;
  public $succes;
  public $error;

  public function __construct($id, $beers, $drinks) {
  	include_once '../connect.php';
    $this->id->current = (int)$id;
    $this->id->original = (int)$id;
    $this->beers->added = 0;
    $this->beers->original = (int)$beers;
    $this->drinks->added = 0;
    $this->drinks->original = (int)$drinks;
  }

  public function updateDrinks($drinks) {
    
  	$id = $this->id->current;
  	
    $query = "UPDATE volunteer 
              SET drinks = drinks + $drinks
              WHERE `ST-ID` = $id";
    $result = mysql_query($query);
   
    if (mysql_affected_rows() == 0) {
      $this->succes = false;
      $this->error = "some error";
    }
    else if ($result) {
      $this->succes = true;
      $this->drinks->added += $drinks;
    }
    else {
      $this->succes = false;
      $this->error = mysql_error();
    }   
   
    return $this->succes;
  }

    
  public function updateBeers($beers) {
    $this->beers->beers = $beers;

  }

  public function updateBoth($beers, $drinks) {
    $this->updateBeers($beers);
    $this->updateDrinks($drinks);
  }

  public function updateId($id) {
    $this->id->current = $id;
  }
    
}




?>
