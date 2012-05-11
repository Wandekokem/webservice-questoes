<?php

class Session {
	
	private $logged_in=false;
	public $user_id;
	 
	//automaticamente checa o login ao instanciar a classe.
	function __construct() {
		session_start();
		$this->check_login();
	}
	
	//retorn valor em boolean o usuario está logado.
	public function is_logged_in() {
		return $this->logged_in;
	}
	
	//realiza login
	public function login($user) {
		if ($user) {
			$this->user_id = $_SESSION['user_id'] = $user->id;
			$this->logged_in = true;
		}
	}
	
	//faz logout
	public function logout() {
		unset($_SESSION['user_id']);
		unset($this->user_id);
		$this->logged_in = false;
	}
	
	//verifica se há alguma id registrada então associa a classe;
	private function check_login() {
		if(isset($_SESSION['user_id'])) {
			$this->user_id = $_SESSION['user_id'];
			$this->logged_in = true;
		} else {
			unset($this->user_id);
			$this->logged_in = false;
		}
	}
}

$session = new Session();

?>