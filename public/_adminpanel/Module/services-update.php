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
            <h5 class="card-title"><?php echo $servicesupdatecek['name']." ".$servicesupdatecek['surname']; ?>
        </h5>
    </div>
    <form action="Action/services.php"  method="POST" enctype="multipart/form-data">

        <div class="row g-4">

            <div class="col-lg-6">
                <div class="form-group"><label class="form-label" for="full-name-1">Kullanıcı  Adı</label>
                    <div class="form-control-wrap"><input type="text" value="<?php echo $servicesupdatecek['user_name']; ?>" name="username" class="form-control" id="full-name-1" /></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group"><label class="form-label" for="full-name-1">Adı</label>
                    <div class="form-control-wrap"><input type="text" value="<?php echo $servicesupdatecek['name']; ?>" name="name" class="form-control" id="full-name-1" /></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group"><label class="form-label" for="email-address-1">Soyadı</label>
                    <div class="form-control-wrap"><input type="text" class="form-control" id="" name="surname" value="<?php echo $servicesupdatecek['surname']; ?>" /></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group"><label class="form-label" for="email-address-1">E-Posta</label>
                    <div class="form-control-wrap"><input type="text" class="form-control" id="" name="email" value="<?php echo $servicesupdatecek['email']; ?>" /></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group"><label class="form-label" for="email-address-1">Şirket Ünvanı</label>
                    <div class="form-control-wrap"><input type="text" class="form-control" id="" name="company_title" value="<?php echo $servicesupdatecek['company_title']; ?>" /></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group"><label class="form-label" for="email-address-1">İşletme Adı</label>
                    <div class="form-control-wrap"><input type="text" class="form-control" id="" name="business_name" value="<?php echo $servicesupdatecek['business_name']; ?>" /></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group"><label class="form-label" for="email-address-1">Kurumsal Mail</label>
                    <div class="form-control-wrap"><input type="text" class="form-control" id="" name="kep_address" value="<?php echo $servicesupdatecek['kep_address']; ?>" /></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group"><label class="form-label" for="email-address-1">Vergi Numarası</label>
                    <div class="form-control-wrap"><input type="text" class="form-control" id="" name="tax_number" value="<?php echo $servicesupdatecek['tax_number']; ?>" /></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group"><label class="form-label" for="email-address-1">Tc Kimlik No</label>
                    <div class="form-control-wrap"><input type="text" class="form-control" id="" name="tckimlik" value="<?php echo $servicesupdatecek['tckimlik']; ?>" /></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group"><label class="form-label" for="email-address-1">Vergi il</label>
                    <div class="form-control-wrap">
                        <select name="" id="vergiiller" class="form-control">
                            <option value="<?php echo $vergidaireleriselectcek['id']; ?>"><?php echo $vergidaireleriselectcek['SehirAdi']; ?></option>
                        <?php
                        $say=0;
                        while($vergidairelericek=$vergidaireleri->fetch(PDO::FETCH_ASSOC)) {
                            $say++;
                            echo '<option value='.$vergidairelericek["Plaka"].'>'.$vergidairelericek["SehirAdi"].'</option>';

                        }
                        ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group"><label class="form-label" for="email-address-1">Vergi Dairesi</label>
                    <div class="form-control-wrap">

                        <select name="vergidaireleri" id="vergidaireleri" name="ilvergi_mudurlugu" class="form-control">
                            <option value="<?php echo $vergidaireleriselectcek['SaymanlikKodu']; ?>"><?php echo $vergidaireleriselectcek['VergiDairesiMudurlugu']; ?></option>

                            <?php
                            $say=0;
                            while($vergidairelericek=$vergidaireleri->fetch(PDO::FETCH_ASSOC)) {


                                $say++;
                                echo '<option value='.$vergidairelericek["Plaka"].'>'.$vergidairelericek["SehirAdi"].'</option>';

                            }
                            ?>
                        </select>

                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group"><label class="form-label" for="email-address-1">Cep Telefonu</label>
                    <div class="form-control-wrap"><input type="text" class="form-control" id="" name="ceptelefonu" value="<?php echo $servicesupdatecek['ceptelefonu']; ?>" /></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group"><label class="form-label" for="email-address-1">İş Telefonu</label>
                    <div class="form-control-wrap"><input type="text" class="form-control" id="" name="istelefonu" value="<?php echo $servicesupdatecek['istelefonu']; ?>" /></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group"><label class="form-label" for="email-address-1">İl</label>
                    <div class="form-control-wrap">
                        <select id="iller" name="il" class="form-control">
                            <option value="<?php echo $provinceecek["id"]; ?>"><?php echo $provinceecek["name"]; ?></option>
                        <?php
                        $say=0;
                        while($provincecek=$province->fetch(PDO::FETCH_ASSOC)) {
                            $say++;
                        echo '<option value='.$provincecek["id"].'>'.$provincecek["name"].'</option>';

                        }
                        ?>
                        </select>


                        
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group"><label class="form-label" for="email-address-1">İlçe</label>
                    <div class="form-control-wrap">
                        <select name="ilce" id="ilceler" class="form-control">

                            <option value="<?php echo $districtsayarcek["id"]; ?>"><?php echo $districtsayarcek["name"]; ?></option>
                            <option value="">Bir ilce Seçiniz</option>

                        </select>
                        
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group"><label class="form-label" for="email-address-1">Adres</label>
                    <div class="form-control-wrap"><input type="text" class="form-control" id="" name="adress" value="<?php echo $servicesupdatecek['adress']; ?>" /></div>
                </div>
            </div>

            <input type="hidden"  name="id" value="<?php echo $servicesupdatecek['id']; ?>">

            <div class="col-12">
                <div class="form-group"><button type="submit" name="usersupdate" class="btn btn-lg btn-primary">Kaydet</button></div>
            </div>
        </div>
    </form>
</div>
</div>