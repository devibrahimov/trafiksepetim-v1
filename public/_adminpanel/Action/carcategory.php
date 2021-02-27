<?php
include '../Connect/baglan.php';


if (isset($_POST['customerinsert'])) {

    $categoryinsert=$db->prepare("INSERT INTO pc_cars SET
name=:title
                    
   


		");

    $insert=$categoryinsert->execute(array(

        'title' => $_POST['title']


    ));

    if ($insert) {

        Header("Location:../carcategory.php?InsertControl=Yes");

    } else {

        Header("Location:../carcategory.php?InsertControl=No");

    }

}
if ($_GET['CategoryDelete']=="ok") {



    $sil=$db->prepare("DELETE from pc_cars where id=:id");



    $kontrol=$sil->execute(array(

        'id' => $_GET['CategoryID']

    ));

    if ($kontrol) {

        Header("Location:../carcategory.php?DeleteControl=Yes");

    } else {

        Header("Location:../carcategory.php?DeleteControl=No");

    }

}
if (isset($_POST['categoryupdate'])) {

    $id=$_POST['id'];
    $insert = $db->exec("UPDATE pc_cars SET `name` = '{$_POST[title]}'  WHERE id = '{$id}'");
    if ($insert) {

        Header("Location:../carcategory.php?UpdateControl=Yes");
    } else{
        Header("Location:../carcategory.php?UpdateControl=No");
    }

}