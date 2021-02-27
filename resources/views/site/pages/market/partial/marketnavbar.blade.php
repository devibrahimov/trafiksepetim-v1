<nav class="customDD">
    <ul>
        <li>
            <a href="{{route('myshop')}}"><span class="fa fa-home"></span> Anasayfa</a>
        </li>
        <li>
            <a href="#"><span class="fa fa-shopping-cart"></span> Siparişler</a>
            <ul>
                <li><a href="onayBekleyenSiparisler.html">Onay Bekleyen Siparişler <span>1</span></a></li>
                <li><a href="bekleyenSiparisler.html">Bekleyen Siparişler</a></li>
                <li><a href="tumSiparisler.html">Tüm Siparişler</a></li>
            </ul>
        </li>
        <li>
            <a href="{{route('market.profilproducts')}}"><span class="fa fa-tags"></span> Ürün Yonetimi</a>
        </li>
        <li>
            <a href="#"><span class="fa fa-bar-chart"></span> Raporlar</a>
            <ul>
                <li><a href="satisRaporu.html">Satış Raporu</a></li>
                <li><a href="gelirRaporu.html">Gelir Raporu</a></li>
            </ul>
        </li>
        <li>
            <a href="{{route('market.profil')}}"><span class="fa fa-cogs"></span> Ayarlar</a>
        </li>
    </ul>
</nav>
