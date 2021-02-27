<?php

namespace App\Http\Controllers\Helper;

use App\Http\Controllers\Controller;
use App\Model\Basket;
use App\Model\BasketProducts;
use App\Model\SubCategories;
use App\Model\SubSecondCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class HelperController extends Controller
{       // library
    //https://artisansweb.net/create-thumbnail-in-laravel-using-intervention-image-library/
    //
    public function makedirectory($dirpath){

      $direcoties =  explode('/',$dirpath);

        $path = '';
        if (!file_exists(public_path($dirpath))) {
           foreach ($direcoties as $dir){
               if (!file_exists(public_path($path.'/'.$dir))) {
                   mkdir( public_path($path.'/'.$dir), 0777, true);
               }
                $path.='/'.$dir;
            }
        }
    //echo $path ;

    }

    public function imageupload($image,$newimagename,$basedirectory){

        $filenamewithextension =   $image->getClientOriginalName();

        //get filename without extension
        $filename = pathinfo($filenamewithextension,PATHINFO_FILENAME);

        //get file extension
        $extension =   $image->getClientOriginalExtension();

        //Upload File
        // $image->storeAs('/public/uploads/'.$basedirectory.'/',$newimagename);
        //$this->createThumbnail($image,'products', 1000, 1000);
        $smallpath =  '/storage/uploads/thumbnail/'.$basedirectory.'/small/'  ;
        $mediumpath=  '/storage/uploads/thumbnail/'.$basedirectory.'/medium/'  ;
        $largepath =  '/storage/uploads/thumbnail/'.$basedirectory.'/large/'  ;

        $this->makedirectory($smallpath);
        $this->makedirectory($mediumpath);
        $this->makedirectory($largepath);
//
//        $image->storeAs($smallpath,$newimagename);
//        $image->storeAs($mediumpath,$newimagename);
//        $image->storeAs($largepath,$newimagename);

        //create small thumbnail
        $smallthumbnailpath = public_path('/storage/uploads/thumbnail/'.$basedirectory.'/small/'.$newimagename);

        $this->createThumbnail($image,$smallthumbnailpath, 260, 280);

        //create medium thumbnail
        $mediumthumbnailpath = public_path('/storage/uploads/thumbnail/'.$basedirectory.'/medium/'.$newimagename);
        $this->createThumbnail($image,$mediumthumbnailpath, 540, 540);

        //create large thumbnail
        $largethumbnailpath = public_path('/storage/uploads/thumbnail/'.$basedirectory.'/large/'.$newimagename);
        $this->createThumbnail($image,$largethumbnailpath, 800, 800);

    }

    public function createThumbnail($image,$path, $width, $height)
    {
        //var_dump($image->getRealPath());die;
        ini_set('memory_limit', '256M');
        $img = Image::make($image->getRealPath())->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->insert('site/img/saydan-logo.png', 'bottom-right');
        $img->save($path);
    }

    // bu yuxardaki iki f

    public function deleteimages($image, $directory)
    {

        $deleted = \File::delete(public_path('/storage/uploads/' . $directory . '/' . $image));
        $deleted = \File::delete(public_path('/storage/uploads/thumbnail/' . $directory . '/small/' . $image));
        $deleted = \File::delete(public_path('/storage/uploads/thumbnail/' . $directory . '/medium/' . $image));
        $deleted = \File::delete(public_path('/storage/uploads/thumbnail/' . $directory . '/large/' . $image));

        if ($deleted) {
            return true;
        }


    }


    public function subcategory($id)
    {
        $categories = SubCategories::where('parent_id', $id)->get();
        return $categories;
    } // end subcategory

    public function secondsubcategory($id)
    {
        $categories = SubSecondCategories::where('parent_id', $id)->get();
        return $categories;
    } // end secondsubcategory


    public function baskettotalprice($userid)
    {
        $basket = Basket::where('user_id', $userid)->first();
        if (!$basket) {
            return 0;
        } else {
            $basketproducts = BasketProducts::where('basket_id', $basket->id)->get();

            $totalprice = 0;

            foreach ($basketproducts as $basketproduct) {
                $totalprice += $basketproduct->price * $basketproduct->quantity;
            }

            return $totalprice;
        }


    }// end baskettotalprice

    public function basketproductcount($userid)
    {
        $basket = Basket::where('user_id', $userid)->first();
        if (!$basket) {
            return 0;
        } else {
            $basketproducts = BasketProducts::where('basket_id', $basket->id)->get();
            return $basketproducts->count();
        }


    }// end basketproductcount

    public function servicechidcategory($id){
        return DB::table('service_categories')->where('parent_id',$id)->get();
    }

    public function getbasketproducts()
    {
        $userid = auth()->user()->id;
        $basket = Basket::where('user_id', $userid)->first();
        if (isset($basket)) {

            $data = BasketProducts::where('basket_id', $basket->id)->get();
            if (isset($data)) {
                return $data;
            }else{
                return [];
            }
        }


    }


    public function findilvergidairesi($saymanlikKodu){
    return DB::table('vergidaireleri')->where('saymanlikKodu',$saymanlikKodu)->first();
    }


    public function findil($id){
    return DB::table('province')->find($id);
    }
    public function findilce($id){
    return DB::table('districts')->find($id);
    }
}//end class


