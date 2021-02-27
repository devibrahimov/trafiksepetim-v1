<?php
/**
 * @author KOALAMEDYA
 * @company EMRE AKINCL A.Ş.
 * @url koalamedya.com
 * @date 15.10.2020
 * @developer Baylar Ibrahimov
 *
 */
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SubCategories extends Model
{
   protected $table = 'sub_category';
   protected $guarded = [] ;


   public function childcategory($id){
       return DB::table('sub_category_second')->where('parent_id',$id)->get();
   }
   public function parentcategory($id){
       return DB::table('category')->find($id);
   }


}
