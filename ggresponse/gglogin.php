<?php 

	/**
		author 杜甲
		login Interface
	*/

	require_once('../ggdb/ggdbregister.php');

	$name = $_POST['name'];
	$password = $_POST['password'];


	/**
	*  登录管理类
	*/
	class GGLogin
	{
		
		function __construct()
		{
			
		}

		public function login($username,$userpassword)
		{
			$mydb = new GGDB;
			$mydb->connectionDB();
			$result = $mydb->queryVerificationInfo($username);
			if (strcmp($result["password"] , $userpassword) ) {
				echo json_encode($result);
			}else
			{
				echo json_encode($result);
			}
			
		}
	}

	$login = new GGLogin;
	$login->login($name,$password);


 ?>