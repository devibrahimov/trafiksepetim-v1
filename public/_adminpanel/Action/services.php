<?php
include '../Connect/baglan.php';


if ($_GET['ServicesDelete']=="ok") {



    $mallavatar=$db->prepare("SELECT * FROM service_providers  where   id=:id ");
    $mallavatar->execute(array(
        'id' => $_GET['ServicesID']));
    $mallavatarcek=$mallavatar->fetch(PDO::FETCH_ASSOC);
    $profil=$mallavatarcek['service_profil_photo'];
    $cover=$mallavatarcek['service_cover_photo'];
    unlink("../../storage/uploads/thumbnail/service_profil_photo/large/$profil");
    unlink("../../storage/uploads/thumbnail/service_profil_photo/medium/$profil");
    unlink("../../storage/uploads/thumbnail/service_profil_photo/small/$profil");
    unlink("../../storage/uploads/thumbnail/service_cover_photo/large/$cover");
    unlink("../../storage/uploads/thumbnail/service_cover_photo/medium/$cover");
    unlink("../../storage/uploads/thumbnail/service_cover_photo/small/$cover");
    $sil=$db->prepare("DELETE from service_providers where id=:id");
    $kontrol=$sil->execute(array(
        'id' => $_GET['ServicesID']
    ));
    if ($kontrol) {
        Header("Location:../services.php?DeleteControl=Yes");
    } else {
        Header("Location:../services.php?DeleteControl=No");
    }

}