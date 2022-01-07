# Please notify DJ before editing this script

param([string]$username) 
# Increase buffer width/height to avoid PowerShell from wrapping the text before
# sending it back to PHP (this results in weird spaces).
$pshost = Get-Host
$pswindow = $pshost.ui.rawui
$newsize = $pswindow.buffersize
$newsize.height = 3000
$newsize.width = 400
$pswindow.buffersize = $newsize



write-host "<div><h3> Results</h3></div>" 
$a = "<style>"
$a = $a + "TABLE{border-width: 1px;border-style: solid;border-color: black;border-collapse: collapse;}"
$a = $a + "TH{border-width: 1px;padding: 0px;border-style: solid;border-color: black;background-color:#F08080}"
$a = $a + "TD{border-width: 1px;padding: 0px;border-style: solid;border-color: black;background-color:#eae8ce}"
$a = $a + "</style>"

$User = Get-ADUser -Filter {sAMAccountName -eq $username}
If ($User -eq $Null) {
echo "<h4>$username was not found in Active Directory </h4><h4 style=color:red>(Remember to type the LogonName or SamAccountName)</h4>"

}Else{
Get-ADUser $username -Properties lockedout | unlock-adaccount 
Get-ADUser $username -Properties lockedout | select name,lockedout | convertto-html -body $a
}

