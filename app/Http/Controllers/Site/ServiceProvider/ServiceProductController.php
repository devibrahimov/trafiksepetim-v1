<?php
/**
 * @author KOALAMEDYA
 * @company EMRE AKINCL A.Ş.
 * @url koalamedya.com
 * @date 15.10.2020
 * @developer Baylar Ibrahimov
 *
 */
namespace App\Http\Controllers\Site\ServiceProvider;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\HelperController as Helper;
use App\Model\ServiceCategory;
use App\Model\ServiceProduct;
use App\Model\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceProductController extends Controller
{


    public function productpost(Request $request){
        $service = new ServiceProduct();

        $id = auth()->guard('service')->user()->id;
        $service->provider_id = $id;

        $category = $request->category;
        $subcategory = $request->subcategory;
        $secondsubcategory = $request->secondsubcategory;
        $price = $request->price;
        $categoryarray = [
            'category'=>$category,
            'subcategory'=>$subcategory,
            'secondsubcategory'=>$secondsubcategory
        ];
        $categoryjson = json_encode($categoryarray);
        $service->category  = $categoryjson;

        $service->name = $request->service_name;
        $service->description =$request->description;
        $service->price =$price;

        $service->show_count = 0;
        $service->ad_type = 0;



        $service->car_company = json_encode($request->car);

        /** formdan coklu gelen  resimleri json veriye donusture bilmek icin kod bloku */
        $images = $request->file('proimg');
        $coverimage = '';
        $imagelist = [];
        foreach($images as $key => $image){

            if ($image->isValid()){
                $helper = new Helper();

                /** birden fazla resimi ayni zamanda aldigi icin zaman isimlendirmede ai isimler
                 * eşleşmeler olduğu için isimin önüne random rakam verildi
                 */
                $newimagename = rand(1,100).time() . '.' . $image->extension();

                /** array icindeki ilk veriyi almak icin  array_key_first kullanildi */
                if ($key === array_key_first($images)){
                    $coverimage = $newimagename;
                }

                array_push($imagelist,$newimagename);
                $service_postsdir = 'service/'.$id.'/posts/';
                $helper->imageupload($image, $newimagename, $service_postsdir);
            }
        }
        $imagenames = json_encode(['cover'=>$coverimage ,'images'=>$imagelist ]) ;

        $service->images = $imagenames;

        $work_time =  [
            'week'=>[
                'week_open'=> $request->week_open,
                'week_close'=>  $request->week_close,
            ],
            'saturday'=>[
                'saturday_open'=> $request->saturday_open,
                'saturday_close'=> $request->saturday_close,
                'saturdaynotwork'=> $request->saturdaynotwork,
            ],
            'sunday'=>[
                'sunday_open'=> $request->sunday_open,
                'sunday_close'=> $request->sunday_close,
                'sundaynotwork'=> $request->sundaynotwork
            ] ];
        $service->work_time = json_encode($work_time);

        $save = $service->save();

        if (!$save){
            $notification = [
                'alert-type' => 'error',
                'message' => 'Hizmet Paylaşımınız eklenirken bir hata oluştu .Lütfen yeniden deneyin.'
            ];
            return back()->withInput()->with($notification);
        }else{
            $notification = [
                'alert-type' => 'success',
                'message' => 'Hizmet Paylaşımınız başarı ile kaydedilmişdir.'
            ];
            return back()->withInput()->with($notification);
        }
       // return $imagenames ;

    }

    public function postupdate(Request $request,$id){
        $userid = auth()->guard('service')->user()->id;
        $service = ServiceProduct::find($id);

        if($userid == $service->provider_id ){
            $service->category_id = $request->category;
            $service->name = $request->service_name;
            $service->meta_desc =$request->service_desc;
            $service->description =$request->description;
            $save = $service->save();

            if (!$save){
                $notification = [
                    'alert-type' => 'error',
                    'message' => 'Bilgileriniz  Güncellenemedi.Lütfen Yeniden Deneyin'
                ];
                return back()->withInput()->with($notification);
            }else{
                $notification = [
                    'alert-type' => 'success',
                    'message' => 'Bilgileriniz başarı ile Güncellenmiştir.'
                ];
                return back()->withInput()->with($notification);
            }

        }else{
            $notification = [
                'alert-type' => 'error',
                'message' => 'Böyle bir Paylaşım Bulunmamaktadır.Lütfen girdiğiniz bilgilerin doğruğunu kontrol edin'
            ];
            return back()->withInput()->with($notification);
        }

    }


    public function postdelete($id){
        $service = ServiceProduct::find($id);
        $service->delete();
        return back();
    }



    public function servicepoststatus(Request $request){
        $postid = $request->postid ;
        $product =  ServiceProduct::find($postid);

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
}
