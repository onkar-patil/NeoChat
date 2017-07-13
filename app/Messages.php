<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Messages extends Model
{
    //
    protected $table = 'd_messages';
    protected $fillable = ['from','message','to'];

    public function muser(){
    	return $this->hasOne('App/User','id','parent_id');
    }
}
