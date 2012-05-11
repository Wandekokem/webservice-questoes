<?php
require_once(LIB_PATH.DS.'database.php');

class Choice extends DatabaseObject {

	protected static $table_name="choices";
	protected static $db_fields= array("question_id", "title", "correct", "sequence");
	public $id;
	public $question_id;
	public $title;
	public $correct;
	public $sequence;

	public function is_correct() {
		return $this->correct;
	}

	public static function builder($title, $correct, $sequence="") {
		$choice = new self;
		$choice->title = $title;
		$choice->correct = $correct;
		$choice->sequence = $sequence;

		return $choice;
	}

}
?>