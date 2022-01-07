<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title> EMP Cloud </title>
<link rel="stylesheet" href="styles.css">
</head>



<body>



<!-- TOP BAR DIV BOX-->
<div style="box-shadow: 5px 5px 5px #888888;border-radius: 5px;background-color:white">
<img src="emplogo.png" style="float:right">
<h1 style="color:#CE8181;outline-color:black;font-family:verdana"> Cloud Apps </h1>
</div>



<!-- AD ICON DIV BOX-->
<div class="img" style="border-radius: 50%">
    <img src="add.ico" alt="Trolltunga Norway" width="200" height="180">
  <div class="desc">  Active Directory </div>
  </div>
  
  
  
     <div class="img">
    <form name="testForm" id="testForm" target="_self" method="post" /> Check Who's Currently Locked :
	<input type="submit" name="btnSubmit" id="btnSubmit" value="Query" />
    </form>	
</div>




<!-- USER INPUT BOX-->
<div class="img" style="width:250px">
    <form name="testForm" id="testForm" target="_self" method="post" /> User Logon Name (SamAccountName): 
	<input type="text" name="username" required id="username" maxlength="20" />
		<br>
	<input type="submit" name="btnSubmit" id="btnSubmit" value="Unlock" />
		<br><br>
    </form>

</div>


<!--PHP SCRIPT BELOW -->	
<div class="bottom">

<?php # PHP START 
$username=$_POST[(username)];
if($_POST['btnSubmit'] == 'Unlock'){
   $username = $_POST["username"];
    $psScriptPath = "C:\inetpub\psroot\unlock.ps1";
    $query = shell_exec("powershell -command $psScriptPath -username '$username'< NUL");
    echo $query; 
}
if($_POST['btnSubmit'] == 'Query'){
   $username = $_POST["username"];
    $psScriptPath = "C:\inetpub\psroot\Testquery.ps1";
    $query = shell_exec("powershell -command $psScriptPath -username '$username'< NUL");
    echo $query; 
}

# PHP END ?>	

</div>	







			<!--Footer-->
			<div class="footer">
                <p>&copy;<?php echo date('Y');?> Empereon Marketing<br/>  
			</div>
										
						

				
</body>
</html>