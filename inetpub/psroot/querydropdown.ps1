# Please notify DJ before editing this script 

param([string]$client) 

$client = Invoke-Sqlcmd -ServerInstance db-d01 -Database EDI_System -Query "SELECT clientshortname FROM clients" | select -expandproperty clientshortname 

echo $client




