<?php
include 'Connect/baglan.php';
include 'Connect/datebase.php';



$say=0;
while($districtscek=$districts->fetch(PDO::FETCH_ASSOC)) {
    $say++;
    echo '<option value='.$districtscek["id"].'>'.$districtscek["name"].'</option>';

}
$say=0;
while($vergidaireleriayarcek=$vergidaireleriayar->fetch(PDO::FETCH_ASSOC)) {
    $say++;
    echo '<option value='.$vergidaireleriayarcek["SaymanlikKodu"].'>'.$vergidaireleriayarcek["VergiDairesiMudurlugu"].'</option>';

}

?>