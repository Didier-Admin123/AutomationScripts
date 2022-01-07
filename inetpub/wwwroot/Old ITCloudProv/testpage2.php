<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Dynamically Generate Select Dropdowns</title>
</head>
<body>

<form>

<select value="name">

<?php
$items ="book pencil marker pen";
$list = explode(" ",$items);

foreach($list as $value){
	?>
 <option value="<?php echo $value;?>"><?php echo $value; ?></option>
<?php

	
}

?> 

</select>
</form>
</body>
</html>

