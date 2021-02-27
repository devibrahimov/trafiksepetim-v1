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

class Cars extends Model
{
    protected $table = 'pc_cars';
    protected $guarded = [] ;


    public function carmarka($id){
        return $this->find($id);
    }
}
