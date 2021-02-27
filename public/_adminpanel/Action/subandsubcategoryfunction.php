<?php
include '../Connect/baglan.php';

if (isset($_POST['customerinsert'])) {


    $categoryinsert=$db->prepare("INSERT INTO sub_category_second SET

		name=:title,

		parent_id=:parent_id


		");

    $insert=$categoryinsert->execute(array(

        'title' => $_POST['title'],

        'parent_id' => $_POST['parent_id']

    ));

    if ($insert) {

        Header("Location:../subandsubcategory.php?InsertControl=Yes");

    } else {

        Header("Location:../subandsubcategory.php?InsertControl=No");

    }

}
if ($_GET['CategoryDelete']=="ok") {



    $sil=$db->prepare("DELETE from sub_category_second where id=:id");



    $kontrol=$sil->execute(array(

        'id' => $_GET['CategoryID']

    ));

    if ($kontrol) {

        Header("Location:../subandsubcategory.php?DeleteControl=Yes");

    } else {

        Header("Location:../subandsubcategory.php?DeleteControl=No");

    }

}
if (isset($_POST['categoryupdate'])) {

    $id=$_POST['id'];
    $insert = $db->exec("UPDATE sub_category_second SET `name` = '{$_POST[title]}',parent_id = '{$_POST[parent_id]}' WHERE id = '{$id}'");
    if ($insert) {

        Header("Location:../subandsubcategory.php?UpdateControl=Yes");
    } else{
        Header("Location:../subandsubcategory.php?UpdateControl=No");
    }

}