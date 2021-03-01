@php use App\Model\Category;
use App\Model\ServiceCategory;
use \Illuminate\Support\Str ;

$mallcats = Category::all();
$servicecats = ServiceCategory::all();
@endphp

<style>
    .sidebar .side-menu nav .nav>li>a {
        padding: 5px 15px;
    }
    nav .menunavheader>a  {
        padding: 13px 15px!important;
        color: #fff!important;
        font-weight: bold!important;
    }
    nav .menunavheader  {
        background: #00446D!important ;
    }
    .menunavheader>a:hover  .menunavheader{
        background: #00446D!important ;
    }
    nav .menunavheader>a:hover {
        padding: 13px 15px!important;
        color: #fff!important;
        font-weight: bold!important;
    }
    .sidebar .side-menu nav .nav>li.menunavheader
    a:hover, .sidebar .side-menu nav .nav>li.menunavheader a:focus {
        color: #fff;
        background: #00446D!important;
    }
</style>
<div class="side-menu animate-dropdown outer-bottom-xs">
    {{--     <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Kategoriler</div>--}}
    <nav class="yamm megamenu-horizontal">
        <ul class="nav">
            <li class=" menunavheader menu-item "> <a > ÜRÜNLER</a> </li>
            @foreach($mallcats as $cat)
                <li class="dropdown menu-item">
                    <a  class="dropdown-toggle" data-toggle="dropdown">
                        <svg class="menuSvg"  viewBox="0 0 48 48"> {!!$cat->CategoryIcon!!}</svg>{{$cat->name}}   @if($cat->has_child == 1 ) <i class="fa fa-angle-right"></i> @endif</a>
                    @if($cat->has_child == 1)
                        <ul class="dropdown-menu mega-menu">
                            <li class="yamm-content">
                                <div class="row">
                                    <ul>
                                        <li>
                                            <a href="{{route('category_products',   Str::slug($cat->name).'-C'.$cat->id   )}}">
                                                <h3>{{$cat->name}}</h3>
                                            </a>
                                        </li>
                                    </ul>

                                    @if(count($cat->subcategory($cat->id)) <=10)
                                        <ul style="float: left">
                                            @foreach($cat->subcategory($cat->id) as $subcat)
                                                <li>
                                                    <a href=" {{route('category_products', Str::slug($cat->name).'-C'.$cat->id.'/'.Str::slug($subcat->name).'-C'.$subcat->id   ) }} ">
                                                        {{$subcat->name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <a style="float: right" href="#"><img min-height="100%" width="400px" src="{{env('APP_URL')}}/site/img/eda4f673-faed-4044-8551-4ab56974944a.jpg"></a>
                                </div>
                                @endif

                                @if(count($cat->subcategory($cat->id)) >10)
                                    @php
                                        $array = $cat->subcategory($cat->id)->toArray() ;
                                        $firstarray = array_slice($array, 0, 10);
                                    @endphp
                                    <ul  style="float: left; padding-left: 10px;" >
                                        @foreach($firstarray as $subcat)
                                            <li>
                                                <a href=" {{route('category_products', Str::slug($cat->name).'-C'.$cat->id.'/'.Str::slug($subcat->name).'-C'.$subcat->id   ) }} ">
                                                    {{$subcat->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    @php
                                        $endinds = count($array);
                                        $secondarray = array_slice($array, 11,$endinds) @endphp
                                    <ul  style="float: left; padding-left: 10px;"  >
                                        @foreach($secondarray as $subcat)
                                            <li>
                                                <a href="{{route('category_products', Str::slug($cat->name).'-C'.$cat->id.'/'.Str::slug($subcat->name).'-C'.$subcat->id   ) }} ">
                                                    {{$subcat->name }}
                                                </a>
                                            </li>
                                        @endforeach

                                    </ul>
                                    <a style="float: right" href="#">
                                        <img min-height="100%" width="400px" src="{{env('APP_URL')}}/site/img/eda4f673-faed-4044-8551-4ab56974944a.jpg">
                                    </a>
</div>
@endif
</li>
</ul>
@endif
</li>
@endforeach
<li class="menunavheader  menu-item bg-info"> <a> HİZMETLER</a> </li>
@foreach($servicecats as $cat)
    @if($cat->parent_id == 0)
        <li class="dropdown menu-item"> <a  @if($cat->has_child == 0 )href="{{route('service_products',$cat->id.'-hizmet-'.Str::slug($cat->name) )}}"@else  class="dropdown-toggle" data-toggle="dropdown"@endif   >
                <svg class="menuSvg"  viewBox="0 0 48 48"> {!!$cat->CategoryIcon!!}</svg> {{$cat->name}}
                @if($cat->has_child == 1 ) <i class="fa fa-angle-right"></i> @endif</a>
            @if($cat->has_child == 1)
                <ul class="dropdown-menu mega-menu">
                    <li class="yamm-content">
                        <div class="row">
                            <ul style="float: left">
                                <li><a href="{{route('service_products',$cat->id.'-hizmet-'.Str::slug($cat->name) )}}">
                                        <h3>{{$cat->name}}</h3>
                                    </a>
                                </li>
                            </ul>
                            @if(count( (new App\Http\Controllers\Helper\HelperController)->servicechidcategory($cat->id)) <=10)
                                <ul class="col-md-6 pl-5">
                                    @foreach($servicecats as $subcat)
                                        @if($cat->id == $subcat->parent_id)
                                            <li><a href="{{route('service_products',[$cat->id.'-hizmet-'.Str::slug($cat->name).'/'.$subcat->id.'-hizmet-'.Str::slug($subcat->name) ])}}">
                                                    {{$subcat->name}}
                                                </a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            @endif
                            @if(count( (new App\Http\Controllers\Helper\HelperController)->servicechidcategory($cat->id)) > 10)
                                @php
                                    $array = (new App\Http\Controllers\Helper\HelperController)->servicechidcategory($cat->id)->toArray() ;
                                    $arraycountrow = ceil(count($array) /10) ;
                                    $start = 0 ;
                                    $row = 10 ;
                                @endphp
                                @for($i= 0 ; $i <=$arraycountrow;$i++)
                                    <ul style="float: left; padding-left: 10px;" >
                                        @php
                                            $looparray = array_slice($array,$start,$row);
                                        @endphp
                                        @foreach($looparray as $cat)
                                            <li><a href="{{route('service_products',[$cat->id .'-hizmet-'.Str::slug($cat->name).'/'.$subcat->id.'-hizmet-'.Str::slug($subcat->name) ])}}">
                                                    {{$cat->name}}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    @php   $start+=10;  $row +=11 ;  @endphp
                                @endfor

                            @endif
                            <a style="float: right" href="#"><img min-height="100%" width="400px" src="{{env('APP_URL')}}/site/img/969fc026-b395-400f-bb3e-2ef883c4a9ab.jpg"></a>
                        </div>
                    </li>
                </ul>
            @endif
        </li>
        @endif
        @endforeach

        </ul>
        </nav>
        </div>
