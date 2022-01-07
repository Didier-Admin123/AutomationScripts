param([string]$number,[string]$line)

#HTML format results
echo "<div style="float:left"><h3> Results </h3></div>"  
$a = "<style>"
$a = $a + "TABLE{border-width: 1px;border-style: solid;border-color: black;border-collapse: collapse;}"
$a = $a + "TH{border-width: 1px;padding: 0px;border-style: solid;border-color: black;background-color:#F08080}"
$a = $a + "TD{border-width: 1px;padding: 0px;border-style: solid;border-color: black;background-color:#eae8ce}"
$a = $a + "</style>"

$dev = Invoke-Sqlcmd -ServerInstance db-d01 -Database dnctest -Query "SELECT phone FROM donotcall with(nolock) WHERE phone='$number'" | select -ExpandProperty phone

# Logic statement below will take the $line variable or Client and match it to the ClientID  
$id = Invoke-Sqlcmd -ServerInstance db-d01 -Database dnctest -Query "

DECLARE @Database VARCHAR(MAX)= 'EDI_System';
DECLARE @Schema VARCHAR(MAX)= 'dbo';
DECLARE @Table VARCHAR(MAX)= 'Clients';
DECLARE @ResultColumn VARCHAR(MAX)= 'ClientID';
DECLARE @FilterColumn VARCHAR(MAX)= 'ClientShortname';
DECLARE @FilterString VARCHAR(MAX)= '$line';
DECLARE @SQL VARCHAR(MAX);


SET @SQL = 'select ' + @ResultColumn + ' from   ' + @Database + '.' + @Schema
    + '.' + @Table + ' Where ' + @FilterColumn + '=''' + @FilterString + ''';';

EXECUTE (@SQL); " | select -expandproperty clientid 


# Statement below will add the number to the table and use the $id as the ClientID
Invoke-Sqlcmd -ServerInstance db-d01 -Database dnctest -Query " 
declare @Phone varchar(10)
set @Phone = replace(replace(RTRIM('$number'),' ',''),'-','')

Insert into [db-d01].[dnctest].[dbo].[DoNotCall]  (Phone,[ClientID])
Values (rtrim(ltrim(@Phone)),$id)
	select * from [db-d01].[dnctest].[dbo].[DoNotCall]  with(nolock) where Phone = @Phone
     " | convertto-html -head $a

#Logic Statement To Handle Numbers Not Found in DEV DNC List	 
if($dev -contains $number){echo "<div style=float:left><h3><span style=color:red>$number</span> Was Added To The <span style=color:red>$line</span> DNC List<h3></div>"}
else{echo "<div style=float:left><h3><span style=color:red>$number</span> Was Not Added To The <span style=color:red>$line</span> DNC List<h3></div>"}