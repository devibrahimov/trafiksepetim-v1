<?php
include '../Connect/baglan.php';
function buildTree($elements, $parrentId=0)
{

    // echo "<pre>";
    // print_r($elements);
    // echo "</pre>";
    $branch = array();
    foreach ($elements as $element) {
        if ($element->parent_id == $parrentId) {
$children =buildTree($elements, $element->id);
if ($children){
    $element->children = $children;
}else{
    $element->children =array();
}
$branch[]=$element;
        }
    }
  return $branch;
}
function drawElement($items){
    echo "<ul class='list'>";
    foreach ($items as $item) {
echo "<li>{$item->title}</li>";
if (sizeof($item->children)>0){
    drawElement($item->children);
}
    }
    echo "</ul>";
}

if (isset($_POST['customerinsert'])) {

    $uploads_dir = '../assets/upload/category/';

    @$tmp_name = $_FILES['CategoryAvatar']["tmp_name"];

    @$name = $_FILES['CategoryAvatar']["name"];

    $isim=md5(uniqid(rand()));
    $uzanti=end(explode(".",$name));
    $yeniad=$isim.".".$uzanti;

    $refimgyol=substr($uploads_dir, 6)."/".$yeniad;

    @move_uploaded_file($tmp_name, "$uploads_dir/$yeniad");

    $categoryinsert=$db->prepare("INSERT INTO sub_category SET

		name=:title,

		parent_id=:parent_id


		");

    $insert=$categoryinsert->execute(array(

        'title' => $_POST['title'],

        'parent_id' => $_POST['parent_id']

    ));

    if ($insert) {

        Header("Location:../subcategory.php?InsertControl=Yes");

    } else {

        Header("Location:../subcategory.php?InsertControl=No");

    }

}
if ($_GET['CategoryDelete']=="ok") {



    $sil=$db->prepare("DELETE from sub_category where id=:id");



    $kontrol=$sil->execute(array(

        'id' => $_GET['CategoryID']

    ));

    if ($kontrol) {

        Header("Location:../subcategory.php?DeleteControl=Yes");

    } else {

        Header("Location:../subcategory.php?DeleteControl=No");

    }

}
if (isset($_POST['categoryupdate'])) {

    $id=$_POST['id'];
    $insert = $db->exec("UPDATE sub_category SET `name` = '{$_POST[title]}',parent_id = '{$_POST[parent_id]}' WHERE id = '{$id}'");
    if ($insert) {

        Header("Location:../subcategory.php?UpdateControl=Yes");
    } else{
        Header("Location:../subcategory.php?UpdateControl=No");
    }

}