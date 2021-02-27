<?php
include '../Connect/baglan.php';

if (isset($_POST['customerinsert'])) {


    $categoryinsert=$db->prepare("INSERT INTO pc_car_models SET

		name=:title,

		car_id=:parent_id


		");

    $insert=$categoryinsert->execute(array(

        'title' => $_POST['title'],

        'parent_id' => $_POST['parent_id']

    ));

    if ($insert) {

        Header("Location:../carsubcategory.php?InsertControl=Yes");

    } else {

        Header("Location:../carsubcategory.php?InsertControl=No");

    }

}
if ($_GET['CategoryDelete']=="ok") {



    $sil=$db->prepare("DELETE from pc_car_models where id=:id");



    $kontrol=$sil->execute(array(

        'id' => $_GET['CategoryID']

    ));

    if ($kontrol) {

        Header("Location:../carsubcategory.php?DeleteControl=Yes");

    } else {

        Header("Location:../carsubcategory.php?DeleteControl=No");

    }

}
if (isset($_POST['categoryupdate'])) {

    $id=$_POST['id'];
    $insert = $db->exec("UPDATE pc_car_models SET `name` = '{$_POST[title]}',car_id = '{$_POST[parent_id]}' WHERE id = '{$id}'");
    if ($insert) {

        Header("Location:../carsubcategory.php?UpdateControl=Yes");
    } else{
        Header("Location:../carsubcategory.php?UpdateControl=No");
    }

}