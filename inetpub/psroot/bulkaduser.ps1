# Please notify DJ before editing this script

param([string]$csv,[string]$group,[string]$test) 
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

#ADDING THE USER TO AD GROUP
Add-ADGroupMember -Identity $group -Members $User.name 
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