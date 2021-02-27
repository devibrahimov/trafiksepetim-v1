@extends('site.index')

@section('css')
@endsection


@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="index.html">Anasayfa</a></li>
                    <li class='active'>{{auth('market')->user()->market_name}}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="body-content outer-top-xs">
        <div class="container-fluid p-0">
            <div class="col-md-12 magazaNav">
                  @include('site.pages.market.partial.marketnavbar')
            </div>
        </div>
        <div class='container'>
            <div class='row'>
                <div class="col-md-3 p-0">
                    <div class="magazaDiv">
                        <span class="magazaH1">bugünkü satışım</span>
                        <span class="magazaSatisSayisi">satış sayısı <b>0</b></span>
                        <span class="magazaSatisSayisi">satış tutarı <b>0.00₺</b></span>
                    </div>
                </div>
                <div class="col-md-3 p-0">
                    <div class="magazaDiv"> <span class="magazaH1">aylık satışım</span>
                        <span class="magazaSatisSayisi">satış sayısı <b>0</b></span>
                        <span class="magazaSatisSayisi">satış tutarı <b>0.00₺</b></span>
                    </div>
                </div>
                <div class="col-md-3 p-0">
                    <div class="magazaDiv">
                        <span class="magazaH1">dönem gelirim</span>
                        <span class="magazaSatisGelir">00.00₺</b></span>
                    </div>
                </div>
                <div class="col-md-3 p-0">
                    <div class="magazaDiv">
                        <span class="magazaH1">toplam ürün sayısı</span>
                        <span class="magazaSatisGelir">{{$myProductsCount}}</b></span>
                    </div>
                </div>
                <div class="col-md-8 p-0">
                    <div class="magazaDiv">
                        <span class="magazaH1">onay bekleyen siparisler <a href="onayBekleyenSiparisler.html" class="magazaLink"> onay bekleyen siparişler <i class="fa fa-angle-double-right" aria-hidden="true"></i></a></span>
                        <div class="magazaNotify">
                            <table id="bekleyenSiparis" class="display" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Tarih</th>
                                    <th>Ürün Adı</th>
                                    <th>Adet</th>
                                    <th>Alıcı</th>
                                    <th>Durumu</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>2020/04/25</td>
                                    <td>Ön Tampon Passat b7</td>
                                    <td>1</td>
                                    <td>Bilal Peril</td>
                                    <td>ONAY BEKİYOR</td>
                                </tr>
                                <tr>
                                    <td>2020/04/24</td>
                                    <td>Golf MK4 Stop</td>
                                    <td>2</td>
                                    <td>Mikail Doktor</td>
                                    <td>ONAY BEKİYOR</td>
                                </tr>
                                <tr>
                                    <td>2020/04/27</td>
                                    <td>Fiat Egea Ön Panjur</td>
                                    <td>1</td>
                                    <td>Faruke Ege</td>
                                    <td>ONAY BEKİYOR</td>
                                </tr>
                                <tr>
                                    <td>2020/04/28</td>
                                    <td>Citroen Nemo Sağ Ayna</td>
                                    <td>1</td>
                                    <td>Cemil Nesil</td>
                                    <td>ONAY BEKİYOR</td>
                                </tr>
                                <tr>
                                    <td>2020/04/26</td>
                                    <td>Renault 12 Şanzuman</td>
                                    <td>1</td>
                                    <td>Mehmet Furkan SARI</td>
                                    <td>ONAY BEKİYOR</td>
                                </tr>
                                <tr>
                                    <td>2020/04/25</td>
                                    <td>Ön Tampon Passat b7</td>
                                    <td>1</td>
                                    <td>Bilal Peril</td>
                                    <td>ONAY BEKİYOR</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 p-0">
                    <div class="magazaDiv">
                        <span class="magazaH1">Ürünler<a href="tumUrunler.html" class="magazaLink"> ürünler <i class="fa fa-angle-double-right" aria-hidden="true"></i></a></span>
                        <canvas id="urunler" width="200" height="160"></canvas>
                    </div>
                </div>
                <div class="col-md-6 p-0">
                    <div class="magazaDiv">
                        <span class="magazaH1">bu haftaki siparişler <a href="tumSiparisler.html" class="magazaLink"> tüm siparişler <i class="fa fa-angle-double-right" aria-hidden="true"></i></a></span>
                        <canvas id="siparis" width="400" height="200"></canvas>
                    </div>
                </div>
                <div class="col-md-6 p-0">
                    <div class="magazaDiv">
                        <span class="magazaH1">Yıllık Ciro<a href="gelirRaporu.html" class="magazaLink"> yıllık raporlar <i class="fa fa-angle-double-right" aria-hidden="true"></i></a></span>
                        <canvas id="gelir" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('statistics')

    <script src="site/js/chart.js"></script>
    <script src="site/js/datatables.js"></script>
    <script src="site/js/dataTables.rowReorder.min.js"></script>
    <script src="site/js/dataTables.responsive.min.js"></script>
@endsection

@section('js')

    <script>
        $(document).ready(function() {
            $('#bekleyenSiparis').DataTable({
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                responsive: true,
                pageLength: 5,
                "searching": false,
                paging: false,
                "bInfo": false
            });

        });
        var ctx = document.getElementById('siparis').getContext('2d');
        var siparis = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi', 'Pazar'],
                datasets: [{
                    label: 'Bu Haftaki Siparişler',
                    data: [0, 1, 5, 3, 7, 0],
                    borderColor: [
                        '#00446dcc'
                    ],
                    borderWidth: 2,
                    pointRadius: 10,
                    pointHoverRadius: 10
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        var ctx2 = document.getElementById('gelir').getContext('2d');
        var gelir = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'],
                datasets: [{
                    label: 'Kazanç ₺',
                    backgroundColor: [
                        '#00446d44',
                        '#00446d55',
                        '#00446d66',
                        '#00446d77',
                        '#00446d88',
                        '#00446d99',
                        '#00446daa',
                        '#00446dbb',
                        '#00446dcc',
                        '#00446ddd',
                        '#00446dee',
                        '#00446dff',
                    ],
                    barPercentage: 0.5,
                    barThickness: 30,
                    data: [16213, 26598, 17865, 14256, 25424, 28563, 20453, 18597, 19898, 22587, 23654, 27898]
                }]
            },
            options: {
                scales: {
                    xAxes: [{
                        stacked: true
                    }],
                    yAxes: [{
                        stacked: true
                    }]
                }
            }
        });
        var ctx3 = document.getElementById('urunler').getContext('2d');
        var urunler = new Chart(ctx3, {
            type: 'pie',
            data: {
                labels: [
                    "Ürünler",
                    "Kritik Stok",
                    "Tükenen Ürünler",
                    "Yayından Kaldırılan Ürünler"
                ],
                datasets: [{
                    data: [{{$myProductsCount}}, {{$criticStock}},{{$finishedProducts}},{{$unpublishedProducts}}],
                    backgroundColor: [  "#00446dbb",  "#f39700",   "#e70000",  "#888888" ]
                }]
            }
        });
    </script>
@endsection
