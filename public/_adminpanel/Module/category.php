<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Kategoriler
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
                                <h5 class="modal-title">Kategori&Alt Kategori Ekleme</h5>
                            </div>
                            <div class="modal-body">
                                <form  method="POST" enctype="multipart/form-data" action="Action/categoryfunction.php">


                                    <div class="form-group">
                                        <label class="form-label" for="full-name">Kategori Name</label>
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
                                        <label class="form-label" for="email-address">Kategori İcon</label>
                                        <div class="form-control-wrap">
                                            <div class="custom-file" style="font-size:15px;">
                                                <button class="btn btn-secondary" name="CategoryIcon" role="iconpicker"></button>
                                            </div>
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
                    <th class="nk-tb-col tb-col-mb"><span class="sub-text">Kategori Resim</span></th>

                    <th class="nk-tb-col tb-col-lg"><span class="sub-text">Kategori Adı</span></th>

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
                while($categoryayarcek=$categoryayar->fetch(PDO::FETCH_ASSOC)) { $say++?>
                    <div class="modal fade" tabindex="-1" id="modalDefault<?php echo $categoryayarcek['id'] ?>">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                    <em class="icon ni ni-cross"></em>
                                </a>
                                <div class="modal-header">
                                    <h5 class="modal-title">Kategori&Alt Kategori Düzenleme</h5>
                                </div>
                                <div class="modal-body">
                                    <form  method="POST" enctype="multipart/form-data" action="Action/categoryfunction.php">




                                        <div class="form-group">
                                            <label class="form-label" for="full-name">Kategori Adı</label>
                                            <div class="form-control-wrap">
                                                <input type="text" name="title" class="form-control" id="full-name" value="<?php echo $categoryayarcek['title'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="email-address">Kategori Resim</label>
                                            <div class="form-control-wrap">
                                                <div class="custom-file" style="font-size:15px;">
                                                    <input type="file" multiple="" class="custom-file-input" name="CategoryAvatar" id="customFile" >
                                                    <label class="custom-file-label" for="customFile">Resim Seçiniz...</label>
                                                </div>
                                            </div>
                                        </div>


                                        <input type="hidden" value="<?php echo $categoryayarcek['id'] ?>" name="id">

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
                                                                         <?php echo $categoryayarcek['id'] ?>
                                                                     </span>
                        </td>
                        <td class="nk-tb-col">
                            <div class="user-card">
                                <div style="background:white;" class="user-avatar bg-dim-primary d-none d-sm-flex">
                                    <img width="50" height="50" src="assets/upload/category/<?php echo $categoryayarcek['CategoryAvatar'];?>" alt="">
                                </div>
                              
                            </div>
                        </td>


                        <td class="nk-tb-col tb-col-lg">
                            <?php echo $categoryayarcek['title'] ?>
                        </td>

                        <td class="nk-tb-col nk-tb-col-tools">
                            <ul class="nk-tb-actions gx-1">

                                <li>
                                    <div class="drodown">
                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <ul class="link-list-opt no-bdr">
                                                <li><a href="#" data-toggle="modal" data-target="#modalDefault<?php echo $categoryayarcek['id'] ?>"><em class="icon ni ni-edit"></em><span>Düzenle</span></a></li>
                                                <li><a href="javascript:confirmDelete('Action/categoryfunction.php?CategoryDelete=ok&CategoryID=<?php echo $categoryayarcek['id'];?>&CategoryAvatar=<?php echo $categoryayarcek['CategoryAvatar'];?>')"><em class="icon ni ni-trash"></em><span>Sil</span></a></li>

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
                                text: "Kategori Silme İşlemini Onaylıyormusunuz...",
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