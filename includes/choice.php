<?php
//Necessita do banco de dados.
require_once(LIB_PATH.DS.'database.php');

/**
 * @author paulimfavarato
 * @version 0.1
 * @access public
 */
class Choice extends DatabaseObject {

	protected static $table_name="choices";
	protected static $db_fields= array("question_id", "title", "correct", "sequence");
	public $id;
	public $question_id;
	public $title;
	public $correct;
	public $sequence;

	/**
	 * Fun��o que verifica se o objeto (alternativa) é correta
	 * @access public
	 * @return boolean
	 */
	public function is_correct() {
		return $this->correct;
	}

	/**
	 * Fun��o est�tica para criar novas alternativas (choice)
	 * @param String $title - Alternativa em si (titulo) 
	 * @param boolean $correct - Se a alternativa está correta
	 * @param int $sequence - Ordem de sequencia da alternativa na quest�o.
	 */
	public static function builder($title, $correct, $sequence) {
		$choice = new self;
		$choice->title = $title;
		$choice->correct = $correct;
		$choice->sequence = $sequence;

		return $choice;
	}

}
?>