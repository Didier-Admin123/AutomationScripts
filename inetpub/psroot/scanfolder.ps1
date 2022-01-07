# Please notify DJ before editing this script 

#String Parameters from PHP
param([string]$username2,[string]$user)
$pshost = Get-Host
$pswindow = $pshost.ui.rawui
$newsize = $pswindow.buffersize
$newsize.height = 3000
$newsize.width = 400
$pswindow.buffersize = $newsize

#HTML format results
echo "<h3> Results </h3>"  
$a = "<style>"
$a = $a + "TABLE{border-width: 1px;border-style: solid;border-color: black;border-collapse: collapse;}"
$a = $a + "TH{border-width: 1px;padding: 0px;border-style: solid;border-color: black;background-color:#F08080}"
$a = $a + "TD{border-width: 1px;padding: 0px;border-style: solid;border-color: black;background-color:#eae8ce}"
$a = $a + "</style>"

<# #Groups with Access to run this Script  
$group = "EMP - IT - HelpDesk"
$members = Get-ADGroupMember -Identity $group -Recursive | Select -ExpandProperty samaccountname
$group1 = "EMP - IT - DesktopSupport"
$members1 = Get-ADGroupMember -Identity $group1 -Recursive | Select -ExpandProperty samaccountname
$group2 = "EMP - IT - Desktopadmins"
$members2 = Get-ADGroupMember -Identity $group2 -Recursive | Select -ExpandProperty samaccountname

 #>
#Logic statements below 

#Begin Statement 1)
<# If ($members -contains $user -or $members1 -contains $user -or $members2 -contains $user ){ #>
	
	$uservar = Get-ADUser -Filter {sAMAccountName -eq $username2}

	#Begin Statement 2)
	If ($uservar -eq $Null) {
	echo "<div style=float:left> <h4>User was not found in Active Directory </h4><h4 style=color:red>(Remember to type the LogonName or SamAccountName)</h4></div>"
	
	#End Statement 2)
	}Else{
	$test = Test-Path "\\fileservices\scans\$username2"
	
	#Begin Statement 3)
	if ($test -eq $true){echo "<div style=float:left><h4 style="color:red">The folder already exist</h4></div>"
	
	#End Statement 3)
	}else{
$folder = "$username2"
New-Item -Path "\\fileservices\scans\" -Name "$folder" -ItemType "directory" |  Out-Null #This Out-Null will not show the command results

#Setting the ACL Permissions 
$acl = Get-Acl \\fileservices\scans\$folder
$permission = "empereon\$username2","ReadAndExecute,Delete", "ContainerInherit, ObjectInherit", "None", "Allow"   #<--- Permissions can be edited here 
$accessRule = New-Object System.Security.AccessControl.FileSystemAccessRule $permission
$acl.SetAccessRule($accessRule)
$acl | Set-Acl \\fileservices\scans\$folder


#Adding home drive to AD Profile
Set-ADuser -Identity $username2 -HomeDrive "S:" -HomeDirectory "\\fileservices\scans\$username2" 


#Displaying results 
Get-ADUser $username2 -Properties * | select name,HomeDrive,HomeDirectory | convertto-html -head $a

echo "<h2>Permissions</h2>"
Get-Acl "\\fileservices\scans\$folder" | select PSPath,AccessToString |  convertto-html -head $a

}
}


<# #End Statement 1)
} Else {
        echo "<div style=float:left><h4 style=color:red>$user does not have access to run this command</h4></div>"
} #>