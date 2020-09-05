<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', "ewu_books");

class DB_con
{	
	public $conn;
	
	function __construct()
	{
		$this->conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME) or die('localhost connection problem'.mysqli_connect_error());
	}
	//inserting into users database
	public function users_insert($name,$email,$password,$department)
	{	
		$sql = "INSERT into users(name,email,password,department) VALUES('$name','$email','$password','$department')";
		if(mysqli_query($this->conn, $sql)){
			return true;
		} else{
			return false;
		}
  }

	//search email
	public function serach_email($email)
	{	
		$sql = "SELECT name FROM users WHERE email = '$email'";
		$res = mysqli_query($this->conn, $sql);
		return $res;
	}
	
	public function serach_adminemail($email)
	{	
		$sql = "SELECT email FROM admin WHERE email = '$email'";
		$res = mysqli_query($this->conn, $sql);
		return $res;
	}
	//user authentication
	public function log_in($email,$password)
	{	
		$sql = "SELECT name,email,user_id FROM users WHERE email = '$email' and password='$password'";
		$res = mysqli_query($this->conn, $sql);
		return $res;
	}
	public function admin($email,$password)
	{	
		$sql = "SELECT email,password FROM admin WHERE email = '$email' and password='$password'";
		$res = mysqli_query($this->conn, $sql);
		return $res;
	}
	
}
?>