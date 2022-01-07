<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="ITWepApps">
    <meta name="author" content="Didier Dorcelus (DJ)">

    <title>IT WepApps</title>

	
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/startmin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<!-- Custom App Settings -->
	<link href="css/styles.css" rel="stylesheet">
	
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	
</head>
<style>
input[type=submit] {
    width: 50%;
    background-color: #e8e6e5;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
	box-shadow: 0 0 5px 2px rgba(0,0,0,.35);
}

</style>

<body>
<?php
#$user=mb_strtoupper($_SERVER['REMOTE_USER']);
$user =($_SERVER['PHP_AUTH_USER']);
?>
<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style=" box-shadow: 0 0 5px 2px rgba(0,0,0,.35)">
        <div class="navbar-header">
         <img src="icons/emplogo2.png" style="height:50px;width:200px" >
		<!-- <img src="emplogo.png" style="float:left;height:40px">	 -->
        </div>

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <!-- Top Navigation: Left Menu -->
        <ul class="nav navbar-nav navbar-left navbar-top-links">
            <li><a href="index.php"><i class="fa fa-home fa-fw"></i> Home</a></li> 
        </ul>

        <!-- Top Navigation: Right Menu -->
        <ul class="nav navbar-right navbar-top-links">
            <li class="dropdown navbar-inverse">   
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <?php echo "<span style=color:#ff6666>$user</span>"?> <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li class="divider"></li>
                      <li><a href="http://emp/it/default.aspx" onclick="logout();"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
            </li>
        </ul>
		
        <!-- Sidebar -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">

                <ul class="nav" id="side-menu">
            
                    <li>
                        <a><i class="fa fa-sitemap fa-fw"></i> Apps <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="adpage.php">Active Directory</a>
                            </li>
                            <li>
                                <a href="#">Advanced AD <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Bulk User</a>
                                    </li>
									<li>
                                        <a href="#">Bulk Computer</a>
                                    </li>
                                </ul>
                            </li>
							  <li>
                                <a href="scan.php">ScanFolder Provision</a>
                            </li>
							  <li>
                                <a href="sql-dnc.php">DNC Provision</a>
                            </li>
                        </ul>
                    </li>
					
					
					 <li>
                        <a><i class="fa fa-sitemap fa-fw"></i> Active Directory Options <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
						  <li>
                                <a href="adpage-pwreset.php">Password Reset</a>
                            </li>
                </ul>

            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">IT CloudApps Active Directory <img src="icons/add.ico" width="40" height="40" style="border:0px"></h1>
                </div>
            </div>
	
		<!-- ... Your Application Below                                     -->


		
						<!-- USER INPUT BOX-->
						<div class="form" >
						  <form target="_self" method="post" name="form" >
							<label for="fname">LogonName (SamAccount)</label><br>
							<input type="text" name="username" required id="username" placeholder="Your name.." maxlength="20" />
                            	<input  type="password" name="password" required id="password" maxlength="20"placeholder="Type New Password" maxlength="20" />
                          <!-- USER SELECTION BELOW-->
						<!-- 	<select name="action">
						      <option selected="Selected" disabled> Select Additional Action </option>
							  <option  name="btnSubmit" id="btnSubmit" value="Unlock">Enable User Must Change Password At Logon</option>
							</select> -->
							
						  <!-- SUBMIT BUTTON BELOW-->
							<input type="submit" name="btnSubmit" id="btnSubmit" value="Set Password" >
						  </form>
						</div>	
						
						
			
			
			
			
			
	  <!-- ... Your Application Above ...                                     -->		
	   </div>
	

<div class="bottom">
<?php # PHP START 
	$username = trim($_POST["username"]);
	$password = trim($_POST["password"]);
	$ipaddress = gethostbyaddr($_SERVER['REMOTE_ADDR']);
	$date = date("m-d-y");
	$time = date("h:i:sa");
	
	
if($_POST['btnSubmit'] == 'Set Password'){
 
    $psScriptPath = "C:\inetpub\psroot\setpassword.ps1";
    $query = shell_exec("powershell -command $psScriptPath -user '$user' -username '$username' -password '$password'< NUL");
    file_put_contents("C:\cloudAppLogs\Set-password.txt","A Password was Initiated for $username by $user on $ipaddress at $time on $date\r\n ",FILE_APPEND);
	echo $query; 
		
}
	?>	
</div>	
    </div>	
	
</div>

<!-- jQuery -->
<script src="js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/startmin.js"></script>

<!-- Logoff Function JavaScript -->
<script type="text/javascript">
function logout() {
    var xmlhttp;
    if (window.XMLHttpRequest) {
          xmlhttp = new XMLHttpRequest();
    }
    // code for IE
    else if (window.ActiveXObject) {
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    if (window.ActiveXObject) {
      // IE clear HTTP Authentication
      document.execCommand("ClearAuthenticationCache");
      window.location.href='/where/to/redirect';
    } else {
        xmlhttp.open("GET", '/path/that/will/return/200/OK', true, "logout", "logout");
        xmlhttp.send("");
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4) {window.location.href='/where/to/redirect';}
        }


    }


    return false;
}
</script>


</body>
	                        <!--Footer-->
								<div class="footer">
	<p>&copy;<?php echo date('Y');?> Empereon Marketing<br/>
										
								</div>
</html>
