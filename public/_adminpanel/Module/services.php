<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Kayıtlı Mağazalar

            </h4>

        </div>
    </div>
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                <thead>
                <tr class="nk-tb-item nk-tb-head">

                    <th class="nk-tb-col"><span class="sub-text">ID</span></th>
                    <th class="nk-tb-col tb-col-mb"><span class="sub-text">Hizmet Veren Adı</span></th>
                    <th class="nk-tb-col tb-col-md"><span class="sub-text">Yetkilin Adı Soyadı</span></th>
                    <th class="nk-tb-col tb-col-lg"><span class="sub-text">Yetkili Telefon</span></th>

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
                while($servicescek=$services->fetch(PDO::FETCH_ASSOC)) { $say++;



                ?>


                    <tr class="nk-tb-item">
                        <td class="nk-tb-col tb-col-mb">
                                                                     <span class="tb-amount">
                                                                         <?php echo $servicescek['id'] ?>
                                                                     </span>
                        </td>
                        <td class="nk-tb-col">
                            <?php echo $servicescek['company_title'] ?>
                        </td>

                        <td class="nk-tb-col tb-col-md">
                            <?=
                            $servicescek['name']." ".$servicescek['surname'];


                            ?>
                        </td>
                        <td class="nk-tb-col tb-col-lg">
                            <?php echo $servicescek['istelefonu'] ?>
                        </td>

                        <td class="nk-tb-col nk-tb-col-tools">
                            <ul class="nk-tb-actions gx-1">

                                <li>
                                    <div class="drodown">
                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <ul class="link-list-opt no-bdr">
                                                <li><a href="#" data-toggle="modal" data-target="#modalDefault<?php echo $categoryayarcek['id'] ?>"><em class="icon ni ni-edit"></em><span>Detay</span></a></li>
                                                <li><a href="servicesproducts.php" ><em class="icon ni ni-edit"></em><span>Ürünler</span></a></li>
                                                <li><a href="#" data-toggle="modal" data-target="#modalDefault<?php echo $categoryayarcek['id'] ?>"><em class="icon ni ni-edit"></em><span>Düzenle</span></a></li>
                                                <li><a href="javascript:confirmDelete('Action/services.php?ServicesDelete=ok&ServicesID=<?php echo $servicescek['id'];?>')"><em class="icon ni ni-trash"></em><span>Sil</span></a></li>

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
                                text: "Mağazanın Tüm Kayıtlarını Silme İşlemini Onaylıyormusunuz...",
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
    </div>
</div>