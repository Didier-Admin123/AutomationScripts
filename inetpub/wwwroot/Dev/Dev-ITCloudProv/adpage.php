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


#hover-content {
    display:none;

}
#parent:hover #hover-content {
    display:block;
	
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

	<div class="img" style="width:100px;float:left">
<form name="testForm" id="testForm" target="_self" method="post" />
	<div class="dropdown" >
	<img src="icons/Investigate.ico" title="AD Queries" width="200" height="180" style="border: 0px">
	<div class="dropdown-content" style="width:300px"><br>
<!--Form Items Below-->


<input type="text" name="cmd" required id="cmd" maxlength="20" placeholder="Type Command..." />	
<input type="submit" name="btnSubmit" id="btnSubmit" value="Query" >

<!--Div Hidden List Box Below-->
	<div id="parent">
    Show Query Command List
    <div id="hover-content">
        Locked Users = <span style="color:red">locked </span><br>
		Leave Of Absence Users = <span style="color:red">loa </span><br>
    </div>
	</div>
  
  
  
</form>

	</div>
	</div>
	</div>	
	
	<!---QUERY LOGON USER BOX--->
	  <div id="parent"  style="float:left;width:50%;
    bottom: 60%;
    position: fixed;
    width: 30%;">
    <b style=" font-style: italic">Hover Here to Query Logon Users on PCs</b>
    <div id="hover-content" style="width:50%;
    bottom: 50%;
    position: fixed;
    width: 45%;">
	<form target="_self" method="post" title="Using IP Is More Efficient">
		<input type="text" style="width:50%" name="cmd2" required id="cmd2" maxlength="20" placeholder="Type HostName or IP..." />	
<input type="submit" name="btnSubmit" id="btnSubmit" value="Query2" >   
   </div>
	</div>
	</form>

		
						<!-- USER INPUT BOX-->
						<div class="form" >
						  <form target="_self" method="post" >
							<label for="fname">LogonName (SamAccount)</label><br>
							<input type="text" name="username" required id="username" placeholder="Your Name..." maxlength="20" />
                          <!-- USER SELECTION BELOW-->
							<select name="action">
						<option selected="Selected" disabled> Select Action </option>
							  <option  name="btnSubmit" id="btnSubmit" value="Unlock">Unlock Account</option>
							  <option  name="btnSubmit" id="btnSubmit" value="Enable">Enable Account</option>
							  <option name="btnSubmit" id="btnSubmit" value="Disable" >Disable Account</option>
							  <option name="btnSubmit" id="btnSubmit" value="Query ADP Status">Query ADP Status</option>
							</select>
							
						  <!-- SUBMIT BUTTON BELOW-->
							<input type="submit" name="btnSubmit" id="btnSubmit" >
						  </form>
						</div>	
						
						
			
			
			
			
			
	  <!-- ... Your Application Above ...                                     -->		
	   </div>
	

<div class="bottom">
<?php # PHP START 
	$username = trim($_POST["username"]);
	$cmd = mb_strtolower(trim($_POST["cmd"]));
	$cmd2 = trim($_POST["cmd2"]);
	$ipaddress = gethostbyaddr($_SERVER['REMOTE_ADDR']);
	$date = date("m-d-y");
	$time = date("h:i:sa");
	
if($_POST['action'] == 'Unlock'){

    $psScriptPath = "C:\inetpub\psroot\unlock.ps1";
    $query = shell_exec("powershell -command $psScriptPath -username '$username'< NUL");
    file_put_contents("C:\cloudAppLogs\Account-unlock.txt","An Account Unlock was Initiated for $username by $user on $ipaddress at $time on $date\r\n ",FILE_APPEND);
	echo $query; 
	
}
	if($_POST['action'] == 'Query ADP Status'){
 
    $psScriptPath = "C:\inetpub\psroot\ADPquery.ps1";
    $query = shell_exec("powershell -command $psScriptPath -username '$username'< NUL");
    echo $query; 
	
}	

if($_POST['action'] == 'Enable'){
 
    $psScriptPath = "C:\inetpub\psroot\Enable.ps1";
    $query = shell_exec("powershell -command $psScriptPath -username '$username' -user '$user'< NUL");
    file_put_contents("C:\cloudAppLogs\Disable.txt","An Account Enable was Initiated for $username by $user on $ipaddress at $time on $date\r\n ",FILE_APPEND);	
	echo $query; 
	
}

if($_POST['action'] == 'Disable'){

    $psScriptPath = "C:\inetpub\psroot\disable.ps1";
    $query = shell_exec("powershell -command $psScriptPath -username '$username' -user '$user'< NUL");
    echo $query; 
	file_put_contents("C:\cloudAppLogs\Disable.txt","An Account Disable was Initiated for $username by $user on $ipaddress at $time on $date\r\n ",FILE_APPEND);	

}
if($_POST['btnSubmit'] == 'Query'){
 
    $psScriptPath = "C:\inetpub\psroot\Querycmd.ps1";
    $query = shell_exec("powershell -command $psScriptPath -cmd '$cmd'< NUL");
    echo $query; 
}

if($_POST['btnSubmit'] == 'Query2'){
 
    $psScriptPath = "C:\inetpub\psroot\Querylogonuser.ps1";
    $query = shell_exec("powershell -command $psScriptPath -cmd2 '$cmd2'< NUL");
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
								<img src="icons/emplogo.png" style="box-shadow: 0 0 5px 2px rgba(0,0,0,.35)">			
								</div>
</html>
