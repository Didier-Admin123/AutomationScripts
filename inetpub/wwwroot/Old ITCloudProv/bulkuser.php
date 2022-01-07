<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title> EMP Cloud </title>
<link rel="stylesheet" href="styles.css">
<meta name="author" content="Dj Dorcelus">
</head>

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
<div style="box-shadow: 5px 5px 5px #888888;border-radius: 5px;background-color:white">
 <img src="emplogo.png" style="float:right">
  <h1 style="color:#E67575;outline-color:black;font-family:verdana"> Cloud Apps </h1>
   </div>
   
<!-- AD ICON DIV BOX-->
<div class="img" style="width:100px">
 <img src="bulkusers.ico" alt="Trolltunga Norway" width="200" height="180">
  </div>
  
<!----- Upload File DIV BOX---->
<div class="img" style="width:250px;float:right">
<div style="color:#E67575;outline-color:black;font-family:verdana;background-color:white">
<h2>Add/Remove From Bulk Users<h3></div> 
	<form method="post" enctype="multipart/form-data"  />
Type AD Group Name
  <input type="text" name="username" required id="username" maxlength="20" />
   <br><input type="radio" name="group" value="add">Add Group to Users<br>
	<input type="radio" name="group" value="remove">Remove Group From Users
	 <br></br>
Select CSV file:
  <input type="hidden" name="upload" value="1">
    <input type="file" name="file">
     <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
 	  <br></br>
	   <input type="submit" name="btnSubmit" id="btnSubmit" value="Submit" />
	</form>
</div>



<!--PHP SCRIPT BELOW -->	
<div class="bottom">

<?php

	$ipaddress = gethostbyaddr($_SERVER['REMOTE_ADDR']);
	$date = date("m-d-y");
	$time = date("h:i:sa");
//Group and Selection ADD or Remove
if ($_POST['group'] == "add") {
    // code goes here
	$to = "uploads/".$_FILES['file']['name'];
	move_uploaded_file($_FILES['file']['tmp_name'], $to);
	echo $_FILES['file']['name'];
 
	$file=$_FILES['file']['name'];	
	
	$username = trim($_POST["username"]);
 
	$psScriptPath = "C:\inetpub\psroot\bulkaduser.ps1";  //the CSV is a variable if you chance that you must chance whats in the parameter in the powershell script 
    $query = shell_exec("powershell -command $psScriptPath -csv '$file' -group '$username'< NUL");	
    echo $query;
	file_put_contents("C:\cloudAppLogs\bulkadtool.txt","Bulks Groups were Added by $user on $ipaddress at $time on $date\r\n ",FILE_APPEND);
}

if ($_POST['group'] == "remove") {
    // code goes here
	$to = "uploads/".$_FILES['file']['name'];
	move_uploaded_file($_FILES['file']['tmp_name'], $to);
	echo $_FILES['file']['name'];
 
	$file=$_FILES['file']['name'];
	
	$username = trim($_POST["username"]);
 
	$psScriptPath = "C:\inetpub\psroot\bulkrmuser.ps1";  //the CSV is a variable if you chance that you must chance whats in the parameter in the powershell script 
    $query = shell_exec("powershell -command $psScriptPath -csv '$file' -group '$username'< NUL");	

    echo $query;
file_put_contents("C:\cloudAppLogs\bulkadtool.txt","Bulks Groups were Removed by $user on $ipaddress at $time on $date\r\n ",FILE_APPEND);
}
    ?>
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