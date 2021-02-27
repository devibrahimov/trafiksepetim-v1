<?php
$kullanicisor=$db->prepare("SELECT
users_admin.UsersID,
users_admin.UsersEmail,
users_admin.UsersPasswords,
users_admin.UsersAvatar,
users_admin.UsersPhone,
users_admin.UsersNameSurname,
users_admin.UsersRank,
users_admin.GirisYetki,
userspermission.PermissionID,
userspermission.UsersID,
userspermission.GetOfferMenu,
userspermission.SellMenu,
userspermission.ProductsMenu,
userspermission.BanksMenu,
userspermission.CustomerMenu,
userspermission.CategoryMenu,
userspermission.KdvMenu,
userspermission.CurrencyMenu,
userspermission.BankalarMenu,
userspermission.MusteriyeOzelFiyat,
userspermission.LogMenu,
userspermission.UsersMenu,
userspermission.UsersPermissionMenu,
userspermission.PersonelMenu,
userspermission.PersonelPermissionMenu
FROM
users_admin
INNER JOIN userspermission ON users_admin.UsersID = userspermission.UsersID
 where users_admin.UsersEmail=:mail");

$kullanicisor->execute(array(

    'mail' => $_SESSION['UsersEmail']

));

$say=$kullanicisor->rowCount();

$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

if ($say==0) {

    Header("Location:login.php?durum=izinsiz");

    exit;

}

$ranks=$db->prepare("SELECT * FROM ranks  WHERE RanksID=$kullanicicek[UsersRank]");

$ranks->execute();

$rankscek=$ranks->fetch(PDO::FETCH_ASSOC);

