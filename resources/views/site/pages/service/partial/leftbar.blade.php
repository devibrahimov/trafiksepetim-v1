<style>
    a.disabled {
        pointer-events: none;
        cursor: default;
        color: #a0a0a0;
    }
</style>
    <div class="myaccount-tab-menu nav" role="tablist">
        <a href="{{route('service-posts')}}" ><i class="fa fa-shopping-bag"></i>
            PAYLAŞIMLARIM
        </a>
        <a href="{{route('service-profil')}}"   ><i class="fa fa-user"></i>
            HESAP BİLGİLERİ
        </a>
        <a href="#orders" class="disabled" ><i class="fa fa-comment"></i>
            YORUMLAR
        </a>
        <a href="#download" class="disabled" ><i class="fas fa-credit-card"></i>
           Ödemeler
        </a>
        <a href="{{route('market.changepassword')}}" ><i class="fa fa-lock"></i>
            ŞİFRENİ DEĞİŞTİR
        </a>
        <a href="#" onclick="event.preventDefault();
                                    document.getElementById('form-submit').submit()"><i class="fas fa-sign-out"></i> ÇIKIŞ YAP</a>

        <form action="{{route('servicelogout')}}" method="post" id="form-submit" style="display: none;">
            @csrf
        </form>
    </div>
