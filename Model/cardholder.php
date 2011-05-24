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
		include_once 'connect.php';
		$this->id->current = (int)$id;
		$this->id->original = (int)$id;
		$this->beers->added = 0;
		$this->beers->original = (int)$beers;
		$this->drinks->added = 0;
		$this->drinks->original = (int)$drinks;
	}


	// Refactor this stuff....error messaging is weird.


	public function updateDrinks($drinks) {

		$id = $this->id->current;

		if ($drinks != 0) {
				


			$query = "UPDATE volunteer
              SET drinks = drinks + $drinks
              WHERE `ST-ID` = $id";
			$result = mysql_query($query);
				

			if (mysql_affected_rows() == 0) {
				$this->succes = false;
				$this->error = "nothing to do";
			}
			else if ($result) {
				$this->succes = true;
				$this->drinks->added += $drinks;
			}
			else {
				$this->succes = false;
				$this->error = mysql_error();
			}
		} else {
			$this->succes = true;
		}
			
		return $this->succes;
	}


	public function updateBeers($beers) {
		$id = $this->id->current;
			
		if ($beers != 0) {

			$query = "UPDATE volunteer
              SET beers = beers + $beers
              WHERE `ST-ID` = $id";
			$result = mysql_query($query);

			if (mysql_affected_rows() == 0) {
				$this->succes = false;
				$this->error = "nothing to do";
			}
			else if ($result) {
				$this->succes = true;
				$this->beers->added += $beers;
			}
			else {
				$this->succes = false;
				$this->error = mysql_error();
			}
		} else {
			$this->succes = true;
		}
			
		return $this->succes;

	}

	// The error handling and returns are weird all over....
	public function updateBoth($beers, $drinks) {
			
		if ($this->updateDrinks($drinks) && $this->updateBeers($beers)) {
			return true;
		}
	}

	public function updateId($id) {
		$this->id->current = $id;
	}

	public function getDrinks() {
		$drinks = ($this->drinks->original + $this->drinks->added);
		if ($this->drinks->added > 0) {
			$added = " +" . $this->drinks->added;
		} else {
			$added = "";
		}
		return $drinks.$added;
	}

	public function getBeers() {
		$beers = ($this->beers->original + $this->beers->added);
		if ($this->beers->added > 0) {
			$added = " +" . $this->beers->added;
		} else {
			$added = "";
		}
		return $beers.$added;
	}


}

?>
