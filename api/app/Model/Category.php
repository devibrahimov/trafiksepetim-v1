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

class Category extends Model
{
    protected $table = 'category';

    protected $guarded = ['CategoryAvatar'] ;
    protected $hidden = ['CategoryAvatar','created_at','updated_at'] ;
}
