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
<div style="box-shadow: 5px 5px 5px #888888;border-radius: 5px;background-color:white;">
<img src="emplogo.png" style="float:right">
<h1 style="color:#CE8181;outline-color:black;font-family:verdana"> Cloud Apps </h1>
</div>

<!-- AD ICON DIV BOX-->
<div class="img" style="width:100px">
    <img src="dnc.ico" alt="Trolltunga Norway" width="200" height="180">
  </div>
  
<!-- Query Locked Users Buttom--> 
     <div class="img">
    <form name="testForm" id="testForm" target="_self" method="post" /> <b>Query DNC List for Number:</b><span style=color:red>Ex. 2081082056</span>
	<input type="text" name="number" required id="number" maxlength="20" />
		<br></br><input type="submit" name="btnSubmit" id="btnSubmit" value="Query" />
    </form>	
</div>

<!-- USER PHONE INPUT BOX-->
<div class="img" style="width:250px;float:right">
<div style="color:#E67575;outline-color:black;font-family:verdana;background-color:white;width:250px"><h2>Add DNC Number</h2></div>



<form name="testForm" id="testForm" target="_self" method="post" /> 
<b>Phone Number:</b> <br><span style=color:red>Ex. 2081082056</span>
	<input type="text" name="number" required id="number" maxlength="20" />
		<br></br>
	
<b>Select Client:</b>
<!----CLIENT SELECT DROP DOWN MENU--->
<!--The "line" will be the name of the Select Box options-->
<select name="line" >
	<option selected="Selected" disabled> Choose Client </option>
<?php

#This variable will hold the script path
$psScriptPath = "C:\inetpub\psroot\querydropdown.ps1";

#This Variable will hold the powershell list for the clients
$query = shell_exec("powershell -command $psScriptPath -client '$client'< NUL");

/* 
Explode Method: explode — Split a string by string
#The Output variable will use the Explode Method to Slipt the String values from Powershell into a list instead of 1,2,3 it will be horizontal 
1
2
3

*/
$output = explode(" ", $query);

/*
<pre> Tab
Preformatted text:

<pre>
Text in a pre element
is displayed in a fixed-width
font, and it preserves
both      spaces and
*/
echo "<pre>";

#Login Foreach Statement
foreach($output as $line) {
  ?> 
<option value="<?php echo strtolower($line);?>"><?php echo $line; ?></option>
<?php
}
echo "</pre>";
?>
	</select>
	<br></br>
	<input type="submit" name="btnSubmit" id="btnSubmit" value="Add-DNC" />
</div>
</form>


<!--PHP SCRIPT BELOW -->	
<div class="bottom">

<?php # PHP START 
# str_replace() method will remove any dashes within the variable
# trim() method will remove any leading or trailing spaces
#The Line Variable will be the result of what was selected within the <select> box it will be passes via POST
   
    $line = trim($_POST["line"]);
    $username = trim($_POST["username"]);
	$number = str_replace("-","",trim($_POST["number"]));
	$ipaddress = gethostbyaddr($_SERVER['REMOTE_ADDR']);
	$date = date("m-d-y");
	$time = date("h:i:sa");
  
if($_POST['btnSubmit'] == 'Query'){
 
    $psScriptPath = "C:\inetpub\psroot\SQL-DNC-Query.ps1";
    $query = shell_exec("powershell -command $psScriptPath -number '$number'< NUL");
    echo $query; 
}


if($_POST['btnSubmit'] == 'Add-DNC'){

    $psScriptPath = "C:\inetpub\psroot\SQL-DNC-Add.ps1";
    $query = shell_exec("powershell -command $psScriptPath -number '$number' -line '$line'  < NUL");
	echo $query;
	file_put_contents("C:\cloudAppLogs\sql-dnc.txt","DNC Addition was Initiated for $number on the target DB $line by $user on $ipaddress at $time on $date\r\n ",FILE_APPEND);
	

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