# Please notify DJ before editing this script


#String Parameters from PHP
param([Parameter(ValueFromPipeline=$true)][String]$username,[String]$password = "Password1",[string]$user)

# Increase buffer width/height to avoid PowerShell from wrapping the text before
# sending it back to PHP (this results in weird spaces).
$pshost = Get-Host
$pswindow = $pshost.ui.rawui
$newsize = $pswindow.buffersize
$newsize.height = 3000
$newsize.width = 400
$pswindow.buffersize = $newsize

#HTML format results
echo "<div style="float:left"><h3> Results </h3></div>"  
$a = "<style>"
$a = $a + "TABLE{border-width: 1px;border-style: solid;border-color: black;border-collapse: collapse;}"
$a = $a + "TH{border-width: 1px;padding: 0px;border-style: solid;border-color: black;background-color:#F08080}"
$a = $a + "TD{border-width: 1px;padding: 0px;border-style: solid;border-color: black;background-color:#eae8ce}"
$msg = "The Users Temporary Password was set to <b>Password1</b>"
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
<# If ($members -contains $user -or $members1 -contains $user -or $members2 -contains $user ) { #>
  
	$User = Get-ADUser -Filter {sAMAccountName -eq $username}
		If ($User -eq $Null) {
	echo "<div style=float:left>$username was not found in Active Directory <p style=color:red>(Remember to type the LogonName or SamAccountName)</p></div>"

		}Else{
		$query = get-aduser $username -properties passwordneverexpires | select -ExpandProperty passwordneverexpires
		If ($query -eq $true){
		
		echo "<div style=float:left>Unable to Set Temporary Password because the <span style=color:red>$username</span> account is set to Password Never Expires.</div>"
		
		}Else{
		
			Set-adaccountpassword $username -reset -newpassword (ConvertTo-SecureString -AsPlainText $password -Force)
			Set-aduser $username -changepasswordatlogon $true

			$msg = "<div style=float:left><b style=color:red>$username</b> Temporary Login Password was set to <b style=color:red>Password1</b></div>"
		echo $msg
			 
		}
		
	}

<# } Else {
        echo "<div style=float:left><h3 style=color:red>$user does not have access to run this command</h3></div>"
} #>
