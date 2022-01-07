#UNLOCK SCRIPT Please notify DJ before Modifying this Script 

param([string]$cmd,[string]$cmd2) 
# Increase buffer width/height to avoid PowerShell from wrapping the text before
# sending it back to PHP (this results in weird spaces).
$pshost = Get-Host
$pswindow = $pshost.ui.rawui
$newsize = $pswindow.buffersize
$newsize.height = 3000
$newsize.width = 400
$pswindow.buffersize = $newsize


write-host "<div style="float:left"><h3> Results</h3></div>" 
$a = "<style>"
$a = $a + "TABLE{border-width: 1px;border-style: solid;border-color: black;border-collapse: collapse;}"
$a = $a + "TH{border-width: 1px;padding: 0px;border-style: solid;border-color: black;background-color:#F08080}"
$a = $a + "TD{border-width: 1px;padding: 0px;border-style: solid;border-color: black;background-color:#eae8ce}"
$a = $a + "</style>"
 
  #LOCKED OUT QUERY
if ($cmd -eq "locked") { 
Search-ADAccount -LockedOut | select name,samaccountname,lockedout,enabled | convertto-html -head $a

}


 #AD ADP QUERY
elseif ($cmd -eq "loa"){
Invoke-Sqlcmd -ServerInstance UIP1-data   -Query "SELECT * FROM staging.dbo.employeemaster with(nolock) WHERE status='inactive'" | select firstname,lastname,employeeid,status | convertto-html -head $a

}


else{echo "<div style="float:left"><h4>Not A Valid Command. <span style=color:red>Please See Command List<span><h4><div>"} 

