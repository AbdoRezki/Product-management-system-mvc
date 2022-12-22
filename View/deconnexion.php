<?php 

session_start();

session_unset();
session_destroy();

 if(!isset($_SESSION['loginProp']))
       {
        echo "<script>location.assign('login.php')</script>";
       }
exit();

?>