<?php include 'Theme/header.php' ?>
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
 <div class="nk-block nk-block-lg">
                         <div class="nk-block-head">
                             <div class="nk-block-head-content">
                                 <h4 class="nk-block-title">Data Table</h4>
                                 <div class="nk-block-des">
                                     <p>Using the most basic table markup, here’s how <code class="code-class">.table</code> based tables look by default.</p>
                                 </div>
                             </div>
                         </div>
                         <div class="card card-bordered card-preview">
                             <div class="card-inner">
                                 <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                     <thead>
                                     <tr class="nk-tb-item nk-tb-head">

                                         <th class="nk-tb-col"><span class="sub-text">User</span></th>
                                         <th class="nk-tb-col tb-col-mb"><span class="sub-text">Balance</span></th>
                                         <th class="nk-tb-col tb-col-md"><span class="sub-text">Phone</span></th>
                                         <th class="nk-tb-col tb-col-lg"><span class="sub-text">Verified</span></th>
                                         <th class="nk-tb-col tb-col-lg"><span class="sub-text">Last Login</span></th>
                                         <th class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></th>
                                         <th class="nk-tb-col nk-tb-col-tools text-right">
                                             <div class="dropdown">
                                                 <a href="#" class="btn btn-xs btn-outline-light btn-icon dropdown-toggle" data-toggle="dropdown" data-offset="0,5"><em class="icon ni ni-plus"></em></a>
                                                 <div class="dropdown-menu dropdown-menu-xs dropdown-menu-right">
                                                     <ul class="link-tidy sm no-bdr">
                                                         <li>
                                                             <div class="custom-control custom-control-sm custom-checkbox">
                                                                 <input type="checkbox" class="custom-control-input" checked="" id="bl">
                                                                 <label class="custom-control-label" for="bl">Balance</label>
                                                             </div>
                                                         </li>
                                                         <li>
                                                             <div class="custom-control custom-control-sm custom-checkbox">
                                                                 <input type="checkbox" class="custom-control-input" checked="" id="ph">
                                                                 <label class="custom-control-label" for="ph">Phone</label>
                                                             </div>
                                                         </li>
                                                         <li>
                                                             <div class="custom-control custom-control-sm custom-checkbox">
                                                                 <input type="checkbox" class="custom-control-input" id="vri">
                                                                 <label class="custom-control-label" for="vri">Verified</label>
                                                             </div>
                                                         </li>
                                                         <li>
                                                             <div class="custom-control custom-control-sm custom-checkbox">
                                                                 <input type="checkbox" class="custom-control-input" id="st">
                                                                 <label class="custom-control-label" for="st">Status</label>
                                                             </div>
                                                         </li>
                                                     </ul>
                                                 </div>
                                             </div>
                                         </th>
                                     </tr>
                                     </thead>
                                     <tbody>
                                     <tr class="nk-tb-item">

                                         <td class="nk-tb-col">
                                             <div class="user-card">
                                                 <div class="user-avatar bg-dim-primary d-none d-sm-flex">
                                                     <span>AB</span>
                                                 </div>
                                                 <div class="user-info">
                                                     <span class="tb-lead">Abu Bin Ishtiyak <span class="dot dot-success d-md-none ml-1"></span></span>
                                                     <span>info@softnio.com</span>
                                                 </div>
                                             </div>
                                         </td>
                                         <td class="nk-tb-col tb-col-mb">
                                             <span class="tb-amount">35040.34 <span class="currency">USD</span></span>
                                         </td>
                                         <td class="nk-tb-col tb-col-md">
                                             <span>+811 847-4958</span>
                                         </td>
                                         <td class="nk-tb-col tb-col-lg">
                                             <ul class="list-status">
                                                 <li><em class="icon text-success ni ni-check-circle"></em> <span>Email</span></li>
                                                 <li><em class="icon ni ni-alert-circle"></em> <span>KYC</span></li>
                                             </ul>
                                         </td>
                                         <td class="nk-tb-col tb-col-lg">
                                             <span>05 Oct 2019</span>
                                         </td>
                                         <td class="nk-tb-col tb-col-md">
                                             <span class="tb-status text-success">Active</span>
                                         </td>
                                         <td class="nk-tb-col nk-tb-col-tools">
                                             <ul class="nk-tb-actions gx-1">
                                                 <li class="nk-tb-action-hidden">
                                                     <a href="#" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Wallet">
                                                         <em class="icon ni ni-wallet-fill"></em>
                                                     </a>
                                                 </li>
                                                 <li class="nk-tb-action-hidden">
                                                     <a href="#" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Send Email">
                                                         <em class="icon ni ni-mail-fill"></em>
                                                     </a>
                                                 </li>
                                                 <li class="nk-tb-action-hidden">
                                                     <a href="#" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Suspend">
                                                         <em class="icon ni ni-user-cross-fill"></em>
                                                     </a>
                                                 </li>
                                                 <li>
                                                     <div class="drodown">
                                                         <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                         <div class="dropdown-menu dropdown-menu-right">
                                                             <ul class="link-list-opt no-bdr">
                                                                 <li><a href="#"><em class="icon ni ni-focus"></em><span>Quick View</span></a></li>
                                                                 <li><a href="#"><em class="icon ni ni-eye"></em><span>View Details</span></a></li>
                                                                 <li><a href="#"><em class="icon ni ni-repeat"></em><span>Transaction</span></a></li>
                                                                 <li><a href="#"><em class="icon ni ni-activity-round"></em><span>Activities</span></a></li>
                                                                 <li class="divider"></li>
                                                                 <li><a href="#"><em class="icon ni ni-shield-star"></em><span>Reset Pass</span></a></li>
                                                                 <li><a href="#"><em class="icon ni ni-shield-off"></em><span>Reset 2FA</span></a></li>
                                                                 <li><a href="#"><em class="icon ni ni-na"></em><span>Suspend User</span></a></li>
                                                             </ul>
                                                         </div>
                                                     </div>
                                                 </li>
                                             </ul>
                                         </td>
                                     </tr><!-- .nk-tb-item  -->

                                     </tbody>
                                 </table>
                             </div>
                         </div><!-- .card-preview -->
                     </div>
                </div>
            </div>
        </div>
    </div>
<?php include 'Theme/footer.php' ?>