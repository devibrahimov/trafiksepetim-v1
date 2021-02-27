<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Servis Kategori Alt Üst Ayarları
                <!-- Modal Trigger Code -->
                <button type="button" style="float: right" class="btn btn-primary" data-toggle="modal" data-target="#modalDefault">Yeni Kategori Ekle</button>

                <!-- Modal Content Code -->
                <div class="modal fade" tabindex="-1" id="modalDefault">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                <em class="icon ni ni-cross"></em>
                            </a>
                            <div class="modal-header">
                                <h5 class="modal-title">Alt Servis Ekleme</h5>
                            </div>
                            <div class="modal-body">
                                <form  method="POST" enctype="multipart/form-data" action="Action/servicescategory.php">


                                    <div class="form-group">
                                        <label class="form-label" for="full-name">Servis Name</label>
                                        <div class="form-control-wrap">
                                            <input type="text" name="title" class="form-control" id="full-name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="email-address">Kategori Resim</label>
                                        <div class="form-control-wrap">
                                            <div class="custom-file" style="font-size:15px;">
                                                <input type="file" multiple="" class="custom-file-input" name="CategoryAvatar" id="customFile">
                                                <label class="custom-file-label" for="customFile">Resim Seçiniz...</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="phone-no"> Üst Servis</label>
                                        <div class="form-control-select">
                                            <select class="form-control" name="parent_id" id="default-06">
                                                <option value="0">Ana Servis</option>
                                                <?php
                                                $say=0;
                                                while($servicescategorylistck=$servicescategorylist->fetch(PDO::FETCH_ASSOC)) { $say++?>


                                                    <option value="<?php echo $servicescategorylistck['id'] ?>"><?php echo $servicescategorylistck['title'] ?></option>
                                                <?php } ?>

                                            </select>
                                        </div>
                                    </div>






                            </div>
                            <div class="modal-footer bg-light">
                                <div class="form-group">
                                    <button type="submit" name="customerinsert" class="btn btn-lg btn-primary">Ekle</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </h4>

        </div>
    </div>
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                <thead>
                <tr class="nk-tb-item nk-tb-head">

                    <th class="nk-tb-col"><span class="sub-text">ID</span></th>

                    <th class="nk-tb-col tb-col-md"><span class="sub-text">Üst Servis</span></th>
                    <th class="nk-tb-col tb-col-lg"><span class="sub-text">Servis Adı</span></th>

                    <th class="nk-tb-col nk-tb-col-tools text-right">
                        <div class="dropdown">
                            <a href="#" class="btn btn-xs btn-outline-light btn-icon dropdown-toggle" data-toggle="dropdown" data-offset="0,5"><em class="icon ni ni-plus"></em></a>
                            <div class="dropdown-menu dropdown-menu-xs dropdown-menu-right">

                            </div>
                        </div>
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php
                $say=0;
                while($servicescategorycek=$servicescategory->fetch(PDO::FETCH_ASSOC)) { $say++?>
                    <div class="modal fade" tabindex="-1" id="modalDefault<?php echo $servicescategorycek['id'] ?>">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                    <em class="icon ni ni-cross"></em>
                                </a>
                                <div class="modal-header">
                                    <h5 class="modal-title">Alt Kategori Düzenleme</h5>
                                </div>
                                <div class="modal-body">
                                    <form  method="POST" enctype="multipart/form-data" action="Action/servicescategory.php">




                                        <div class="form-group">
                                            <label class="form-label" for="full-name">Servis Adı</label>
                                            <div class="form-control-wrap">
                                                <input type="text" name="title" class="form-control" id="full-name" value="<?php echo $servicescategorycek['title'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="phone-no">Varsa Üst Servis</label>
                                            <div class="form-control-select">
                                                <select class="form-control" name="parent_id" id="default-06">
                                                    <option value="0">Ana Kategori</option>
                                                    <?php
                                                    $say=0;
                                                    $categoryupdatelist=$db->prepare("SELECT * FROM service_categories");
                                                    $categoryupdatelist->execute();
                                                    while($categoryupdatelistcek=$categoryupdatelist->fetch(PDO::FETCH_ASSOC)) { $say++?>


                                                        <option <?php if (!(strcmp($servicescategorycek['parent_id'], $categoryupdatelistcek['id']))) {echo "selected=\"selected\"";} ?>   value="<?php echo $categoryupdatelistcek['id'] ?>"><?php echo $categoryupdatelistcek['title'] ?></option>
                                                    <?php } ?>

                                                </select>
                                            </div>
                                        </div>


                                        <input type="hidden" value="<?php echo $servicescategorycek['id'] ?>" name="id">

                                </div>
                                <div class="modal-footer bg-light">
                                    <div class="form-group">
                                        <button type="submit" name="categoryupdate" class="btn btn-lg btn-primary">Kaydet</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <tr class="nk-tb-item">
                        <td class="nk-tb-col tb-col-mb">
                                                                     <span class="tb-amount">
                                                                         <?php echo $servicescategorycek['id'] ?>
                                                                     </span>
                        </td>


                        <td class="nk-tb-col tb-col-md">
                                                                     <span>

<?php
$setting=$db->prepare("SELECT * FROM service_categories where id=:idddd");
$setting->execute(array(
    'idddd' => $servicescategorycek['parent_id']));
$settingcategory=$setting->fetch(PDO::FETCH_ASSOC);
if ($settingcategory['title']==null){
    echo "Ana Kategori";
}else{
    echo $settingcategory['title'];
}
?>

                                                                     </span>
                        </td>
                        <td class="nk-tb-col tb-col-lg">
                            <?php echo $servicescategorycek['title'] ?>
                        </td>

                        <td class="nk-tb-col nk-tb-col-tools">
                            <ul class="nk-tb-actions gx-1">

                                <li>
                                    <div class="drodown">
                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <ul class="link-list-opt no-bdr">
                                                <li><a href="#" data-toggle="modal" data-target="#modalDefault<?php echo $servicescategorycek['id'] ?>"><em class="icon ni ni-edit"></em><span>Düzenle</span></a></li>
                                                <li><a href="javascript:confirmDelete('Action/subcategoryfunction.php?CategoryDelete=ok&CategoryID=<?php echo $servicescategorycek['id'];?>')"><em class="icon ni ni-trash"></em><span>Sil</span></a></li>

                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </td>
                    </tr><!-- .nk-tb-item  -->
                    <script type="text/javascript">
                        function confirmDelete(delUrl) {
                            Swal.fire({
                                title: "Silme İşlemi Yapmak Üzeresiniz...",
                                text: "Servis Silme İşlemini Onaylıyormusunuz...",
                                icon: "warning",
                                showCancelButton: true,
                                confirmButtonText: "Evet Sil!"
                            }).then(function(result) {
                                if (result.value) {
                                    document.location = delUrl;
                                }
                            });
                        };
                    </script>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div><!-- .card-preview -->
</div>