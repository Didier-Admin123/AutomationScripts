<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title> EMP Cloud </title>
<link rel="stylesheet" href="styles.css">
<meta name="author" content="Dj Dorcelus">
</head>

<div style="allign:right;width:200px;border-radius:2px">
<?php
$user=mb_strtoupper($_SERVER['REMOTE_USER']);
echo "<p style=color:#CE8181>$user</p>"
?>
</div>

<body>



<!-- TOP BAR DIV BOX-->
<div style="box-shadow: 5px 5px 5px #888888;border-radius: 5px;background-color:white">
<img src="emplogo.png" style="float:right">
<h1 style="color:#CE8181;outline-color:black;font-family:verdana"> Cloud Apps </h1>
</div>


  
<!-- AD ICON DIV BOX-->
<div class="img" style="width:100px">
    <img src="audit.ico" alt="Trolltunga Norway" width="200" height="180">
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
	file_put_contents("C:\cloudAppLogs\Account-unlock.txt","An Account Unlock was Initiated for $username on $ipaddress at $time on $date\r\n ",FILE_APPEND);
}


# PHP END ?>	

</div>	







			<!--Footer-->
			<div class="footer">
                <p>&copy;<?php echo date('Y');?> Empereon Marketing<br/>  
			</div>
						
<!-- HOME ICON DIV BOX-->
<div>
	<a target="_self" href="index.php" style=" position:adsolute;width: 20px;
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