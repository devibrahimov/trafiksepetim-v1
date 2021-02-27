<div class="card card-bordered">
    <div class="card-inner">
        <div class="card-head">
            <h5 class="card-title"><?php echo $usersupdatecek['name']." ".$usersupdatecek['name']; ?>
            </h5>
        </div>
        <form action="Action/users.php"  method="POST" enctype="multipart/form-data">
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="form-group"><label class="form-label" for="full-name-1">Adı</label>
                        <div class="form-control-wrap"><input type="text" value="<?php echo $usersupdatecek['name']; ?>" name="name" class="form-control" id="full-name-1" /></div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group"><label class="form-label" for="email-address-1">Soyadı</label>
                        <div class="form-control-wrap"><input type="text" class="form-control" id="" name="surname" value="<?php echo $usersupdatecek['surname']; ?>" /></div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group"><label class="form-label" for="full-name-1">Telefon</label>
                        <div class="form-control-wrap"><input type="text" value="<?php echo $usersupdatecek['number']; ?>" name="number" class="form-control" id="full-name-1" /></div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group"><label class="form-label" for="email-address-1">E-Posta</label>
                        <div class="form-control-wrap"><input type="text" class="form-control" id="" name="email" value="<?php echo $usersupdatecek['email']; ?>" /></div>
                    </div>
                </div>
                <input type="hidden"  name="id" value="<?php echo $usersupdatecek['id']; ?>">

                <div class="col-12">
                    <div class="form-group"><button type="submit" name="usersupdate" class="btn btn-lg btn-primary">Kaydet</button></div>
                </div>
            </div>
        </form></div>
</div>