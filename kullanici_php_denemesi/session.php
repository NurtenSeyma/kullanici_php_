<?php

session_start();
$_SESSION["isim"] = "Nurten";
$_SESSION["soyisim"] = "AKGÜN";
$_SESSION["ip"] = $_SERVER["REMOTE_ADDR"];


if ($_SESSION["isim"]=="Nurten") 
{
	// touch("nurten.txt");
	// echo "nurten dosyası oluştu.";
	header("Refresh: 1; sayfa2.php"); // saniye bekle ve sayfa2 ye geç veya nurten.txt dosyasını sayfa2.php yazan yerle değiştirip dosyayı çalıştır. 
	include ("nurten.txt");
}

//echo $_SESSION["isim"]." ".$_SESSION["soyisim"]."<br><br>";

echo "<a href='sayfa2.php'> Sayfa - 2</a><br><br>";
echo "<a href='cikis.php'>Çıkış Yap</a>";
?>