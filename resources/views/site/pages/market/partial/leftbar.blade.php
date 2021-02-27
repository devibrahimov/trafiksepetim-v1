<style>
    a.disabled {
        pointer-events: none;
        cursor: default;
        color: #a0a0a0;
    }
</style>
    <div class="myaccount-tab-menu nav" role="tablist">
        <a href="{{route('market.profilproducts')}}" class="active" ><i class="fa fa-shopping-bag"></i>
            ÜRÜNLERİM
        </a>
        <a href="{{route('market.profil')}}" ><i class="fa fa-user"></i>
            HESAP BİLGİLERİ
        </a>
        <a href="#orders" class="disabled"  ><i class="fa fa-cart-arrow-down"></i>
            SİPARİŞLER
        </a>
        <a href="#download" class="disabled" ><i class="fas fa-chart-bar"></i>
            GELİRLER
        </a>
        <a href="#orders" class="disabled"  ><i class="fa fa-comment"></i>
            YORUMLAR
        </a>
        <a href="{{route('market.changepassword')}}" ><i class="fa fa-lock"></i>
            ŞİFRENİ DEĞİŞTİR
        </a>
        <a href="login.html"><i class="fas fa-sign-out"></i> ÇIKIŞ YAP</a>
    </div>
