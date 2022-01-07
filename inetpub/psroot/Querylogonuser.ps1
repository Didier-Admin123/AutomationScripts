#Please notify DJ before Modifying this Script 

param([string]$cmd2) 
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

Get-WMIObject -class Win32_ComputerSystem -computer $cmd2 | Select UserName,Manufacturer,Model | convertto-html -head $a 
Get-wmiobject win32_bios -Computer $cmd2 | select serialnumber,version | convertto-html -head $a 