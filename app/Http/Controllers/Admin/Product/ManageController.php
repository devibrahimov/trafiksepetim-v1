<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\SubCategories;
use Illuminate\Http\Request;

class ManageController extends Controller
{

    /*
     * ÜRÜN KATEGORİLERİ İŞLERMLERİ
     */
    public function categories(){
        $categories = Category::all();
        return view('adminpanel.pages.product.categories',compact(['categories']));
    }

    public function createnewProductcategory(){
        return view('adminpanel.pages.product.createnewcategory');
    }

    public function newproductcategorystore(Request $request){
        $categoryname = $request->categoryname;

        $data =[
            'name' => $categoryname,
            'has_child' => 0
        ];
        $save = Category::insert($data);

        return redirect()->route('productCategories');
    }


    public function editnewProductcategory($id){
         $category = Category::find($id);
        return view('adminpanel.pages.product.updatecategory',compact(['category']));
    }

    public function productcategoryupdate(Request $request,$id){
        $categoryname = $request->categoryname;

        $category = Category::find($id);
          $category->name = $categoryname ;
        $save =$category->save();
        return redirect()->route('productCategories');
    }



    /*
     * ÜRÜN ALT KATEGORİLERİ İŞLERMLERİ
     */

    public function subcategories($id){
        $categories = SubCategories::where('parent_id',$id)->get();
        return view('adminpanel.pages.product.subcategories',compact(['id','categories']));
    }

    public function createnewProductsubcategory($id){

        return view('adminpanel.pages.product.createnewsubcategory',compact(['id']));
    }


    public function newproductsubcategorystore(Request $request,$id){
        $categoryname = $request->categoryname;
        $parent_id = $request->parent_id;

        $data =[
            'name' => $categoryname,
            'parent_id' => $parent_id,
            'has_child' => 0
        ];
        $save = SubCategories::insert($data);

        $categy = Category::find($parent_id);
        $categy->has_child = 1;
        $categy->save();

        return redirect()->route('productsubcategories',$parent_id);
    }

    public function editnewProductsubcategory($id){
        $category =SubCategories::find($id);
        return view('adminpanel.pages.product.updatesubcategory',compact(['category']));
    }

    public function productsubcategoryupdate(Request $request,$id){
        $categoryname = $request->categoryname;

        $category = SubCategories::find($id);
        $category->name = $categoryname ;
        $save =$category->save();
        return redirect()->route('productsubcategories',$category->parent_id);
    }

}
