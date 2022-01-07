<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title> EMP Cloud </title>
<link rel="stylesheet" href="styles.css">
<meta name="author" content="Dj Dorcelus">
</head>
<style>

/* The container <div> - needed to position the dropdown content */
.dropdown {
    position: relative;
    display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

/* Links inside the dropdown */
.dropdown a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

/* Change color of dropdown links on hover */
.dropdown a:hover {
	background-color:#E67575;
	
}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
    display: block;
}


</style>
<!---Login User Bar-->
<div style="allign:right;width:200px;border-radius:2px" title="Session User">
<?php
#$user=mb_strtoupper($_SERVER['REMOTE_USER']);
$user = mb_strtoupper($_SERVER['PHP_AUTH_USER']);
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
    <img src="scanner.ico" alt="Trolltunga Norway" width="200" height="180">
  </div>



<!-- USER INPUT BOX-->
<div class="img" style="width:250px;float:right">
  <div style="color:#E67575;outline-color:black;font-family:verdana;background-color:white;width:250px"><h2>Scan Folder Prov</h2></div>
   <form name="testForm" id="testForm" target="_self" method="post" /> 
Type the User Logon Name (SamAccountName): 
	<input type="text" name="username2" required id="username" maxlength="20" />
         <br></br> 
<!---		 
		 Type the Scan Folder name<br> 
    <input type="text" name="foldername" required id="username" maxlength="20" /><br></br> 
    --->
	
	<input type="submit" name="btnSubmit" id="btnSubmit" value="CreateScanFolder" />
  <br><br>
 </form>  	
</div>


<div class="img" style="width:100px;float:left">
 <div class="dropdown">
  <img src="printer.ico" title="Click here to add the user to the Scanner" width="200" height="180" style="border: 0px">
   <div class="dropdown-content">
    <a href="http://172.22.208.4" target="_blank">Alvin, TX</a>
    <a href="http://172.23.1.200" target="_blank">AZ1XeroxFrontDesk</a>
	<a href="http://192.168.201.123" target="_blank">CoudersportXerox</a>
	<a href="http://192.9.1.246" target="_blank">DenverXeroxFloor</a>
	<a href="http://192.9.1.245" target="_blank">DenverXeroxFrontDesk</a>
	<a href="http://172.45.0.101" target="_blank">GlendaleXeroxBackReception</a>
	<a href="http://172.45.0.100" target="_blank">GlendaleXeroxReception</a>
	<a href="http://172.22.74.4" target="_blank">Greenville, SC</a>
	<a href="http://192.9.2.12" target="_blank">LasCrucesXerox</a>
  </div>
 </div>
</div>

<!--PHP SCRIPT BELOW -->	
<div class="bottom" style="float:left">

<?php # PHP START 

	$ipaddress = gethostbyaddr($_SERVER['REMOTE_ADDR']);
	$date = date("m-d-y");
	$time = date("h:i:sa");



	$username2 = trim($_POST["username2"]);
	#$foldername = mb_strtoupper(trim($_POST["foldername"]));
if($_POST['btnSubmit'] == 'CreateScanFolder'){

    $psScriptPath = "C:\inetpub\psroot\scanfolder.ps1";
    $query = shell_exec("powershell -command $psScriptPath -username2 '$username2' -user '$user'< NUL");
    echo $query; 
	file_put_contents("C:\cloudAppLogs\scanfolderlog.txt","A Scan Folder was created by $user for $username2 on $ipaddress at $time on $date\r\n ",FILE_APPEND);
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