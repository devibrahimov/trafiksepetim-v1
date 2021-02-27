<?php
include '../Connect/baglan.php';


if ($_GET['MallsDelete']=="ok") {


    $resimsilunlink=$_GET['ResimYol'];
    $mallavatar=$db->prepare("SELECT * FROM general_market  where   id=:id ");
    $mallavatar->execute(array(
        'id' => $_GET['MallsID']));
    $mallavatarcek=$mallavatar->fetch(PDO::FETCH_ASSOC);
    $profil=$mallavatarcek['market_profil_photo'];
    $cover=$mallavatarcek['market_cover_photo'];
    unlink("../../storage/uploads/thumbnail/market_profil_photo/large/$profil");
    unlink("../../storage/uploads/thumbnail/market_profil_photo/medium/$profil");
    unlink("../../storage/uploads/thumbnail/market_profil_photo/small/$profil");
    unlink("../../storage/uploads/thumbnail/market_cover_photo/large/$cover");
    unlink("../../storage/uploads/thumbnail/market_cover_photo/medium/$cover");
    unlink("../../storage/uploads/thumbnail/market_cover_photo/small/$cover");

    $sil=$db->prepare("DELETE from general_market where id=:id");


    $kontrol=$sil->execute(array(

        'id' => $_GET['MallsID']

    ));

    if ($kontrol) {

        Header("Location:../malls.php?DeleteControl=Yes");

    } else {

        Header("Location:../malls.php?DeleteControl=No");

    }

}