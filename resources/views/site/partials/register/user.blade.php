<div class="tab-pane in  active center-block loginFormContent" style="margin-bottom: 25px;min-height: 305px;" id="uye">
    <div style="text-align:center;margin-bottom:20px;">
        <span class="step">Genel Bilgiler</span>
        <span class="step">Üye Bİlgileri</span>
        <span class="step">Kişisel Bilgiler</span>
        <span class="step">Hükümler ve Koşullar</span>
    </div>
    <form id="regForm" action="#">
        <div class="tab">
            <div>
                <label for="input">Adınız</label>
                <input class="customFormInput" required type="text" placeholder="Beyler">
            </div>
            <div>
                <label for="input">Soyadınız</label>
                <input class="customFormInput" required type="text" placeholder="İbrahimov">
            </div>
            <div>
                <label for="input">Numaranız</label>
                <input class="customFormInput" required type="text" placeholder="İbrahimov">
            </div>
        </div>
        <div class="tab">
            <div>
                <label for="input">E-Mail Adresiniz</label>
                <input class="customFormInput" required type="text" placeholder="Beyler">
            </div>
            <div>
                <label for="input">Şifreniz</label>
                <input class="customFormInput" required type="text" placeholder="İbrahimov">
            </div>
            <div>
                <label for="input">Şifreniz Doğrulama</label>
                <input class="customFormInput" required type="text" placeholder="İbrahimov">
            </div>
        </div>
        <div class="tab">
            <div>
                <label for="input">Cinsiyetiniz</label>
                <select class="customFormInput">
                    <option value="">Erkek</option>
                    <option value="">Kadın</option>
                </select>
            </div>
            <div>
                <label for="input">Doğum Tarihiniz</label>
                <input class="customFormInput" required type="date">
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
    </form>
</div>
