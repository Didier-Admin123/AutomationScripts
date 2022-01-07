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
   <h1 style="color:#CE8181;outline-color:black;font-family:verdana"> Cloud Apps </h1>
     </div>

<!-- EMP APPS -->
<div class="img" style="height:160px">
 <p>
   <a target="_self" href="adpage.php">
    <img src="add.ico" width="100" height="100" style="border: 0px">
    </a>
     <div class="desc"> Active Directory </div>
 </p>
</div>
<!---BOX---->
<div class="img" style="height:160px">
  <p>
   <a target="_self" href="advadpage.php">
    <img src="advad.ico" width="100" height="100" style="border: 0px">
   </a>
    <div class="desc"> Advance AD </div>
  </p>
</div>

<!---BOX---->
<div class="img" style="height:160px">
 <p>
   <a target="_self" href="scanfolder.php">
     <img src="scanner.ico" width="100" height="100" style="border: 0px">
   </a>
  <div class="desc"> Scan Folder Provisioning </div>
 </p>
</div>

<div class="img" style="height:160px">
 <p>
   <a target="_self" href="sql-dncpage.php">
    <img src="dnc.ico" width="100" height="100" style="border: 0px">
   </a>
 <div class="desc"> DNC Provisioning </div>
 </p>
</div>



<!-- This Email Icon is Hidden

<div class="img" style="height:160px">
<p>
<a target="_self" href="emailpage.php">
<img src="email.ico" width="100" height="100" style="border: 0px">
</a>
 <div class="desc"> Email Provisioning </div>
</p>
</div>
//-->

			<!--Footer-->
			<div class="footer">
            <p>&copy;<?php echo date('Y');?> Empereon Marketing<br/>  
			</div>
						
<!-- HOME ICON DIV BOX
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
		-->	
</body>
</html>