<?php
/**
 * @author KOALAMEDYA
 * @company EMRE AKINCL A.Ş.
 * @url koalamedya.com
 * @date 30.11.2020
 * @developer Baylar Ibrahimov
 *
 */
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//

Route::group(['middleware' => 'market'],function(){
    Route::get('/market', function (Request $request) { return $request->user(); });
});
Route::middleware('api-token')->group( function (){


    Route::get('categories','CategoryController@parentcategory');
    Route::get('subcategories','CategoryController@subcategory');
    Route::get('subsecondcategories','CategoryController@subsecondcategory');
    Route::get('products/{catid?}/{subcat?}/{subsecond?}','ProductController@products');

    //Route::post('denemepost' , 'RegisterController@signupmarket');
    Route::post('magaza-kayit/','RegisterController@store');
    Route::post('magaza-giris/','RegisterController@store');
    Route::post('kullanici-kayit/','RegisterController@userstore');


});//end root middleware api-token
