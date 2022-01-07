<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title> EMP Cloud </title>
<link rel="stylesheet" href="styles.css">
<meta name="author" content="Dj Dorcelus">
</head>


<!---Login User Bar-->
<div style="allign:right;width:200px;border-radius:2px">
<?php
$user=mb_strtoupper($_SERVER['REMOTE_USER']);
echo "<p style=color:#CE8181>$user</p>"
?>
</div>



<body>



<!-- TOP BAR DIV BOX-->
<div style="box-shadow: 5px 5px 5px #888888;border-radius: 5px;background-color:white;">
<img src="emplogo.png" style="float:right">
<h1 style="color:#CE8181;outline-color:black;font-family:verdana"> Cloud Apps </h1>
</div>



<!-- AD ICON DIV BOX-->
<div class="img" style="width:100px">
    <img src="outlook.ico" alt="Trolltunga Norway" width="200" height="180">
  </div>
  
  
<!-- Query Locked Users Buttom--> 
     <div class="img">
    <form name="testForm" id="testForm" target="_self" method="post" /> Query User Mailbox :
	<input type="text" name="username" required id="username" maxlength="20" />
		<br></br><input type="submit" name="btnSubmit" id="btnSubmit" value="Query" />
    </form>	
</div>



<!-- USER INPUT BOX-->
<div class="img" style="width:250px;float:right">
<div style="color:#E67575;outline-color:black;font-family:verdana;background-color:white;width:250px"><h2>Email Prov Tool</h2></div>
    <form name="testForm" id="testForm" target="_self" method="post" /> Logon Name (SamAccountName) : 
	<input type="text" name="username" required id="username" maxlength="20" />
		<br></br>
		Email Alias :
	<input type="text" name="username" required id="username" maxlength="20" /><br>
		<input type="radio" name="group" value="add">Add
	<input type="radio" name="group" value="remove">Remove
	<br></br>
	<input type="submit" name="btnSubmit" id="btnSubmit" value="CreateMailBox" />
	<!-----
	<input type="submit" name="btnSubmit" id="btnSubmit" value="Unlock" />
	<input type="submit" name="btnSubmit" id="btnSubmit" value="Enable" />
	<input type="submit" name="btnSubmit" id="btnSubmit" value="Disable" /><br></br>
	<input type="submit" name="btnSubmit" id="btnSubmit" value="QueryADPStatus" />
	<br><br><input input type="submit" name="btnSubmit" id="btnSubmit" value="Set Temporary Password" />
    ---->
	</form>

</div>


<!--PHP SCRIPT BELOW -->	
<div class="bottom">

<?php # PHP START 
	$username = trim($_POST["username"]);
	$ipaddress = gethostbyaddr($_SERVER['REMOTE_ADDR']);
	$date = date("m-d-y");
	$time = date("h:i:sa");


if($_POST['btnSubmit'] == 'Unlock'){

    $psScriptPath = "C:\inetpub\psroot\unlock.ps1";
    $query = shell_exec("powershell -command $psScriptPath -username '$username'< NUL");
    echo $query; 
	file_put_contents("C:\cloudAppLogs\Account-unlock.txt","An Account Unlock was Initiated for $username by $user on $ipaddress at $time on $date\r\n ",FILE_APPEND);
}

if($_POST['btnSubmit'] == 'Enable'){
 
    $psScriptPath = "C:\inetpub\psroot\Enable.ps1";
    $query = shell_exec("powershell -command $psScriptPath -username '$username' -user '$user'< NUL");
    echo $query; 
	
}

if($_POST['btnSubmit'] == 'Disable'){

    $psScriptPath = "C:\inetpub\psroot\disable.ps1";
    $query = shell_exec("powershell -command $psScriptPath -username '$username' -user '$user'< NUL");
    echo $query; 
	file_put_contents("C:\cloudAppLogs\Disable.txt","An Account Disable was Initiated for $username by $user on $ipaddress at $time on $date\r\n ",FILE_APPEND);	

}
if($_POST['btnSubmit'] == 'Query'){
 
    $psScriptPath = "C:\inetpub\psroot\Querybtn.ps1";
    $query = shell_exec("powershell -command $psScriptPath -username '$username'< NUL");
    echo $query; 
}

if($_POST['btnSubmit'] == 'Set Temporary Password'){
 
    $psScriptPath = "C:\inetpub\psroot\Resetpass.ps1";
    $query = shell_exec("powershell -command $psScriptPath -username '$username' -user '$user'< NUL");
    echo $query;
	file_put_contents("C:\cloudAppLogs\Temp-password.txt","A Temporary Password was Initiated for $username by $user on $ipaddress at $time on $date\r\n ",FILE_APPEND);		
}
if($_POST['btnSubmit'] == 'QueryADPStatus'){
 
    $psScriptPath = "C:\inetpub\psroot\AReport.ps1";
    $query = shell_exec("powershell -command $psScriptPath -username '$username' -user '$user'< NUL");
    echo $query; 
	
}
# PHP END ?>	

</div>	







			<!--Footer-->
			<div class="footer">
                <p>&copy;<?php echo date('Y');?> Empereon Marketing<br/>  
			</div>
						
<!-- HOME ICON DIV BOX-->

<div>
	<a target="_self" title="Home Page" href="index.php" style=" position:adsolute;width: 20px;
   height: 20px;
   position: absolute;
   left: 100%;
   top: 90%; 
   margin-left: -150px;
   margin-top: -50px">
	<img src="home.ico" style="border:0px" width="50" height="50">
	</a>
</div>				

				
</body>
</html>