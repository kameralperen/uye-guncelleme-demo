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
        $GelenIDdegeri  =   $_GET["id"];

        $Sorgu =    mysqli_query($Db, "SELECT * FROM oldurulecekler WHERE id=" . $GelenIDdegeri);

        if($Sorgu){
            $kayitsayisi =  mysqli_num_rows($Sorgu);
                if($kayitsayisi>0){
                    $Kayit=mysqli_fetch_assoc($Sorgu);
                }
        }else{
            header("Location:index.php");
            exit();
        }

        mysqli_close($Db);

    ?>
        <form action="sonuc.php?id=<?php echo $GelenIDdegeri; ?>" method="post">
        Adınız : <input type="text" name="Adi" value=<?php echo $Kayit["Adi"]; ?> > <br />
        Soyadınız : <input type="text" name="Soyadi" value=<?php echo $Kayit["Soyadi"]; ?>> <br />
        Yaşınız : <select name="Yas" >
            <option value="">Lütfen Seçiniz</option>
            <option value="18" <?php if($Kayit["Yas"] == "18"){ ?> selected="selected" <?php } ?>>18</option>
            <option value="19" <?php if($Kayit["Yas"] == "19"){ ?> selected="selected" <?php } ?>>19</option>
            <option value="20" <?php if($Kayit["Yas"] == "20"){ ?> selected="selected" <?php } ?>>20</option>
            <option value="21" <?php if($Kayit["Yas"] == "21"){ ?> selected="selected" <?php } ?>>21</option>
            <option value="22" <?php if($Kayit["Yas"] == "22"){ ?> selected="selected" <?php } ?>>22</option>
            <option value="23" <?php if($Kayit["Yas"] == "23"){ ?> selected="selected" <?php } ?>>23</option>
            <option value="24" <?php if($Kayit["Yas"] == "24"){ ?> selected="selected" <?php } ?>>24</option>
            <option value="25" <?php if($Kayit["Yas"] == "25"){ ?> selected="selected" <?php } ?>>25</option>
        </select> <br />
        Cinsiyetiniz : <input type="radio" name="Cinsiyet" value="erkek" <?php if($Kayit["Cinsiyet"] == "erkek"){ ?> checked="checked" <?php } ?>>Erkek
         <input type="radio" name="Cinsiyet" value="kadın" <?php if($Kayit["Cinsiyet"] == "kadın"){ ?> checked="checked" <?php } ?>>Kadın <br /> 
        Ölü müsün? : <input type="text" name="Durum" value=<?php echo $Kayit["Durum"]; ?>> <br />
        E-Mail adresiniz : <input type="email" name="Emailadresi" value=<?php echo $Kayit["Emailadresi"]; ?>> <br />
        Hangi Partilisiniz : <input type="text" name="HangiPartili" value=<?php echo $Kayit["HangiPartili"]; ?>> <br />
        <input type="submit" value="Güncelle">
        </form>
</body>
</html>