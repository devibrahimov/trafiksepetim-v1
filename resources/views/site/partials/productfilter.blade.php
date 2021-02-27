@php

$categories   =  \App\Model\Category::all();
$carcompanies = \App\Model\Cars::all();
 //$carmodels    = \App\Model\CarModel::all();

@endphp

<div class="sidebar-module-container">
    <div class="sidebar-filter">
        <div class="sidebar-widget wow fadeInUp">
            <form action="{{route('filterResultpage')}}" method="GET" >
                <h3 class="section-title">Ürünleri Filtrele</h3>
            <div class="widget-header">
                <h4 class="widget-title ">Kategori</h4>
            </div>
            <select data-live-search="true" data-style="btn-inverse" name="filtercategory" id="filtercategory" data-live-search-style="startsWith" class="selectpicker">
                <option selected disabled value="{{null}}">Kategoriyi Seçin</option>
                  @foreach($categories as $cat)
                    <option @if(isset($filterquery['filtercategory'])){{$filterquery['filtercategory'] == $cat->id? 'selected': ''}}@endif value="{{$cat->id}}">{{$cat->name}}</option>
                  @endforeach
            </select>
            <div class="widget-header">
                <h4 class="widget-title">Fiyat Aralığı</h4>
            </div>
            <div class="sidebar-widget-body ">
                <div class="price-range-holder">
               <div class="row">
                   <span class="col-md-6">
                       <span >En az</span>
                  <div class="input-group input-group-sm">
                    <span class="input-group-addon" id="sizing-addon3">₺</span>
                    <input type="number" class="form-control" placeholder="0" @if(isset($filterquery['filterminprice']))value="{{$filterquery['filterminprice']}}"@endif name="filterminprice" id="filterminprice" aria-describedby="sizing-addon3">
                    </div>
               </span>
                   <span class="col-md-6">
                         <span >En Yüksek</span>
                     <div class="input-group input-group-sm">
                    <span class="input-group-addon" id="sizing-addon3">₺</span>
                    <input type="number" class="form-control" placeholder="0" @if(isset($filterquery['filtermaxprice']))value="{{$filterquery['filtermaxprice']}}"@endif name="filtermaxprice" id="filtermaxprice"  aria-describedby="sizing-addon3">
                    </div>
               </span>
               </div>
                </div>
                <div class="widget-header">
                    <h4 class="widget-title pb-2">Durumu</h4>
                </div>
                <select data-live-search="true" data-style="btn-inverse" data-live-search-style="startsWith" name="filterstate" id="filterstate" class=" filterstatestate selectpicker">
                    <option value="{{null}}"  selected disabled >Durumunu seçin</option>
                        <option @if(isset($filterquery['state'])){{ $filterquery['state'] == "Sıfır"?"selected":"" }}@endif value="Sıfır">Sıfır</option>
                        <option @if(isset($filterquery['state'])){{ $filterquery['state'] == "İkinci El"?"selected":"" }}@endif  value="İkinci El">İkinci El</option>
                </select>
                    <div class="widget-header">
                        <h4 class="widget-title pb-2">Araba Markası</h4>
                    </div>
                    <select data-live-search="true" data-style="btn-inverse" data-live-search-style="startsWith" name="filtercarcompany" id="filtercarcompany" class="selectpicker">
                        <option value="{{null}}"  selected disabled>Araba Markasını seçin</option>
                     @foreach($carcompanies as $car)
                        <option @if(isset($filterquery['filtercarcompany'])){{ $filterquery['filtercarcompany'] == $car->id?"selected":"" }}@endif value="{{$car->id}}">{{$car->name}}</option>
                        @endforeach
                    </select>
                    <div class="widget-header">
                        <h4 class="widget-title pb-2">Minumum Stok Sayısı</h4>
                    </div>
                    <div class="input-group input-group-sm">
                        <span class="input-group-addon" id="sizing-addon3">En az </span>
                        <input type="number" @if(isset($filterquery['filterstock']))value="{{$filterquery['filterstock']}}"@endif class="form-control"  name="filterstock" id="filterstock" aria-describedby="sizing-addon3">
                    </div>

                <div class="widget-header">
                    <h4 class="widget-title pb-2">Yıldız Puanı</h4>
                </div>

                <div>
                   <label for="fiverate">
                   <input type="radio" name="rate" id="fiverate" class="rate" value="5">
                   <i class="fa fa-star" style="color: orange" data-value="1" aria-hidden="true"></i>
                   <i class="fa fa-star" style="color: orange" data-value="1" aria-hidden="true"></i>
                   <i class="fa fa-star" style="color: orange" data-value="1" aria-hidden="true"></i>
                   <i class="fa fa-star" style="color: orange" data-value="1" aria-hidden="true"></i>
                   <i class="fa fa-star" style="color: orange" data-value="1" aria-hidden="true"></i>
                   </label>
               </div>
                <div>
                    <label for="fourrate">
                   <input type="radio" name="rate" id="fourrate" class="rate" value="4" >
                   <i class="fa fa-star" style="color: orange" data-value="1" aria-hidden="true"></i>
                   <i class="fa fa-star" style="color: orange" data-value="1" aria-hidden="true"></i>
                   <i class="fa fa-star" style="color: orange" data-value="1" aria-hidden="true"></i>
                   <i class="fa fa-star" style="color: orange" data-value="1" aria-hidden="true"></i>
                    </label>
               </div>
                <div>
                    <label for="threerate">
                        <input type="radio" name="rate" id="threerate" class="rate" value="3" >
                        <i class="fa fa-star" style="color: orange" data-value="1" aria-hidden="true"></i>
                        <i class="fa fa-star" style="color: orange" data-value="1" aria-hidden="true"></i>
                        <i class="fa fa-star" style="color: orange" data-value="1" aria-hidden="true"></i>
                    </label>
               </div>
                <div>
                  <label for="tworate">
                   <input type="radio" name="rate" id="tworate" class="rate" value="2">
                   <i class="fa fa-star" style="color: orange" data-value="1" aria-hidden="true"></i>
                   <i class="fa fa-star" style="color: orange" data-value="1" aria-hidden="true"></i>
                 </label>
               </div>
                <div>
                    <label for="onerate">
                    <input type="radio" name="rate" id="onerate" class="rate" value="1">
                    <i class="fa fa-star" style="color: orange" data-value="1" aria-hidden="true"></i>
                   </label>
                </div>
                <div>
                    <label for="notrate">
                    <input type="radio" name="rate" id="notrate" class="rate" value="">
                    Belirtmek İstemiyorum
                   </label>
                </div>
                @csrf

            </div>
            <button type="submit" id="getFilterResult" class="lnk btn btn-primary m-t-10">Filtrele</button>
            </form>
        </div>

        <div class="home-banner bsNone mb-1"> <img src="/site/images/banners/app.png" class="img-responsive" alt="Image"> </div>
        <div class="home-banner bsNone mt-1"> <img src="/site/images/banners/play.png" class="img-responsive" alt="Image"> </div>
    </div>
</div>
