<?php
/**
 * @author KOALAMEDYA
 * @company EMRE AKINCL A.Ş.
 * @url koalamedya.com
 * @date 15.10.2020
 * @developer Baylar Ibrahimov
 *
 */
namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Model\ProductRate;
use App\Model\ServiceComment;
use App\Model\ServiceRate;
use App\User;
use App\Model\ProductComment;
use App\Model\ProductWishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('site.pages.user.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRegisterRequest $request)
    {
        $name = $request->name;
        $lastname = $request->lastname;
        $email = $request->email;
        $number = $request->number;
        $password = $request->password;
        $gender = $request->gender;
        $birthdate = $request->birthdate;

        $user = new User();


        $user->name =$name ;
        $user->surname =$lastname;
        $user->email = $email;
        $user->number = $number;
        $user->password = Hash::make($password);
        $user->gender = $gender;
        $user->borndate =$birthdate ;

       $save = $user->save();
       if(!$save){
            $notification = [
            'alert-type' => 'error',
            'message' => 'Kayıt işlemi zamanı .İşlem hatası oldu Lütfen tekrar deneyin'
        ];
        return redirect()->route('userregister')->withInput()->with($notification);

       }else{
            $notification = [
            'alert-type' => 'success',
            'message' => 'Kaydınız Başarılı bir şekilde tamamlandı.Lütfen Giriş yapın'
        ];
        return redirect()->route('userlogin')->withInput()->with($notification);

       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }



    /** AJAX REQUESTS */


    public function ajaxpostcomment(Request $request){

      $validate =  $request->validate([
            'comment'=>'required|string|max:750',
            'rate'=>'required|numeric|digits_between:1,5'
        ],[
          'comment.required'=>'Yorum alanını boş bırakamazsınız',
          'comment.string'=>'Yorum alanına sadece yazı yaza bilirsiniz',
          'comment.max'=>'Yorum alanına 750 karakterden fazla karakter giremesiniz',
        ]);

        if ($validate){

        $comment = ProductComment::updateOrCreate([
            'product_id' => $request->productid ,
            'user_id' =>  auth()->user()->id
        ],[
            'comment'  =>$request->comment ,
            'product_id' => $request->productid ,
            'user_id' =>  auth()->user()->id,
            'rate' => $request->rate
            ]);

            $comments = DB::table('product_comments')->where('product_id',$request->productid)
                ->sum('rate');
            $commentcount = DB::table('product_comments')->where('product_id',$request->productid)
                ->count();
           $productrate =  $comments / $commentcount ;
            ProductRate::updateOrCreate([
                'product_id'=> $request->productid
            ],[ 'product_id'=> $request->productid,
                  'rate'=>$productrate,
                  'star'=>round($productrate),
                  'number_of_comment'=>$commentcount ,

            ]);

        if($comment){
            $notification = [
                'alert-type' => 'success',
                'message' => 'Yorum başarı ile kaydedildi',
                'rate' => $comment->rate ,
                'comment'=> ['comment'=> $comment->comment,
                             'date'=> date('d.M.Y',strtotime($comment->created_at))]
            ];
            return  $notification ;
        }else{
            $notification = [
                'alert-type' => 'error',
                'message' => 'Yorum kaydedilirken bir hata ile karşılaşıldı.'
            ];
            return  $notification ;
        }

        }
    }



    public function servicepostcomment(Request $request){

      $validate =  $request->validate([
            'comment'=>'required|string|max:750',
            'rate'=>'required|numeric|digits_between:1,5'
        ],[
            'comment.required'=>'Yorum alanını boş bırakamazsınız',
            'comment.string'=>'Yorum alanına sadece yazı yaza bilirsiniz',
            'comment.max'=>'Yorum alanına 750 karakterden fazla karakter giremesiniz',
        ]);

        if ($validate){

        $comment = ServiceComment::updateOrCreate([
            'service_id' => $request->serviceid ,
            'user_id' =>  auth()->user()->id
        ],[
            'comment'  =>$request->comment ,
            'service_id' => $request->serviceid ,
            'user_id' =>  auth()->user()->id,
            'rate' => $request->rate
            ]);
            $commentrates = DB::table('service_comments')->where('service_id',$request->serviceid)
                ->sum('rate');
            $commentcount = DB::table('service_comments')->where('service_id',$request->serviceid)
                ->count();
           $servicerate =  $commentrates / $commentcount ;

            ServiceRate::updateOrCreate([
                'service_id'=> $request->serviceid
                ],
                [ 'service_id'=> $request->serviceid,
                  'rate'=>$servicerate]);

        if($comment){
            $notification = [
                'alert-type' => 'success',
                'message' => 'Yorum başarı ile kaydedildi',
                'rate' => $comment->rate ,
                'comment'=> ['comment'=> $comment->comment,
                             'date'=> date('d.M.Y',strtotime($comment->created_at))]
            ];
            return  $notification ;
        }else{
            $notification = [
                'alert-type' => 'error',
                'message' => 'Yorum kaydedilirken bir hata ile karşılaşıldı.'
            ];
            return  $notification ;
        }

        }
    }

    public function ajaxpostwishlist(Request $request){
        $productid = $request->productid;
        $userid =  auth()->user()->id ;
        $hasproduct = ProductWishlist::where('product_id',$productid)->where('user_id',$userid)->first();

        if ($hasproduct){
            $notification = [
                'alerttype' => 'info',
                'message' => 'Bu ürün daha önce beyendiklerinize kaydedildi'
            ];
            return  $notification ;
        }else{
            $wishlist = new ProductWishlist();
            $wishlist->product_id = $productid ;
            $wishlist->user_id = $userid ;
            $save =$wishlist->save();
            if($save){
                $notification = [
                    'alerttype' => 'success',
                    'message' => 'Ürün başarı ile beyendiklerinize kaydedildi'
                ];
                return  $notification ;
            }
        }

    }//end function ajaxpostwishlist

    public function productremovefromwishlist(Request $request){
        $productid =  $request->productid;
        $userid =  auth()->user()->id ;
        $hasproduct = ProductWishlist::where('product_id',$productid)->where('user_id',$userid)->first();
        $delete = $hasproduct->delete();
        if ($delete){
            $notification = [
                'alerttype' => 'success',
                'message' => 'Ürün başarı ile beyendikleriniz arasından çıkarıldı'
            ];
            return  $notification ;
        }
    }

    public function wishlistdestroy(Request $request){
        $productid =  $request->productsid;
        $userid =  auth()->user()->id ;
        //print_r($productid) ; exit;

        $delete = ProductWishlist::whereIn('product_id',$productid)->where('user_id',$userid)->delete();

        if ($delete){
            $notification = [
                'alerttype' => 'success',
                'message' => 'Ürünler başarı ile beyendiklerinizde silindi'
            ];
            return  $notification ;
        }
    }


}
