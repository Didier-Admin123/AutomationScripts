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
                        <a><i class="fa fa-sitemap fa-fw"></i> DNC Options <span class="fa arrow"></span></a>
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
                    <h1 class="page-header">IT CloudApps DNC Provision <img src="icons/dnc.ico" width="40" height="40" style="border:0px"></h1>
                </div>
            </div>
	
		<!-- ... Your Application Below                                     -->

<!-- Query Buttom--> 
     <div class="form" style="float:left;width:40%">
    <form name="testForm" id="testForm" target="_self" method="post" /> <b>Query DNC List for Number:</b><span style=color:red> Ex. 2081082056</span>
	<input type="text" name="number" required id="number" maxlength="20" placeholder="1111111111"/>
		<br></br><input type="submit" name="btnSubmit" id="btnSubmit" value="Query" />
    </form>	
</div>
		
						<!-- USER INPUT BOX-->
						<div class="form" >
										<form name="testForm" id="testForm" target="_self" method="post" /> 
					<b>Type Phone Number:</b><span style=color:red> Ex. 2081082056</span>
						<input type="text"  name="number" required id="number" maxlength="20" placeholder="1111111111" />
							<br></br>
						
				
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
						</div>	
						
						
			
			
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
											
								</div>
</html>
