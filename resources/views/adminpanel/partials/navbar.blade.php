<div class="fixed-sidebar-left">
    <ul class="nav navbar-nav side-nav nicescroll-bar">
        <li class="navigation-header">
            <span>Başlıca</span>
            <hr/>
        </li>
        <li>
            <a class="active" href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard_dr"><div class="pull-left"><i class="ti-dashboard mr-20"></i><span class="right-nav-text">Dashboard</span></div><div class="pull-right"><i class="ti-angle-down"></i></div><div class="clearfix"></div></a>
            <ul id="dashboard_dr" class="collapse collapse-level-1">
                <li>
                    <a class="active-page" href="{{route('adminhome')}}">Ana Sayfa</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#ecom_dr">
                <div class="pull-left"><i class="ti-shopping-cart  mr-20"></i>
                    <span class="right-nav-text">Ürün Yönetimi</span></div><div class="pull-right"><i class="ti-angle-down"></i></div><div class="clearfix"></div></a>
            <ul id="ecom_dr" class="collapse collapse-level-1">
                <li>
                    <a href="#">Ürün Kategorisi yönetimi</a>
                </li>
                <li>
                    <a href="#">Ürünler</a>
                </li>

            </ul>
        </li>

        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#comp_dr">
                <div class="pull-left"><i class="ti-check-box  mr-20"></i>
                    <span class="right-nav-text">Ürün Yönetimi</span></div><div class="pull-right"><i class="ti-angle-down "></i></div><div class="clearfix"></div></a>
            <ul id="comp_dr" class="collapse collapse-level-1">
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#form_dr">
                        <div class="pull-left"><span class="right-nav-text">Kategorisi Yönetimi</span></div>
                        <div class="pull-right"><i class="ti-angle-down "></i></div>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="form_dr" class="collapse collapse-level-2  dr-change-pos">
                        <li>
                            <a href="#">Ürün Kategori Listesi</a>
                        </li>
                        <li>
                            <a href="#">Yeni Ürün Kategorisi Ekle</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#chart_dr">
                        <div class="pull-left"><span class="right-nav-text">Ürünler</span></div>
                        <div class="pull-right"><i class="ti-angle-down "></i></div>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="chart_dr" class="collap se collapse-level-2 dr-change-pos">
                        <li>
                            <a href="#">5 Yıldız Alan Ürünler</a>
                        </li>
                        <li>
                            <a href="#">Tek Yıldız Alan ürünler</a>
                        </li>
                        <li>
                            <a href="#">1000 Tl üstü Ürünler</a>
                        </li>
                        <li>
                            <a href="#">Etkileşimi Olmayan Ürünler</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li>
            <a class="active" href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard_dr">
                <div class="pull-left"><i class="ti-briefcase mr-20"></i>
                    <span class="right-nav-text">Mağaza Yönetimi</span></div>
                <div class="pull-right"><i class="ti-angle-down"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="dashboard_dr" class="collapse collapse-level-1">
                <li>
                    <a class="active-page" href="{{route('approvalnewregisters')}}">Onay Bekleyen Mağazalar</a>
                </li>
                <li>
                    <a class="active-page" href="{{route('newregisters')}}">Yeni Kayıtlı Mağazalar</a>
                </li>
                <li>
                    <a class="active-page" href="{{route('createnewregister')}}">Yeni Mağaza Aç</a>
                </li>
                <li>
                    <a class="active-page" href="{{route('approvednewregisters')}}">Kaydı Onaylanmış Mağazalar</a>
                </li>
                <li>
                    <a class="active-page" href="{{route('blockedstores')}}">Engellenmiş Mağazalar</a>
                </li>
            </ul>
        </li>
    </ul>
</div>
