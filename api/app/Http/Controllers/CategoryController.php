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

use App\Model\Category;
use App\Model\Subcategory;
use App\Model\SubSecondCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
        public function parentcategory(){
            $category = Category::all();
              return  response()
              ->json(['category'=>$category],
              200,['Content-Type','application/json;charset=UTF-8','Charset'=>'utf-8'],JSON_UNESCAPED_UNICODE);
        }

        public function subcategory(){
            $subcategory = Subcategory::all();

            return response()
                ->json(['subcategory' => $subcategory],
                200,['Content-Type','application/json;charset=UTF-8','Charset'=>'utf-8'],JSON_UNESCAPED_UNICODE);
        }

          public function subsecondcategory(){
                $subsecondcategory = SubSecondCategory::all();
                return response()
                ->json(['subsecondcategory' => $subsecondcategory],
                200,['Content-Type','application/json;charset=UTF-8','Charset'=>'utf-8'],JSON_UNESCAPED_UNICODE)  ;
            }





}
