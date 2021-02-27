<?php
/**
 * @author KOALAMEDYA
 * @company EMRE AKINCL A.Ş.
 * @url koalamedya.com
 * @date 30.11.2020
 * @developer Baylar Ibrahimov
 *
 */
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SubSecondCategory extends Model
{
    protected $table = 'sub_category_second';
    protected $guarded = [] ;
    protected $hidden = ['created_at','updated_at'] ;
}
