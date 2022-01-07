# Please notify DJ before editing this script

#String Parameters from PHP
param([string]$username,[string]$user) 
# Increase buffer width/height to avoid PowerShell from wrapping the text before
# sending it back to PHP (this results in weird spaces).
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
$group2 = "EMP - IT - desktopadmins"
$members2 = Get-ADGroupMember -Identity $group2 -Recursive | Select -ExpandProperty samaccountname

 #>
#Logic statements below 
<# If ($members -contains $user -or $members1 -contains $user -or $members2 -contains $user ) { #>

	$User = Get-ADUser -Filter {sAMAccountName -eq $username}
		If ($User -eq $Null) {
	echo "<div style=float:left><h4>$username was not found in Active Directory </h4><h4 style=color:red>(Remember to type the LogonName or SamAccountName)</h4></divgdhdgh>"
		}Else{
	Get-ADUser $username -Properties enabled | Enable-ADAccount 
	Get-ADUser $username -Properties enabled | select name,enabled | convertto-html -head $a
		}
		

		
<# } Else {
        echo "<div style=float:left><h4 style=color:red>$user does not have access to run this command</h4></div>"
}
 #>
