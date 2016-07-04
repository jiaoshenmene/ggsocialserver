<?php 





	require_once('../ggdb/ggdbregister.php');
	$username = $_POST['name'];


	/**
	*  获取用户好用列表 
	*  author  杜甲  
	*/
	class GetFriendsList 
	{
		
		function __construct()
		{
		}

		public function getFList($uname)
		{
			$mydb = new GGDB;
			$mydb->connectionDB();
			$result = $mydb->queryUserFriendsList($username);
			if (strcmp($result["password"] , $userpassword) ) {
				echo json_encode($result);
			}else
			{
				echo json_encode($result);
			}
		}

	}

	$login = new GetFriendsList;
	$login->getFList($name);


 ?>