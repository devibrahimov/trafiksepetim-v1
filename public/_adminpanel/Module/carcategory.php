<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Araç Firmaları
                <!-- Modal Trigger Code -->
                <button type="button" style="float: right" class="btn btn-primary" data-toggle="modal" data-target="#modalDefault">Yeni Marka Ekle</button>

                <!-- Modal Content Code -->
                <div class="modal fade" tabindex="-1" id="modalDefault">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                <em class="icon ni ni-cross"></em>
                            </a>
                            <div class="modal-header">
                                <h5 class="modal-title">Marka Ekleme</h5>
                            </div>
                            <div class="modal-body">
                                <form  method="POST" enctype="multipart/form-data" action="Action/carcategory.php">


                                    <div class="form-group">
                                        <label class="form-label" for="full-name">Kategori Name</label>
                                        <div class="form-control-wrap">
                                            <input type="text" name="title" class="form-control" id="full-name">
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


                    <th class="nk-tb-col tb-col-lg"><span class="sub-text">Marka Adı</span></th>

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
                while($carcategorycek=$carcategory->fetch(PDO::FETCH_ASSOC)) { $say++?>
                    <div class="modal fade" tabindex="-1" id="modalDefault<?php echo $carcategorycek['id'] ?>">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                    <em class="icon ni ni-cross"></em>
                                </a>
                                <div class="modal-header">
                                    <h5 class="modal-title">Araç Marka Düzenleme</h5>
                                </div>
                                <div class="modal-body">
                                    <form  method="POST" enctype="multipart/form-data" action="Action/carcategory.php">




                                        <div class="form-group">
                                            <label class="form-label" for="full-name">Marka Adı</label>
                                            <div class="form-control-wrap">
                                                <input type="text" name="title" class="form-control" id="full-name" value="<?php echo $carcategorycek['name'] ?>">
                                            </div>
                                        </div>



                                        <input type="hidden" value="<?php echo $carcategorycek['id'] ?>" name="id">

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
                                                                         <?php echo $carcategorycek['id'] ?>
                                                                     </span>
                        </td>



                        <td class="nk-tb-col tb-col-lg">
                            <?php echo $carcategorycek['name'] ?>
                        </td>

                        <td class="nk-tb-col nk-tb-col-tools">
                            <ul class="nk-tb-actions gx-1">

                                <li>
                                    <div class="drodown">
                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <ul class="link-list-opt no-bdr">
                                                <li><a href="#" data-toggle="modal" data-target="#modalDefault<?php echo $carcategorycek['id'] ?>"><em class="icon ni ni-edit"></em><span>Düzenle</span></a></li>
                                                <li><a href="javascript:confirmDelete('Action/carcategory.php?CategoryDelete=ok&CategoryID=<?php echo $carcategorycek['id'];?>')"><em class="icon ni ni-trash"></em><span>Sil</span></a></li>

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