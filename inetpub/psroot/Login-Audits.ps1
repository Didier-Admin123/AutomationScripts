#Import-Module ActiveDirectory


Get-ADComputer -searchbase "OU=IT,OU=Empereon Computers,DC=empereon,DC=local" -Filter * | select name | Export-Csv "\\fileservices\IT\SystemDocs\Active DIR Logs\temp.csv" -NoTypeInformation


$file = "\\fileservices\IT\SystemDocs\Active DIR Logs\.\temp.csv"
$list = Import-Csv $file

$time = Get-Date -format F
ForEach ($User in $List)
{
echo "Computer" $user.name >> "\\fileservices\IT\SystemDocs\Active DIR Logs\Userlogin.csv"
Get-WmiObject -ComputerName $user.name –Class Win32_ComputerSystem | Select-Object UserName  >> "\\fileservices\IT\SystemDocs\Active DIR Logs\Userlogin.csv" 
#Get-CimInstance –ComputerName $user.name –ClassName Win32_ComputerSystem | Select-Object UserName
echo "Login TimeStamp: $time" >> "\\fileservices\IT\SystemDocs\Active DIR Logs\Userlogin.csv" 
echo "=============================================================" >> "\\fileservices\IT\SystemDocs\Active DIR Logs\Userlogin.csv"
#Get-ADComputer $user.name
}

#Remove-Item $file 
