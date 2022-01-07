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
       <a class="navbar-brand" href="index.php" title="Home" style="color:#ff6666">Empereon Marketing</a>
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
        <ul class="nav navbar-right navbar-top-links ">
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
        <div class="navbar-default sidebar" role="navigation" >
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
                        <a><i class="fa fa-sitemap fa-fw"></i> Scan Folder Options <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
						  <li>
                                <a href="#">In Production</a>
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
                    <h1 class="page-header">IT CloudApps ScanFolder Provision <img src="icons/scanner.ico" width="40" height="40" style="border:0px"></h1>
                </div>
            </div>
	
		<!-- ... Your Application Below                                     -->

	<div class="img" style="width:100px;float:left">
 <div class="dropdown">
  <img src="icons/printer.ico" title="Click here to add the user to the Scanner" width="200" height="180" style="border: 0px">
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
		
		
		
<!-- USER INPUT BOX-->
<div class="form" style="width:30%">
   <form name="testForm" id="testForm" target="_self" method="post" /> 
	<label for="fname">LogonName (SamAccount)</label>
	<input type="text" name="username2" required id="username" maxlength="20" style="width:70%" placeholder="LogonName..." />
         <br></br> 
<!---		 
		 Type the Scan Folder name<br> 
    <input type="text" name="foldername" required id="username" maxlength="20" /><br></br> 
    --->
	<input type="submit" name="btnSubmit" id="btnSubmit" style="width:70%;box-shadow: 0 0 5px 2px rgba(0,0,0,.35)" value="CreateScanFolder" />
  <br><br>
 </form>  	
</div>
						
<div class="bottom" style="padding-bottom:50px">

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
  <!-- ... Your Application Above ...                                     -->		
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
								<img src="icons/emplogo.png" style="box-shadow: 0 0 5px 2px rgba(0,0,0,.35)">			
								</div>
</html>
