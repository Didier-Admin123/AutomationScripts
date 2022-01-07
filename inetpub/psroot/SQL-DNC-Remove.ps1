# Please notify DJ before editing this script
param([string]$number,[string]$client)

#HTML format results
echo "<div style="float:left"><h3> Results </h3></div>"  
$a = "<style>"
$a = $a + "TABLE{border-width: 1px;border-style: solid;border-color: black;border-collapse: collapse;}"
$a = $a + "TH{border-width: 1px;padding: 0px;border-style: solid;border-color: black;background-color:#F08080}"
$a = $a + "TD{border-width: 1px;padding: 0px;border-style: solid;border-color: black;background-color:#eae8ce}"
$a = $a + "</style>"

#Client Variables are assigned below 


# LOGIC STATEMENTS BELOW 


#TEST DATABASE DNCTEST 
	if($client -eq "dnctest"){
echo "<div style=float:left><h3><span style=color:red>$number</span> Was Removed From The <span style=color:red>$client</span> DNC List<h3></div>"

Invoke-Sqlcmd -ServerInstance db-d01 -Database dnctest -Query " 
DELETE FROM DoNotCall
WHERE Phone='$number' AND ClientID='0';
     " | convertto-html -head $a
	 
	 } 
	


	if($client -eq "att"){
echo "<div style=float:left><h3><span style=color:red>$number</span> Was Removed From The <span style=color:red>$client</span> DNC List<h3></div>"

Invoke-Sqlcmd -ServerInstance db-d01 -Database dnctest -Query " 
DELETE FROM DoNotCall
WHERE Phone='$number' AND ClientID='66';
     " | convertto-html -head $a
	 
	 } 


	if($client -eq "charter"){
echo "<div style=float:left><h3><span style=color:red>$number</span> Was Removed From The <span style=color:red>$client</span> DNC List<h3></div>"

Invoke-Sqlcmd -ServerInstance db-d01 -Database dnctest -Query " 
DELETE FROM DoNotCall
WHERE Phone='$number' AND ClientID='7';
     " | convertto-html -head $a
	 
	 } 
	

	if($client -eq "comcast"){
echo "<div style=float:left><h3><span style=color:red>$number</span> Was Removed From The <span style=color:red>$client</span> DNC List<h3></div>"

Invoke-Sqlcmd -ServerInstance db-d01 -Database dnctest -Query " 
DELETE FROM DoNotCall
WHERE Phone='$number' AND ClientID='9';
     " | convertto-html -head $a
	 
	 } 



	if($client -eq "cox"){
echo "<div style=float:left><h3><span style=color:red>$number</span> Was Removed From The <span style=color:red>$client</span> DNC List<h3></div>"

Invoke-Sqlcmd -ServerInstance db-d01 -Database dnctest -Query " 
DELETE FROM DoNotCall
WHERE Phone='$number' AND ClientID='10';
     " | convertto-html -head $a
	 
	 } 	



	if($client -eq "directv"){
echo "<div style=float:left><h3><span style=color:red>$number</span> Was Removed From The <span style=color:red>$client</span> DNC List<h3></div>"

Invoke-Sqlcmd -ServerInstance db-d01 -Database dnctest -Query " 
DELETE FROM DoNotCall
WHERE Phone='$number' AND ClientID='14';
     " | convertto-html -head $a
	 
	 } 	


	if($client -eq "ebay"){
echo "<div style=float:left><h3><span style=color:red>$number</span> Was Removed From The <span style=color:red>$client</span> DNC List<h3></div>"

Invoke-Sqlcmd -ServerInstance db-d01 -Database dnctest -Query " 
DELETE FROM DoNotCall
WHERE Phone='$number' AND ClientID='68';
     " | convertto-html -head $a
	 
	 }  
	 

	 
	if($client -eq "emp"){
echo "<div style=float:left><h3><span style=color:red>$number</span> Was Removed From The <span style=color:red>$client</span> DNC List<h3></div>"

Invoke-Sqlcmd -ServerInstance db-d01 -Database dnctest -Query " 
DELETE FROM DoNotCall
WHERE Phone='$number' AND ClientID='54';
     " | convertto-html -head $a
	 
	 } 
	 
	 
	 
	 
	if($client -eq "goodcents"){
echo "<div style=float:left><h3><span style=color:red>$number</span> Was Removed From The <span style=color:red>$client</span> DNC List<h3></div>"

Invoke-Sqlcmd -ServerInstance db-d01 -Database dnctest -Query " 
DELETE FROM DoNotCall
WHERE Phone='$number' AND ClientID='74';
     " | convertto-html -head $a
	 
	 }
	 
	 

	if($client -eq "green"){
echo "<div style=float:left><h3><span style=color:red>$number</span> Was Removed From The <span style=color:red>$client</span> DNC List<h3></div>"

Invoke-Sqlcmd -ServerInstance db-d01 -Database dnctest -Query " 
DELETE FROM DoNotCall
WHERE Phone='$number' AND ClientID='72';
     " | convertto-html -head $a
	 
	 }
	 
	 
	 
	if($client -eq "houston"){
echo "<div style=float:left><h3><span style=color:red>$number</span> Was Removed From The <span style=color:red>$client</span> DNC List<h3></div>"

Invoke-Sqlcmd -ServerInstance db-d01 -Database dnctest -Query " 
DELETE FROM DoNotCall
WHERE Phone='$number' AND ClientID='19';
     " | convertto-html -head $a
	 
	 }
	 
	 
	 
	 
	if($client -eq "major"){
echo "<div style=float:left><h3><span style=color:red>$number</span> Was Removed From The <span style=color:red>$client</span> DNC List<h3></div>"

Invoke-Sqlcmd -ServerInstance db-d01 -Database dnctest -Query " 
DELETE FROM DoNotCall
WHERE Phone='$number' AND ClientID='75';
     " | convertto-html -head $a
	 
	 }
	 
	 
	 
	 
	if($client -eq "onestop"){
echo "<div style=float:left><h3><span style=color:red>$number</span> Was Removed From The <span style=color:red>$client</span> DNC List<h3></div>"

Invoke-Sqlcmd -ServerInstance db-d01 -Database dnctest -Query " 
DELETE FROM DoNotCall
WHERE Phone='$number' AND ClientID='65';
     " | convertto-html -head $a
	 
	 }
	 
	 
	 
	 
	if($client -eq "tucson"){
echo "<div style=float:left><h3><span style=color:red>$number</span> Was Removed From The <span style=color:red>$client</span> DNC List<h3></div>"

Invoke-Sqlcmd -ServerInstance db-d01 -Database dnctest -Query " 
DELETE FROM DoNotCall
WHERE Phone='$number' AND ClientID='45';
     " | convertto-html -head $a
	 
	 }