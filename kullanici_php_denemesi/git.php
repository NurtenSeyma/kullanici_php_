<?php

if (isset($_PSOST["gonder"])) 
{
	if (!empty($_POST["secim"])) 
	{   
		$dosya = "users.txt";
		$email = strip_tags($_POST["email"]);
		$sifre = strip_tags($_POST["sifre"]);
		$secim = $_POST["secim"];
		if ($secim=="Giriş") 
		{
			if (file_exists($dosya)) 
			{
				$varmi = 0;
				$oku = fopen($dosya, "r");
                while (!feof($oku)) 
                {
                	$satir = fgets($oku);
                	$dizi = explode(";", $satir);
                	if ($dizi[2]==$email && $dizi[3]==$sifre) 
                	{
                		$varmi == 1;
                		break;
                	}
                }
                if ($varmi==0) 
                {
                	echo "Kullanici bulunamadı!";
                }
			}
			else
			{
				echo "Sİteye henüz kimse kaydolmamış. Lütfen kaydolun...";
			}
		}
		elseif($secim=="Kaydol")
		{
			if (!empty($_POST["ad"]) && !empty($_POST["soyad"]) && isset($_POST["d-Tarihi"])) 
			{
				$ad = strip_tags($_POST["ad"]);
				$soyad = strip_tags($_POST["soyad"]);
				$d_Tarihi = strip_tags($_POST["d-Tarihi"]);
				$ip = $_SERVER["REMOTE_ADDR"];
				$katilma_Tarihi = date("d/m/Y");
				$ekle = $ad.";".$soyad.";".$email.";".$sifre.";".$d_Tarihi.";".$ip.";".$katilma_Tarihi."\n";
				if (file_exists($dosya)) 
				{
					$oku = fopen($dosya, "r");
					while (!feof($oku)) 
					{
						$satir = fgets($oku);
						$dizi = explode(";", $satir);
						if ($dizi[2]==$email && $dizi[3]==$sifre) 
						{
							echo "Zaten kaydınız bulunmakta. Lütfen giriş yapın.";
							break;
						}
						else
						{
							$yaz = fopen($dosya, "a");
	                        fwrite($yaz, $ekle);
	                        fclose($yaz);
                            echo "Kaydınız başarıyla oluşmuştur...";
                            break;
						}
					}
				}
				else
				{
                    $yaz = fopen($dosya, "a");
                    fwrite($yaz, $ekle);
                    fclose($yaz);
                    echo "Kayıt başarıyla oluşmuştur...";

				}
			}
			else
			{
                echo "Lütfen tüm alanları doldurun!";
			}
		}
	}
	else
	{
       echo "Lütfen bir seçim yapın!";
	}
}
else
{
   echo "Lütfen önce giriş yapın ya da kaydolun!";
}
?>