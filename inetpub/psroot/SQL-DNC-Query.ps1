# Please notify DJ before editing this script
param([string]$number)

#HTML format results
echo "<div style="float:left"><h3> Results </h3></div>"  
$a = "<style>"
$a = $a + "TABLE{border-width: 1px;border-style: solid;border-color: black;border-collapse: collapse;}"
$a = $a + "TH{border-width: 1px;padding: 0px;border-style: solid;border-color: black;background-color:#F08080}"
$a = $a + "TD{border-width: 1px;padding: 0px;border-style: solid;border-color: black;background-color:#eae8ce}"
$a = $a + "</style>"

#Client Variables are assigned below 

#Companies DNC Lists To Query att charter and goodcents has a Phone attribute or column
$att = Invoke-Sqlcmd -ServerInstance laguna\client -Database att -Query "SELECT phone FROM donotcall with(nolock) WHERE phone='$number'" | select -ExpandProperty phone
$charter = Invoke-Sqlcmd -ServerInstance laguna\charter -Database charter -Query "SELECT phone FROM donotcall with(nolock) WHERE phone='$number'" | select -ExpandProperty phone
$goodcents = Invoke-Sqlcmd -ServerInstance laguna\client -Database goodcents -Query "SELECT phone FROM donotcall with(nolock) WHERE phone='$number'" | select -ExpandProperty phone
$dev = Invoke-Sqlcmd -ServerInstance db-d01 -Database dnctest -Query "SELECT phone FROM donotcall with(nolock) WHERE phone='$number'" | select -ExpandProperty phone


#The Companies below do not have the Phone property or column only the "Column1" can be -expanded by Powershell  
$directv = Invoke-Sqlcmd -ServerInstance atlas -Database directv -Query "SELECT area+exch+number FROM donotcall with(nolock) WHERE area+exch+number='$number'" | select -ExpandProperty column1
$cox = Invoke-Sqlcmd -ServerInstance atlas -Database cox -Query "SELECT area+exch+number FROM donotcall with(nolock) WHERE area+exch+number='$number'" | select -ExpandProperty column1
$cable = Invoke-Sqlcmd -ServerInstance atlas -Database cable -Query "SELECT area+exch+number FROM donotcall with(nolock) WHERE area+exch+number='$number'" | select -ExpandProperty column1
$tucson = Invoke-Sqlcmd -ServerInstance atlas -Database tucson -Query "SELECT area+exch+number FROM donotcall with(nolock) WHERE area+exch+number='$number'" | select -ExpandProperty column1


#Logic Statements below

#DJ DEV Database
if($dev -contains $number){
echo "<div style=float:left><h4><span style=color:red>$number</span> Was Found In The DNCTest Database</div></h4>"
Invoke-Sqlcmd -ServerInstance db-d01 -Database dnctest -Query "SELECT * FROM donotcall with(nolock) WHERE
phone='$number'" | convertto-html -head $a

}#Att
elseif($att -contains $number){
echo "<div style=float:left><h4><span style=color:red>$number</span> Was Found In The ATT Database</div></h4>"
Invoke-Sqlcmd -ServerInstance laguna\client -Database att -Query "SELECT * FROM donotcall with(nolock) WHERE
phone='$number'" | convertto-html -head $a

}

#Charter
elseif ($charter -contains $number){

echo "<div style=float:left><h4><span style=color:red>$number</span> Was Found In The Charter Database</h4></div>"
Invoke-Sqlcmd -ServerInstance laguna\charter -Database charter -Query "SELECT * FROM donotcall with(nolock) WHERE
phone='$number'" | convertto-html -head $a

}

#GoodCents
elseif($goodcents -contains $number){
echo "<div style=float:left><h4><span style=color:red>$number</span> Was Found In The GoodCents Database</div></h4>"
Invoke-Sqlcmd -ServerInstance laguna\client -Database goodcents -Query "SELECT * FROM donotcall with(nolock) WHERE
phone='$number'" | convertto-html -head $a

}

#DirecTV
elseif($directv -contains $number){
echo "<div style=float:left><h4><span style=color:red>$number</span> Was Found In The DirectTV Database</div></h4>"
Invoke-Sqlcmd -ServerInstance atlas -Database directv -Query "SELECT area+exch+number FROM donotcall with(nolock) WHERE
area+exch+number='$number'" | convertto-html -head $a
}

#COX
elseif($cox -contains $number){
echo "<div style=float:left><h4><span style=color:red>$number</span> Was Found In The COX Database</div></h4>"
Invoke-Sqlcmd -ServerInstance atlas -Database cox -Query "SELECT area+exch+number FROM donotcall with(nolock) WHERE
area+exch+number='$number'" | convertto-html -head $a

}

#Cable
elseif($cable -contains $number){
echo "<div style=float:left><h4><span style=color:red>$number</span> Was Found In The Cable Database</div></h4>"
Invoke-Sqlcmd -ServerInstance atlas -Database cable -Query "SELECT area+exch+number FROM donotcall with(nolock) WHERE
area+exch+number='$number'" | convertto-html -head $a

}

#Tucson
elseif($tucson -contains $number){
echo "<div style=float:left><h4><span style=color:red>$number</span> Was Found In The Tucson Database</div></h4>"
Invoke-Sqlcmd -ServerInstance atlas -Database tucson -Query "SELECT area+exch+number FROM donotcall with(nolock) WHERE
area+exch+number='$number'" | convertto-html -head $a

}else{echo "<div style=float:left><h4><span style=color:red>$number</span> Was not Found In our Global DNC Database</div></h4>"}
