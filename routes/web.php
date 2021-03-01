<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => 'throttle:30,1'], function () {
    Route::get('/','Site\SiteController@index')->name('home');
    Route::get('/save','TestController@index')->name('asdsad');
    Route::get('/carjson','TestController@test')->name('asdsadasd');
    Route::get('/urunler','Site\SiteController@products')->name('products');
    Route::get('/trend-urunler','Site\SiteController@trendproducts')->name('trendproducts');
    Route::get('/kampanyali-urunler','Site\SiteController@kampanyaproducts')->name('kampanyaproducts');
    Route::get('/indirimli-urunler','Site\SiteController@saleproducts')->name('saleproductsguest');
    Route::get('/urun/{slug}','Site\SiteController@product_detail')->name('product_detail');
    Route::get('/kategori',function (){ return redirect()->route('products'); });
    Route::get('/kategori/{slug}','Site\SiteController@category_products')->where('slug', '.*')->name('category_products');
     Route::get('/magazalar','Site\SiteController@malls')->name('malls');
    Route::get('/arama','Site\SiteController@searchresult')->name('searchresult');
    Route::post('/arama','Site\SiteController@result')->name('result');
    Route::get('/hizmetler','Site\SiteController@services')->name('services');
    Route::get('/hizmet/{slug}','Site\SiteController@service_detail')->name('service_detail');
    Route::get('/hizmetler/{slug}','Site\SiteController@service_products')->where('slug', '.*')->name('service_products');
    Route::get('/filtereleme-sonuclari/','Site\SiteController@filterResultpage')->name('filterResultpage');

    /*****************KAYIT OL SAYFALARI****************/

    /** AJAX REQUESTS */
    Route::post('/scroll-catservices','Site\SiteController@scrollcatservices')->name('scrollcatservices');
    Route::get('/scroll-products',function (){  return redirect()->route('products');}) ;
    Route::post('/scroll-products','Site\SiteController@scrollloadproducts')->name('scrollloadproducts');
    Route::post('/indirimli-products','Site\SiteController@scrollloadsaleproducts')->name('scrollloadsaleproducts');
    Route::post('/trend-urunler','Site\SiteController@scrollloadtrendproducts')->name('scrollloadtrendproducts');
    Route::post('/kampanyali-urunler','Site\SiteController@scrollloadkampanyaproducts')->name('scrollloadkampanyaproducts');
    Route::post('/scroll-category-products','Site\SiteController@scrollcategoryproducts')->name('scrollcategoryproducts');
    Route::post('/filter-urun-sonuclari','Site\SiteController@getFilterProductsResult')->name('getFilterProductsResult');

    /** Market Register */
    Route::get('/market-kayit-formu','Site\MarketRegisterController@index')->name('marketregister');
    Route::post('/vergidaireleri','Site\MarketRegisterController@vergidaireleriajax')->name('vergidaireleri');
    Route::post('/ilceler','Site\MarketRegisterController@getajaxdistrict')->name('get.districts');
    Route::post('/marketkayitformu','Site\MarketRegisterController@store')->name('market_registerformpost');
    Route::get('/marketgiris','Site\LoginController@marketloginform')->name('marketlogin');
    Route::post('/marketgiris','Site\LoginController@marketloginpost') ;

    /** User Register */
    Route::get('/uye-kayit-formu','Site\UserController@create')->name('userregister');
    Route::post('/uye-kayit-formu','Site\UserController@store')->name('userregister.store');
    Route::get('/giris','Site\LoginController@userloginform')->name('userlogin');
    Route::post('/uye-giris','Site\LoginController@userloginpost')->name('userloginpost') ;
    Route::post('/uye-cikis','Site\LoginController@userlogout')->name('user.logout');

    Route::get('/login/facebook', 'Site\LoginController@redirectToProvider');
    Route::get('/login/facebook/callback', 'Site\LoginController@handleProviderCallback');

    /** Service Provider Register */
    Route::get('/hizmetveren-kayit-formu','Site\ServiceProvider\ServiceRegisterController@index')->name('serviceregister');
    Route::post('/hizmetveren-kayit-formu','Site\ServiceProvider\ServiceRegisterController@store')->name('service_register_formpost');
    Route::get('/hizmetgiris','Site\LoginController@serviceloginform')->name('servicelogin');
    Route::post('/hizmetgiris','Site\LoginController@serviceloginpost');

    /***************** ( END ) KAYIT OL SAYFALARI****************/

    Route::post('/getsubcategorycontent', 'Site\Market\MarketProductController@getsubcategorycontent')->name('getsubcategorycontent');

    Route::group(['middleware' => 'market'],function(){
        Route::post('/marketcikis','Site\LoginController@marketlogout')->name('market.logout');
        Route::get('/magazam', 'Site\Market\MarketPagesController@myshop')->name('myshop');

        Route::get('/urun-yonetimi', 'Site\Market\MarketPagesController@profilproducts')->name('market.profilproducts');
        Route::get('/kritik-sayda-olan-urunler', 'Site\Market\MarketPagesController@stockdescendingproducts')->name('stockdescendingproducts');
        Route::get('/yayinda-olmayan-urunler', 'Site\Market\MarketPagesController@offstatusproducts')->name('offstatusproducts');
        Route::get('/indirimde-olan-urunler-listesi', 'Site\Market\MarketPagesController@saleproducts')->name('saleproducts');
        Route::get('/magaza-urun-list', 'Site\Market\MarketPagesController@profilproductslist')->name('market.profilproductslist');
        Route::get('/magaza-profil-bilgilerim', 'Site\Market\MarketPagesController@profil')->name('market.profil');
        Route::get('/sifre-deyistir', 'Site\Market\MarketPagesController@changepassword')->name('market.changepassword');
        Route::post('/changepasswd','Site\Market\MarketProcessController@updatemarketpassword')->name('changepasswd');
        Route::post('/market-bilgileri-guncelle','Site\Market\MarketProcessController@market_formupdate')->name('market_formupdate');
        Route::post('/market-profilresim-guncelle','Site\Market\MarketProcessController@market_profil_image')->name('market_profil_image');
        Route::post('/market-coverresim-guncelle','Site\Market\MarketProcessController@market_cover_image')->name('market_cover_image');
       /** PRODUCTS */
        Route::get('/urun-ekle', 'Site\Market\MarketPagesController@productcreate')->name('market-create-product');
        Route::post('/urun-ekle', 'Site\Market\MarketProductController@productstore')->name('market-create-product');
        Route::get('/urun-duzenle/{id}', 'Site\Market\MarketPagesController@productedit')->name('market-edit-product');
        Route::post('/urun-duzenle/{id}', 'Site\Market\MarketProductController@productupdate') ;
        Route::delete('/urun-sil/{id}', 'Site\Market\MarketProductController@productdelete')->name('market-delete-product');
        /** AJAX REQUESTS */
        Route::post('/araba-modelleri', 'Site\Market\MarketProductController@car_models')->name('car_models');
        Route::post('/araba-firmalari', 'Site\Market\MarketProductController@car_companies')->name('car_companies');
        Route::post('/kapak-resmi-yap', 'Site\Market\MarketProductController@productcoverimage')->name('productcoverimage');
        Route::post('/imagedownloadupdateform', 'Site\Market\MarketProductController@imagedownloadupdateform')->name('imagedownloadupdateform');
        Route::post('/urunu-yayinla', 'Site\Market\MarketProductController@productstatus')->name('productstatus');

        Route::post('/getsubcategory', 'Site\Market\MarketProductController@getsubcategory')->name('getsubcategory');
        Route::post('/getsecondsubcategory', 'Site\Market\MarketProductController@getsecondsubcategory')->name('getsecondsubcategory');
    });

    Route::group(['middleware'=>'service'],function(){
        Route::post('/hizmetcikis','Site\LoginController@servicelogout')->name('servicelogout');
        Route::get('/hizmet-ekle',  'Site\ServiceProvider\ServicePagesController@productcreate')->name('service-create-product');
        Route::post('/hizmet-ekle', 'Site\ServiceProvider\ServiceProductController@productpost')->name('service-post-product');
        Route::get('/profil-paylasimlarim','Site\ServiceProvider\ServicePagesController@posts')->name('service-posts');
        Route::get('/hizmet-duzenle/{id}',  'Site\ServiceProvider\ServicePagesController@postedit')->name('service-edit-product');
        Route::post('/hizmet-duzenle/{id}',  'Site\ServiceProvider\ServiceProductController@postupdate') ;


        Route::get('/profilim','Site\ServiceProvider\ServicePagesController@myprofil')->name('service-profil');
        Route::post('/profilim',  'Site\ServiceProvider\ServiceRegisterController@serviceregisterupdate')->name('service_register_update');
        Route::get('/sifremi-degistir', function (){  return redirect()->route('home');})->name('updateprofilpassword');
        Route::post('/sifremi-degistir','Site\ServiceProvider\ServiceRegisterController@updateprofilpassword')->name('updateprofilpassword');

        /** AJAX REQUESTS */
        Route::post('/hizmet-kapak-resmi-yap', 'Site\ServiceProvider\ServiceRegisterController@servicecoverimage')->name('service_cover_image');
        Route::post('/hizmet-profil-resmi-yap', 'Site\ServiceProvider\ServiceRegisterController@serviceprofilimage')->name('service_profil_image');
        Route::delete('/hizmet-sil/{id}', 'Site\ServiceProvider\ServiceProductController@postdelete')->name('service-delete-post');
        Route::post('/hizmet-durumu', 'Site\ServiceProvider\ServiceProductController@servicepoststatus')->name('servicepoststatus');
    });

    Route::group(['middleware'=>'auth'] , function(){
        Route::post('/sepete-ekle','Site\BasketController@addtocart')->name('addtocart');
        Route::post('/sepetten-cikart','Site\BasketController@removefromcart')->name('removefromcart');
        Route::get('/sepetim','Site\BasketController@getcart')->name('cart');
        Route::get('/sepet','Site\SiteController@cart')->name('basket');
        Route::get('/beyendiklerim','Site\SiteController@mywishlist')->name('mywishlist');
        Route::post('/beyendiklerimi-sepete-ekle','Site\BasketController@wishlisttocart')->name('wishlisttocart');

        /** AJAX REQUESTS */
        Route::post('yorum-ekle','Site\UserController@ajaxpostcomment')->name('ajaxpostcomment');
        Route::post('hizmetler-yorum-ekle','Site\UserController@servicepostcomment')->name('servicepostcomment');
        Route::post('beyenilen-urunlere-ekle','Site\UserController@ajaxpostwishlist')->name('ajaxpostwishlist');
        Route::post('/beyendiklerimden-cikar','Site\UserController@productremovefromwishlist')->name('productremovefromwishlist');
        Route::post('/beyendiklerimi-toplu-sil','Site\UserController@wishlistdestroy')->name('wishlistdestroy');
    });



//    SITE KURUMSAL LINKLER

    Route::view('/hakkimizda','site.pages.corporate.about')->name('about');
    Route::view('/sss','site.pages.corporate.sss')->name('sss');
    Route::view('/iletisim','site.pages.corporate.contact')->name('contact');

    Route::get('cacheclear',function(){
       \Illuminate\Support\Facades\Artisan::call('cache:clear');
    });

    Route::get('configcache',function(){
        \Illuminate\Support\Facades\Artisan::call('config:cache');
    });

    Route::get('configclear',function(){
        \Illuminate\Support\Facades\Artisan::call('config:clear');
    });

    Route::get('routelink',function(){
        \Illuminate\Support\Facades\Artisan::call('route:clear');
    });
    //Route::get('storagelink',function(){
    //    \Illuminate\Support\Facades\Artisan::call('storage:link');
    //});




    Route::group(['prefix'=>'adminpanel'],function (){

        Route::get('/', function (){return redirect()->route('administratorlogin');} ) ;
        Route::get('/admin-giris','Admin\AdminController@login')->name('administratorlogin');
        Route::post('/admin-giris','Admin\AdminController@administratorlogin');
        Route::group(['middleware'=>'administrator'],function (){
            Route::get('/anasayfa','Admin\AdminController@home')->name('adminhome');
            Route::get('/admin-sayfasi','Admin\AdminController@adminpage')->name('adminpage');
            Route::post('/admin-kaydet','Admin\AdminController@adminstore')->name('adminstore');
            Route::get('/onay-beklegen-magazalar','Admin\Market\ManageController@approvalnewregisters')->name('approvalnewregisters');
            Route::get('/yeni-kayitli-magazalar','Admin\Market\ManageController@newregisters')->name('newregisters');
            Route::get('/yeni-magaza-ac','Admin\Market\ManageController@createnewregister')->name('createnewregister');
            Route::get('/onaylanmis-magazalar','Admin\Market\ManageController@approvednewregisters')->name('approvednewregisters');
            Route::get('/bloke-edilmish-magazalar','Admin\Market\ManageController@blockedstores')->name('blockedstores');

            Route::get('/urun-kategorisi-ekle','Admin\Product\ManageController@createnewProductcategory')->name('createnewProductcategory');
            Route::post('/urun-kategorisi-ekle','Admin\Product\ManageController@newproductcategorystore') ;
            Route::get('/urun-kategorisi-duzenle/{id}','Admin\Product\ManageController@editnewProductcategory')->name('updateProductcategory');
            Route::put('/urun-kategorisi-duzenle/{id}','Admin\Product\ManageController@productcategoryupdate') ;
            Route::get('/urun-kategorileri','Admin\Product\ManageController@categories')->name('productCategories');

            Route::get('/urun-altkategorileri/{id}','Admin\Product\ManageController@subcategories')->name('productsubcategories');
            Route::get('/urun-altkategorisi-ekle/{id}','Admin\Product\ManageController@createnewProductsubcategory')->name('createnewProductsubcategory');
            Route::post('/urun-altkategorisi-ekle/{id}','Admin\Product\ManageController@newproductsubcategorystore') ;
            Route::get('/urun-altkategorisi-duzenle/{id}','Admin\Product\ManageController@editnewProductsubcategory')->name('updateProductsubcategory');
            Route::put('/urun-altkategorisi-duzenle/{id}','Admin\Product\ManageController@productsubcategoryupdate') ;

            Route::get('/magaza-bilgileri/{id}','Admin\Market\ManageController@storeShow')->name('storeShow');
        });
    });

});
