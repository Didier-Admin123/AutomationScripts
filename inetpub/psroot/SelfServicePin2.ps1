#Empereon SecurePin Reminder App for The Self Service portal 

Add-Type -AssemblyName System.Windows.Forms
Add-Type -AssemblyName System.Drawing

$form = New-Object System.Windows.Forms.Form 
$form.Text = "Secure Portal PinCheck"
$form.Size = New-Object System.Drawing.Size(300,350) 
$form.StartPosition = "CenterScreen"

#Icon Variable / Object
$Icon = New-Object system.drawing.icon ("\\fileservices\Wallpapers\SelfServiceIcon\ico.ico")
$Form.Icon = $Icon

#Empereon Logo Image
$img = [Drawing.Image]::FromFile("\\fileservices\Wallpapers\SelfServiceIcon\emplogo1.png")
$picbox = New-Object Windows.Forms.PictureBox
$picbox.Width  = $img.Size.Width
$picbox.Height = $img.Size.Height
$picbox.Image  = $img
$Form.Controls.Add($otherElement)
$Form.Controls.Add($yetAnotherElement)
$Form.Controls.Add($picbox)


#Msg 1
$label = New-Object System.Windows.Forms.Label
$label.Location = New-Object System.Drawing.Point(10,90) 
$label.Size = New-Object System.Drawing.Size(280,40) 
$label.Text = "You Have Not Yet Created a Secure Pin To Access The Self Service Portal"
$form.Controls.Add($label) 

#Msg 2
$LinkLabel1 = New-Object System.Windows.Forms.LinkLabel
$LinkLabel1.Location = New-Object System.Drawing.Size(10,130)
$LinkLabel1.Size = New-Object System.Drawing.Size(150,20)
$LinkLabel1.LinkColor = "BLUE"
$LinkLabel1.ActiveLinkColor = "RED"
$LinkLabel1.Text = "Self Service Portal"
$LinkLabel1.add_Click({[system.Diagnostics.Process]::start("http://172.21.11.81/selfServicePortal/login.php")})
$Form.Controls.Add($LinkLabel1) 

#OK Button
$OKButton = New-Object System.Windows.Forms.Button
$OKButton.Location = New-Object System.Drawing.Point(75,250)
$OKButton.Size = New-Object System.Drawing.Size(75,23)
$OKButton.Text = "OK"
$OKButton.DialogResult = [System.Windows.Forms.DialogResult]::OK
$form.AcceptButton = $OKButton
$form.Controls.Add($OKButton)

#Cancel Button
$CancelButton = New-Object System.Windows.Forms.Button
$CancelButton.Location = New-Object System.Drawing.Point(150,250)
$CancelButton.Size = New-Object System.Drawing.Size(75,23)
$CancelButton.Text = "Cancel"
$CancelButton.DialogResult = [System.Windows.Forms.DialogResult]::Cancel
$form.CancelButton = $CancelButton
$form.Controls.Add($CancelButton)

#Msg 3
$label = New-Object System.Windows.Forms.Label
$label.Location = New-Object System.Drawing.Point(10,200) 
$label.Size = New-Object System.Drawing.Size(280,20) 
$label.Text = "Please Create Your SecurePin Below:"
$form.Controls.Add($label) 

#TEXT Box
$textBox = New-Object System.Windows.Forms.TextBox 
$textBox.Location = New-Object System.Drawing.Point(10,220) 
$textBox.Size = New-Object System.Drawing.Size(60,20) 
$form.Controls.Add($textBox) 

$form.Topmost = $True
$form.Add_Shown({$textBox.Select()})
$result = $form.ShowDialog()

#Logic Statement below 

if ($result -eq [System.Windows.Forms.DialogResult]::OK)
{
    $x = $textBox.Text
    $x
}