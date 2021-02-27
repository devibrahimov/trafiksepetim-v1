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
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;

class Marketgeneral extends Model
{

    use Notifiable;

    protected $table = 'general_market';


    protected $guarded = [];

    protected $hidden = [
        'password'
    ];

    public function getAuthPassword()
    {
        return $this->password;
    }


        public function vergidairesiilleri(){
           return DB::table('vergidaireleri')
               ->select('SehirAdi')
               ->distinct()
               ->get();
        }

        public function vergidairesiilmudurlukleri($sehiradi){
           return DB::table('vergidaireleri')
               ->where('SehirAdi','=',$sehiradi)
               ->select('VergiDairesiMudurlugu','SaymanlikKodu')
               ->get();
        }

}
