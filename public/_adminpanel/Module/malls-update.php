<script>
    $(document).ready(function(){
        $('#iller').change(function(){
            $('#ilceler').empty();
var deger=$(this).val();
$.post("ilceler.php",{il:deger},function(a){
$('#ilceler').append(a);
})
        });
    });
    $(document).ready(function(){
        $('#vergiiller').change(function(){
            $('#vergidaireleri').empty();
            var degerler=$(this).val();
            $.post("ilceler.php",{vergi:degerler},function(b){
                $('#vergidaireleri').append(b);
            })
        });
    });
</script>
<?php
$ilayar=$servicesupdatecek['il'];
$ilceayar=$servicesupdatecek['ilce'];
$ilvergimudurlugu=$servicesupdatecek['ilvergi_mudurlugu'];
$provincee=$db->prepare("SELECT * FROM province WHERE id=:id");
$provincee->execute(array(
    'id' => $ilayar
));
$provinceecek=$provincee->fetch(PDO::FETCH_ASSOC);
$districtsayar=$db->prepare("SELECT * FROM districts WHERE id=:id");
$districtsayar->execute(array(
    'id' => $ilceayar
));
$districtsayarcek=$districtsayar->fetch(PDO::FETCH_ASSOC);
$vergidaireleriselect=$db->prepare("SELECT * FROM vergidaireleri WHERE SaymanlikKodu=:id");
$vergidaireleriselect->execute(array(
    'id' => $ilvergimudurlugu
));
$vergidaireleriselectcek=$vergidaireleriselect->fetch(PDO::FETCH_ASSOC);
?>
<div class="card card-bordered">
    <div class="card-inner">
        <div class="card-head">
            <h5 class="card-title"><?php echo $mallsupdatecek['market_name']; ?>
        </h5>
    </div>
    <form action="Action/malls.php"  method="POST" enctype="multipart/form-data">

        <div class="row g-4">

            <div class="col-lg-6">
                <div class="form-group"><label class="form-label" for="full-name-1">Mağaza Adı</label>
                    <div class="form-control-wrap"><input type="text" value="<?php echo $mallsupdatecek['market_name']; ?>" name="market_name" class="form-control" id="full-name-1" /></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group"><label class="form-label" for="full-name-1">Kullanıcı Adı</label>
                    <div class="form-control-wrap"><input type="text" value="<?php echo $mallsupdatecek['user_name']; ?>" name="user_name" class="form-control" id="full-name-1" /></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group"><label class="form-label" for="email-address-1">E-Posta</label>
                    <div class="form-control-wrap"><input type="text" class="form-control" id="" name="email" value="<?php echo $mallsupdatecek['email']; ?>" /></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group"><label class="form-label" for="email-address-1">İş Telefonu</label>
                    <div class="form-control-wrap"><input type="text" class="form-control" id="" name="istelefonu" value="<?php echo $mallsupdatecek['istelefonu']; ?>" /></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group"><label class="form-label" for="email-address-1">Cep Telefonu</label>
                    <div class="form-control-wrap"><input type="text" class="form-control" id="" name="ceptelefonu" value="<?php echo $mallsupdatecek['ceptelefonu']; ?>" /></div>
                </div>
            </div>


            <input type="hidden"  name="id" value="<?php echo $mallsupdatecek['id']; ?>">

            <div class="col-12">
                <div class="form-group"><button type="submit" name="usersupdate" class="btn btn-lg btn-primary">Kaydet</button></div>
            </div>
        </div>
    </form>
</div>
</div>