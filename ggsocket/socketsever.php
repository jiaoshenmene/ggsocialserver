

<?php  
/**
* 
*/
class ipdj 
{
	
	function __construct()
	{


	}

	function get_real_ip(){ 
	$ip=false; 
	if(!empty($_SERVER['HTTP_CLIENT_IP'])){ 
		$ip=$_SERVER['HTTP_CLIENT_IP']; 
	}
	if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){ 
		$ips=explode (', ', $_SERVER['HTTP_X_FORWARDED_FOR']); 
		if($ip){ array_unshift($ips, $ip); $ip=FALSE; }
		for ($i=0; $i < count($ips); $i++){
			if(!eregi ('^(10│172.16│192.168).', $ips[$i])){
				$ip=$ips[$i];
				break;
			}
		}
	}
	return ($ip ? $ip : $_SERVER['REMOTE_ADDR']); 
}


}



// $client_ip;

// if(getenv('HTTP_CLIENT_IP')){ 
        // $client_ip = getenv('HTTP_CLIENT_IP'); 
    // } elseif(getenv('HTTP_X_FORWARDED_FOR')) { 
        // $client_ip = getenv('HTTP_X_FORWARDED_FOR'); 
    // } elseif(getenv('REMOTE_ADDR')) {
        $client_ip = getenv('REMOTE_ADDR'); 
    // } else {
    //     $client_ip = $_SERVER['REMOTE_ADDR'];
    // }

$arrayName = array('ip' => $client_ip);
echo  json_encode($arrayName);


?>  


