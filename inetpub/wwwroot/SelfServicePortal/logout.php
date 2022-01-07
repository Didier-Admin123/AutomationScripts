<?php
    unset($_COOKIE['username']);
    setcookie('username', '', time() - 3600, '/'); // empty value and old timestamp
   header('Refresh:1; URL = login.php');
   
?>