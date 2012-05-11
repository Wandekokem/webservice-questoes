<?php
require_once(LIB_PATH.DS.'database.php');

class Question extends DatabaseObject {
	
	protected static $table_name="questions";
	protected static $db_fields= array("title");

	public $id;
	public $title;
	public $choices = array();
	public $correct_choice_pos;
	public $message = array();
	
	//Método substituido da classe extendida.
	public static function find_by_id($id=0) {
		$question = parent::find_by_id($id);
		$question->choices = Choice::find_by_sql("SELECT * FROM choices WHERE question_id = {$id} ORDER BY sequence ASC");
		return $question;
	}
	
	//retorna informações sobre as alternativas
	private function get_choices_info() {
		$corrects_info = array();
		$corrects_info['occurrence'] = 0;
		foreach ($this->choices as $key => $choice) {
			if ($choice->is_correct()) {
				$corrects_info['position'] = $key;
				$corrects_info['occurrence']++;
			}
		}
		return ($corrects_info['occurrence'] > 0) ? $corrects_info : false;
	}

	public function get_correct_choice() {
		$position = $this->get_correct_position();
		return $this->choices[$position];
	}
	
	public function get_correct_position() {
		$info = $this->get_choices_info();
		return ($info['occurrence'] == 1) ? $info['position'] : false;		
	}
	
	private function analyze_choices($choice) {
		//checa se há alternativas
		$num_choices = $this->num_choices();
		if ($num_choices<=1) {
			$this->message[] = "A questão possui ". $num_choices. " alternativa(s)";
			return false;
		}
		
		//checa se há alguma alternativa correta.
		if ($this->have_correct()!=1) {
			$this->message[] = "A questão possui 0 ou mais que 1 alternativas corretas";
			return false;
		}
		
		return true;
	}
	
	public function num_choices() {
		return array_count_values($this->choices);
	}
	
	private function save_choices() {
		foreach ($this->choices as $choice) {
			$choice->question_id = $this->id;
			$choice->correct = ($choice->correct) ? 1 : 0;
			$choice->create();
		}
	}
	
	public function save() {
		return isset($this->id) ? parent::update() : $this->create();
	}
	
	
	//Substitui o método da class extendida
	public function create() {
		if (parent::create()) {
			foreach ($this->choices as $choice) {
				$choice->question_id = $this->id;
				$choice->correct = ($choice->correct) ? 1 : 0;
				$choice->create();
			}
		} else {
			return false;
		}
	}
	
	public function destroy() {
		if ($this->id) {
			if (parent::delete()) {
			}
		}
	}
	
	
}
?>