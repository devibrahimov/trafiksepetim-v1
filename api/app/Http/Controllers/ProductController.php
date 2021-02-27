<?php
/**
 * @author KOALAMEDYA
 * @company EMRE AKINCL A.Ş.
 * @url koalamedya.com
 * @date 30.11.2020
 * @developer Baylar Ibrahimov
 *
 */
namespace App\Http\Controllers;

use App\Model\MarketProduct;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products($catid=null,$subcat=null,$subsecond=null){
        if ($catid != null && $subcat != null && $subsecond != null){
        $data =  MarketProduct::where('status',1)->where('category->category',$catid)
                ->where('category->subcategory',$subcat)->where('category->secondsubcategory',$subsecond)
                ->orderBy('id','desc')
                ->get();
        $jsondata = product_image_change_url($data);

        return response()->json($jsondata,200,['Content-Type'=>'application/json;charset=utf-8','Charset'=>'utf-8'],JSON_UNESCAPED_UNICODE);
        }

        if ($catid != null && $subcat != null && $subsecond == null){
        $data =  MarketProduct::where('status',1)->where('category->category',$catid)
                ->where('category->subcategory',$subcat)
                ->orderBy('id','desc')
                ->get();
               $jsondata = product_image_change_url($data);
        return response()->json($jsondata,200,['Content-Type'=>'application/json;charset=utf-8','Charset'=>'utf-8'],JSON_UNESCAPED_UNICODE);
        }

        if ($catid != null && $subcat == null && $subsecond == null){
                $data =  MarketProduct::where('status',1)->where('category->category',$catid)->orderBy('id','desc')->get();
                $jsondata = product_image_change_url($data);
         return response()->json($jsondata,200,['Content-Type'=>'application/json;charset=utf-8','Charset'=>'utf-8'],JSON_UNESCAPED_UNICODE);
         }

        if ($catid == null && $subcat == null && $subsecond == null){
                $data =  MarketProduct::where('status',1)->orderBy('id','desc')->get();
               $jsondata = product_image_change_url($data);
         return response()->json($jsondata,200,['Content-Type'=>'application/json;charset=utf-8','Charset'=>'utf-8'],JSON_UNESCAPED_UNICODE);
         }
    }//end function products

    }

