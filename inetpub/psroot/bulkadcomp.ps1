# Please notify DJ before editing this script 

#String Parameters from PHP
param([string]$csv,[string]$group,[string]$test) 
# Increase buffer width/height to avoid PowerShell from wrapping the text before
# sending it back to PHP (this results in weird spaces).
$pshost = Get-Host
$pswindow = $pshost.ui.rawui
$newsize = $pswindow.buffersize
$newsize.height = 3000
$newsize.width = 400
$pswindow.buffersize = $newsize

#HTML format results
write-host "<div style="float:left"><h3> Results</h3></div>" 
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
$group2 = "EMP - IT - DesktopAdmins"
$members2 = Get-ADGroupMember -Identity $group2 -Recursive | Select -ExpandProperty samaccountname
 #>

#Logic statements below 

<# 
If ($members -contains $user -or $members1 -contains $user -or $members2 -contains $user ) {
	$User = Get-ADUser -Filter {sAMAccountName -eq $username}
 #>
	$extn = [IO.Path]::GetExtension($csv)
	 
	 if ($extn -eq ".csv") {
	 $Users = Get-ADgroup -Filter {sAMAccountName -eq $group}
	 
	 If ($Users -eq $Null) {
	echo "<div style=float:left>$group was not found in Active Directory <p style=color:red>(Remember to type the LogonName or SamAccountName)</p></divgdhdgh>"
		}Else{
	 
	#Moving Uploaded file to temp location
	Move-Item "C:\inetpub\wwwroot\uploads\$csv" "\\fileservices\it\DJ"
	$path = "\\fileservices\it\DJ\"
	$newfile= ".\$csv"
	$file = "$path"+"$newfile"
	$list = Import-Csv $file


	ForEach ($User in $List)
	{
	$ErrorActionPreference = "SilentlyContinue" # This is for the -EA handling 
	#ADDING THE USER TO AD GROUP
	Add-ADGroupMember -Identity $group -Members $User.name -EA
	}

	echo "<div style="float:left">Group Members of <span style=color:red>$group</span></div>"
	Get-ADGroupMember "$group" | select name,samaccountname | convertto-html -head $a


	#Removing Uploaded file from temp location
	Remove-Item "\\fileservices\it\DJ\$csv"

	}
	}else{ 
	echo "<div style="float:left"><span style=color:red>The Process Failed, uploaded file is not a CSV</span ></div>"
	Remove-Item "C:\inetpub\wwwroot\uploads\$csv"
	}

<# } Else {
        echo "<div style=float:left><h3 style=color:red>$user does not have access to run this command</h3></div>"
} #>