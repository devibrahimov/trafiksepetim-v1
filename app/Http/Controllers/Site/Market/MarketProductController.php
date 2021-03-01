<?php
/**
 * @author KOALAMEDYA
 * @company EMRE AKINCL A.Ş.
 * @url koalamedya.com
 * @date 15.10.2020
 * @developer Baylar Ibrahimov
 *
 */
namespace App\Http\Controllers\Site\Market;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\HelperController as Helper;
use App\Model\CarModel;
use App\Model\MarketProduct;
use App\Model\SubCategories;
use App\Model\SubSecondCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use function Composer\Autoload\includeFile;

class MarketProductController extends Controller
{
    public function productstore(Request $request){

        $id = auth()->guard('market')->user()->id;

        $category = $request->category;
        $subcategory = $request->subcategory;
        $secondsubcategory = $request->secondsubcategory;

        $categoryarray = [
            'category'=>$category,
            'subcategory'=>$subcategory,
            'secondsubcategory'=>$secondsubcategory
        ];
        $categoryjson = json_encode($categoryarray);

        $productname = $request->product_name ;
        $product_desc = $request->meta_desc ;
        $price     =  floatval(str_replace(',', '.',$request->price));
        $saleprice = floatval(str_replace(',', '.',$request->sale_price));
        $car_company        =$request->car;
        $car_model  =$request->carmodel;
        $product_stok = $request->stock;
        $description = $request->description;
        $warranty = $request->warranty;
        $teknik_key  = $request->teknik_key; //array
        $teknik_value  = $request->teknik_value; //array
        $kampanya  = $request->kampanya == 'evet'? 1 :0;
        $kampanyacontent  = $request->kampanyacontent;

        $images = $request->file('proimg');

        $coverimage = '';
        $imagelist = [];
        $imagepath ="malls/$id/productimages";

        if (count($images)==5){
             $notification = [
                'alert-type' => 'error',
                'message' => '4 den Fazla Resim yukleyemezsiniz.Lütfen yeniden Seçin Resimleri.'
            ];
            return back()->withInput()->with($notification);
        }

        foreach($images as $key => $image){

            if ($image->isValid()){
                $helper = new Helper();

                /** birden fazla resimi ayni zamanda aldigi icin zaman isimlendirmede ai isimler
                 * eşleşmeler olduğu için isimin önüne random rakam verildi
                 */
                $newimagename = rand(1,100).time() . '.' . $image->getClientOriginalExtension();

                /** array icindeki ilk veriyi almak icin  array_key_first kullanildi */
                if ($key === array_key_first($images)){
                    $coverimage = $newimagename;
                }
                array_push($imagelist,$newimagename);

                $helper->imageupload($image, $newimagename, $imagepath);
            }

        }
        $imagenames = json_encode(['cover'=>$coverimage ,'images'=>$imagelist ]) ;

        $tecnique = array();

        for ($i=0;$i<count($teknik_key);$i++){
              if (!empty($teknik_key[$i]) &&  !empty($teknik_value[$i])){
                $tecnique[$teknik_key[$i]] = $teknik_value[$i];
                }
        }
        $tecniquejson = json_encode($tecnique);

        //echo $tecniquejson ;die;

        $product = new  MarketProduct();

        $product->market_id = $id ;
        $product->category = $categoryjson;
        $product->name = $productname;
        $product->price= $price;
        $product->sale_price= $saleprice==NULL?$price :$saleprice;
        $product->stock = $product_stok;
        $product->oem_code = strtoupper(Str::slug($request->oem_code));
        $product->product_code = strtoupper($request->product_code);
        $product->images = $imagenames;
        $product->tecnique =$tecniquejson;
        $product->meta_desc=$product_desc;
        $product->description = $description;
        $product->show_count = 0;
        $product->ad_type = 0;
        $product->status = 0;
        $product->car_company = $car_company;
        $product->kampanya = $kampanya;
        $product->kampanya_content = $kampanyacontent;
        $product->car_model = $car_model;
        $product->warranty = $warranty;

        $saveproduct = $product->save();
        if(!$saveproduct){
            $notification = [
                'alert-type' => 'error',
                'message' => 'Ürün Eklemesi başarısız.'
            ];
            return back()->withInput()->with($notification);
        }else{
            $notification = [
                'alert-type' => 'success',
                'message' => 'Ürün başarı ile eklendi.'
            ];
            return back()->withInput()->with($notification);
        }
    }

    public function productupdate(Request $request ,$productid){


        $id = auth()->guard('market')->user()->id;
        $product = MarketProduct::find($productid);

        $category = $request->category;
        $subcategory = $request->subcategory;
        $secondsubcategory = $request->secondsubcategory;
        $categoryarray = [
            'category'=>$category,
            'subcategory'=>$subcategory,
            'secondsubcategory'=>$secondsubcategory
        ];
        $categoryjson = json_encode($categoryarray);

        $productname = $request->product_name ;
        $product_desc = $request->meta_desc ;
        $price     =  floatval(str_replace(',', '.',$request->price));
        $saleprice = floatval(str_replace(',', '.',$request->sale_price));
        $car_company        =$request->car;
        $car_model  =$request->carmodel;
        $product_stok = $request->stock;
        $description = $request->description;
        $warranty = $request->warranty;
        $teknik_key  = $request->teknik_key; //array
        $teknik_value  = $request->teknik_value; //array
            $kampanya  = $request->kampanya == 'evet'? 1 :0;
        $kampanyacontent  = $request->kampanyacontent;
        $tecnique = array();
        for ($i=0;$i<count($teknik_key);$i++){
            if (!empty($teknik_key[$i]) &&  !empty($teknik_value[$i])){
                $tecnique[$teknik_key[$i]] = $teknik_value[$i];
            }
        }
        $tecniquejson = json_encode($tecnique);

        $product->market_id = $id ;
        $product->category = $categoryjson;
        $product->name = $productname;
        $product->price= $price;
        $product->kampanya = $kampanya;
        $product->kampanya_content = $kampanyacontent;
        $product->sale_price= $saleprice;
        $product->stock = $product_stok;
        $product->oem_code = strtoupper(Str::slug($request->oem_code));
        $product->product_code = strtoupper($request->product_code);
        $product->tecnique =$tecniquejson;
        $product->meta_desc=$product_desc;
        $product->description = $description;

        $product->ad_type = 0;

        $product->car_company = $car_company;
        $product->car_model = $car_model;
        $product->warranty = $warranty;



     if($request->file('proimg')){
        $images = $request->file('proimg');

        $coverimage = '';
        $imagelist = [];
        $imagepath ="malls/$id/productimages";
        if (count($images)==5){
            $notification = [
                'alert-type' => 'error',
                'message' => '4 den Fazla Resim yukleyemezsiniz.Lütfen yeniden Seçin Resimleri.'
            ];
            return back()->withInput()->with($notification);
        }
        foreach($images as $key => $image){

            if ($image->isValid()){
                $helper = new Helper();

                /** birden fazla resimi ayni zamanda aldigi icin zaman isimlendirmede ai isimler
                 * eşleşmeler olduğu için isimin önüne random rakam verildi
                 */
                $newimagename = rand(1,100).time() . '.' . $image->getClientOriginalExtension();

                /** array icindeki ilk veriyi almak icin  array_key_first kullanildi */
                if ($key === array_key_first($images)){
                    $coverimage = $newimagename;
                }
                array_push($imagelist,$newimagename);

                $helper->imageupload($image, $newimagename, $imagepath);
            }

        }

        $imagenames = json_encode(['cover'=>$coverimage ,'images'=>$imagelist ]) ;
        $product->images = $imagenames;

    }




        $saveproduct = $product->save();
        if(!$saveproduct){
            $notification = [
                'alert-type' => 'error',
                'message' => 'Ürün Eklamasi başarısız.'
            ];
            return back()->withInput()->with($notification);
        }else{
            $notification = [
                'alert-type' => 'success',
                'message' => 'Ürün başarı ile eklendi.'
            ];
            return back()->withInput()->with($notification);
        }

    }//end product update

    public function productdelete($id){
        $userid =  auth()->guard('market')->user()->id;;
            $product = MarketProduct::where('market_id',$userid)->where('id',$id)->first();
           // print_r($product);die;
            $deleteproduct = $product->delete();
             if(!$deleteproduct){
            $notification = [
                'alert-type' => 'error',
                'message' => 'Ürün Silinemedi.'
            ];
            return back()->withInput()->with($notification);
        }else{
            $notification = [
                'alert-type' => 'success',
                'message' => 'Ürün başarı ile silindi.'
            ];
            return back()->withInput()->with($notification);
        }
        }

    /** AJAX REQUESTS */

    public function car_models(Request $request){

        if( $request->carmodelid != NULL){
            $carmodelid= $request->carmodelid;
            $dbdata =CarModel::where('car_id','=',$request->carid)->get();

            $models = '';
            $selected = '';
            foreach ($dbdata as $key => $model) {
                if ($model->id == $carmodelid){
                    $selected = 'selected ';
                }
                $models .= '<option  ' . $selected . '  value="' . $model->id . '">' . $model->name. '</option>';
                $selected = '';
            }
            return $models;

        }else{
            $dbdata =CarModel::where('car_id','=',$request->carid)->get();

            $models = '';
            foreach ($dbdata as $key => $model) {
                $models .= '<option   value="' . $model->id . '">' . $model->name . '</option>';
            }
            return $models;
        }




    }

    public function productcoverimage(Request $request){
         $id = $request->id;
         $product = MarketProduct::find($id);

         $imagename = $request->imagename ;
         $jsonimages = json_decode($product->images)->images;

         $product->images =['cover'=>$imagename,'images'=>$jsonimages] ;
         $product->save();

        return $imagename ;

    }

    public function imagedownloadupdateform(Request $request){
        $images = $request->file('pro_image');
        $coverimage = '';
        $imagelist = [];

        foreach($images as $key => $image){
            if ($image->isValid()){
                $helper = new Helper();

                /** birden fazla resimi ayni zamanda aldigi icin zaman isimlendirmede ai isimler
                 * eşleşmeler olduğu için isimin önüne random rakam verildi
                 */
                $newimagename = rand(1,100).time() . '.' . $image->getClientOriginalExtension();

                /** array icindeki ilk veriyi almak icin  array_key_first kullanildi */
                if ($key === array_key_first($images)){
                    $coverimage = $newimagename;
                }
                array_push($imagelist,$newimagename);
                $helper->imageupload($image, $newimagename, 'productimages');
            }
        }

        $imagenames = json_encode(['cover'=>$coverimage ,'images'=>$imagelist ]) ;

        $product = MarketProduct::find($request->productid);
        $product->images = $imagenames;
        $product->save();

        return back();

    }


    public function productstatus(Request $request){
        $productid = $request->productid ;
      $product =  MarketProduct::find($productid);

        if ($request->status == 0){

            $product->status = 0;
            $product->save();
        }
        elseif($request->status == 1){
            $product->status = 1;
            $product->save();
        }else{
        echo 'adam ol';
        }
    }

    public function getsubcategorycontent(Request $request){

       $pid = $request->pid;
       $filtersubcategory = $request->filtersubcategory;
       $subcategories = SubCategories::where('parent_id',$pid)->get();
       $html = '<div class="widget-header">
                    <h4 class="widget-title ">Kategori</h4>
                </div>
              <select data-live-search="true" data-style="btn-inverse" name="filtersubcategory" id="filtersubcategory" data-live-search-style="startsWith" class="selectpicker">
              <option selected disabled value="'.null.'">Kategoriyi Seçin</option>';

       foreach ($subcategories as $sbcat){

           $html.= '<option  '.isset($filterquery['filtercategory']) ? $filterquery['$filtersubcategory'] == $sbcat->id? "selected": "" :"" .'  value="'.$sbcat->id.'">'. $sbcat->name.'</option>';
       }
        $html.= '</select>';

       return $html ;
    }

}
