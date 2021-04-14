<?php
// ip alma işlemi
$ip = $_SERVER["REMOTE_ADDR"];
$id = "12345678";

// setcookie("id",time()+15);
setcookie("id","",time()-5);

echo $_COOKIE["id"];
?>
