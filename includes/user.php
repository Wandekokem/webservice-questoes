<?php
require_once(LIB_PATH.DS.'database.php');

class User extends DatabaseObject {
	
	protected static $table_name="users";
	protected static $db_fields = array('username', 'password', 'first_name', 'last_name');
	
	public $id;
	public $username;
	public $password;
	public $first_name;
	public $last_name;
	
	public function __construct() {
		
	}
	
	public static function authenticate($username= "", $password="") {
		global $database;
		$username = $database->escape_value($username);
		$password = $database->escape_value($password);
		
		$sql = "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}' LIMIT 1";
		$result_array = parent::find_by_sql($sql);
		return !empty($result_array) ? array_shift($result_array) : false;
	}
		
	public function full_name() {
		return $this->first_name . " " . $this->last_name;
	}
	
	public function save() {
		return isset($this->id) ? parent::update() : parent::create();
	}

}
?>