<?php
include '../Connect/baglan.php';


if (isset($_POST['usersupdate'])) {

    $id=$_POST['id'];
    $insert = $db->exec("UPDATE users SET `name` = '{$_POST[name]}',`surname` = '{$_POST[surname]}',`number` = '{$_POST[number]}' ,`email` = '{$_POST[email]}' WHERE id = '{$id}'");
    if ($insert) {
        Header("Location:../users.php?UpdateControl=Yes");
    } else{
        Header("Location:../users.php?UpdateControl=No");
    }
}



if ($_GET['UsersDelete']=="ok") {
    $sil=$db->prepare("DELETE from users where id=:id");
    $kontrol=$sil->execute(array(
        'id' => $_GET['UsersID']
    ));
    if ($kontrol) {
        Header("Location:../users.php?DeleteControl=Yes");
    } else {
        Header("Location:../users.php?DeleteControl=No");
    }
}