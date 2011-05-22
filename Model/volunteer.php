<?php
class Volunteer extends CardHolder{

  public $name;
  public $surname;
  public $active;

  public function __construct($name, $surname, $id, $beers, $drinks, $active) {
    parent::__construct($id, $beers, $drinks);
    $this->name->original = $name;
    $this->surname->original = $surname;
    $this->active->original = (int)$active;
  }

  public function updateName($name) {
    $this->name->current = $name;
  }

  public function updateSurName($surName) {
    $this->surname->current = $surName;
  }

  public function updateBothNames($name, $surname) {
    $this->updateName($name);
    $this->updateSurName($surname);
  }

  public function updateActive($active) {
    $this->active->current = (int)$active;
  }
  
}
?>