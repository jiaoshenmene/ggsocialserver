<?php 



/**
	author 杜甲
	注册接口
*/
	require_once('../ggdb/ggdbregister.php');


	$name = $_POST['name'];
	$password = $_POST['password'];
	
	/**
	* 
	*/
	class GG_Register
	{
		
		function __construct()
		{
			# code...
		}



		public function register($name,$password)
		{
			
			if (!empty($name) && !empty($password)) {
				$mydb = new GGDB;
				$mydb->connectionDB();
				$mydb->insertDB($name,$password);
				// $mydb->queryDB();
				$success = array('code' => 200,'status' => "success");
				echo json_encode($success);
			}
		}

	}


	$register = new GG_Register;

	$register->register($name,$password);

 ?>