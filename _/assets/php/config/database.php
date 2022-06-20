<?php 

Class Database {


	public $con;
	public $conn;

	function __construct(){

		$this->open_db();

	}
	
	public function open_db() {

		$host 	= 	"localhost";
		$user 	= 	"root";
		$pass 	= 	"";
		$db 	= 	'oplanvisa';

		$this->con = new mysqli($host,$user,$pass,$db);
		$this->con->set_charset("utf8");

		if ($this->con->connect_errno) {

			echo "Failed to connect to MySQL: " . $this->con->connect_error;
			exit();
		}
	}

	public function query_run($query){

		$query_run = $this->con->query($query);
		if ($query_run) {
			return $query_run;
		}else {
			return $this->con->error;
		}
		
	}

	public function esc($post){
		return $this->con->real_escape_string($post);
	}

	public function fetch_arrays($query_run) {
		return $query_run->fetch_array();
	}
	public function escape_string($value){
		return $this->con->real_escape_string($value);
	}

}
	$database = new Database();
 ?>