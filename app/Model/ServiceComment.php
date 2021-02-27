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

    class ServiceComment extends Model
    {
        protected $table = 'service_comments';
        protected $guarded = [] ;

        public function user(){
            return $this->belongsTo('App\User','user_id');
        }

    }
