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
    <img src="email.ico" alt="Trolltunga Norway" width="200" height="180">
  </div>  
  
  
  
    <div class="img">
    <form name="testForm" id="testForm" target="_self" method="post" /> Query User Email :
<input type="text" name="username" required id="username" maxlength="20" />	
	<input type="submit" name="btnSubmit" id="btnSubmit" value="Search" />
    </form>	
</div>  
  



<!-- USER INPUT BOX-->
<div class="img" style="width:250px">
<table>
    <form name="testForm" id="testForm" target="_self" method="post" /> 
	<tr>Type New Email<input type="text" placeholder="tim.johnson@empereon.com" name="email" required id="email" maxlength="20" /></tr>
		<br>
	<input type="submit" name="btnSubmit" id="btnSubmit" value="Create Email" />
    </form>
</table>

This function is under construction 
<div>
<!--PHP SCRIPT BELOW -->		
<?php # PHP START 

if($_POST['btnSubmit'] == 'Search'){
   $username = trim($_POST["username"]);
    $psScriptPath = "C:\inetpub\psroot\Emailsearch.ps1";
    $query = shell_exec("powershell -command $psScriptPath -username '$username'< NUL");
    echo $query; 
}

if($_POST['btnSubmit'] == 'Create Email'){
   $username = trim($_POST["username"]);
    $psScriptPath = "C:\inetpub\psroot\Emailsearch.ps1";
    $query = shell_exec("powershell -command $psScriptPath -username '$username'< NUL");
    echo $query; 
}
# PHP END ?>
</div>
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
   margin-top: -150px">
	<img src="home.ico" style="border:0px" width="50" height="50">
	</a>
</div>	

</body>
</html>