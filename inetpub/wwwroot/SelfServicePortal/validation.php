<?php # PHP START 
	
if($_POST['btnSubmit'] == 'Login'){
	
	$username = trim($_POST["username"]);
    $code = trim($_POST["code"]);
	$psScriptPath = "C:\inetpub\psroot\pincheck.ps1";	
	$query = exec("powershell -command $psScriptPath -username '$username' -code '$code' < NUL"); 

	if($query == "2"){
		$cookiename = $_POST["username"];
   setcookie("username", "$cookiename", time()+3600, "/","", 0);
	header('Location: main.php');
	exit();
	
	}else{
		
	header('Location: invalid.php');
	exit();} 	 
		 
	}		
?>