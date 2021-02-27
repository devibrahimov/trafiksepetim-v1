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

    $categoryinsert=$db->prepare("INSERT INTO category SET
CategoryIcon=:CategoryIcon,
                         CategoryAvatar=:CategoryAvatar,
		title=:title
   


		");

    $insert=$categoryinsert->execute(array(
        'CategoryIcon' => $_POST['CategoryIcon'],
        'CategoryAvatar' => $yeniad,
        'title' => $_POST['title']


    ));

    if ($insert) {

        Header("Location:../category.php?InsertControl=Yes");

    } else {

        Header("Location:../category.php?InsertControl=No");

    }

}
if ($_GET['CategoryDelete']=="ok") {



    $sil=$db->prepare("DELETE from category where id=:id");

    $resimsilunlink=$_GET['CategoryAvatar'];

    unlink("../assets/upload/category/$resimsilunlink");

    $kontrol=$sil->execute(array(

        'id' => $_GET['CategoryID']

    ));

    if ($kontrol) {

        Header("Location:../category.php?DeleteControl=Yes");

    } else {

        Header("Location:../category.php?DeleteControl=No");

    }

}
if (isset($_POST['categoryupdate'])) {
$categoryavatar=$db->prepare("SELECT * FROM category  where  id=:id ");
    $categoryavatar->execute(array(
'id' => $_POST['id']));
    $categoryavatarcek=$categoryavatar->fetch(PDO::FETCH_ASSOC);
    if(!empty($_FILES['CategoryAvatar'] ['name'])) {
        $uploads_dir = '../assets/upload/category/';

        @$tmp_name = $_FILES['CategoryAvatar']["tmp_name"];

        @$name = $_FILES['CategoryAvatar']["name"];

        $isim = md5(uniqid(rand()));
        $uzanti = end(explode(".", $name));
        $yeniad = $isim . "." . $uzanti;

        $refimgyol = substr($uploads_dir, 6) . "/" . $yeniad;
        $resimsilunlink=$categoryavatarcek['CategoryAvatar'];

        unlink("../assets/upload/category/$resimsilunlink");
        $resimsilunlink=$categoryavatarcek['CategoryAvatar'];
        @move_uploaded_file($tmp_name, "$uploads_dir/$yeniad");
    }else{
       $yeniad=$categoryavatarcek['CategoryAvatar'];
    }
    $id=$_POST['id'];
    $insert = $db->exec("UPDATE category SET `title` = '{$_POST[title]}',`CategoryAvatar` = '{$yeniad}' WHERE id = '{$id}'");
    if ($insert) {

        Header("Location:../category.php?UpdateControl=Yes");
    } else{
        Header("Location:../category.php?UpdateControl=No");
    }

}