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
use App\Model\Basket;
use App\Model\BasketProducts;
use App\User;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function addtocart(Request $request){

                $basket = Basket::firstOrCreate([
                    'user_id' => auth()->user()->id
                ]);

        $basketid = $basket->id;

        $basketproducthas = BasketProducts::where('basket_id',$basketid)->where('product_id',$request->productid)->first();

        if(!$basketproducthas){
            $basketProduct = new BasketProducts();

            $basketProduct->basket_id = $basketid ;
            $basketProduct->product_id = $request->productid ;
            $basketProduct->market_id = $request->marketid ;
            $basketProduct->name = $request->productname ;
            $basketProduct->image = $request->productimage ;
            $basketProduct->price = $request->productprice ;
            $basketProduct->quantity = $request->productquantity;

            $save = $basketProduct->save();
        }else{

            $basketproducthas->quantity = $basketproducthas->quantity+$request->productquantity ;
            $save = $basketproducthas->save();
        }


         if(!$save){
             $notification = [
                 'alert-type' => 'error',
                 'message' => 'Ürün Eklamasi başarısız.'
             ];
           $notification ;
        }else{

             $basketproducts = BasketProducts::where('basket_id',$basketid)->get();
             $productcount = $basketproducts->count();
             $totalprice = 0;

             foreach($basketproducts as $basketproduct){
                 $totalprice +=$basketproduct->price * $basketproduct->quantity;
             }

          //  $totalprice = BasketProducts::where('basket_id',$basketid)->sum('price');

             $notification = BasketProducts::where('basket_id',$basketid)->get();
                $datajson =[
                    'product' => $notification,
                    'totalPrice' => $totalprice
                ];
             return  json_encode($datajson) ;
         }

    }

    public function wishlisttocart(Request $request){
        $basket = Basket::firstOrCreate([
            'user_id' => auth()->user()->id
        ]);

        $basketid = $basket->id;
        foreach ($request->products as $key => $prt){

            $product['product_id'] =  $prt[0]; $product['product_name']  = $prt[1];
            $product['image'] = $prt[2];  $product['product_price']=  $prt[3];
            $product['quantity'] = $prt[4];  $product['market_id'] = $prt[5];

        $basketproducthas = BasketProducts::where('basket_id',$basketid)->where('product_id',$product['product_id'])->first();

            if(!$basketproducthas){
                $basketProduct = new BasketProducts();

                $basketProduct->basket_id = $basketid ;
                $basketProduct->product_id =  $product['product_id'];
                $basketProduct->market_id = $product['market_id'] ;
                $basketProduct->name =$product['product_name'] ;
                $basketProduct->image =   $product['image']  ;
                $basketProduct->price =  $product['product_price'] ;
                $basketProduct->quantity =$product['quantity'] ;

                $save = $basketProduct->save();
            }else{

                $basketproducthas->quantity = $basketproducthas->quantity+$product['quantity']  ;
                $save = $basketproducthas->save();

            }

        }
        return 'OK';
    }

    public function removefromcart(Request $request){

      $delete =  BasketProducts::find($request->id)->delete();
      if(!$delete){
          return "FALSE";
      }else{
          return 'OK';
      }
    }

    public function getcart(){
        $user = User::find(auth()->user()->id);
        return $user->basket ;
    }
}
