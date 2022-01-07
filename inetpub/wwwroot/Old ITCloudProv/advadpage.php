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
	
<!--APP SELECTION-->
<div class="img" style="height:160px">
  <p>
   <a target="_self" href="bulkuser.php">
    <img src="bulkusers.ico" width="100" height="100" style="border: 0px">
      </a>
       <div class="desc"> Modify Bulk Users </div>
        </p>
         </div>
<div class="img" style="height:160px">
   <p>
     <a target="_self" href="bulkcomp.php">
      <img src="computers.ico" width="100" height="100" style="border: 0px">
       </a>
        <div class="desc"> Modify Bulk Comp</div>
         </p>
          </div>
<!-- This Auditing Box is hidden
<div class="img" style="height:160px">
  <p>
    <a target="_self" href="audit.php">
     <img src="audit.ico" width="100" height="100" style="border: 0px">
      </a>
       <div class="desc"> Auditing / Reporting </div>
        </p>
         </div>	
//-->
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