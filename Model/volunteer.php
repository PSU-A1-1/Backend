<?php
class Volunteer extends CardHolder{

	public $name;
	public $surname;
	public $active;

	public function __construct($name, $surname, $id, $beers, $drinks, $active) {
		parent::__construct($id, $beers, $drinks);
		$this->name->original = $name;
		$this->surname->original = $surname;
		$this->active->current = (int)$active;
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

	public function updateActive() {
		$id = $this->id->current;

		$active = mysql_query("SELECT `active`
                           FROM `volunteer` 
                           WHERE `ST-ID` = $id");
		if ($active) {
			if (mysql_result($active, 0) == 1) {
				$a = 0;
			} else {
				$a = 1;
			}
				
			$query = "UPDATE volunteer
                  SET active = $a 
                  WHERE `ST-ID` = $id";

			$result = mysql_query($query);
			if ($result) {
				$this->succes = true;
				$this->active->current = $a;
			} else {
				$this->succes = false;
				$this->error = mysql_error();

			}

		} else {
			$this->succes = false;
			$this->error = mysql_error();
		}

		return $this->succes;

		 
	}
}
?>