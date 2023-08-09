<!DOCTYPE html>
<html lang="tr-TR">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-language" content="tr">
<title>Başlık</title>
</head>
<body>
    <?php
    $Db =   mysqli_connect("localhost", "root", "", "uskumru");
    mysqli_set_charset($Db,"utf8");
    if(mysqli_connect_errno()){
        echo "Bağlantı hatası! <br /> Hata açıklaması: " . mysqli_connect_error();
        die();
    }

    $GelenIDdegeri             =   $_GET["id"];
    $GelenAdidegeri            =   $_POST["Adi"];
    $GelenSoyadidegeri         =   $_POST["Soyadi"];
    $GelenYasdegeri            =   $_POST["Yas"];
    $GelenCinsiyetdegeri       =   $_POST["Cinsiyet"];
    $GelenDurumdegeri          =   $_POST["Durum"];
    $GelenEmailadresidegeri    =   $_POST["Emailadresi"];
    $GelenHangiPartilidegeri   =   $_POST["HangiPartili"];

    $Guncelle   =   mysqli_query($Db, "UPDATE oldurulecekler SET Adi='$GelenAdidegeri', Soyadi='$GelenSoyadidegeri', Yas='$GelenYasdegeri', Cinsiyet='$GelenCinsiyetdegeri', 
    Durum='$GelenDurumdegeri', Emailadresi='$GelenEmailadresidegeri', HangiPartili='$GelenHangiPartilidegeri' WHERE id=" . $GelenIDdegeri);
    if($Guncelle){
        echo "Kayıt başarıyla Güncellendi :) <br /> <a href=index.php>Ana Sayfaya Geri Dön</a>";
    }else{
        echo "Sorgu hatası!";
    }

    mysqli_close($Db);

    ?>
</body>
</html>