<! DOCTYPE html>
<html lang="en-US">
<head>
<title>DEV Login Page</title>
<meta charset="utf-8">
</head>
<style></style>
<body>









<div align="center"><img id="imghdr" src="logo.png" height="100" /><br><br><h2>Login</h2><br><br>
<div style="margin:10px 0;"></div>
<div title="Login" style="width:400px" id="loginbox">
    <div style="padding:10px 0 10px 60px">
    <form action="index.php" id="login" method="post">
        <table><?php if (isset($err)) echo '<tr><td colspan="2" class="errmsg">'. $err .'</td></tr>'; ?>
            <tr>
                <td>Username:</td>
                <td><input type="text" name="username" style="border: 1px solid #ccc;" autocomplete="off"/></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" style="border: 1px solid #ccc;" autocomplete="off"/></td>
            </tr>
        </table>
        <input class="button" type="submit" name="submit" value="Login" />
    </form>
    </div>
</div>
</div>

</body>
</html>