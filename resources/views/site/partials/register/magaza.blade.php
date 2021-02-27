<div class="tab-pane in center-block loginFormContent" style="max-width: 1000px;" id="magaza">
    <div style="text-align:center;margin-bottom:20px;">
        <span class="step">Genel Bilgiler</span>
        <span class="step">Market Bİlgileri</span>
        <span class="step">İmza Yetkilisi</span>
        <span class="step">İletişim Yetkilisi</span>
        <span class="step">Banka Bilgileri</span>
        <span class="step">Hükümler ve Koşullar</span>
    </div>
    <form id="regForm" action="#">
        <div class="tab row">
            <div class="col-md-6">
                <label for="input">Kullanıcı Adı</label>
                <input class="customFormInput" required type="text" >
            </div>
            <div class="col-md-6">
                <label for="input">E-Mail</label>
                <input class="customFormInput" required type="text" >
            </div>
            <div class="col-md-6">
                <label for="input">Şifre</label>
                <input class="customFormInput" required type="text">
            </div>
            <div class="col-md-6">
                <label for="input">Şifre Kontrol</label>
                <input class="customFormInput" required type="text">
            </div>
            <div class="col-md-6">
                <label for="input">Mağaza Adı</label>
                <input class="customFormInput" required type="text">
            </div>
            <div class="col-md-6">
                <label for="input">Üyelik Türü</label>
                <select class="customFormInput" id="showHideID" onchange="showHideDiv()">
                    <option value="1">Şahıs</option>
                    <option value="2">Şirket</option>
                </select>
            </div>
        </div>
        <div class="tab row">
            <div id="write">
                <div class="col-md-6">
                    <label for="input">Şahıs Adı</label>
                    <input class="customFormInput" required type="text" >
                </div>
                <div class="col-md-6">
                    <label for="input">Şahıs Soyadı</label>
                    <input class="customFormInput" required type="text" >
                </div>
                <div class="col-md-6">
                    <label for="input">TC Kimlik No</label>
                    <input class="customFormInput" required type="text">
                </div>
                <div class="col-md-6">
                    <label for="input">Şirket Ünvanı</label>
                    <input class="customFormInput" required type="text">
                </div>
            </div>
            <div class="col-md-6">
                <label for="input">İşletme Adı</label>
                <input class="customFormInput" required type="text">
            </div>
            <div class="col-md-6">
                <label for="input">E-posta Adresi</label>
                <input class="customFormInput" required type="text" >
            </div>
            <div class="col-md-12">
                <label for="input">Vergi Numarası</label>
                <input class="customFormInput" required type="text">
            </div>
            <div class="col-md-6">
                <label for="input">Vergi İl</label>
                <select class="customFormInput">
                    <option value="1">Adana</option>
                    <option value="1">Adana</option>
                    <option value="1">Adana</option>
                    <option value="1">Adana</option>
                    <option value="1">Adana</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="input">Vergi Dairesi</label>
                <select class="customFormInput">
                    <option value="1">Merkez</option>
                    <option value="1">Merkez</option>
                    <option value="1">Merkez</option>
                    <option value="1">Merkez</option>
                    <option value="1">Merkez</option>
                    <option value="1">Merkez</option>
                </select>
            </div>
        </div>
        <div class="tab row">
            <div class="col-md-6">
                <label for="input">Ad</label>
                <input class="customFormInput" required type="text" >
            </div>
            <div class="col-md-6">
                <label for="input">Soyad</label>
                <input class="customFormInput" required type="text">
            </div>
            <div class="col-md-6">
                <label for="input">Ünvan</label>
                <input class="customFormInput" required type="text">
            </div>
            <div class="col-md-6">
                <label for="input">Cinsiyet</label>
                <select class="customFormInput">
                    <option value="1">Erkek</option>
                    <option value="2">Kadın</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="input">Cep Telefonu</label>
                <input class="customFormInput" required type="text" >
            </div>
            <div class="col-md-6">
                <label for="input">Sabit Hat</label>
                <input class="customFormInput" required type="text">
            </div>
            <div class="col-md-12">
                <label for="input">Fax Numarası</label>
                <input class="customFormInput" required type="text">
            </div>
        </div>
        <div class="tab row">
            <div class="col-md-6">
                <label for="input">Ad</label>
                <input class="customFormInput" required type="text">
            </div>
            <div class="col-md-6">
                <label for="input">Soyad</label>
                <input class="customFormInput" required type="text">
            </div>
            <div class="col-md-6">
                <label for="input">Ünvan</label>
                <input class="customFormInput" required type="text">
            </div>
            <div class="col-md-6">
                <label for="input">Cinsiyet</label>
                <select class="customFormInput">
                    <option value="1">Erkek</option>
                    <option value="2">Kadın</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="input">Cep Telefonu</label>
                <input class="customFormInput" required type="text" >
            </div>
            <div class="col-md-6">
                <label for="input">Sabit Hat</label>
                <input class="customFormInput" required type="text">
            </div>
            <div class="col-md-12">
                <label for="input">Fax Numarası</label>
                <input class="customFormInput" required type="text">
            </div>
        </div>
        <div class="tab row">
            <div class="col-md-6">
                <label for="input">İl Seçin</label>
                <select class="customFormInput">
                    <option value="1">Adana</option>
                    <option value="2">Adana</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="input">İlçe Seçin</label>
                <select class="customFormInput">
                    <option value="1">Merkez</option>
                    <option value="2">Merkez</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="input">Posta Kodu</label>
                <input class="customFormInput" required type="text">
            </div>
            <div class="col-md-6">
                <label for="input">Adres</label>
                <input class="customFormInput" required type="text">
            </div>
            <div class="col-md-6">
                <label for="input">Hesap Sahibi Ünvan</label>
                <input class="customFormInput" required type="text" >
            </div>
            <div class="col-md-6">
                <label for="input">Banka</label>
                <select class="customFormInput">
                    <option value="1">İş Bankası</option>
                    <option value="2">Vakıf Bank</option>
                </select>
            </div>
            <div class="col-md-12">
                <label for="input">IBAN No</label>
                <input class="customFormInput" required type="text">
            </div>
        </div>
        <div class="tab">
            <div>
                <label for="input">Hükümler Ve Koşullar</label>
                <div class="customFormInput" style="height: 170px; overflow-y: scroll;">lorem Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iste facilis aut illo nisi voluptate perferendis dicta rerum autem doloribus, nulla amet qui explicabo asperiores ratione molestias, quia praesentium
                    consequatur iure. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ullam consequuntur ducimus amet in dolor eum? Quae, asperiores vel modi praesentium itaque dolorum aspernatur, consequuntur impedit
                    repellat quia, maxime provident laboriosam! Lorem ipsum dolor sit amet consectetur adipisicing elit. Non deserunt totam, ipsam, laborum eos quod modi impedit dolor autem quo nobis maiores voluptatem perspiciatis
                    quisquam harum. Excepturi adipisci tempore eaque? Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam, rem doloribus? Perferendis quidem eaque cumque repellendus repellat vitae quasi temporibus
                    qui nisi consequatur illo, veritatis minima! Laboriosam temporibus impedit inventore. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit dolorum delectus quos voluptate fugiat minima alias
                    error amet dicta assumenda iusto sapiente nihil aliquam impedit, ducimus placeat perspiciatis nisi veniam! Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus excepturi, quae soluta at perferendis
                    quod deleniti a neque quia incidunt veritatis atque deserunt iure nesciunt! Ipsa doloremque officia corporis! Nulla? Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde totam aperiam veniam tempora,
                    voluptas nihil ab alias iure officiis aut adipisci quo laboriosam voluptate expedita ipsa odio placeat deserunt. Iste?</div>
            </div>
        </div>
        <div style="overflow:auto;">
            <div style="float:right;">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Geri</button>
                <button type="button" id="nextBtn" onclick="nextPrev(1)">İleri</button>
            </div>
        </div>
    </form >
</div>
